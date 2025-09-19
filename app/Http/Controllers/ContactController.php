<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'email.email' => 'E-mailadres moet geldig zijn',
            'subject.required' => 'Onderwerp is verplicht',
            'message.required' => 'Bericht is verplicht',
            'message.max' => 'Bericht mag maximaal 2000 tekens bevatten',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // For now, just log the contact form (since mail is not configured)
        \Log::info('Contact form submission', [
            'name' => $request->name ?: 'Anoniem',
            'email' => $request->email ?: 'anonymous@example.com',
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Bedankt voor uw bericht! We nemen zo snel mogelijk contact met u op.');
    }
}