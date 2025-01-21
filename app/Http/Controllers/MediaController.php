<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Video;
use App\Models\MusicReview;
use App\Models\VideoReview;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {

        // $music = Music::with(['reviews', 'reviews.user'])->get();
        // $videos = Video::with(['reviews', 'reviews.user'])->get();
        
        $music = Music::with(['musicReviews.user'])->get();
        $videos = Video::with(['videoReviews.user'])->get();

        $currentUserId = auth()->id();

        // Return the view with the data
        return view('media.index', compact('music', 'videos', 'currentUserId'));
    }
}
