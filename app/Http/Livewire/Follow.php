<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Follow extends Component
{
    public $userId;
    protected $user;
    public $follow_state;
    public $classes;


    public function toggle_follow()
    {
        $this->user = User::find($this->userId);
        auth()->user()->toggle_follow($this->user);
        $this->set_follow_status();
    }

    protected function set_follow_status()
    {
        if(auth()->user()->isPending($this->user)){
            $this->follow_state = 'Pending';
        }elseif(auth()->user()->isFollowing($this->user)) {
            $this->follow_state = 'Unfollow';
        }else {
            $this->follow_state = 'Follow';
        }
    }
    public function mount()
    {
        $this->user = User::find($this->userId);
        $this->set_follow_status();
    }


    public function render()
    {
        return view('livewire.follow');
    }
}
