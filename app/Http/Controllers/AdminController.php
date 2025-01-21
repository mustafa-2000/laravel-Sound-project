<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard')->with('success', 'Logged in successfully.');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Show the form for creating music
    public function createMusic() {
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('admin.music.create', compact('categories'));
    }

    // Store the newly created music in the database
    public function storeMusic(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer',
        ]);

        Music::create($validated);

        return redirect()->route('admin.createMusic')->with('success', 'Music added successfully.');
    }

    // public function createMusic(Request $request) {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category_id' => 'required|exists:categories,id',
    //         'artist' => 'required|string|max:255',
    //         'year' => 'required|integer',
    //     ]);
    
    //     Music::create($validated);
    //     return redirect()->route('admin.manage')->with('success', 'Music added successfully.');
    // }
    
    // Show the form for editing existing music
    public function editMusic($id) {
        $music = Music::findOrFail($id);
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('admin.music.edit', compact('music', 'categories'));
    }

    // Update the music in the database
    public function updateMusic(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer',
        ]);

        $music = Music::findOrFail($id);
        $music->update($validated);

        return redirect()->route('admin.editMusic', $id)->with('success', 'Music updated successfully.');
    }

    // Delete the music
    public function deleteMusic($id) {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('admin.createMusic')->with('success', 'Music deleted successfully.');
    }

}
