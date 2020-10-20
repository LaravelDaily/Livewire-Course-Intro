<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $success = false;
    public $user;
    public $showHelp = false;

    protected $rules = [
        'user.name' => 'min:3',
        'user.email' => 'email',
    ];

    public function mount()
    {
        $this->user = User::find(request('user_id'));
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function updateprofile()
    {
        $this->validate();

        $this->user->save();

        $this->success = true;
    }

    public function updatedUserName($value)
    {
        $this->validateOnly('user.name');
    }

}
