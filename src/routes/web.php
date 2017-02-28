<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
// ======================================
// Nobdy
// ======================================
Route::get('/', 'SentenceController@list')->name('sentence@list');

Route::get('{screen_name}/{id}', 'SentenceController@get')->name('sentence@get')->where([
    'screen_name' => '[A-Za-z\d]+',
    'id' => '\d{1,64}'
]);

Route::get('{screen_name}', 'SentenceController@timeline')->name('sentence@timeline')->where([
    'screen_name' => '[A-Za-z\d]+'
]);

Route::post('sentence/create', 'SentenceController@create')->name('sentence@create');

// ======================================
// Admin
// ======================================
Route::group([
    'middleware' => 'admin'
], function () {
    Route::get('admin/top', 'AdminController@top')->name('admin@top');

    Route::get('admin/create', 'AdminController@create')->name('admin@create');
    Route::post('admin/create_cnf', 'AdminController@createCnf')->name('admin@create_cnf');
    Route::post('admin/create_cmp', 'AdminController@createCmp')->name('admin@create_cmp');

    Route::match([
        'get',
        'post'
    ], '/admin/search', 'AdminController@search')->name('admin@search');

    Route::get('/admin/account/create', 'AdminController@accountCreate')->name('admin@account_create');

    Route::match([
        'get',
        'post'
    ], '/admin/account/search', 'AdminController@accountSearch')->name('admin@account_search');

    Route::match([
        'get',
        'post'
    ], '/admin/sentence/search', 'AdminController@sentenceSearch')->name('admin@sentence_search');
});
