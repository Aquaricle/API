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

Route::group(
	['middleware' => 'auth.api',
	 'prefix' => '/api/v1/',
	],
	function()
	{
		Route::get('aquariums', [
			'as' => 'aquariums',
			'uses' => 'AquariumController@index'
		]);
	}
);
