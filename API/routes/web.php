<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\LetterController;
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======


Route::get('/letters/{id}/pdf', [LetterController::class, 'generatePdf']);
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
