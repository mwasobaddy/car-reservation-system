<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $message;

    protected $listeners = ['notify'];

    public function notify($data)
    {
        $this->message = $data;
    }

    public function render()
    {
        return view('livewire.notification');
    }
}