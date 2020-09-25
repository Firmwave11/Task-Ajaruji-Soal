<?php

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

Route::get('/', 'App\Http\Controllers\GuzzleController@getData');
Route::post('/', 'App\Http\Controllers\GuzzleController@ajax_mapel')->name('ajax');
Route::get('/soal/{page}', 'App\Http\Controllers\GuzzleController@soal')->name('soal');
Route::post('/soal/{page}', 'App\Http\Controllers\GuzzleController@soal')->name('soal1');
Route::post('/soal/{page}/{mapel}/{id}', 'App\Http\Controllers\GuzzleController@jawab')->name('jawab');
Route::get('/jelas/{mapel}/{id}/{mame?}', 'App\Http\Controllers\GuzzleController@penjelasan')->name('jelas');
Route::get('/hasil/{mapel}/{id}', 'App\Http\Controllers\GuzzleController@hasil')->name('hasil');