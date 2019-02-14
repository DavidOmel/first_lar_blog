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
    return view('index');
});
//Route::get('{id}/{name}', 'Index');

Route::get('regist', 'Registration@Showreg');
Route::post('regist', 'Registration@Makereg')->name('postreg');

Route::get('authent', 'Entry@Showsec')->name('entry');
Route::post('authent', 'Entry@Makesec')->name('postsec');
