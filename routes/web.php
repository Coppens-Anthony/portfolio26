<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('projets', [ProjectController::class, 'index'])->name('projects');
Route::get('projets/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::view('/login', 'pages.admin.login')->name('login')->middleware('guest');


Route::prefix('admin')->group(function () {

    Route::view('/', 'pages.admin.login')
        ->name('login')->middleware('guest');

    Route::livewire('/dashboard', 'pages::admin.⚡dashboard')
        ->name('dashboard')->middleware('auth');

    Route::livewire('/competencies', 'pages::admin.competencies.⚡index')
        ->name('competencies.index')->middleware('auth');


    Route::livewire('/scholar', 'pages::admin.scholar.⚡index')
        ->name('scholar.index')->middleware('auth');


    Route::livewire('/projects', 'pages::admin.projects.⚡index')
        ->name('projects.index')->middleware('auth');
    Route::livewire('/projects/create', 'pages::admin.projects.⚡create_edit')
        ->name('projects.create')->middleware('auth');
    Route::livewire('/projects/edit/{model_id}', 'pages::admin.projects.⚡create_edit')
        ->name('project.edit')->middleware('auth');
    Route::livewire('/projects/{project}', 'pages::admin.projects.⚡show')
        ->name('admin.project.show')->middleware('auth');
});
