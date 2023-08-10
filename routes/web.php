<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DiskusiController;
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
    Route::get('/alumni/getPertanyaanFromServer', [AlumniController::class, 'getPertanyaanById']);
    Route::post('/alumni/simpan_tracer', [AlumniController::class, 'simpan_tracer'])->name('simpan-tracer');
    Route::get('alumni/profil', [AlumniController::class, 'profil'])->name('profil-alumni');
    Route::post('alumni/profil', [AlumniController::class, 'updateProfil']);
    // Route::get('/komentar/forum_diskusi/{id}', [DiskusiController::class, 'komentar']);
    Route::get('/alumni/forum_diskusi', [DiskusiController::class, 'index']);
    // Route::get('/get-diskusi-data', [DiskusiController::class, 'getDiskusi']);

    Route::post('/alumni/simpan', [AlumniController::class, 'simpan'])->name('simpan');
});

// Route::post('/alumni/simpan_opsi', [AlumniController::class, 'simpan_opsi'])->name('simpan-opsi');

// Route::group(['middleware' => ['auth', 'isLogin:alumni']], function () {
// });
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
    Route::get('/export/tracer', [AdminController::class, 'export']);
    Route::get('/export/tracer_histori', [AdminController::class, 'exportTracerHistori']);
    Route::get('/admin/backup', [AdminController::class, 'backup']);
    Route::get('/admin/getCountData', [AdminController::class, 'getCount']);
    Route::get('/admin/forum_diskusi', [DiskusiController::class, 'index']);
    // Route::post('/posting-diskusi', [DiskusiController::class, 'postDiskusi']);
    // // Route::get('/get-diskusi-data', [DiskusiController::class, 'getDiskusi']);

    // Route::get('/komentar/forum_diskusi/{id}', [DiskusiController::class, 'komentar']);
    // Route::post('/posting-komentar-byID/{id}', [DiskusiController::class, 'postKomentarById']);



    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-index');
    Route::get('/admin/kelola_tracer', [AdminController::class, 'kelolaTracer'])->name('admin-kelola_tracer');
    Route::get('/admin/backup-data', [AdminController::class, 'backupData']);

    // simpan tracer data pertanyaan
    Route::post('/admin/kelola_tracer', [AdminController::class, 'simpanTracer']);
    Route::post('/admin/update_question_status', [AdminController::class, 'updateQuestionStatus']);

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

    Route::get('/admin/allTracer', [AdminController::class, 'showTracer']);
    Route::post('/admin/update_question', [AdminController::class, 'updateQuestion'])->name('admin-update-q');
    Route::get('/admin/hasil_tracer', [AdminController::class, 'showTracer']);
    Route::get('/admin/delete_question/{id}', [AdminController::class, 'deleteTracerQuestion']);
    Route::get('/admin/testimoni_alumni', [AdminController::class, 'testimoni']);
    Route::get('/admin/get-testimonial-detail/{id}', [AdminController::class, 'getDetailAlumni']);
    Route::post('/admin/update-testimonial-status/{id}', [DiskusiController::class, 'updateStatusTestimoni']);

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
Route::post('/posting-diskusi', [DiskusiController::class, 'postDiskusi']);
Route::get('/komentar/forum_diskusi/{id}', [DiskusiController::class, 'komentar']);
Route::post('/posting-komentar-byID/{id}', [DiskusiController::class, 'postKomentarById']);
Route::post('/update-komentar/{id}', [DiskusiController::class, 'editKomentar']);
Route::get('/delete-komentar/{id}', [DiskusiController::class, 'deleteKomentar']);

Route::get('/get-discussion/{id}', [DiskusiController::class, 'getDiscussion']);
Route::post('/edit-discussion/{id}', [DiskusiController::class, 'editDiscussion']);
Route::get('/delete-discussion/{id}', [DiskusiController::class, 'deleteDiscussion']);
