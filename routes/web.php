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

Route::get('/dashboard', [
    'uses' => 'DashboardController@index',
    'as' => 'mahasiswa.index',
]);


Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/dashboard/{id}', [
        'uses' => 'DashboardController@show',
        'as'   => 'mahasiswa.show',
    ]);

    Route::post('/dashboard/', [
        'uses' => 'DashboardController@store',
        'as'   => 'mahasiswa.store',
    ]);

    Route::put('/dashboard/{id}', [
        'uses' => 'DashboardController@update',
        'as'   => 'mahasiswa.update',
    ]);

    Route::delete('/dashboard/{id}', [
        'uses' => 'DashboardController@destroy',
        'as'   => 'mahasiswa.destroy',
    ]);
});

Route::resource('dashboard', 'DashboardController');
