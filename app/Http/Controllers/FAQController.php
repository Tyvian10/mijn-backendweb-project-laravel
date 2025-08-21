<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->get();
        return view('faqs.index', compact('categories'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('faqs.create', compact('categories'));
        dd($categories); // Cela va afficher les catégories et arrêter l'exécution
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        FAQ::create([
            'vraag' => $request->vraag,
            'antwoord' => $request->antwoord,
            'category_id' => $request->category_id,
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