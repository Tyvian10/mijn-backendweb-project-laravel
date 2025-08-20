<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

// Page d'accueil publique
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification (ajoutées automatiquement par Breeze)
require __DIR__.'/auth.php';

// Dashboard après connexion
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes publiques (accessibles à tous les visiteurs)
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faqs', [FAQController::class, 'index'])->name('faqs.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes pour utilisateurs connectés
Route::middleware('auth')->group(function () {
    // Profils utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

// Routes réservées aux administrateurs uniquement
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/users/create', [ProfileController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [ProfileController::class, 'store'])->name('admin.users.store');
    // Gestion des actualités (CRUD complet pour admin)
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    
    // Gestion des FAQ (CRUD complet pour admin)
    Route::get('/admin/faqs/create', [FAQController::class, 'create'])->name('admin.faqs.create');
    Route::post('/admin/faqs', [FAQController::class, 'store'])->name('admin.faqs.store');
    Route::get('/admin/faqs/{faq}/edit', [FAQController::class, 'edit'])->name('admin.faqs.edit');
    Route::put('/admin/faqs/{faq}', [FAQController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/admin/faqs/{faq}', [FAQController::class, 'destroy'])->name('admin.faqs.destroy');
    
    // Gestion des utilisateurs
    Route::get('/admin/users', [ProfileController::class, 'adminIndex'])->name('admin.users');
    Route::patch('/admin/users/{user}/role', [ProfileController::class, 'updateRole'])->name('admin.users.role');
    
    // Messages de contact reçus
    Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts');
});
