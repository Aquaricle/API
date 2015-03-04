<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterAdditive extends Model {

	protected $table = 'WaterAdditives';
	protected $guarded = array('waterAdditiveID');
	public $primaryKey = 'waterAdditiveID';
	public $timestamps = false;


/*
  public function waterAdditiveLog()
	{
		return $this->hasMany('App\WaterAdditiveLog', 'waterAdditiveID');
	}
  */
}
