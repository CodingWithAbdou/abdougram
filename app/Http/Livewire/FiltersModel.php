<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class FiltersModel extends ModalComponent
{
    public $image;

    public function mount($image)
    {
        $this->image = $image;
    }
    public function render()
    {
        return view('livewire.filters-model');
    }
}
