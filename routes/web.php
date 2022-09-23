<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Idle;
use App\Http\Livewire\Interactive;
use App\Http\Controllers\PidController;
use App\Http\Livewire\ApplicationLivewire;

Route::get('/', ApplicationLivewire::class);
Route::get('/t', function() {
    return view('test');
});
Route::post('magic', [PidController::class, 'index']);

Route::get('/idle', Idle::class);
Route::get('/interactive-idle', Interactive::class);
Route::get('/cashouts', function() {
    return view('pages/interactive/cashout');
});
Route::get('/jackpots', function() {
    return 'jackpots';
});