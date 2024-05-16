<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class FormAnnuncio extends Component
{
    #[Validate]
    public $title;
    #[Validate]
    public $description;
    #[Validate]
    public $price;
    public $category;
    public $image;

    protected $rules = [
        'title'=>'required|min:8',
        'description'=>'required|min:10',
        'price'=>'required|numeric',
        'category'=>'required',
    ];

   protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute deve avere :min caratteri',
        'numeric'=>'Il campo :attribute deve essere un numero',
    ];

    public function store()
    {
        $this->validate();
        
        Announcement::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'image'=>$this->image,
        ]);
        session()->flash('success', 'Annuncio Inserito!');
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
        $this->image = '';
        $this->category = '';

    }
    
    public function render()
    {
        return view('livewire.form-annuncio');
    }
}
