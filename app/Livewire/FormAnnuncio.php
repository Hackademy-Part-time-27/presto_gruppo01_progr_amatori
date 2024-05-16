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
    public $image;

    protected $rules = [
        'title'=>'required|min:8',
        'description'=>'required|min:10',
        'price'=>'required|numeric',
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

    }
    public function render()
    {
        return view('livewire.form-annuncio');
    }
}
