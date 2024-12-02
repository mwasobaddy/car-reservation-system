<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Notification extends Component
{
    public $messages = [];

    public function mount()
    {
        // Retrieve messages from session on mount
        $this->messages = session('notifications', []);
    }

    #[On('notify')]
    public function notify($data)
    {
        $id = uniqid();
        $messages = session('notifications', []);
        $messages[$id] = array_merge($data, ['id' => $id]);
        
        // Store in both component state and session
        $this->messages = $messages;
        session(['notifications' => $messages]);
    }

    public function removeMessage($id)
    {
        $messages = session('notifications', []);
        unset($messages[$id]);
        unset($this->messages[$id]);
        
        // Update session
        session(['notifications' => $messages]);
    }

    public function render()
    {
        return view('livewire.notification')
            ->layout('layouts.app');
    }
}