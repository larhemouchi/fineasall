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



Route::get('/test', function(){





});
Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('theatres', 'TheatreController');

Route::post('/res-cr/{rep}', 'ResController@cr')->name('res.cr');

Route::post('/res-confirm/{rep}', 'ResController@confirm')->name('res.confirm');

Route::post('/res-checkout/{rep}', 'ResController@checkout')->name('res.checkout');

Route::get('/res-sieges/{rep}', 'ResController@init')->name('res.init');

Route::get('/salle-sieges-info/{rep}', 'SalleController@siegesInfo')->name('salles.sieges-info');

// A SUPRIMER APRES
Route::get('/salle-sieges/{slug}', 'SalleController@sieges')->name('salles.sieges');
Route::resource('salles', 'SalleController');


Route::resource('reps', 'RepController');


