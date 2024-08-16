<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::resource('ideas', IdeaController::class)->only(['index', 'show']);

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::view('/app', 'app-v2')->name("app");
Route::view('/about', 'wild.about')->name('about');
Route::view('/privacy', 'wild.privacy')->name('privacy');
Route::view('/terms', 'wild.terms')->name('terms');
Route::view('/advice', 'wild.advice')->name('advice');
Route::view('/duty', 'wild.duty')->name('duty');
Route::view('/contact', 'wild.contact')->name('contact');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// SEO 相关处理
Route::redirect('blogs', route('ideas.index'));
Route::redirect('lessons', route('ideas.index'));
