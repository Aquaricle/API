<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AquariumLog extends Model {

	protected $table = 'AquariumLogs';
	protected $guarded = array('aquariumLogID', 'aquariumID');
	public $primaryKey = 'aquariumLogID';
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('App\Aquarium');
	}

	public function waterTestLog()
	{
		return $this->hasOne('App\WaterTestLog', 'aquariumLogID');
	}

	public function waterAdditiveLog()
	{
		return $this->hasMany('App\WaterAdditiveLog', 'aquariumLogID');
	}

	public function equipmentLog()
	{
		return $this->hasMany('App\EquipmentLog', 'aquariumLogID');
	}

	public function getDates()
	{
	    return array('logDate');
	}

	public function toArray()
	{
		return [
			'aquariumLogID' => (integer)$this->aquariumLogID,
			'aquariumID' => (integer)$this->aquariumID,
			'logDate' => $this->logDate,
			'summary' => $this->summary,
			'comments' => $this->comments,
			'waterTests' => $this->waterTestLog,
			'equipment' => $this->equipmentLog,

		];
	}

}
