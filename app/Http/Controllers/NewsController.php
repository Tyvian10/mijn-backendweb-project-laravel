<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|min:3|max:255',
            'nieuwsbericht' => 'required|min:5',
        ]);

        News::create([
            'titel' => $validated['titel'],
            'nieuwsbericht' => $validated['nieuwsbericht'],
            'user_id' => Auth::id(), // Zorgt dat het een ingelogde user is
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht succesvol toegevoegd!');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'titel' => 'required|min:3|max:255',
            'nieuwsbericht' => 'required|min:5',
        ]);

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht bijgewerkt!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Nieuwsbericht verwijderd!');
    }
}