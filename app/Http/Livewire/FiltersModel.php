<?php

namespace App\Http\Livewire;
// use Illuminate\Support\Facades\Storage;

use LivewireUI\Modal\ModalComponent;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class FiltersModel extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public $image;
    public $filtred_image;
    public $filters = ['original' , 'clarendon' , 'moon' , 'gingham' , 'perpetua'];

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

    public function filter_clarendon()
    {
        $img = Image::make(storage_path('app/public') . DIRECTORY_SEPARATOR . $this->image)
            ->brightness(20)
            ->contrast(15)
            ->save(storage_path('app/public/temp') . "/" . Str::random(30) . '.jpeg');
        $this->filtred_image = 'temp' . DIRECTORY_SEPARATOR . $img->basename;
    }


    public function filter_moon()
    {
        $img = Image::make(storage_path('app/public') . DIRECTORY_SEPARATOR . $this->image)
            ->brightness(10)
            ->contrast(5)
            ->greyscale()
            ->save(storage_path('app/public/temp') . DIRECTORY_SEPARATOR . Str::random(30) . '.jpeg');
        $this->filtred_image = 'temp' . DIRECTORY_SEPARATOR . $img->basename;
    }

    public function filter_gingham()
    {
        $img = Image::make(storage_path('app/public') . DIRECTORY_SEPARATOR . $this->image)
            ->brightness(20)
            ->contrast(20)
            ->colorize(0, -10, -10)
            ->save(storage_path('app/public/temp') . DIRECTORY_SEPARATOR . Str::random(30) . '.jpeg');
        $this->filtred_image = 'temp' . DIRECTORY_SEPARATOR . $img->basename;
    }

    public function filter_perpetua()
    {
        $img = Image::make(storage_path('app/public') . DIRECTORY_SEPARATOR . $this->image)
            ->contrast(-10)
            ->colorize(-30, 10, 10)
            ->save(storage_path('app/public/temp') . DIRECTORY_SEPARATOR . Str::random(30) . '.jpeg');
        $this->filtred_image = 'temp' . DIRECTORY_SEPARATOR . $img->basename;
    }

    public function render()
    {
        return view('livewire.filters-model');
    }
}
