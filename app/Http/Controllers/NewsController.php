<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

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
        $request->validate([
            'titel' => 'required|string|max:255',
            'nieuwsbericht' => 'required|string',
        ]);

        $news = new News();
        $news->titel = $request->titel;
        $news->nieuwsbericht = $request->nieuwsbericht;
        $news->user_id = auth()->id(); // alleen als je authenticatie gebruikt
        $news->save();

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht aangemaakt!');
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
        $request->validate([
            'titel' => 'required|string|max:255',
            'nieuwsbericht' => 'required|string',
        ]);

        $news->update($request->only('titel', 'nieuwsbericht'));

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht bijgewerkt!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Nieuwsbericht verwijderd!');
    }
}