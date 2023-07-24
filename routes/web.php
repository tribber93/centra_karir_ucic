<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/create', [HomeController::class, 'create'])->name('home.ceate');
Route::get('/createTestimoni', [HomeController::class, 'createTestimoni'])->name('home.createTestimoni');
Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');
Route::get('/load-questions', [HomeController::class, 'question'])->name('load.questions');
Route::get('/login', function () {
    return view('login');
});





