<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'SelectionActionController@getHome')->name('home');

Route::group(['prefix' => 'do'], function(){
    
    Route::get('/{action}/{name?}', 'SelectionActionController@selectAction')->name('selection');
    
    Route::post('/', 'SelectionActionController@postInsertAction')->name('add_action');
    
});

