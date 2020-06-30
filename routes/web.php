<?php

use Illuminate\Support\Facades\Route;

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

//Auth routes
Auth::routes(['verify' => true]);

Route::get('/profile/{user}', 'UserController@show')->name('profile');

Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');


//Home route
Route::get('/', 'SaasController@index')->name('home');
Route::get('/app', 'SaasController@show');
Route::get('/app/{saas:slug}', 'SaasController@show')->name('app');
Route::get('/category/{category:name}', 'CategoryController@show')->name('category');
Route::get('/search', 'SaasController@search')->name('search');


Route::get('/home', function(){ return redirect(route('home')); });

Route::middleware('auth')->group(function(){
	Route::get('/submit', 'SaasController@create')->name('submit');
	Route::post('/submit', 'SaasController@store');
	Route::post('/app/delete/{saas}', 'SaasController@destroy');
	Route::post('/app/upvote/{saas:id}', 'SaasController@upvote');
	Route::get('/upvotes', 'SaasController@userUpvotes')->name('myupvotes');
	Route::post('/app/review/', 'SaasController@addReview')->name('addreview');
	Route::get('/notifications', 'UserController@notifications')->name('notifications');
	
});




