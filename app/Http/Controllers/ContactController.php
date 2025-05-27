<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required',
            'email' => 'required|email',
            'bericht' => 'required',
        ]);

        // Hier zou je normaal e-mailen of opslaan
        return redirect()->route('contact.show')->with('success', 'Bedankt voor je bericht!');
    }

    // app/Http/Controllers/ContactController.php




}