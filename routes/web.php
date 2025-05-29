<?php


use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Markers and Map
Route::get('/markers', [MarkerController::class, 'index']);
Route::post('/markers', [MarkerController::class, 'store']);
Route::put('/markers/{id}', [MarkerController::class, 'update']);
Route::delete('/markers/{id}', [MarkerController::class, 'destroy']);

Route::get('/map', function () {
    return view('map');
});

// REMOVE or COMMENT OUT this line to disable Inertia/React auth routes
// require __DIR__.'/auth.php';

// Authentication Routes (Blade)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Blog and Comments
Route::middleware(['auth'])->group(function () {
    Route::resource('blog', BlogPostController::class);
    Route::post('blog/{blogPost}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Dashboard and Profile
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Default Homepage: redirect to blog index
Route::get('/', function () {
    return redirect()->route('blog.index');
});