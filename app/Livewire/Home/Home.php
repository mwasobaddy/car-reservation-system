<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function render()
    {
        $user = Auth::user();
        
        // Determine view based on user role with additional checks
        try {
            $view = match (strtolower($user?->role?->name)) {
                'super-admin' => 'livewire.home.super-admin',
                'admin' => 'livewire.home.admin',
                'driver' => 'livewire.home.driver',
                'user' => 'livewire.home.user',
                default => 'livewire.home.guest',
            };

            return view($view, [
                'user' => $user
            ])->layout('layouts.app');
        } catch (\Throwable $e) {
            // Fallback to guest view if any errors occur
            return view('livewire.home.guest')->layout('layouts.guest');
        }
    }
}