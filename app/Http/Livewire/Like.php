<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Like extends Component
{
    public $post;

    public function toglle_like()
    {
        auth()->user()->likes()->toggle($this->post);
        $this->emit('postLiked');
    }

    public function render()
    {
        return view('livewire.like');
    }
}
