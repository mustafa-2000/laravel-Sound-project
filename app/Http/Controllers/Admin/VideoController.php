<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\VideoReview;
use App\Models\Review; 
use App\Models\Music;

class VideoController extends Controller
{
    // Display a listing of the videos
    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index', compact('videos'));
    }

    // Show the form for creating a new video
    public function create()
    {
        return view('admin.video.create');
    }

    // Store a newly created video in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'director' => 'required|string',
            'year' => 'required|integer',
        ]);

        Video::create($request->all());
        return redirect()->route('admin.video.index')->with('success', 'Video added successfully!');
    }

    // Show the form for editing the specified video
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video.edit', compact('video'));
    }

    // Update the specified video in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'director' => 'required|string',
            'year' => 'required|integer',
        ]);

        $video = Video::findOrFail($id);
        $video->update($request->all());
        return redirect()->route('admin.video.index')->with('success', 'Video updated successfully!');
    }

    // Remove the specified video from the database
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('admin.video.index')->with('success', 'Video deleted successfully!');
    }

    // HANDLES REVIEWS AND RATINGS
    // public function storeReview(Request $request, Video $video)
    // {
    //     $request->validate([
    //         'rating' => 'required|integer|min:1|max:5',
    //         'review' => 'nullable|string|max:255',
    //     ]);

    //     VideoReview::create([
    //         'video_id' => $video->id,
    //         'user_id' => auth()->id(),
    //         'rating' => $request->rating,
    //         'review' => $request->review,
    //     ]);

    //     return redirect()->back()->with('success', 'Review submitted successfully!');
    // }

    public function storeReview(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:255',
        ]);

        $review = new Review();
        $review->user_id = auth()->id();
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];

        $music = Music::find($id); // or Video::find($id)
        $music->reviews()->save($review);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function storeVideoReview(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:255',
        ]);

        // Create a new video review and save it to the video_reviews table
        $videoReview = new VideoReview();
        $videoReview->user_id = auth()->id();
        $videoReview->video_id = $id;
        $videoReview->rating = $validatedData['rating'];
        $videoReview->review = $validatedData['review'];

        // Save the video review
        $videoReview->save();

        return redirect()->back()->with('success', 'Video review submitted successfully.');
    }



}