<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\User;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // Neem een bestaande user (de eerste) of maak een testuser aan
        $user = User::first() ?? User::factory()->create();

        Faq::create([
            'user_id' => $user->id,
            'vraag' => 'Hoe reset ik mijn wachtwoord?',
            'antwoord' => 'Klik op "Wachtwoord vergeten?" op de loginpagina en volg de instructies.',
        ]);

        Faq::create([
            'user_id' => $user->id,
            'vraag' => 'Hoe neem ik contact op met de klantenservice?',
            'antwoord' => 'Stuur een mail naar support@example.com of gebruik het contactformulier.',
        ]);
    }
}