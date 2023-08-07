<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\InformasiController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/alumni/dashboard', [AlumniController::class, 'dashboard'])->name('dashboard-alumni');
    Route::get('/alumni/tracer_study', [AlumniController::class, 'tracer_study'])->name('tracer-study');
    Route::get('/alumni/forum_diskusi', [AlumniController::class, 'forum'])->name('forum-diskusi');
    Route::get('/alumni/getPertanyaanFromServer', [AlumniController::class, 'getPertanyaanById']);
    // Route::get('/create', [HomeController::class, 'create'])->name('home.ceate');
    // Route::get('/createTestimoni', [HomeController::class, 'createTestimoni'])->name('home.createTestimoni');
    // Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');
    // Route::get('/load-questions', [HomeController::class, 'question'])->name('load.questions');
    // Route::post('/simpan-jawaban', [HomeController::class, 'simpanJawaban'])->name('simpan.jawaban');
    // Route::get('/hq', [HomeController::class, 'quesionarTerisi']);
    // simpan data tracer bro
    Route::post('/alumni/simpan_tracer', [AlumniController::class, 'simpan_tracer'])->name('simpan-tracer');

    Route::get('/alumni/forum_diskusi/id', function () {
        return view('diskusi.detail_diskusi');
    });
    Route::post('/alumni/simpan', [AlumniController::class, 'simpan'])->name('simpan');
});
// Route::post('/alumni/simpan_opsi', [AlumniController::class, 'simpan_opsi'])->name('simpan-opsi');

Route::group(['middleware' => ['auth', 'isLogin:alumni']], function () {
});
Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');
Route::get('/getPertanyaan', [AlumniController::class, 'getPertanyaan'])->name('tracer-pertanyaan');

Route::group(['middleware' => ['auth', 'isLogin:admin']], function () {
    // Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('dashboard-admin');
    Route::get('/admin/kelola_informasi', [InformasiController::class, 'index']);
    Route::get('/admin/kelola_informasi/edit/{id}', [InformasiController::class, 'edit']);
    Route::post('/admin/kelola_informasi/edit/{id}', [InformasiController::class, 'update']);
    Route::get('/admin/kelola_informasi/delete/{id}', [InformasiController::class, 'destroy']);
    Route::post('/admin/kelola_informasi/tambah', [InformasiController::class, 'store']);
    Route::get('/admin/kelola_informasi/tambah', function () {
        return view('admin.tambah_informasi');
    });


    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-index');
    Route::get('/admin/kelola_tracer', [AdminController::class, 'kelolaTracer'])->name('admin-kelola_tracer');
    // simpan tracer data pertanyaan
    Route::post('/admin/kelola_tracer', [AdminController::class, 'simpanTracer']);

    Route::get('/admin/kelola_berita', [AdminController::class, 'kelolaBerita'])->name('admin-kelola-berita');
    Route::get('/admin/get_question_by_id', [AdminController::class, 'getQuestionById']);
    Route::get('/admin/kelola_berita/tambah', function () {
        return view('admin.tambah_berita');
    });
    Route::get('/admin/kelola_alumni', [AdminController::class, 'kelolaAlumni']);
    Route::get('/admin/kelola_alumni/tambah', function () {
        return view('admin.tambah_alumni');
    });
    Route::post('/admin/kelola_alumni/tambah', [AdminController::class, 'tambahAlumni']);
    Route::get('/admin/kelola_alumni/edit/{id}', [AdminController::class, 'editAlumni']);
    Route::post('/admin/kelola_alumni/edit/{id}', [AdminController::class, 'updateAlumni']);
    Route::get('/admin/kelola_alumni/delete/{id}', [AdminController::class, 'deleteAlumni']);
    Route::get('/admin/forum_diskusi', function () {
        return view('admin.forum_diskusi');
    });
    Route::get('/admin/allTracer', [AdminController::class, 'showTracer']);
    Route::post('/admin/update_question', [AdminController::class, 'updateQuestion'])->name('admin-update-q');
    Route::get('/admin/hasil_tracer', [AdminController::class, 'showTracer']);
    Route::get('/admin/delete_question/{id}', [AdminController::class, 'deleteTracerQuestion']);



    Route::get('/admin/forum_diskusi/id', function () {
        return view('diskusi.detail_diskusi');
    });
});
Route::get('/admin/forum_diskusi/id', function () {
    return view('diskusi.detail_diskusi');
});
Route::get('/detail-informasi/{id}', [HomeController::class, 'show']);
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
// Route::auth();

Route::get('/informasi', [HomeController::class, 'portal'])->name('semua_informasi');

Route::get('/input_user', function () {
    User::create([
        'name' => 'Admin Cent',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('adminadmin')
    ]);
});
