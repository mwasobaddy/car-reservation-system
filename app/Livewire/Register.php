<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Directorate;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $departments;
    public $directorates;
    public $branches;
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
        'password_confirmation' => '',
    ];
    public $step = 1;
    public $totalSteps = 3;
    public $loading = false;

    protected $rules = [
        'formData.first_name' => 'required|string|max:255',
        'formData.other_names' => 'required|string|max:255',
        'formData.work_email' => 'required|email|unique:users,work_email',
        'formData.mobile_number' => 'required|string|unique:users,mobile_number',
        'formData.gender' => 'required|in:male,female,other',
        'formData.designation' => 'required|string|max:255',
        'formData.department_id' => 'required|exists:departments,id',
        'formData.directorate_id' => 'required|exists:directorates,id',
        'formData.branch_id' => 'required|exists:branches,id',
        'formData.password' => 'required|string|min:8|confirmed',
    ];

    public function mount()
    {
        $this->departments = Department::all();
        $this->directorates = Directorate::all();
        $this->branches = Branch::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        $this->loading = true;

        // Create the user
        User::create([
            'first_name' => $this->formData['first_name'],
            'other_names' => $this->formData['other_names'],
            'work_email' => $this->formData['work_email'],
            'mobile_number' => $this->formData['mobile_number'],
            'gender' => $this->formData['gender'],
            'designation' => $this->formData['designation'],
            'department_id' => $this->formData['department_id'],
            'directorate_id' => $this->formData['directorate_id'],
            'branch_id' => $this->formData['branch_id'],
            'password' => Hash::make($this->formData['password']),
            'created_by' => Auth::id() ? 'user_' . Auth::id() : 'user_000', // Adjust as per your user ID format
            'updated_by' => Auth::id() ? 'user_' . Auth::id() : 'user_000',
        ]);

        // Optionally, log the user in
        // Auth::attempt(['work_email' => $this->formData['work_email'], 'password' => $this->formData['password']]);

        session()->flash('success', 'Registration successful!');

        // Redirect or reset form
        return redirect()->route('dashboard'); // Adjust the route as needed
    }

    public function render()
    {
        return view('livewire.register')->layout('layouts.app');
    }
}