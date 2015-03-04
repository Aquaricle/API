<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentLog extends Model
{

	protected $table = 'EquipmentLogs';
	protected $guarded = array('aquariumLogID');
	//public $primaryKey = array('aquariumLogID', 'additiveID');
	public $primaryKey = 'aquariumLogID';
	public $incrementing = false;
	public $timestamps = false;

	public function aquariumLog()
	{
		return $this->belongsTo('App\AquariumLog');
	}

  public function equipment()
	{
		return $this->belongsTo('App\Equipment', 'equipmentID');
	}

  public function toArray()
  {
    return [
      'aquariumLogID' => (integer)$this->aquariumLogID,
			'equipmentID' => (integer)$this->equipmentID,
      'name' => $this->equipment->name,
      'type' => $this->equipment->equipmentType->typeName,
      'mainteance' => (bool)$this->maintenance,
    ];
  }
}
