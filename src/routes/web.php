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

// Root
Route::get('/', 'SentenceController@list')->name('sentence@list');

// Sentence
Route::get('/{screen_name}/{id}', 'SentenceController@get')->name('sentence@get')->where([
    'screen_name' => '[A-Za-z\d]+',
    'id' => '\d{1,64}'
]);

// Timeline
Route::get('/{screen_name}', 'SentenceController@timeLine')->name('sentence@timeline')->where([
    'screen_name' => '[A-Za-z\d]{6,}'
]);

// Account
Route::group([
    'middleware' => 'auth'
], function () {
    Route::post('/create', 'SentenceController@create')->name('sentence@create');

    Route::match([
        'get',
        'post'
    ], '/{id}/update', 'SentenceController@update')->name('sentence@update')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/{id}/update-confirm', 'SentenceController@updateCnf')->name('sentence@update_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/{id}/update-complete', 'SentenceController@updateCmp')->name('sentence@update_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/{id}/delete-confirm', 'SentenceController@deleteCnf')->name('sentence@delete_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/{id}/delete-complete', 'SentenceController@deleteCmp')->name('sentence@delete_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/account/{id}', 'AccountController@get')->name('account@get')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::match([
        'get',
        'post'
    ], '/account/{id}/update', 'AccountController@update')->name('account@update')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/account/{id}/update-confirm', 'AccountController@updateCnf')->name('account@update_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/account/{id}/update-complete', 'AccountController@updateCmp')->name('account@update_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/account/{id}/delete-confirm', 'AccountController@deleteCnf')->name('account@delete_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/account/{id}/delete-complete', 'AccountController@deleteCmp')->name('account@delete_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
});

// Admin
Route::group([
    'middleware' => 'admin'
], function () {
    Route::post('/create-confirm', 'SentenceController@createCnf')->name('sentence@create_cnf');
    Route::post('/create-complete', 'SentenceController@createCmp')->name('sentence@create_cmp');

    Route::match([
        'get',
        'post'
    ], '/{id}/update', 'SentenceController@update')->name('sentence@update')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/{id}/update-confirm', 'SentenceController@updateCnf')->name('sentence@update_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/{id}/update-complete', 'SentenceController@updateCmp')->name('sentence@update_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/{id}/delete-confirm', 'SentenceController@deleteCnf')->name('sentence@delete_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/{id}/delete-complete', 'SentenceController@deleteCmp')->name('sentence@delete_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/account', 'AccountController@list')->name('account@list');

    Route::match([
        'get',
        'post'
    ], '/account/create', 'AccountController@create')->name('account@create');
    Route::post('/account/create-confirm', 'AccountController@createCnf')->name('account@create_cnf');
    Route::post('/account/create-complete', 'AccountController@createCmp')->name('account@create_cmp');

    Route::get('/account/{id}', 'AccountController@get')->name('account@get')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/account/{id}/delete-confirm', 'AccountController@deleteCnf')->name('account@delete_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/account/{id}/delete-complete', 'AccountController@deleteCmp')->name('account@delete_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/admin', 'AdminController@list')->name('admin@list');

    Route::match([
        'get',
        'post'
    ], '/admin/create', 'AdminController@create')->name('admin@create');
    Route::post('/admin/create-confirm', 'AdminController@createCnf')->name('admin@create_cnf');
    Route::post('/admin/create-complete', 'AdminController@createCmp')->name('admin@create_cmp');

    Route::get('/admin/{id}', 'AdminController@get')->name('admin@get')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::match([
        'get',
        'post'
    ], '/admin/{id}/update', 'AdminController@update')->name('admin@update')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/admin/{id}/update-confirm', 'AdminController@updateCnf')->name('admin@update_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/admin/{id}/update-complete', 'AdminController@updateCmp')->name('admin@update_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);

    Route::get('/admin/{id}/delete-confirm', 'AdminController@deleteCnf')->name('admin@delete_cnf')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
    Route::post('/admin/{id}/delete-complete', 'AdminController@deleteCmp')->name('admin@delete_cmp')->where([
        'id' => '[1-9]+[0-9]{0,9}'
    ]);
});
