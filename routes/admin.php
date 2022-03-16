<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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

Route::group(['prefix' => 'admin','namespace'=>'Adminpanel','middleware' => ['web']], function(Router $router)
{
    Route::get('login','LoginController@login_view')->name('login.view');
    Route::post('login_post','LoginController@postLogin')->name('login.post');
    //  end login routes

    Route::group(['middleware' => ['check.login']], function()
    {
        Route::get('Dashboard','LoginController@dashboard_view')->name('dashboard.view');
        Route::get('logout','LoginController@logout')->name('logout');
        // end dashboard & logout routes
        Route::resource('exercises','ExercisesController')->except('show');
        // end the Exercises routes
        Route::resource('sites','SitesController')->except('show');
        // end the sites routes 
        Route::resource('vitamins','VitaminsController')->except('show');
        // end the vitamins routes 
        Route::resource('motivations','MotivationsController')->except('show');
        // end the motivations routes
        Route::resource('contact_us','ConatctUsController')->except(['show','update']);
        // end the contact us messages routes
        Route::resource('admins','AdminsController')->except(['show']);

    
    });// end admin routes group


});// end routes group 
