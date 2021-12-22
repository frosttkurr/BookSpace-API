<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/buku', 'BukuController@getAllBuku');
Route::get('/buku/{id}/detail', 'BukuController@getDetailBuku');
Route::get('/buku/edukasi', 'BukuController@getBukuEdukasi');
Route::get('/buku/ilmiah', 'BukuController@getBukuIlmiah');
Route::get('/buku/fiksi', 'BukuController@getBukuFiksi');
Route::get('/buku/sejarah', 'BukuController@getBukuSejarah');
Route::get('/buku/bisnis', 'BukuController@getBukuBisnis');
Route::get('/buku/novel', 'BukuController@getBukuNovel');
Route::get('/buku/majalah', 'BukuController@getBukuMajalah');
Route::post('/buku/tambah', 'BukuController@insertBuku');
Route::put('/buku/{id}/update', 'BukuController@updateBuku');
Route::delete('/buku/{id}/delete', 'BukuController@deleteBuku');


Route::get('/pinjam', 'PinjamController@getAllPinjam');
Route::get('/pinjam/{id}/detail', 'PinjamController@getDetailPinjam');
Route::post('/pinjam/tambah', 'PinjamController@insertPinjam');
Route::put('/pinjam/{id}/update', 'PinjamController@updatePinjam');
Route::put('/pinjam/{id}/return', 'PinjamController@returnPinjam');
Route::delete('/pinjam/{id}/delete/', 'PinjamController@deletePinjam');


Route::get('/pengguna/{id}/detail', 'PenggunaController@getPengguna');
Route::post('/pengguna/checkUser/', 'PenggunaController@checkUsername');
Route::post('/pengguna/checkEmail', 'PenggunaController@checkEmail');
Route::post('/pengguna/checkUserPass', 'PenggunaController@checkUsernameAndPassword');
Route::post('pengguna/tambah', 'PenggunaController@insertPengguna');
Route::put('/pengguna/{id}/delete', 'PenggunaController@deletePengguna');
