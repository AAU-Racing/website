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

Auth::routes(["verify" => true]);


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => '/password', 'as' => 'auth::'], function() {
    Route::get('', 'Auth\ChangePasswordController@showEditForm')->name('change_password');
    Route::post('', 'Auth\ChangePasswordController@edit')->name('change_password_post');
});

// Base
Route::get('/', function () {
    return redirect('home');
});

// Admin
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin/', 'namespace' => 'Admin', 'as' => 'admin::'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'role/', 'as' => 'role::'], function() {
        Route::get('/', 'RoleController@index')->name('home');
        Route::get('/{id}', 'RoleController@showEditForm')->name('editForm');
        Route::post('/{id}', 'RoleController@edit')->name('edit');
    });

    Route::group(['prefix' => 'profile/', 'as' => 'profile::'], function() {
        Route::get('/', 'ProfileController@index')->name('home');
        Route::get('/{id}', 'ProfileController@showEditForm')->name('editForm');
        Route::post('/{id}', 'ProfileController@edit')->name('edit');
    });

    Route::group(['prefix' => 'page/', 'as' => 'page::'], function() {
        Route::get('/new', 'PageController@addForm')->name('addForm');
        Route::post('/new', 'PageController@add')->name('add');
        Route::get('/', 'PageController@home')->name('home');
        Route::post('/', 'PageController@editOrder')->name('editOrder');
        Route::get('/{id}', 'PageController@editForm')->name('editForm');
        Route::post('/{id}', 'PageController@edit')->name('edit');
        Route::delete('/{id}', 'PageController@delete')->name('delete');
    });

    Route::group(['prefix' => 'car/', 'as' => 'car::'], function() {
        Route::get('/new', 'CarController@addForm')->name('addForm');
        Route::post('/new', 'CarController@add')->name('add');
        Route::get('/', 'CarController@home')->name('home');
        Route::get('/{id}', 'CarController@editForm')->name('editForm');
        Route::post('/{id}', 'CarController@edit')->name('edit');
        Route::delete('/{id}', 'CarController@delete')->name('delete');
    });

    Route::group(['prefix' => 'footerlink/', 'as' => 'footer_link::'], function() {
        Route::get('/new', 'FooterLinkController@addForm')->name('addForm');
        Route::post('/new', 'FooterLinkController@add')->name('add');
        Route::get('/', 'FooterLinkController@home')->name('home');
        Route::post('/', 'FooterLinkController@editOrder')->name('editOrder');
        Route::get('/{id}', 'FooterLinkController@editForm')->name('editForm');
        Route::post('/{id}', 'FooterLinkController@edit')->name('edit');
        Route::delete('/{id}', 'FooterLinkController@delete')->name('delete');
    });

    Route::group(['prefix' => 'competition/', 'as' => 'competition::'], function() {
        Route::get('/new', 'CompetitionController@addForm')->name('addForm');
        Route::post('/new', 'CompetitionController@add')->name('add');
        Route::get('/', 'CompetitionController@home')->name('home');
        Route::get('/{id}', 'CompetitionController@editForm')->name('editForm');
        Route::post('/{id}', 'CompetitionController@edit')->name('edit');
        Route::delete('/{id}', 'CompetitionController@delete')->name('delete');
    });

    Route::group(['prefix' => 'carousel/', 'as' => 'carousel::'], function() {
        Route::get('/new', 'CarouselSlideController@addForm')->name('addForm');
        Route::post('/new', 'CarouselSlideController@add')->name('add');
        Route::get('/', 'CarouselSlideController@home')->name('home');
        Route::post('/', 'CarouselSlideController@editOrder')->name('editOrder');
        Route::get('/{id}', 'CarouselSlideController@editForm')->name('editForm');
        Route::post('/{id}', 'CarouselSlideController@edit')->name('edit');
        Route::delete('/{id}', 'CarouselSlideController@delete')->name('delete');
    });

    Route::group(['prefix' => 'sponsor/', 'as' => 'sponsor::'], function() {
        Route::get('/', 'SponsorController@home')->name('home');
        Route::get('/{id}', 'SponsorController@editForm')->name('editForm');
        Route::post('/{id}', 'SponsorController@edit')->name('edit');
    });

    Route::group(['prefix' => 'press/', 'as' => 'press::'], function() {
        Route::get('/', 'PressController@home')->name('home');
        Route::get('/{id}', 'PressController@editForm')->name('editForm');
        Route::post('/{id}', 'PressController@edit')->name('edit');
    });
});

// Public pages
Route::get('/home', 'PageController@home')->name('home');
Route::get('/cars', 'PageController@cars')->name('cars');

Route::get('/{page}', 'PageController@page')->name('page');
