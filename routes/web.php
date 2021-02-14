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
// HOMEPAGE 
Route::get('/', 'HomeController@index')->name('home');


/**
 *  ROTTE PUBLIC
 */
Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('posts/{slug}', 'PostController@show')->name('posts.show');


/**
 *  ROTTE PER LOGIN / REGISTRAZIONE /
 */
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/**
 *  ROTTE PAGINE PER UTENTI LOGGATI
 */

 Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function (){
        // Home admin
        Route::get('/', 'HomeController@index')->name('home'); 
        // Rotte Post CRUD
        Route::resource('posts', 'PostController');
    });
