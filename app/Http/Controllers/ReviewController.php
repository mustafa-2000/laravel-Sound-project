<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Music;
use App\Models\Video;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Display a listing of reviews
    public function index()
    {
        $reviews = Review::with(['music', 'video'])->get();
        return view('reviews.index', compact('reviews'));
    }

    // Show the form for creating a new review
    public function create()
    {
        $music = Music::all();
        $videos = Video::all();
        return view('reviews.create', compact('music', 'videos'));
    }

    // Store a newly created review in the database
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'music_id' => 'nullable|exists:music,id',
            'video_id' => 'nullable|exists:videos,id',
        ]);

        Review::create($request->all());
        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }

    // Show the form for editing the specified review
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $music = Music::all();
        $videos = Video::all();
        return view('reviews.edit', compact('review', 'music', 'videos'));
    }

    // Update the specified review in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    // Remove the specified review from the database
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
