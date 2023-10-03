<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PendingListCount extends Component
{
    protected $listeners = ['notification_clicked' => 'getCountProperty' , 'deleted_follower' => 'getCountProperty' , 'confirmed_follower' => 'getCountProperty' ];

    public function getCountProperty()
    {
        return count(auth()->user()->followers()->wherePivot('confirmed' , false)->get());
    }

    public function render()
    {
        return view('livewire.pending-list-count');
    }
}
