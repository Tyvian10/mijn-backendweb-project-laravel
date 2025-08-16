<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = [
        'vraag',
        'antwoord', 
        'user_id',
    ];

    // Relation vers User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}