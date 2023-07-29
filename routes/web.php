<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::group(['middleware' => ['auth', 'isLogin:alumni']], function(){
    Route::get('/dashboard-alumni', [HomeController::class, 'index'])->name('dashboard-alumni');
    Route::get('/create', [HomeController::class, 'create'])->name('home.ceate');
    Route::get('/createTestimoni', [HomeController::class, 'createTestimoni'])->name('home.createTestimoni');
    Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');
    Route::get('/load-questions', [HomeController::class, 'question'])->name('load.questions');
    Route::post('/simpan-jawaban', [HomeController::class, 'simpanJawaban'])->name('simpan.jawaban');
    Route::get('/hq', [HomeController::class, 'quesionarTerisi']);

});
Route::group(['middleware' => ['auth', 'isLogin:admin']], function(){
    Route::get('/dashboard-admin', [HomeController::class, 'admin'])->name('dashboard-admin');


});
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
// Route::auth();

// Route::get('/login', function () {
//     return view('login')->name('login');
// });

Route::get('/input_user', function () {
    User::create([
        'name' => 'Admin Cent',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('adminadmin')
    ]);
});





