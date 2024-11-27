<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Notification extends Component
{
    public $messages = [];

    #[On('notify')]
    public function notify($data)
    {
        $id = uniqid();
        $this->messages[$id] = array_merge($data, ['id' => $id]);
    }

    public function removeMessage($id)
    {
        unset($this->messages[$id]);
    }

    public function render()
    {
        return view('livewire.notification')
        ->layout('layouts.app');
    }
}