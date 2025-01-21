<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});


Route::get('/welcome', function () {
    return view('welcome'); // Change this to the actual view you want to display
})->name('welcome');


Route::middleware('auth')->group(function(){
    // Route::get('/', function () {
    //     return view('index');
    // });
    Route::get('/index', function () {
        return view('index');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/albums', function () {
        return view('albums');
    });
    Route::get('/event', function () {
        return view('event');
    });
    Route::get('/blog', function () {
        return view('blog');
    });
    Route::get('/elements', function () {
        return view('elements');
    });
});

// Route::get('/media', [App\Http\Controllers\MediaController::class, 'index'])->name('media.index');
Route::get('/media', [MediaController::class, 'index'])->name('media.index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::redirect('/dashboard', 'index')->middleware('auth')->name('dashboard');

// Route::get('/admin', function(){
//     return view('admin.login');
// });

Route::redirect('/admin', '/admin/login');

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// Route::prefix('admin')->group(function() {
//     Route::get('/music/create', [AdminController::class, 'createMusic'])->name('admin.createMusic');
//     Route::post('/music/store', [AdminController::class, 'storeMusic'])->name('admin.storeMusic');
//     Route::get('/music/{id}/edit', [AdminController::class, 'editMusic'])->name('admin.editMusic');
//     Route::put('/music/{id}', [AdminController::class, 'updateMusic'])->name('admin.updateMusic');
//     Route::delete('/music/{id}', [AdminController::class, 'deleteMusic'])->name('admin.deleteMusic');
// });


Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/music', [MusicController::class, 'index'])->name('admin.music.index'); // List all music
    Route::get('/music/create', [MusicController::class, 'create'])->name('admin.createMusic'); // Show the form to create music
    Route::post('/music', [MusicController::class, 'store'])->name('admin.storeMusic'); // Store new music
    Route::get('/music/{id}/edit', [MusicController::class, 'edit'])->name('admin.editMusic'); // Show the edit form
    Route::put('/music/{id}', [MusicController::class, 'update'])->name('admin.updateMusic'); // Update music
    Route::delete('/music/{id}', [MusicController::class, 'destroy'])->name('admin.deleteMusic'); // Delete music

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('videos', [VideoController::class, 'index'])->name('video.index');
    Route::get('videos/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('videos', [VideoController::class, 'store'])->name('video.store');
    Route::get('videos/{video}/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('videos/{video}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('video.destroy');
});

// ROUTES FOR SUBMITTING REVIEWS

// routes/web.php
// Route::post('/music/{music}/review', [MusicController::class, 'storeReview'])->name('music.review');
// Route::post('/videos/{video}/review', [VideoController::class, 'storeReview'])->name('video.review');


// Route for submitting music reviews
Route::post('/music/{id}/review', [MusicController::class, 'storeMusicReview'])->name('music.review');

// Route for submitting video reviews
Route::post('/video/{id}/review', [VideoController::class, 'storeVideoReview'])->name('video.review');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
