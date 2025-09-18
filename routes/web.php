<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VragenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vragen', [VragenController::class, 'index'])->name('vragen.index');
Route::get('/vragen/{question}', [VragenController::class, 'show'])->name('vragen.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/vraag-stellen', [QuestionController::class, 'store'])->name('question.store');