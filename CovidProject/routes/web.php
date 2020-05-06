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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/belajar1', function() {
    $data['jk']   = "L";
    $data['nama'] = "Loki";
    return view('belajar',$data);
});

Route::get('/belajar2', function() {
    $jk   = "L";
    $nama = "Loki";
    return view('belajar', compact("nama","jk"));
});

Route::get('/belajar3', 'SiswaController@index');

Route::get('/kelapa', function () {
    echo "Kelapa Kepala";
});