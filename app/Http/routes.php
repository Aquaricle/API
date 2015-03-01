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
	 'prefix' => '/v1/',
	],
	function()
	{
		Route::get('aquariums', [
			'as' => 'aquariums',
			'uses' => 'AquariumController@index'
		]);

		Route::get('/aquarium/{aquariumID}', [
			'as' => 'aquarium',
			'uses' => 'AquariumController@get'
		]);

		Route::get('/aquarium/{aquariumID}/equipment', [
			'as' => 'aquarium.equipment',
			'uses' => 'EquipmentController@index'
		]);

		Route::get('/aquarium/{aquariumID}/equipment/maintenance', [
			'as' => 'aquarium.equipment.maintenance',
			'uses' => 'EquipmentController@getMaintenance'
		]);

		Route::get('/aquarium/{aquariumID}/logs', [
			'as' => 'aquarium.log',
			'uses' => 'AquariumLogController@index'
		]);



		Route::get('auth',
			function()
			{
				return response()->json(
					['auth' => Auth::check()]
				);
			});
	}
);
