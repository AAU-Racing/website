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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => '/password', 'as' => 'auth::'], function() {
    Route::get('', 'Auth\ChangePasswordController@showEditForm')->name('change_password');
    Route::post('', 'Auth\ChangePasswordController@edit')->name('change_password_post');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin/', 'namespace' => 'Admin', 'as' => 'admin::'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'role/', 'as' => 'role::'], function() {
        Route::get('/', 'RoleController@index')->name('home');
        Route::get('/{id}', 'RoleController@showEditForm')->name('editForm');
        Route::post('/{id}', 'RoleController@edit')->name('edit');
    });

    Route::group(['prefix' => 'profile/', 'as' => 'profile::'], function() {
        Route::get('/{id}', 'ProfileController@showEditForm')->name('editForm');
        Route::post('/{id}', 'ProfileController@edit')->name('edit');
    });
});
