<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255',
            'question' => 'required|string|max:2000',
        ], [
            'email.required' => 'E-mailadres is verplicht',
            'email.email' => 'E-mailadres moet geldig zijn',
            'question.required' => 'Vraag is verplicht',
            'question.max' => 'Vraag mag maximaal 2000 tekens bevatten',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator)->withInput();
        }

        try {
            // Send email with question
            Mail::raw(
                "Nieuwe vraag ontvangen:\n\n" .
                "Email: " . $request->email . "\n" .
                "Naam: " . ($request->name ?? 'Niet opgegeven') . "\n\n" .
                "Vraag: " . $request->question . "\n\n" .
                "Verzonden op: " . now()->format('d-m-Y H:i:s'),
                function ($message) {
                    $message->to(config('mail.admin_email', 'admin@example.com'))
                            ->subject('Nieuwe vraag - Vraag de Imaam');
                }
            );

            return redirect()->route('home')->with('success', 'Uw vraag is succesvol verzonden.');

        } catch (\Exception $e) {
            \Log::error('Error sending question email', [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);

            return redirect()->route('home')->withErrors(['error' => 'Er is een fout opgetreden. Probeer het later opnieuw.']);
        }
    }
}
