<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LifeType extends Model {

	protected $table = 'LifeTypes';
	protected $guarded = array('lifeTypeID');
	public $primaryKey = 'lifeTypeID';
	public $timestamps = false;



}
