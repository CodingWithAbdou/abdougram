<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PendingListCount extends Component
{
    public $userId;
    protected $user;

    protected $listeners = ['deleted_followerr' => 'getCountProperty' , ' confirmed_followe' => 'getCountProperty' ];

    public function getCountProperty()
    {
        $this->user = User::find($this->userId);
        return $this->user->followers()->wherePivot('confirmed' , false)->count();
    }
    public function render()
    {
        return view('livewire.pending-list-count');
    }
}
