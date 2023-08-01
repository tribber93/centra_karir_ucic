<?php

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
    return view('homepage.home');
});
Route::get('/login', function () {
    return view('login');
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
