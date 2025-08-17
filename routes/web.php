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
    // Gestion des actualités (CRUD complet)
    Route::resource('admin/news', NewsController::class)->except(['index', 'show']);
    
    // Gestion des FAQ (CRUD complet)  
    Route::resource('admin/faqs', FAQController::class)->except(['index']);
    
    // Gestion des utilisateurs
    Route::get('/admin/users', [ProfileController::class, 'adminIndex'])->name('admin.users');
    Route::patch('/admin/users/{user}/role', [ProfileController::class, 'updateRole'])->name('admin.users.role');
    
    // Messages de contact reçus
    Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts');
});