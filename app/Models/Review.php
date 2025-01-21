<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function reviewable()
    {
        return $this->morphTo();
    }

}
