<?php

namespace App\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public $isMobileMenuOpen = false;

    protected $listeners = ['navigationStateReset' => 'resetState'];

    public function mount()
    {
        $this->resetState();
    }

    public function resetState()
    {
        $this->isMobileMenuOpen = false;
    }

    public function render()
    {
        return view('livewire.navigation')
            ->layout('layouts.app');
    }
}