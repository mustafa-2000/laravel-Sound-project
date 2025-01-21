<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/MusicReview.php
class MusicReview extends Model
{
    protected $fillable = ['music_id', 'user_id', 'rating', 'review'];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
