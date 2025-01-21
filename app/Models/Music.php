<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'title',
        'artist',
        'year',
        'category_id',  // Assuming you have a category_id in your music table
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }
        // Relationship with MusicReview

    // public function reviews()
    // {
    //     return $this->hasMany(MusicReview::class, 'music_id');
    // }

    public function musicReviews()
    {
        return $this->hasMany(MusicReview::class);
    }

}
