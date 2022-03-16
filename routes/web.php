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

Route::group(['namespace'=>'Website','middleware' => ['web']], function()
{
    Route::get('/','WebsiteController@Home_view')->name('home.view');
    Route::post('/','WebsiteController@contact_us_Post')->name('contact.post');

});// end routes group 