<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index']);
Route::post('/summarize', [NoteController::class, 'summarize'])->name('summarize');
