<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class CreatePostModel extends ModalComponent
{
    use WithFileUploads;


    public $image;
    public $filters = ['one' , 'two' , 'three' , 'four' , 'five'];

    public function save_temp()
    {
        $this->image->store('temp');
        $this->emit("openModal", "filters-model", ['image' => $this->image]);
    }

    public function render()
    {
        return view('livewire.create-post-model');
    }
}
