<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

// Single page route
Route::get('/', [QuestionController::class, 'index'])->name('home');
Route::post('/vraag-stellen', [QuestionController::class, 'store'])->name('question.store');

// Sitemap route
Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'));
})->name('sitemap');