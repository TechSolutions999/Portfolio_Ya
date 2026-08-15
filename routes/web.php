<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/work/{slug}', [ProjectController::class, 'show'])->name('project.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
