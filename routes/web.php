<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ApplicationLivewire;
use App\Http\Livewire\Idle;
use App\Http\Controllers\PidController;


Route::get('/', ApplicationLivewire::class);
Route::get('/t', function() {
    return view('test');
});
Route::post('magic', [PidController::class, 'index']);

Route::get('/idle', Idle::class);