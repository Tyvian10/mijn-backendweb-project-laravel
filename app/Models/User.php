<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profielfoto',
        'verjaardag',
        'over_mij',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Méthode helper pour vérifier si admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Relations
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function faqs()
    {
        return $this->hasMany(FAQ::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}