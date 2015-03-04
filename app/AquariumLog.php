<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AquariumLog extends Model {

	protected $table = 'AquariumLogs';
	protected $guarded = array('aquariumLogID', 'aquariumID');
	public $primaryKey = 'aquariumLogID';
	public $timestamps = false;

	public function aquarium()
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

	public function aquariumLifeLog()
	{
		return $this->hasMany('App\AquariumLifeLog', 'aquariumLogID');
	}

	public function foodLog()
	{
		return $this->hasMany('App\FoodLog', 'aquariumLogID');
	}

	public function AquariumLogFile()
	{
		return $this->hasMany('App\AquariumLogFile', 'aquariumLogID');
	}

	public function getDates()
	{
	    return array('logDate');
	}

	public function toArray()
	{
		return [
			'aquariumID' => (integer)$this->aquariumID,
			'aquariumLogID' => (integer)$this->aquariumLogID,
			'logDate' => $this->logDate,
			'summary' => $this->summary,
			'comments' => $this->comments,
			'WaterTests' => $this->waterTestLog,
			'WaterAdditives' => $this->waterAdditiveLog,
			'Equipment' => $this->equipmentLog,
			'AquariumLife' => $this->aquariumLifeLog,
			'Feedings' => $this->foodLog,
			'Files' => $this->aquariumLogFile,
		];
	}

}
