<?php

define('GOOGLE_MAPS_API_KEY', 'AIzaSyCc83SoBGFHtwRPkcF0hhOUx5H_eUAwsRI');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::filter( 'authenticated', function()
{
	if ( !Request::is( 'admin/login' ) && !Auth::check() ) {
		return Redirect::to( 'admin/login' );
	}
} );


// Admin resource routes.
Route::group( array( 'prefix' => 'admin' ), function() {
	Route::resource( 'resource', 'Admin\ResourceController', array( 'only' => array( 'update', 'store', 'destroy', 'show' ) ) );
	Route::resource( 'page', 'Admin\PageController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'product-category', 'Admin\ProductCategoryController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'platform-category', 'Admin\PlatformCategoryController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	//Route::resource( 'platform', 'Admin\PlatformController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'market', 'Admin\MarketController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'product', 'Admin\ProductController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'position', 'Admin\PositionController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'news', 'Admin\NewsController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create' ) ) );
	Route::resource( 'user', 'Admin\UserController', array( 'only' => array( 'update', 'store', 'show', 'edit', 'create', 'destroy' ) ) );
} );

Route::controller( 'admin', 'Admin\Admin' );

Route::get('/', 'HomeController@home');
Route::get('/news', 'HomeController@news');
Route::get('/news/{slug?}', 'HomeController@newsItem');
Route::get('/human-resources', 'HomeController@hr');
Route::get('/capabilities', 'HomeController@capabilities');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'ContactController@submit');
Route::get('/support', 'HomeController@support');
Route::get('/support/aftermarket-support', 'HomeController@aftermarketSupport');
Route::get('/support/faa-repair-station', 'HomeController@faaRepairStation');
Route::get('/support/quality-control', 'HomeController@qualityControl');
Route::get('/products', 'HomeController@products');
Route::get('/products/{slug?}', 'HomeController@productCategory');
Route::get('/platforms', 'HomeController@platforms');
Route::get('/platforms/{slug?}', 'HomeController@platformCategory');
Route::get('/search', 'HomeController@search');
Route::get('/patents', 'HomeController@patents');
Route::get('/get-time', 'HomeController@getTime');

// Products, News, Careers, Contact

require 'upload.php';
