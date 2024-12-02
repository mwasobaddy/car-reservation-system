<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules\Password; // Add this line

class Register extends Component
{
    public $formData = [
        'first_name' => '',
        'other_names' => '',
        'work_email' => '',
        'mobile_number' => '',
        'gender' => '',
        'designation' => '',
        'department_id' => '',
        'directorate_id' => '',
        'branch_id' => '',
        'password' => '',
        'password_confirmation' => ''
    ];

    // For dropdowns
    public $departments = [];
    public $directorates = [];
    public $branches = [];

    protected $validationAttributes = [
        'formData.first_name' => 'first name',
        'formData.other_names' => 'other names',
        'formData.work_email' => 'work email',
        'formData.mobile_number' => 'mobile number',
        'formData.gender' => 'gender',
        'formData.designation' => 'designation',
        'formData.department_id' => 'department',
        'formData.directorate_id' => 'directorate',
        'formData.branch_id' => 'branch',
        'formData.password' => 'password',
        'formData.password_confirmation' => 'password confirmation'
    ];

    protected function getStepValidationRules($step)
    {
        return [
            1 => [
                'formData.first_name' => 'required|min:2|string',
                'formData.other_names' => 'required|min:2|string',
                'formData.work_email' => 'required|email|unique:users,email',
                'formData.mobile_number' => [
                    'required',
                    'string',
                    'regex:/^07\d{8}$/',
                    'unique:users,mobile_number'
                ],
            ],
            2 => [
                'formData.gender' => 'required|in:male,female',
                'formData.designation' => 'required|string|min:2',
                'formData.department_id' => 'required|exists:departments,id',
                'formData.directorate_id' => 'required|exists:directorates,id',
                'formData.branch_id' => 'required|exists:branches,id',
            ],
            3 => [
                'formData.password' => ['required', 'string', 
                    Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols(),
                    'confirmed'
                ],
                'formData.password_confirmation' => 'required|string'
            ]
        ][$step] ?? [];
    }
    
    protected function messages()
    {
        return [
            'formData.mobile_number.regex' => 'The mobile number must start with 07 and be 10 digits long.',
            'formData.work_email.unique' => 'This email is already registered.',
            'formData.mobile_number.unique' => 'This mobile number is already registered.',
        ];
    }

    public function validateStep($step)
    {
        $this->validate($this->getStepValidationRules($step));
        
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => "Step $step completed successfully!",
            'timeout' => 3000
        ]);
    }
    
    public function register()
    {
        $allRules = collect([1, 2, 3])->flatMap(function ($step) {
            return $this->getStepValidationRules($step);
        })->toArray();
        
        $this->validate($allRules);
    
        try {
            // Get the next user ID
            $lastUser = User::withTrashed()->latest('id')->first();
            $nextId = $lastUser ? $lastUser->id + 1 : 1;
            $userId = 'user_' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    
            // Encrypt and hash email and mobile number
            $work_email_hashed = hash('sha256', $this->formData['work_email']);
            $work_email_encrypted = bcrypt($this->formData['work_email']);
            $mobile_number_hashed = hash('sha256', $this->formData['mobile_number']);
            $mobile_number_encrypted = bcrypt($this->formData['mobile_number']);
    
            // Generate and encrypt OTP
            $otp_code = random_int(100000, 999999);
            $otp_code_encrypted = Crypt::encryptString($otp_code);
    
            $user = User::create([
                'user_id' => $userId, // Add the generated user_id
                'first_name' => $this->formData['first_name'],
                'other_names' => $this->formData['other_names'],
                'work_email_hashed' => $work_email_hashed,
                'work_email_encrypted' => $work_email_encrypted,
                'mobile_number_hashed' => $mobile_number_hashed,
                'mobile_number_encrypted' => $mobile_number_encrypted,
                'gender' => $this->formData['gender'],
                'designation' => $this->formData['designation'],
                'department_id' => $this->formData['department_id'],
                'directorate_id' => $this->formData['directorate_id'],
                'branch_id' => $this->formData['branch_id'],
                'password_hashed' => Hash::make($this->formData['password']),
                'otp_code_encrypted' => $otp_code_encrypted,
                'role_id' => 4, // Assuming 2 is for regular users
                'created_by' => null, // First user won't have a creator
            ]);
    
            Auth::login($user);
    
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Registration successful! Welcome aboard.',
                'timeout' => 5000
            ]);
    
            return redirect()->route('dashboard');
    
        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Registration failed: ' . $e->getMessage(),
                'timeout' => 5000
            ]);
            dd($e);
        }
    }

    public function mount()
    {
        $this->departments = \App\Models\Department::all();
        $this->directorates = \App\Models\Directorate::all();
        $this->branches = \App\Models\Branch::all();
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.app');
    }
}