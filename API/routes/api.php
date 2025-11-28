<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LetterFormatController;
use App\Http\Controllers\Api\LetterController;

<<<<<<< HEAD
Route::apiResource('letter-formats', LetterFormatController::class);
Route::apiResource('letters', LetterController::class);
=======
// Ambil list template
Route::get('/letter-formats', [LetterFormatController::class, 'index']);

// Create surat dari Flutter
Route::post('/letters', [LetterController::class, 'store']);
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
