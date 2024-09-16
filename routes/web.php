<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


Route::get('/', function () {
    return "Inv3 API";
});

Route::prefix('session')->name('session.')->group(function () {
    Route::get('/view', [SessionController::class, 'index'])->name('view');
    Route::post('/new', [SessionController::class, 'create'])->name('create');
    Route::put('/edit/{id_session}', [SessionController::class, 'edit'])->name('edit');
    Route::delete('/destroy/{id_session}', [SessionController::class, 'destroy'])->name('destroy');
    Route::get('/view/{id}', [SessionController::class, 'show'])->name('show');
});