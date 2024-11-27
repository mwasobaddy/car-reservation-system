<?php
// app/Http/Livewire/Auth/OtpVerification.php
namespace App\Livewire\Auth;

use Livewire\Component;

class OtpVerification extends Component
{
    public $otp = ['', '', '', '', '', ''];
    public $remainingTime = 300; // 5 minutes
    
    protected $rules = [
        'otp.*' => 'required|numeric|min:0|max:9'
    ];

    public function mount()
    {
        if (!session('pending_otp_user')) {
            return redirect()->route('login');
        }
        
        // Generate and send OTP
        $this->sendOTP();
    }

    public function verifyOTP()
    {
        $this->validate();
        
        $enteredOTP = implode('', $this->otp);
        
        if ($this->validateOTP($enteredOTP)) {
            auth()->login(session('pending_otp_user'));
            session()->forget('pending_otp_user');
            return redirect()->intended(route('dashboard'));
        }
        
        $this->addError('otp', 'Invalid OTP code');
    }

    public function resendOTP()
    {
        $this->sendOTP();
        $this->remainingTime = 300;
    }

    public function render()
    {
        return view('livewire.auth.otp-verification')
            ->layout('layouts.app');
    }
}