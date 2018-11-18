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
Route::get('about', function () {
    return view('about');
});




Route::group(['middleware' => ['web']],function(){
    Route::Resource('films','FilmController');

    Route::get('film/{slug}',['as' => 'film.single', 'uses' => 'FilmController@getSingle']);
    Route::get('logout', 'FilmController@logout');
    Route::post('comments/{film_id}',['uses' => 'CommentsController@store', 'as' => 'comments.store'] );
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
