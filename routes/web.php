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


Route::group(['middleware' => ['auth', 'isLogin:alumni']], function () {
    Route::get('/dashboard-alumni', [HomeController::class, 'index'])->name('dashboard-alumni');
    Route::get('/create', [HomeController::class, 'create'])->name('home.ceate');
    Route::get('/createTestimoni', [HomeController::class, 'createTestimoni'])->name('home.createTestimoni');
    Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');
    Route::get('/load-questions', [HomeController::class, 'question'])->name('load.questions');
    Route::post('/simpan-jawaban', [HomeController::class, 'simpanJawaban'])->name('simpan.jawaban');
    Route::get('/hq', [HomeController::class, 'quesionarTerisi']);
});
Route::group(['middleware' => ['auth', 'isLogin:admin']], function () {
    Route::get('/dashboard-admin', [HomeController::class, 'admin'])->name('dashboard-admin');
});
Route::get('/detail', function () {
    return view('berita.detail');
});
Route::get('/berita', function () {
    return view('berita.berita');
});
Route::get('/detail-berita', function () {
    return view('berita.detail');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard_admin');
});
Route::get('/admin/kelola_berita', function () {
    return view('admin.kelola_berita');
});
Route::get('/admin/kelola_berita/tambah', function () {
    return view('admin.tambah_berita');
});
Route::get('/admin/kelola_alumni', function () {
    return view('admin.kelola_alumni');
});
Route::get('/admin/forum_diskusi', function () {
    return view('admin.forum_diskusi');
});
Route::get('/admin/forum_diskusi/id', function () {
    return view('admin.detail_diskusi');
});
Route::get('/alumni/dashboard', function () {
    return view('alumni.dashboard_alumni');
});
Route::get('/alumni/tracer_study', function () {
    return view('alumni.tracer_study');
});
Route::get('/alumni/forum_diskusi', function () {
    return view('alumni.forum_diskusi');
});
Route::controller(LoginRegisterController::class)->group(function () {
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
