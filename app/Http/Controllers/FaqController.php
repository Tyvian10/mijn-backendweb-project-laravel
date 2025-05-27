<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('user_id', Auth::id())->get();
        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
        ]);

        Faq::create([
            'user_id' => Auth::id(),
            'vraag' => $request->vraag,
            'antwoord' => $request->antwoord,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ toegevoegd!');
    }

    public function show(Faq $faq)
    {
        $this->authorizeAccess($faq);
        return view('faq.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        $this->authorizeAccess($faq);
        return view('faq.edit', compact('faq'));
    }

    
    
    public function update(Request $request, \App\Models\Faq $faq)
    {
        $validated = $request->validate([
            'vraag' => 'required|min:3',
            'antwoord' => 'required|min:5',
        ]);
    
        $faq->update($validated);
    
        return redirect()->route('faq.index')->with('success', 'FAQ bijgewerkt!');
    }

    public function destroy(Faq $faq)
    {
        $this->authorizeAccess($faq);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ verwijderd.');
    }

    private function authorizeAccess(Faq $faq)
    {
        if ($faq->user_id !== Auth::id()) {
            abort(403);
        }
    }
}