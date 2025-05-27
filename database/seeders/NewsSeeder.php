use App\Models\User;
use App\Models\News;

public function run()
{
    // Maak eerst een testgebruiker aan
    $user = \App\Models\User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Koppel nieuws aan die user
    \App\Models\News::factory()->count(5)->create([
        'user_id' => $user->id,
    ]);
}

