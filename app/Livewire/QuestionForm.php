<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class QuestionForm extends Component
{
    public $email = '';
    public $name = '';
    public $question = '';
    public $submitted = false;

    protected $rules = [
        'email' => 'required|email|max:255',
        'name' => 'nullable|string|max:255',
        'question' => 'required|string|max:2000',
    ];

    protected $messages = [
        'email.required' => 'E-mailadres is verplicht',
        'email.email' => 'E-mailadres moet geldig zijn',
        'question.required' => 'Vraag is verplicht',
        'question.max' => 'Vraag mag maximaal 2000 tekens bevatten',
    ];

    public function submit()
    {
        $this->validate();

        try {
            // Send email with question
            Mail::raw(
                "Nieuwe vraag ontvangen:\n\n" .
                "Email: " . $this->email . "\n" .
                "Naam: " . ($this->name ?: 'Niet opgegeven') . "\n\n" .
                "Vraag: " . $this->question . "\n\n" .
                "Verzonden op: " . now()->format('d-m-Y H:i:s'),
                function ($message) {
                    $message->to(config('mail.admin_email', 'admin@example.com'))
                            ->subject('Nieuwe vraag - Vraag de Imaam');
                }
            );

            $this->submitted = true;

            // Reset form after 3 seconds
            $this->dispatch('question-submitted');

        } catch (\Exception $e) {
            \Log::error('Error sending question email', [
                'error' => $e->getMessage(),
                'email' => $this->email
            ]);

            session()->flash('error', 'Er is een fout opgetreden. Probeer het later opnieuw.');
        }
    }

    public function render()
    {
        return view('livewire.question-form');
    }
}
