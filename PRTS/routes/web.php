<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;

// UPDATED: Redirect ke ID Muelsyse Vanguard yang benar
Route::get('/', function () {
    return redirect('/operator/char_4082_muels2');
});

// Route ini tetap sama
Route::get('/operator/{charId}', [OperatorController::class, 'show'])->name('operator.show');
