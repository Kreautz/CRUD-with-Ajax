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
    'as' => 'dashboard.index',
]);


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/dashboard/{id}', [
        'uses' => 'DashboardController@show',
        'as'   => 'dashboard.show',
    ]);

    Route::post('/dashboard/', [
        'uses' => 'DashboardController@store',
        'as'   => 'dashboard.store',
    ]);

    Route::put('/dashboard/{id}/update', [
        'uses' => 'DashboardController@update',
        'as'   => 'dashboard.update',
    ]);

    Route::delete('/dashboard/{id}', [
        'uses' => 'DashboardController@destroy',
        'as'   => 'dashboard.destroy',
    ]);
});

/*Route::resource('dashboard', 'DashboardController');*/
