<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Afficher le formulaire de contact (public)
    public function create()
    {
        return view('contacts.create');
    }

    // Sauvegarder le message de contact (public)
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Créer le message de contact
        Contact::create([
            'formulier' => json_encode([
                'nom' => $request->nom,
                'email' => $request->email,
                'message' => $request->message,
                'date' => now()
            ]),
            'user_id' => auth()->id() ?? null, // null si pas connecté
        ]);

        return redirect()->route('contact.create')
            ->with('success', 'Votre message a été envoyé avec succès!');
    }

    // Page admin pour voir tous les messages (admin seulement)
    public function adminIndex()
    {
        $contacts = Contact::latest()->get();
        return view('contacts.admin', compact('contacts'));
    }

    // Afficher un message spécifique (admin seulement)
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }
}