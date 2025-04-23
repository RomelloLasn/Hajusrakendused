<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Marker;
use Illuminate\Http\Request;

Route::delete('/markers/{id}', function ($id) {
    $marker = Marker::findOrFail($id);
    $marker->delete();
    return response()->json(['success' => true, 'message' => 'Marker deleted successfully']);
});

Route::delete('/markers/{id}', function ($id) {
    $marker = Marker::findOrFail($id);
    $marker->delete();
    return response()->json(['success' => true]);
});

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('blog', BlogPostController::class);
    Route::post('blog/{blogPost}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/markers', function () {
    return response()->json(Marker::all());
});

Route::post('/markers', function (Request $request) {
    $marker = Marker::create($request->only(['latitude', 'longitude', 'description']));
    return response()->json($marker);
});

Route::get('/', function () {
    return view('weather'); 
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';