<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {

	protected $table = 'Food';
	protected $guarded = array('foodID', 'userID');
	public $primaryKey = 'foodID';
	public $timestamps = false;

}
