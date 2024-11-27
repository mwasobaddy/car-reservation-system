<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class Login extends Component
{
    public $identifier;
    public $password;
    public $activeTab = 'email';
    public $remember = false;

    protected function rules()
    {
        return [
            'identifier' => 'required|string',
            'password' => 'required|string',
        ];
    }

    protected function messages()
    {
        return [
            'identifier.required' => 'Please provide your email or mobile number.',
            'password.required' => 'Please enter your password.',
        ];
    }

    public function loginWithEmail()
    {
        $this->activeTab = 'email';
        $this->authenticate();
    }

    public function loginWithMobile()
    {
        $this->activeTab = 'mobile';
        $this->authenticate();
    }

    private function authenticate()
    {
        $this->validate();

        try {
            $user = $this->findUser();

            if (!$user || !Hash::check($this->password, $user->password)) {
                // Dispatch notification
                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => 'These credentials do not match our records.',
                    'timeout' => 5000
                ]);
                return;
            }

            // Log the user in
            Auth::login($user, $this->remember);

            // Dispatch success notification
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Logged in successfully!',
                'timeout' => 5000
            ]);

        } catch (\Exception $e) {
            RateLimiter::hit($this->throttleKey());
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'An error occurred during authentication.',
                'timeout' => 5000
            ]);
        }
    }

    private function findUser()
    {
        $field = $this->activeTab === 'email' ? 'email' : 'mobile_number';

        return User::where($field, $this->identifier)->first();
    }

    private function throttleKey(): string
    {
        return strtolower($this->identifier) . '|login';
    }

    public function render()
    {
        return view('livewire.login')
            ->layout('layouts.app');
    }
}