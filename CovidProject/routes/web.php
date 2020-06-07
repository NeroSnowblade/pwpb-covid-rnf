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
// IndexPage
Route::get('/{site}', 'MainController@dataIndex');
// DetailedInfoPage
Route::get('/{site}/{id}', 'MainController@data');
// UserPage
Route::get('/user/login', 'MainController@spesialisIndex');
Route::get('/user/register', 'MainController@spesialisIndex');

// AdminPage