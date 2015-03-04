<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AquariumLifeLog extends Model {

	protected $table = 'AquariumLifeLogs';
	protected $guarded = array('aquariumLogID', 'lifeID');
	public $primaryKey = array('aquariumLogID', 'lifeID');
	public $incrementing = false;
	public $timestamps = false;

	/* Relationships */
	public function aquariumLog()
	{
		return $this->belongsTo('App\AquariumLog', 'aquariumLogID');
	}

	public function aquariumLife()
	{
		return $this->belongsTo('App\AquariumLife', 'aquariumLifeID');
	}

	public function toArray()
	{
		return [
			'aquariumLogID' => (integer)$this->aquariumLogID,
			'lifeID' => (integer)$this->aquariumLifeID,
			'type' => $this->aquariumLife->Life->LifeType->lifeTypeName,
			'nickname' => $this->aquariumLife->nickname,
			'commonName' => $this->aquariumLife->Life->commonName,
			'scientificName' => $this->aquariumlife->Life->scientificName,
		];
	}
}
