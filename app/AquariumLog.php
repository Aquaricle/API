<?php namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class AquariumLog extends Model {

	protected $table = 'AquariumLogs';
	protected $guarded = array('aquariumLogID', 'aquariumID');
	public $primaryKey = 'aquariumLogID';
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('Aquarium');
	}

	public function waterTestLog()
	{
		return $this->hasOne('WaterTestLog', 'aquariumLogID');
	}

	public function waterAdditiveLog()
	{
		return $this->hasMany('WaterAdditiveLog', 'aquariumLogID');
	}

	public function getDates()
	{
	    return array('logDate');
	}

}
