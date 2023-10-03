<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PendingList extends Component
{
    public $userId;
    protected $user;

    protected $listeners = ['notification_clicked' => 'getPendingListProperty' , 'deleted_followerr' => 'getPendingListProperty' , 'confirmed_follower' => 'getPendingListProperty' ];

    public function getPendingListProperty()
    {
        return auth()->user()->followers()->wherePivot('confirmed' , false)->get();;
    }

    public function confirme($userId)
    {
        $pending_followers = User::find($userId);
        $this->user = User::find($this->userId);
        $this->user->confirmedPending($pending_followers);
        $this->emit('confirmed_follower');
    }

    public function deleteRequestPending($userId)
    {
        $pending_followers = User::find($userId);
        $this->user = User::find($this->userId);
        $this->user->deleteRequestPending($pending_followers);
        $this->emit('deleted_follower');
    }

    public function render()
    {
        return view('livewire.pending-list');
    }
}
