<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'director', 'year'];

    // public function reviews()
    // {
    //     // return $this->hasMany(Review::class, 'video_id');
    //     return $this->hasMany(Review::class);
    // }

    // Relationship with VideoReview
    // public function reviews()
    // {
    //     return $this->hasMany(VideoReview::class, 'video_id');
    // }

    // Define the relationship with the VideoReview model
    public function videoReviews()
    {
        return $this->hasMany(VideoReview::class);
    }


}
