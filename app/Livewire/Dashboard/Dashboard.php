<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        
        // Determine view based on user role with additional checks
        try {
            $view = match (strtolower($user?->role?->name)) {
                'super-admin' => 'livewire.dashboard.super-admin',
                'admin' => 'livewire.dashboard.admin',
                'driver' => 'livewire.dashboard.driver',
                'user' => 'livewire.dashboard.user',
                default => 'livewire.dashboard.guest',
            };

            return view($view, [
                'user' => $user
            ])->layout('layouts.app');
        } catch (\Throwable $e) {
            // Fallback to guest view if any errors occur
            return view('livewire.dashboard.guest')->layout('layouts.guest');
        }
    }
}