<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormAnnuncio extends Component
{   
    use WithFileUploads;
    #[Validate]
    public $title;
    #[Validate]
    public $description;
    #[Validate]
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $announcement; 

    

    protected $rules = [
        'title'=>'required|min:8',
        'description'=>'required|min:10|max:255',
        'price'=>'required|numeric',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',

    ];

   protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute deve avere :min caratteri',
        'max'=>'Il campo :attribute può contenere :max caratteri',
        'numeric'=>'Il campo :attribute deve essere un numero',
        'temporary_images.required'=>'L\'immagine è richiesta',
        'temporary_images.*.image'=>'i file devono essere immagini',
        'temporary_images.*.max'=>'L\'immagine deve essere massimo un mega',
        'images.image'=>'L\'immagine deve essere un immagine',
        'images.max'=>'L\'immagine deve essere massimo un mega',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',
            ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)){
            foreach ($this->images as $image) {
                //$this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path, 400, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));

        }

        session()->flash('success', 'Annuncio Inserito! Sarà pubblicato dopo la revisione');
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];

    }
    
    public function render()
    {
        return view('livewire.form-annuncio');
    }
}
