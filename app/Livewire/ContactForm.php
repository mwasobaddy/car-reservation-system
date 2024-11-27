<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact; // Correct model reference

class ContactForm extends Component
{
    public $issueType;
    public $description;
    public $attachments;
    public $subject;
    public $message;
    public $priority;

    protected $rules = [
        'issueType' => 'required|string',
        'description' => 'required|string',
        'attachments' => 'nullable|file', // Updated for file upload
        'subject' => 'required|string',
        'message' => 'required|string',
        'priority' => 'required|string',
    ];

    public function reportBug()
    {
        $this->validate();

        Contact::create([
            'issue_type' => $this->issueType,
            'description' => $this->description,
            'attachments' => $this->attachments ? $this->attachments->store('attachments') : null, // Handle file upload
            'subject' => $this->subject,
            'message' => $this->message,
            'priority' => $this->priority,
        ]);

        session()->flash('message', 'Bug report submitted successfully.');
    }

    public function contactAdmin()
    {
        $this->validate();

        Contact::create([
            'issue_type' => 'Admin Contact', // or another appropriate value
            'description' => 'N/A',
            'attachments' => $this->attachments ? $this->attachments->store('attachments') : null,
            'subject' => $this->subject,
            'message' => $this->message,
            'priority' => $this->priority,
        ]);

        session()->flash('message', 'Message sent to admin successfully.');
    }

    public function render()
    {
        return view('livewire.contact-form')
            ->layout('layouts.app');
    }
}