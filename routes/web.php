<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\InvestimentController;


Route::get('/', function () {
    return "Inv3 API";
});

Route::prefix('session')->name('session.')->group(function () {
    Route::get('/view', [SessionController::class, 'index'])->name('view');
    Route::post('/new', [SessionController::class, 'create'])->name('create');
    Route::put('/edit/name/{id_session}', [SessionController::class, 'edit_name'])->name('edit_name');
    Route::put('/edit/id/{id_session}', [SessionController::class, 'edit_id'])->name('edit_id');
    Route::delete('/destroy/{id_session}', [SessionController::class, 'destroy'])->name('destroy');
    Route::get('/view/{id}', [SessionController::class, 'show'])->name('show');
});

Route::prefix('investiment')->name('investiment.')->group(function() {
    Route::get('/view', [InvestimentController::class, 'index'])->name('view');
    Route::post('/new', [InvestimentController::class, 'create'])->name('create');
    Route::get('/view/{id}', [InvestimentController::class, 'show'])->name('show');
    Route::put('/edit/{id}', [InvestimentController::class, 'edit'])->name('edit');
});