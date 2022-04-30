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

Route::get('/', function () {
    $title = 'Unauthorized';
    return view('errorpages.401', compact('title'));
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('academy', 'HomeController@academy')->name('academy');
Route::get('forum-qa', 'HomeController@forum_qa')->name('forum-qa');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('job', 'HomeController@job')->name('job');
Route::get('event', 'HomeController@event')->name('event');
Route::get('partnership', 'HomeController@partnership')->name('partnership');


Route::get('login', 'AuthController@login_page')->name('login');
Route::post('login', 'AuthController@login_post')->name('login');
Route::get('register', 'AuthController@register_page')->name('register');
Route::post('register', 'AuthController@register_post')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');

    // Route Admin
    Route::group(['middleware' => 'checkRole:1'], function () {
        Route::group(['prefix' => 'admin'], function () {
            // 
        });
    });

    // Route Member
    Route::group(['middleware' => 'checkRole:2'], function () {
        Route::group(['prefix' => 'member'], function () {
            // 
        });
    });
});
