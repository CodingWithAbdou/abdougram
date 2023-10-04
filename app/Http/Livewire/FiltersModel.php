<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class FiltersModel extends ModalComponent
{
    public $image;
    public $filtred_image;
    public $filters = ['original' , 'clarendon' , 'moon' , 'gingham' , 'perpetua'];

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
    public function mount($image)
    {
        $this->image = $image;
        $this->filtred_image = $this->image;
    }

    // function Filters

    public function filter_original()
    {
        $this->filtred_image = $this->image;
    }


    public function render()
    {
        return view('livewire.filters-model');
    }
}
