<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('projets', [ProjectController::class, 'index'])->name('projects');
Route::get('projets/{project}', [ProjectController::class, 'show'])->name('project.show');
