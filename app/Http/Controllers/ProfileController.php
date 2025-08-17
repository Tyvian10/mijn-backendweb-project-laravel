<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Afficher le profil public d'un utilisateur
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    // Éditer son propre profil
    public function edit()
    {
        $user = auth()->user();
        return view('profiles.edit', compact('user'));
    }

    // Mettre à jour son propre profil
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profielfoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'email');

        // Gérer l'upload de photo
        if ($request->hasFile('profielfoto')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->profielfoto) {
                Storage::disk('public')->delete($user->profielfoto);
            }
            
            // Sauvegarder la nouvelle photo
            $data['profielfoto'] = $request->file('profielfoto')->store('profiles', 'public');
        }

        $user->update($data);

        return redirect()->route('profile.edit')
            ->with('success', 'Profil mis à jour avec succès!');
    }

    // Page admin pour gérer les utilisateurs (admin seulement)
    public function adminIndex()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Changer le rôle d'un utilisateur (admin seulement)
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->route('admin.users')
            ->with('success', 'Rôle de l\'utilisateur modifié avec succès!');
    }
}