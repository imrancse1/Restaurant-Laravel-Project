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

Route::get('/', 'Homecontroller@index')->name('Welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@message')->name('contact.send');


Route::get('admin/dashboard',function (){
    return view('admin.dashboard');


});

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){

	Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
	Route::resource('slider','SliderController');
	Route::resource('category','CategoryController');
	Route::resource('item','ItemController');

    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destory')->name('reservation.destory');

    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');

	// lage nai ai gula
//	Route::get('create','SliderController@create');
//	Route::get('store','SliderController@store');
//	Route::post('edit','SliderController@edit');
//	Route::post('update','SliderController@update'); ai porjonto

   // Route::get('category','CategoryController@index')->name('admin.category');

});

