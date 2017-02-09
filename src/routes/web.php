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

// Root
Route::get('/', 'BbsController@list')->name('bbs@list');

// Bbs
Route::match(['get', 'post'], '/create', 'BbsController@create')->name('bbs@create');
Route::post('/create-confirm', 'BbsController@createCnf')->name('bbs@create_cnf');
Route::post('/create-complete', 'BbsController@createCmp')->name('bbs@create_cmp');

Route::get('/{id}', 'BbsController@get')->name('bbs@get')->where(['id' => '[1-9]+[0-9]{0,9}']);

Route::match(['get', 'post'], '/{id}/update', 'BbsController@update')->name('bbs@update')->where(['id' => '[1-9]+[0-9]{0,9}']);
Route::post('/{id}/update-confirm', 'BbsController@updateCnf')->name('bbs@update_cnf')->where(['id' => '[1-9]+[0-9]{0,9}']);
Route::post('/{id}/update-complete', 'BbsController@updateCmp')->name('bbs@update_cmp')->where(['id' => '[1-9]+[0-9]{0,9}']);

Route::get('/{id}/delete-confirm', 'BbsController@deleteCnf')->name('bbs@delete_cnf')->where(['id' => '[1-9]+[0-9]{0,9}']);
Route::post('/{id}/delete-complete', 'BbsController@deleteCmp')->name('bbs@delete_cmp')->where(['id' => '[1-9]+[0-9]{0,9}']);

// User
Route::group(['middleware' => 'user'], function () {
	Route::get('/user', 'UserController@list')->name('user@list');

	Route::match(['get', 'post'], '/user/create', 'UserController@create')->name('user@create');
	Route::post('/user/create-confirm', 'UserController@createCnf')->name('user@create_cnf');
	Route::post('/user/create-complete', 'UserController@createCmp')->name('user@create_cmp');

	Route::get('/user/{id}', 'UserController@get')->name('user@get')->where(['id' => '[1-9]+[0-9]{0,9}']);

	Route::match(['get', 'post'], '/user/{id}/update', 'UserController@update')->name('user@update')->where(['id' => '[1-9]+[0-9]{0,9}']);
	Route::post('/user/{id}/update-confirm', 'UserController@updateCnf')->name('user@update_cnf')->where(['id' => '[1-9]+[0-9]{0,9}']);
	Route::post('/user/{id}/update-complete', 'UserController@updateCmp')->name('user@update_cmp')->where(['id' => '[1-9]+[0-9]{0,9}']);

	Route::get('/user/{id}/delete-confirm', 'UserController@deleteCnf')->name('user@delete_cnf')->where(['id' => '[1-9]+[0-9]{0,9}']);
	Route::post('/user/{id}/delete-complete', 'UserController@deleteCmp')->name('user@delete_cmp')->where(['id' => '[1-9]+[0-9]{0,9}']);
});
