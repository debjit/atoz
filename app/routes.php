<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'guest'), function()
{
    Route::get('/', array('as' => 'login', 'uses' => 'SiteController@getLogin'));
    Route::post('/login', 'SiteController@postLogin');

    Route::get("/forgot-password", [ "as" => "getPasswordReminder", "uses" => "SiteController@getPasswordReminder"]);
    Route::post("/forgot-password", [ "as" => "postPasswordReminder", "uses" => "SiteController@postPasswordReminder"]);
    Route::get("/reset-password/{token}", [ "as" => "getPasswordReset", "uses" => "SiteController@getPasswordReset"]);
    Route::post("/reset-password", [ "as" => "postPasswordReset", "uses" => "SiteController@postPasswordReset"]);
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('/logout', array('as' => 'logout', 'uses' => 'SiteController@getLogout'));

    Route::get('/demo/dashboard', array('as' => 'home', 'uses' => 'DemoController@showPage'));

    Route::get('/demo/{page}', 'DemoController@showPage');

    Route::post('/form/addUser', 'FormController@addUser');

});