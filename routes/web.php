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

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function ()
    {

        Route::prefix('pages')->group(function ()
        {

            Route::get('/list', 'Admin\PagesController@index');
            Route::get('/create', 'Admin\PagesController@create');
            Route::post('/store', 'Admin\PagesController@store');
            Route::get('/delete/{id}', 'Admin\PagesController@delete');
            Route::get('/edit/{id}', 'Admin\PagesController@edit');
            Route::get('/isActiveFalse/{id}', 'Admin\PagesController@isActiveFalse');
            Route::get('/isActiveTrue/{id}', 'Admin\PagesController@isActiveTrue');
            Route::post('/update/{id}','Admin\PagesController@update');

        });
        Route::prefix('categories')->group(function ()
        {

            Route::get('/list', 'Admin\CategoryController@index');
            Route::get('/create', 'Admin\CategoryController@create');
            Route::post('/store', 'Admin\CategoryController@store');
            Route::get('/delete/{id}', 'Admin\CategoryController@delete');
            Route::get('/edit/{id}', 'Admin\CategoryController@edit');
            Route::get('/isActiveFalse/{id}', 'Admin\CategoryController@isActiveFalse');
            Route::get('/isActiveTrue/{id}', 'Admin\CategoryController@isActiveTrue');
            Route::post('/update/{id}','Admin\CategoryController@update');

        });

        Route::prefix('posts')->group(function ()
        {

            Route::get('/list', 'Admin\PostController@index');
            Route::get('/create', 'Admin\PostController@create');
            Route::post('/store', 'Admin\PostController@store');
            Route::get('/delete/{id}', 'Admin\PostController@delete');
            Route::get('/edit/{id}', 'Admin\PostController@edit');
            Route::get('/isActiveFalse/{id}', 'Admin\PostController@isActiveFalse');
            Route::get('/isActiveTrue/{id}', 'Admin\PostController@isActiveTrue');
            Route::post('/update/{id}','Admin\PostController@update');

        });
        Route::prefix('portfolioCategories')->group(function ()
        {

            Route::get('/list', 'Admin\PortfolioCategoriesController@index');
            Route::get('/create', 'Admin\PortfolioCategoriesController@create');
            Route::post('/store', 'Admin\PortfolioCategoriesController@store');
            Route::get('/delete/{id}', 'Admin\PortfolioCategoriesController@delete');
            Route::get('/edit/{id}', 'Admin\PortfolioCategoriesController@edit');
            Route::get('/isActiveFalse/{id}', 'Admin\PortfolioCategoriesController@isActiveFalse');
            Route::get('/isActiveTrue/{id}', 'Admin\PortfolioCategoriesController@isActiveTrue');
            Route::post('/update/{id}','Admin\PortfolioCategoriesController@update');
            Route::get('/showPortfolios/{id}','Admin\PortfolioCategoriesController@showPortfolios');

        });

        Route::prefix('portfolio')->group(function ()
        {

            Route::get('/list', 'Admin\PortfolioController@index');
            Route::get('/create', 'Admin\PortfolioController@create');
            Route::post('/store', 'Admin\PortfolioController@store');
            Route::get('/delete/{id}', 'Admin\PortfolioController@delete');
            Route::get('/edit/{id}', 'Admin\PortfolioController@edit');
            Route::get('/isActiveFalse/{id}', 'Admin\PortfolioController@isActiveFalse');
            Route::get('/isActiveTrue/{id}', 'Admin\PortfolioController@isActiveTrue');
            Route::post('/update/{id}','Admin\PortfolioController@update');

        });
        Route::prefix('gallery')->group(function ()
        {

            Route::get('/list', 'Admin\GalleryController@index');
            Route::get('/create', 'Admin\GalleryController@create');
            Route::get('/createImage', 'Admin\GalleryController@createImage');
            Route::post('/store', 'Admin\GalleryController@store');
            Route::get('/delete/{id}', 'Admin\GalleryController@delete');
            Route::get('/edit/{id}', 'Admin\GalleryController@edit');
            Route::get('/isActiveFalse/{id}', 'Admin\GalleryController@isActiveFalse');
            Route::get('/isActiveTrue/{id}', 'Admin\GalleryController@isActiveTrue');
            Route::post('/update/{id}','Admin\GalleryController@update');

        });
        Route::post('/createImage/getGalleries','Admin\GalleryController@getGalleries');
        Route::post('/setSlider','Admin\ImageController@setSlider');
        Route::get('/showSlider','Admin\ImageController@showSlider');
        Route::get('/sliderImage/delete/{id}','Admin\ImageController@deleteImageFromSlider');
        Route::get('/showPosts/{id}','Admin\PortfolioCategoriesController@showPosts');
        Route::post('/createImage','Admin\ImageController@store');
        Route::get('/slider','Admin\ImageController@sliderIndex');


    });

});
