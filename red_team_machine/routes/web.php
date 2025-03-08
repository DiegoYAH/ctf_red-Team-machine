<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
})->name('index');


//Ruta login
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/avengers-server', [AuthController::class, 'login'])->name('custom-login');


Route::group(['middleware' => 'auth'], function () {

    //Ruta 'home'
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    //ruta 'logout'
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

});