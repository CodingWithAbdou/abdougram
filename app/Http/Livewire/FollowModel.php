<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FollowModel extends ModalComponent
{

    public $userId;
    protected $user;

    public function getFollowingListProperty()
    {
        $this->user = User::find($this->userId);
        return $this->user->following()->where('confirmed' , true)->get();
    }

    public function unFollow($userId)
    {
        $following_user = User::find($userId);
        $this->user = User::find($this->userId);
        $this->user->unfollow($following_user);
        $this->emit('unfollowing_user');
    }
    public function render()
    {
        return view('livewire.follow-model');
    }
}
