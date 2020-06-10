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
| C:\xampp\htdocs\GitHub\pwpb-covid-rnf\CovidProject
*/

// HomePage
Route::get('/', 'MainController@index');
// UserPage
Route::get('/user/logout', 'MainController@logout');
Route::get('/user/{form}', 'MainController@account');
Route::post('/user/register', 'MainController@postRegister');
Route::post('/user/login', 'MainController@login');
//AdminPage
Route::get('/admin', 'MainController@adminIndex');
Route::get('/admin/{site}', 'MainController@tableIndex');
Route::get('/admin/{site}/{id}', 'MainController@tableCreate');
Route::post('/admin/{site}/{id}', 'MainController@tablePost');
Route::get('/admin/{site}/{id}/{row}', 'MainController@tableEdit');
Route::patch('/admin/{site}/{id}/{row}', 'MainController@tableUpdate');
Route::delete('/admin/{site}/{id}/{row}', 'MainController@tableDelete');
// IndexPage
Route::get('/{site}', 'MainController@dataIndex');
// DetailedInfoPage
Route::get('/{site}/{id}', 'MainController@dataDetail');