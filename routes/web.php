<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

// Existing GET route for the contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// New POST route for handling form submissions
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'message' => 'required|string',
    ]);

    Mail::to('romellolasn2@gmail.com')->send(new ContactFormMail($data));

    return back()->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/services', function () {
    return view('services');
})->name('services');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
