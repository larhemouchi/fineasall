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
Route::get('/reservations/{user}', 'UserController@res')->name('users.res');
Route::get('/mod-info/{user}', 'UserController@modInfo')->name('users.mod-info');
Route::put('/mod-info/{user}', 'UserController@modInfoPut')->name('users.mod-info-put');


Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/regular', 'HomeController@regular')->name('users.regular');

Route::get('/super-admin', 'HomeController@superAdmin')->name('users.super-admin');

Auth::routes();

Route::post('/search-theatres', 'TheatreController@search')->name('theatres.search');

Route::resource('theatres', 'TheatreController');

Route::post('/res-cr/{rep}', 'ResController@cr')->name('res.cr');

Route::post('/res-confirm/{rep}', 'ResController@confirm')->name('res.confirm');

Route::post('/res-checkout/{rep}', 'ResController@checkout')->name('res.checkout');

Route::get('/res-sieges/{rep}', 'ResController@init')->name('res.init');

Route::get('/salle-sieges-info/{rep}', 'SalleController@siegesInfo')->name('salles.sieges-info');


Route::resource('salles', 'SalleController');


Route::resource('reps', 'RepController');
/*
if ($exception instanceof ModelNotFoundException) {
    return $exception->getModel() == Server::class
                ? Route::respondWithRoute('serverFallback') 
                : Route::respondWithRoute('fallback');
}
Route::fallback(function() {
    return 'Hm, why did you land here somehow?';
});


Route::fallback(function(){
    $state = 'error';
    $message = '404';
    return view('back.layouts.message',compact('state', 'message') );
});

*/



