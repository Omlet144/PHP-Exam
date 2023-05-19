<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('nasa/home');
});
Route::get('/earth', function () {
    return view('nasa/earth');
});
Route::get('/moon', function () {
    return view('nasa/moon');
});
Route::get('/mars', function () {
    return view('nasa/mars');
});
