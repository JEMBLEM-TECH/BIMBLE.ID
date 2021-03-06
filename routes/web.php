<?php

use App\Kursus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth User
// Auth::routes();

// Auth Manager
Route::group(['prefix' => 'manager'], function () {

    // Route Auth
    Route::get('/login', 'AuthManager\LoginController@showLoginForm')->name('manager.login');
    Route::post('/login', 'AuthManager\LoginController@login')->name('manager.login.submit');
    Route::get('/logout', 'AuthManager\LoginController@logoutManager')->name('manager.logout');
    Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
    Route::get('/password/reset', 'AuthManager\ForgotPasswordController@showLinkRequestForm')->name('manager.password.request');
    Route::post('/password/email', 'AuthManager\ForgotPasswordController@sendResetLinkEmail')->name('manager.password.email');
    Route::get('/password/reset/{token}', 'AuthManager\ResetPasswordController@showResetForm')->name('manager.password.reset');
    Route::post('/password/reset', 'AuthManager\ResetPasswordController@reset');
});

// Auth Unit
Route::group(['prefix' => 'unit'], function () {
    Route::get('/login', 'AuthUnit\LoginController@showLoginForm')->name('unit.login');
    Route::post('/login', 'AuthUnit\LoginController@login')->name('unit.login.submit');

    Route::get('/logout', 'AuthUnit\LoginController@logoutUnit')->name('unit.logout');
    Route::get('/password/reset', 'AuthUnit\ForgotPasswordController@showLinkRequestForm')->name('unit.password.request');
    Route::post('/password/email', 'AuthUnit\ForgotPasswordController@sendResetLinkEmail')->name('unit.password.email');
    Route::get('/password/reset/{token}', 'AuthUnit\ResetPasswordController@showResetForm')->name('unit.password.reset');
    Route::post('/password/reset', 'AuthUnit\ResetPasswordController@reset');
});

Route::prefix('unit')
    ->middleware('auth:unit')
    ->group(function () {

        Route::get('/', 'Unit\DashboardController@index')->name('unit.home');
        Route::put('/profile/{id}/update', 'Unit\DashboardController@update_profile')->name('unit.update-profil');
        Route::put('/profile/{id}/update-banner', 'Unit\DashboardController@update_profile_banner')->name('unit.update-profil.banner');
        Route::put('/profile/{slug}/update-lokasi', 'Unit\DashboardController@update_profile_lokasi')->name('unit.update-profil.lokasi');
        Route::put('/profile/{slug}/update-deskripsi', 'Unit\DashboardController@update_profile_deskripsi')->name('unit.update-profil.deskripsi');
        Route::get('/profile', 'Unit\DashboardController@profile')->name('unit.profile');
        Route::put('/pengaturan/{id}/update', 'Unit\DashboardController@update_pengaturan')->name('unit.update-pengaturan');
        Route::get('/pengaturan', 'Unit\DashboardController@pengaturan')->name('unit.pengaturan');

        // Pilih kursus
        Route::get('/kursus', 'Unit\KursusController@index')->name('unit.kursus.home');
        Route::post('/kursus/tambah', 'Unit\KursusController@tambah_kursus')->name('unit.kursus.tambah');
        Route::delete('/kursus/hapus', 'Unit\KursusController@hapus_kursus')->name('unit.kursus.hapus');
        Route::put('/kursus/harga', 'Unit\KursusController@harga_kursus')->name('unit.kursus.harga');

        // Detail Kursus
        Route::get('/kursus/detail/{slug}', 'Unit\KursusController@detail')->name('unit.kursus.detail');
        Route::get('/kursus/create/{slug}', 'Unit\KursusController@tambah_detail')->name('unit.kursus.add');
        Route::put('/kursus/update/{id}', 'Unit\KursusController@detail_store')->name('unit.kursus.update');

        // fasilitas
        Route::get('/fasilitas', 'Unit\FasilitasController@index')->name('unit.fasilitas.home');
        Route::post('/fasilitas/tambah', 'Unit\FasilitasController@tambah_fasilitas')->name('unit.fasilitas.tambah');
        Route::delete('/fasilitas/hapus', 'Unit\FasilitasController@hapus_fasilitas')->name('unit.fasilitas.hapus');

        // mentor
        Route::resource('mentor', 'Unit\MentorController');

        // galeri
        Route::get('/galeri', 'Unit\GaleriController@index')->name('unit.galeri.home');
        Route::post('/galeri/tambah', 'Unit\GaleriController@store')->name('unit.galeri.tambah');
        Route::delete('/galeri/{id}', 'Unit\GaleriController@destroy')->name('unit.galeri.hapus');

        // nilai
        Route::get('/siswa', 'Unit\SiswaController@index')->name('unit.siswa.home');
        Route::get('/siswa/{slug}', 'Unit\SiswaController@kursus_siswa')->name('unit.siswa.kursus');
        Route::get('/siswa/{slug}/create', 'Unit\SiswaController@create_siswa')->name('unit.siswa.create');
        Route::post('/siswa/{slug}/create', 'Unit\SiswaController@store_siswa')->name('unit.siswa.store');
        Route::get('/siswa/{slug}/siswa/{id}', 'Unit\SiswaController@edit')->name('unit.siswa.edit');
        Route::put('/siswa/{slug}/siswa/{id}', 'Unit\SiswaController@update')->name('unit.siswa.update');
        Route::delete('/siswa/{id}', 'Unit\SiswaController@destroy')->name('unit.siswa.delete');
    });

// Route Manager
Route::prefix('manager')
    ->middleware('auth:manager')
    ->group(function () {

        // Route Dashboard
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('pendaftar/{id}/set-status', 'PendUnitController@setStatus')->name('pendaftar.status');
        Route::get('kursus/{id}/gallery', 'KursusController@gallery')->name('kursus.gallery');

        Route::resources([
            'kursus' => 'KursusController',
            'unit'   => 'UnitController',
            'banner' => 'BannerController',
            'pendaftar' => 'PendUnitController',
            'komentar' => 'KomentarController',
            'gallery' => 'GalleryController',
        ]);
    });

// Route Front
Route::get('/', 'Web\FrontController@index')->name('front.index');
Route::get('/pusat_bantuan', 'Web\FrontController@pusat_bantuan')->name('front.pusat');

Route::get('/kursus', 'Web\FrontController@kursus')->name('front.kursus');
route::get('/kursus/search/', 'Web\FrontController@liveSearch')->name('search');

Route::get('/kursus_sort', 'Web\FrontController@kursusSort');
Route::get('/kursus/{slug}/kelompok', 'Web\FrontController@show_kelompok')->name('front.detail.kelompok');
Route::get('/kursus/{slug}/private', 'Web\FrontController@show_private')->name('front.detail.private');
Route::get('/unit/{slug}', 'Web\UnitController@show')->name('unit.detail');
Route::get('/unit/{slug}/kursus/{slug_kursus}', 'Web\UnitController@show_kursus')->name('unit.detail.kursus');
Route::post('komentar/{id}/post', 'Web\KomentarController@post')->name('komentar.post');
Route::get('/daftar-unit', 'Web\UnitController@list')->name('unit.list');
Route::get('/daftar/unit', 'Web\UnitController@index')->name('unit.daftar');
Route::post('/unit/add', 'Web\UnitController@post')->name('unit.add');
