<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdmKabarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KabarController;

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

//Front End

Route::controller(BerandaController::class)->group(function(){
    Route::get('/','index');
    Route::get('/legalitas','legalitas');
    Route::get('/visi-misi','visiMisi');
    Route::get('/struktur-organisasi','strukturOrganisasi');
    Route::get('/organisasi','organisasi');
    Route::get('/sejarah-organisasi','sejarahOrganisasi');
    Route::get('/zakat','zakat');
    Route::get('/inspirasi','inspirasi'); 
    Route::get('/article','article'); 
    Route::get('/pendistribusian','pendistribusian'); 
    Route::get('/video-kegiatan','videoKegiatan'); 
    Route::get('/hubungi-kami','hubungiKami'); 
    Route::get('/404','notFound'); 
    Route::get('/rekening-zakat','rekeningZakat'); 
    Route::get('/rekening-infak','rekeningInfak'); 
    Route::get('/rekening-fidyah','rekeningFidyah'); 
    Route::get('/rekening-sedekah','rekeningSedekah'); 
    Route::get('/layanan-pembayaran','layananPembayaran'); 
});
// Route::get('/berita', function () {
//     return view('kabar.berita');
// });

// Route::get('/galeri', function () {
//     return view('galeri');
// });
Route::get('kabar-zakat', [KabarController::class, 'KabarZakat']);
Route::get('artikel', [KabarController::class, 'Artikel']);
Route::get('inspirasi', [KabarController::class, 'Inspirasi']);

// Backend
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'storeLogin']);
Route::middleware('auth')->group(function () {
    Route::middleware('is.admin')->group(function () {
        Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/', [HomeController::class, 'index']);
            Route::get('berita', [AdmKabarController::class, 'indexBerita'])->name('index.berita');
            Route::get('berita/add', [AdmKabarController::class, 'createBerita'])->name('add.berita');
            Route::post('berita/store', [AdmKabarController::class, 'storeBerita'])->name('store.berita');
            Route::get('berita/edit/{beritaID}', [AdmKabarController::class, 'editBerita']);
            Route::post('berita/update/{beritaID}', [AdmKabarController::class, 'updateBerita']);
            Route::get('berita/delete/{beritaID}', [AdmKabarController::class, 'destroyBerita']);
            Route::get('berita/status/{beritaID}', [AdmKabarController::class, 'statusBerita']);

            Route::get('artikel', [AdmKabarController::class, 'indexArtikel'])->name('index.artikel');
            Route::get('artikel/add', [AdmKabarController::class, 'createArtikel'])->name('add.artikel');
            Route::post('artikel/store', [AdmKabarController::class, 'storeArtikel'])->name('store.artikel');
            Route::get('artikel/edit/{artikelID}', [AdmKabarController::class, 'editArtikel']);
            Route::post('artikel/update/{artikelID}', [AdmKabarController::class, 'updateArtikel']);
            Route::get('artikel/delete/{artikelID}', [AdmKabarController::class, 'destroyArtikel']);
            Route::get('artikel/status/{artikelID}', [AdmKabarController::class, 'statusArtikel']);

            Route::get('inspirasi', [AdmKabarController::class, 'indexInspirasi'])->name('index.inspirasi');
            Route::get('inspirasi/add', [AdmKabarController::class, 'createInspirasi'])->name('add.inspirasi');
            Route::post('inspirasi/store', [AdmKabarController::class, 'storeInspirasi'])->name('store.inspirasi');
            Route::get('inspirasi/edit/{inspirasiID}', [AdmKabarController::class, 'editInspirasi']);
            Route::post('inspirasi/update/{inspirasiID}', [AdmKabarController::class, 'updateInspirasi']);
            Route::get('inspirasi/delete/{inspirasiID}', [AdmKabarController::class, 'destroyInspirasi']);
            Route::get('inspirasi/status/{inspirasiID}', [AdmKabarController::class, 'statusInspirasi']);

            Route::get('kabarzakat', [AdmKabarController::class, 'indexKabarZakat'])->name('index.kabarzakat');
            Route::get('kabarzakat/add', [AdmKabarController::class, 'createKabarZakat'])->name('add.kabarzakat');
            Route::post('kabarzakat/store', [AdmKabarController::class, 'storeKabarZakat'])->name('store.kabarzakat');
            Route::get('kabarzakat/edit/{kabarzakatID}', [AdmKabarController::class, 'editKabarZakat']);
            Route::post('kabarzakat/update/{kabarzakatID}', [AdmKabarController::class, 'updateKabarZakat']);
            Route::get('kabarzakat/delete/{kabarzakatID}', [AdmKabarController::class, 'destroyKabarZakat']);
            Route::get('kabarzakat/status/{kabarzakatID}', [AdmKabarController::class, 'statusKabarZakat']);

            Route::get('galeri', [AdmKabarController::class, 'indexGaleri'])->name('index.galeri');
            Route::get('galeri/add', [AdmKabarController::class, 'createGaleri'])->name('add.galeri');
            Route::post('galeri/store', [AdmKabarController::class, 'storeGaleri'])->name('store.galeri');
            Route::get('galeri/edit/{galeriID}', [AdmKabarController::class, 'editGaleri']);
            Route::post('galeri/update/{galeriID}', [AdmKabarController::class, 'updateGaleri']);
            Route::get('galeri/delete/{galeriID}', [AdmKabarController::class, 'destroyGaleri']);
        });
    });
});
