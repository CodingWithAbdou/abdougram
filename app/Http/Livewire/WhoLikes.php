<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WhoLikes extends Component
{

    public $post;

    protected $listeners = ['postLiked' => 'getLikesProperty'];

    public function getLikesProperty()
    {
        return $this->post->likes()->count();
    }

    public function getFirstusernameProperty()
    {
        return $this->post->likes()->first()->username;
    }

    public function render()
    {
        return view('livewire.who-likes');
    }
}
