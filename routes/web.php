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


	return count(App\Res::where('rep_id', 44)->get() );

});
Route::get('/reservations/{user}', 'UserController@res')->name('users.res');
Route::get('/mod-info/{user}', 'UserController@modInfo')->name('users.mod-info');
Route::put('/mod-info/{user}', 'UserController@modInfoPut')->name('users.mod-info-put');

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/regular', 'HomeController@regular')->name('users.regular');

Route::get('/upgrade/{user}', 'UserController@upgrade')->name('users.upgrade');
Route::get('/downgrade/{user}', 'UserController@downgrade')->name('users.downgrade');

Route::get('/super-admin', 'HomeController@superAdmin')->name('users.super-admin');

Auth::routes();

Route::post('/search', 'ModelsController@search')->name('models.search');

Route::get('/search-theatres/{phrase}', 'TheatreController@search')->name('theatres.search');
Route::get('/search-salles/{phrase}', 'SalleController@search')->name('salles.search');
Route::get('/search-reps/{phrase}', 'RepController@search')->name('reps.search');

Route::resource('theatres', 'TheatreController');

Route::post('/res-cr/{rep}', 'ResController@cr')->name('res.cr');

Route::post('/res-confirm/{rep}', 'ResController@confirm')->name('res.confirm');

Route::post('/display-h-2-check/{rep}', 'HandicapController@display')->name('handicap.display');

Route::post('/check-handicaped', 'HandicapController@check')->name('handicap.check');

Route::post('/res-checkout/{rep}', 'ResController@checkout')->name('res.checkout');

Route::get('/res-sieges/{rep}', 'ResController@init')->name('res.init');

Route::get('/res-pdf', 'ResController@pdf')->name('res.pdf');

Route::get('/salle-sieges-info/{rep}', 'SalleController@siegesInfo')->name('salles.sieges-info');

Route::resource('salles', 'SalleController');

Route::post('/rep-pre-form-insert', 'RepController@preFormInsert')->name('reps.pre-form-insert');

Route::post('/rep-insert', 'RepController@insert')->name('reps.insert');

Route::resource('reps', 'RepController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
