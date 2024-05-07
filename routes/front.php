<?php

use \Illuminate\Support\Facades\Session;
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

Route::get('/','Frontend\HomeController@index');
Route::post('/stockform','Frontend\HomeController@bannerSignup');// ajax
Route::post('/filterform','Frontend\HomeController@scheduleTraining');//ajax

Route::post('/contact', ['uses' => 'Frontend\MailController@send', 'as' => 'mail.send']);

Route::get('/locale/{locale}', function($locale){

    Session::put('locale', $locale);

    return redirect()->back();
});