<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Idle;
use App\Http\Livewire\Interactive;
use App\Http\Controllers\PidController;
use App\Http\Livewire\ApplicationLivewire;

// Route::get('/MAC={mac}',     ApplicationLivewire::class);

    Route::group(['middleware' => ['web']], function () {
    Route::get('/',                 ApplicationLivewire::class);
    Route::get('/app',              ApplicationLivewire::class); //This clone route was made because the javascript ajax function does not redirect to "/" properly.
    Route::get('/idle',             Idle::class);
    Route::get('/interactive-idle', Interactive::class);
    Route::post('pidquery',         [PidController::class, 'index']);
});
