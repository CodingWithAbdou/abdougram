<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FollowModel extends ModalComponent
{

    public $userId;
    public $following;
    protected $user;

    public function mount()
    {
        $this->user = User::find($this->userId);
        $this->following = $this->user->following()->where('confirmed' , true)->get();
    }
    public function render()
    {
        return view('livewire.follow-model');
    }
}
