<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
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
            'identifier' => $this->activeTab === 'email' 
                ? 'required|email' 
                : ['required', 'regex:/^07\d{8}$/'],
            'password' => 'required|min:8'
        ];
    }

    protected function messages()
    {
        return [
            'identifier.regex' => 'Mobile number must start with 07 and be 10 digits long.',
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
            
            if (!$user || !Hash::check($this->password, $user->password_hashed)) {
                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => 'Invalid credentials.',
                    'timeout' => 15000
                ]);
                return;
            }

            if (!$user->account_status) {
                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => 'Your account is currently inactive.',
                    'timeout' => 5000
                ]);
                return;
            }

            // Generate and store OTP
            $otp = $this->generateOTP();
            Cache::put("otp_{$user->id}", [
                'code' => Crypt::encrypt($otp),
                'expires_at' => now()->addMinutes(5)
            ], 300); // 5 minutes

            // Store user ID in session for OTP verification
            session(['auth_user_id' => $user->id]);
            session(['auth_type' => $this->activeTab]);

            // Send OTP based on login method
            if ($this->activeTab === 'email') {
                // Send email OTP
                $user->sendEmailOTP($otp);
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => 'OTP has been sent to your email.',
                    'timeout' => 3000
                ]);
            } else {
                // Send SMS OTP
                $user->sendSMSOTP($otp);
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => 'OTP has been sent to your mobile number.',
                    'timeout' => 3000
                ]);
            }

            RateLimiter::clear($this->throttleKey());
            
            return redirect()->route('otp.verify');

        } catch (\Exception $e) {
            RateLimiter::hit($this->throttleKey());
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
                'timeout' => 5000
            ]);
        }
    }

    private function findUser()
    {
        $field = $this->activeTab === 'email' ? 'work_email_hashed' : 'mobile_number_hashed';
        $hashedIdentifier = hash('sha256', $this->identifier);
        
        return User::where($field, $hashedIdentifier)
            ->where('account_status', true)
            ->first();
    }

    private function throttleKey(): string
    {
        return mb_strtolower($this->identifier) . '|' . request()->ip();
    }

    private function generateOTP(): string
    {
        return (string) random_int(100000, 999999);
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}