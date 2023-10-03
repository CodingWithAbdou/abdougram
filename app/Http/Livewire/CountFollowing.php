<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CountFollowing extends Component
{
    public $userId;
    // public $count;
    protected $user;
    protected $listeners = ['unfollowing_user' => 'getCountProperty'];

    public function getCountProperty()
    {
        $this->user = User::find($this->userId);
        return count($this->user->following()->wherePivot('confirmed' , true)->get());
    }

    public function render()
    {
        return view('livewire.count-following');
    }
}
