<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuNotifications extends Component
{
    public $notificationsCount = 0;

    protected $listeners = [
        'profileUpdated' => 'incrementNotificationsCount'
    ];

    public function render()
    {
        return view('livewire.menu-notifications');
    }

    public function incrementNotificationsCount()
    {
        $this->notificationsCount++;
    }
}
