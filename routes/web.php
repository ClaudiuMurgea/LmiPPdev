<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ApplicationLivewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ApplicationLivewire::class);
Route::get('/test', function() {
    return view('test');
});
// Route::get('/local', function() {
//     App::setLocale('en');
//     if(App::isLocale('en')) {
//         dd(App::getLocale());
//     }
// });

