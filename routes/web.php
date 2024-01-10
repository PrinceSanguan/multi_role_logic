<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticated;

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

Route::get('/login', [Authenticated::class, 'login'])->name('login');  // Naming the login route
Route::post('/login', [Authenticated::class, 'loginPost']);

Route::get('/registration', [Authenticated::class, 'registration'])->name('registration');
Route::post('/registration', [Authenticated::class, 'registrationPost']);

Route::get('/user', [Authenticated::class, 'user'])->name('user');

Route::get('/404/forbidden', [Authenticated::class, 'forbidden'])->name('forbidden');

Route::post('/logout', [Authenticated::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [Authenticated::class, 'admin'])->name('admin');
    Route::get('/user', [Authenticated::class, 'user'])->name('user');
    Route::get('/programmer', [Authenticated::class, 'programmer'])->name('programmer');
});


