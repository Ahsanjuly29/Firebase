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


Route::get('test-firebase', 'FirebaseController@index');
Route::get('test-firebase-firestore', 'FirebaseCloudFirestoreController@index');

Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
    Route::resource('products', 'ProductController');
});

