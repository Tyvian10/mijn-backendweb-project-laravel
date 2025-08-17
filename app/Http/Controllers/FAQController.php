<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    // Page publique des FAQ
    public function index()
    {
        $faqs = FAQ::all();
        return view('faqs.index', compact('faqs'));
    }

    // Créer une FAQ (admin seulement)
    public function create()
    {
        return view('faqs.create');
    }

    // Sauvegarder une FAQ (admin seulement)
    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
        ]);

        FAQ::create([
            'vraag' => $request->vraag,
            'antwoord' => $request->antwoord,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('faqs.index')->with('success', 'FAQ ajoutée avec succès!');
    }

    // Afficher une FAQ spécifique
    public function show(FAQ $faq)
    {
        return view('faqs.show', compact('faq'));
    }

    // Modifier une FAQ (admin seulement)
    public function edit(FAQ $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    // Mettre à jour une FAQ (admin seulement)
    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
        ]);

        $faq->update($request->only('vraag', 'antwoord'));
        return redirect()->route('faqs.index')->with('success', 'FAQ mise à jour!');
    }

    // Supprimer une FAQ (admin seulement)
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ supprimée!');
    }
}