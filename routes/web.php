<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticelController;
use App\Http\Controllers\BacaanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KebaktianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendetaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WartaController;
use App\Http\Controllers\YoutubeController;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.layouts.master');
// });

Auth::routes();
Route::get('/',[BlogController::class,'index'])->name('blog.index');
Route::get('/about',[BlogController::class,'about'])->name('blog.about');
Route::get('/bacaan',[BlogController::class,'bacaan'])->name('blog.bacaan');
Route::get('/warta',[BlogController::class,'warta'])->name('blog.warta');
Route::get('/warta/detail/{id}',[BlogController::class,'wartadetail'])->name('blog.wartadetail');
Route::get('/articel',[BlogController::class,'articel'])->name('blog.articel');
Route::get('/aricel/detail/{id}',[BlogController::class,'detailArticel'])->name('blog.detailArticel');
Route::get('/kegiatan',[BlogController::class,'acara'])->name('blog.kegiatan');
Route::get('/kegiatan/detail/{id}',[BlogController::class,'detailAcara'])->name('blog.detailKegiatan');
Route::post('/kegiatan/daftar/simpan',[PendaftaranController::class,'daftar_store'])->name('pendaftaran.kegiatanstore');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/acara/daftar/{id}',[PendaftaranController::class,'daftar_acara'])->name('pendaftaran.acara');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('admin/banner',BannerController::class)->except('show');
    Route::get('admin/banner/read',[BannerController::class,'read'])->name('banner.read');
    Route::resource('admin/kebaktian',KebaktianController::class)->except('show');
    Route::get('admin/kebaktian/{id}/{type}/show',[KebaktianController::class,'show'])->name('kebaktian.show');
    Route::get('admin/kebaktian/read',[KebaktianController::class,'read'])->name('kebaktian.read');
    Route::get('admin/kebaktian/{id}/{type}',[KebaktianController::class,'detail'])->name('kebaktian.detail');
    Route::put('admin/kebaktian/detail/simpan/{id}',[KebaktianController::class,'detailstore'])->name('kebaktian.detail.store');
    Route::get('admin/kebaktian/pdf/{id}/{type}',[KebaktianController::class,'pdf'])->name('kebaktian.pdf');
    Route::resource('admin/about',AboutController::class)->except('show');
    Route::get('admin/about/read',[AboutController::class,'read'])->name('about.read');
    Route::resource('admin/gallery',GalleryController::class)->except('show');
    Route::get('admin/gallery/read',[GalleryController::class,'read'])->name('gallery.read');
    Route::resource('admin/articel',ArticelController::class)->except('show');
    Route::get('admin/articel/read',[ArticelController::class,'read'])->name('articel.read');
    Route::resource('admin/warta',WartaController::class)->except('show');
    Route::get('admin/warta/read',[WartaController::class,'read'])->name('warta.read');
    Route::resource('admin/youtube',YoutubeController::class)->except('show');
    Route::get('admin/youtube/read',[YoutubeController::class,'read'])->name('youtube.read');
    Route::resource('admin/user',UserController::class)->except('show');
    Route::get('admin/user/read',[UserController::class,'read'])->name('user.read');
    Route::resource('admin/pendeta',PendetaController::class)->except('show');
    Route::get('admin/pendeta/read',[PendetaController::class,'read'])->name('pendeta.read');
    Route::resource('admin/kegiatan',PendaftaranController::class)->except('show');
    Route::get('admin/kegiatan/read',[PendaftaranController::class,'read'])->name('kegiatan.read');
    Route::post('admin/kegiatan/update/status',[PendaftaranController::class,'mass_status'])->name('kegiatan.status');

    Route::resource('admin/bacaan',BacaanController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan/cetak', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/acara', [LaporanController::class, 'acara'])->name('laporan.acara');
    Route::post('/laporan/acara/cetak', [LaporanController::class, 'acarastore'])->name('laporan.acarastore');

    Route::resource('/admin/pengeluaran',PengeluaranController::class)->except('show');
    Route::get('/admin/pengeluaran/read',[PengeluaranController::class,'read'])->name('pengeluaran.read');

    Route::get('admin/kegiatan/details/{id}',[PendaftaranController::class,'detail'])->name('kegiatan.details');

    Route::get('user/dashboard',[BlogController::class,'kegiatan'])->name('blog.user.kegiatan');
});