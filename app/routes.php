<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'defaultview\DashboardController@index');
Route::get('updatenotification', 'defaultview\DashboardController@notification');

//Route::get('register', 'LoginController@register');

Route::get('register/{value}', 'LoginController@register');
Route::get('cetak-haji/{value}/{id}', 'LoginController@cetakHaji');
Route::get('cetak-umroh/{value}/{id}', 'LoginController@cetakUmroh');
Route::get('login-page', 'LoginController@loginPage');

Route::post('do-register', 'LoginController@do_register');
Route::post('do-register-haji', 'LoginController@doRegisterHaji');
Route::post('do-register-umroh', 'LoginController@doRegisterUmroh');


Route::get('my-profile', 'LoginController@myProfile');
Route::post('update-profile', 'LoginController@updateProfile');
Route::post('update-password', 'LoginController@updatePassword');

Route::get('genericmaster/{value}', 'defaultview\DashboardController@getGeneric');

Route::get('informasi/{id}', 'defaultview\InformasiController@show');

Route::get('login', function(){
    if (Session::has('user')) {
        Auth::login(Session::get('user'));
        return Redirect::to('/');
    }else{
        return Redirect::to('/');
    }
});

Route::post('do', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::filter('hakStaff', function(){
    if ((Auth::user()->idusertype != '1')){
        return Redirect::to('/');
    }
});
Route::filter('hakJamaah', function(){
    if ((Auth::user()->idusertype != '2')){
        return Redirect::to('/');
    }
});
Route::filter('hakKetua', function(){
    if ((Auth::user()->idusertype != '3')){
        return Redirect::to('/');
    }
});
Route::filter('hakFrontOffice', function(){
    if ((Auth::user()->idusertype != '4')){
        return Redirect::to('/');
    }
});
Route::filter('hakKepalaSekretariat', function(){
    if ((Auth::user()->idusertype != '5')){
        return Redirect::to('/');
    }
});
Route::filter('hakKeuangan', function(){
    if ((Auth::user()->idusertype != '6')){
        return Redirect::to('/');
    }
});

Route::group(['prefix' => 'staff', 'before' => 'auth|hakStaff'], function() {

    Route::resource('/', 'Staff\DashboardController');
    
    Route::resource('jamaah', 'Staff\JamaahController');
    Route::get('jamaah/delete/{id}', 'Staff\JamaahController@destroy');
    Route::get('jamaah/cetak/{id}', 'Staff\JamaahController@cetak');

    Route::resource('haji', 'Staff\LayananHajiController');
    Route::get('haji/delete/{id}', 'Staff\LayananHajiController@destroy');
    Route::resource('umroh', 'Staff\LayananUmrohController');
    Route::get('umroh/delete/{id}', 'Staff\LayananUmrohController@destroy');

    Route::resource('pembayaran', 'Staff\PembayaranController');
    Route::get('pembayaran/cetak/{id}', 'Staff\PembayaranController@cetak');
    Route::get('pembayaran/delete/{id}', 'Staff\PembayaranController@destroy');
    
    Route::resource('keuangan', 'Staff\PengeluaranController');
    Route::get('keuangan/delete/{id}', 'Staff\PengeluaranController@destroy');

    Route::resource('cek-kesehatan', 'Staff\CekKesehatanController');
    Route::get('cek-kesehatan/delete/{id}', 'Staff\CekKesehatanController@destroy');
    Route::get('cek-kesehatan/{id}/addjamaah', 'Staff\CekKesehatanController@listJamaah');
    Route::post('cek-kesehatan-jamaah', 'Staff\CekKesehatanController@addJamaah');
    Route::get('cek-kesehatan-jamaah/delete/{id}', 'Staff\CekKesehatanController@hapusJamaah');

    Route::resource('bimbingan', 'Staff\BimbinganController');
    Route::get('bimbingan/delete/{id}', 'Staff\BimbinganController@destroy');
    Route::post('bimbingan-jamaah', 'Staff\BimbinganController@addJamaah');
    Route::get('bimbingan-jamaah/delete/{id}', 'Staff\BimbinganController@hapusJamaah');
    Route::get('peserta-jamaah/delete/{id}', 'Staff\BimbinganController@hapusPeserta');
    Route::post('adddetailbimbingan-jamaah', 'Staff\BimbinganController@addDetailBimbinganJamaah');

    Route::resource('passport', 'Staff\PassportController');
    Route::get('passport/delete/{id}', 'Staff\PassportController@destroy');
    Route::get('passport/{id}/addjamaah', 'Staff\PassportController@listJamaah');
    Route::post('passport-jamaah', 'Staff\PassportController@addJamaah');
    Route::get('passport-jamaah/delete/{id}', 'Staff\PassportController@hapusJamaah');

    Route::resource('chat', 'Staff\ChatController');

    // ------------ INFORMASI PAGES ------------ //

    // Profil
    Route::resource('informasi', 'Staff\InformasiController');

});

Route::group(['prefix' => 'jamaah', 'before' => 'auth|hakJamaah'], function() {

    Route::resource('/', 'Jamaah\DashboardController');

    Route::get('informasi/{id}', 'Jamaah\InformasiController@show');

    Route::resource('my-profile', 'Jamaah\ProfileController');
    Route::resource('konfirmasi', 'Jamaah\KonfirmasiController');
    Route::post('konfirmasi-cicilan', 'Jamaah\KonfirmasiController@store');

    Route::resource('passport', 'Jamaah\PassportController');
    Route::get('passport/cetak/{id}', 'Jamaah\PassportController@cetakSurat');
    
    Route::resource('haji', 'Jamaah\HajiController');
    Route::resource('umroh', 'Jamaah\UmrohController');
    Route::resource('pesan', 'Jamaah\PesanController');
    Route::resource('bimbingan', 'Jamaah\BimbinganController');
    Route::resource('cekkesehatan', 'Jamaah\CekKesehatanController');
    Route::get('cekkesehatan/cetak/{id}', 'Jamaah\CekKesehatanController@cetakSurat');

    Route::resource('chat', 'Jamaah\ChatController');

});

Route::group(['prefix' => 'ketua', 'before' => 'auth|hakKetua'], function() {

    Route::get('/', 'Ketua\DashboardController@index');

    Route::resource('user', 'Ketua\UserController');
    Route::get('user/delete/{id}', 'Ketua\UserController@destroy');

    Route::get('jamaah/{id}', 'Ketua\JamaahController@show');
    Route::get('validasi-jamaah', 'Ketua\JamaahController@valid');
    Route::get('validasi-jamaah/{valid}/{id}', 'Ketua\JamaahController@validasi');

    Route::get('laporan/{value}', 'ketua\LaporanController@show');
    Route::get('laporan/{value}/{tahun}', 'ketua\LaporanController@showYear');

    Route::get('laporan/print/{value}/{id}', 'ketua\LaporanController@cetakDetail');
    Route::get('laporan/all/print/all/{value}', 'ketua\LaporanController@cetakAll');

    Route::resource('chat', 'Ketua\ChatController');
    Route::resource('keuangan', 'Ketua\KeuanganController');

});

Route::group(['prefix' => 'front-office', 'before' => 'auth|hakFrontOffice'], function() {

    Route::get('/', 'FrontOffice\DashboardController@index');
    Route::resource('chat', 'FrontOffice\ChatController');

});

Route::group(['prefix' => 'kepala-sekretariat', 'before' => 'auth|hakKepalaSekretariat'], function() {

    Route::get('/', 'KepalaSekretariat\DashboardController@index');
    Route::resource('chat', 'KepalaSekretariat\ChatController');

});

Route::group(['prefix' => 'keuangan', 'before' => 'auth|hakKeuangan'], function() {

    Route::get('/', 'Keuangan\DashboardController@index');

    Route::get('validasi-pembayaran/{id}', 'Keuangan\PembayaranController@show');
    Route::get('validasi-pembayaran', 'Keuangan\PembayaranController@valid');
    Route::get('validasi-pembayaran/{valid}/{id}/{val}', 'Keuangan\PembayaranController@validasi');

    Route::resource('chat', 'Keuangan\ChatController');

    Route::resource('pembayaran-bimbingan', 'Keuangan\PembayaranBimbinganController');
    Route::get('pembayaran-bimbingan/cetak/{id}', 'Keuangan\PembayaranBimbinganController@cetak');
    Route::get('pembayaran-bimbingan/delete/{id}', 'Keuangan\PembayaranBimbinganController@destroy');

    Route::resource('laporan', 'Keuangan\KeuanganController');

});



