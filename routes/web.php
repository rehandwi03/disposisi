<?php

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

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        Route::resource('/unit', 'UnitController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        // Route::get('/user/roleuser', 'UserController@createuserrole')->name('roleuser');

        Route::resource('/user', 'UserController');
    });
    Route::get('/account/show', 'ProfileController@index')->name('account.index');
    Route::get('/account/setting', 'ProfileController@setting')->name('account.setting');
    Route::post('/account/setting', 'ProfileController@update')->name('account.update');
    // Route::get('/account/sesdestroy', 'ProfileController@destroysession')->name('account.sesdestroy');
    Route::post('/surat_keluar/lampiran', 'SuratKeluarController@lampiran')->name('surat_keluar.lampiran');
    Route::put('/surat_keluar/selesai/{id}', 'SuratKeluarController@selesai')->name('surat_keluar.selesai');
    Route::get('/surat_keluar/reply/{id}', 'SuratKeluarController@reply')->name('surat_keluar.reply');
    Route::post('/surat_keluar/reply', 'SuratKeluarController@store_reply')->name('surat_keluar.reply.store');
    Route::get('/surat_keluar/print/{id}', 'SuratKeluarController@cetakPdf')->name('surat_keluar.cetak');
    Route::resource('/surat_keluar', 'SuratKeluarController');
    Route::resource('/surat_masuk', 'SuratMasukController');
    Route::get('/surat_masuk/reply/{id}', 'SuratMasukController@reply')->name('surat_masuk.reply');
    Route::post('/surat/masuk/reply', 'SuratMasukController@store_reply')->name('surat_masuk.reply.store');
    Route::group(['middleware' => ['role:Sekertariat']], function () {
        Route::get('/validasi_surat', 'ValidasiController@index')->name('validasi_surat.index');
        // Route::get('/validasi_surat/verif/{id}', 'ValidasiController@verif_disposisi')->name('validasi.verif');
        // Route::post('/validasi_surat/verif', 'ValidasiController@verif_change_disposisi')->name('validasi.store');
        Route::get('/validasi_surat/verif_surat/{id}', 'ValidasiController@verif_surat')->name('verif_surat.index');
        Route::post('/validasi_surat/verif_surat', 'ValidasiController@update_surat')->name('verif_surat.store');
        Route::resource('/klasifikasi_dokumen', 'KlasifikasiDokumenController')->except([
            'create', 'show',
        ]);
        Route::resource('/buku_agenda', 'BukuAgendaController')->except([
            'show', 'edit', 'update'
        ]);
        Route::resource('/lokasi_kartu', 'LokasiKartuController');
        Route::resource('/jenis_surat', 'JenisSuratController')->except([
            'create', 'show', 'edit', 'update'
        ]);
    });
});
