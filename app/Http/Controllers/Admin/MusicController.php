<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Category; // Assuming you have a Category model
use App\Models\MusicReview; 
use App\Models\Review; 
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        // Fetch all music with their associated categories
        $music = Music::with('category')->get();
        return view('admin.music.index', compact('music'));
    }

    public function create()
    {
        // Fetch all categories for the select dropdown
        $categories = Category::all();
        return view('admin.music.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Ensure the category exists
        ]);

        // Create a new music record
        Music::create($request->all());
        return redirect()->route('admin.music.index')->with('success', 'Music added successfully!');
    }

    public function edit($id)
    {
        // Find the music record by its ID
        $music = Music::findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the select dropdown
        return view('admin.music.edit', compact('music', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Ensure the category exists
        ]);

        // Find the music record by its ID and update it
        $music = Music::findOrFail($id);
        $music->update($request->all());
        return redirect()->route('admin.music.index')->with('success', 'Music updated successfully!');
    }

    public function destroy($id)
    {
        // Find the music record by its ID and delete it
        $music = Music::findOrFail($id);
        $music->delete();
        return redirect()->route('admin.music.index')->with('success', 'Music deleted successfully!');
    }

    // HANDLING REVIEWS AND RATINGS
    // public function storeReview(Request $request, Music $music)
    // {
    //     $request->validate([
    //         'rating' => 'required|integer|min:1|max:5',
    //         'review' => 'nullable|string|max:255',
    //     ]);

    //     MusicReview::create([
    //         'music_id' => $music->id,
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

    public function storeMusicReview(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:255',
        ]);

        // Create a new music review and save it to the music_reviews table
        $musicReview = new MusicReview();
        $musicReview->user_id = auth()->id();
        $musicReview->music_id = $id;
        $musicReview->rating = $validatedData['rating'];
        $musicReview->review = $validatedData['review'];

        // Save the music review
        $musicReview->save();

        return redirect()->back()->with('success', 'Music review submitted successfully.');
    }


}
