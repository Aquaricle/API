<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterAdditiveLog extends Model {

	protected $table = 'WaterAdditiveLogs';
	protected $guarded = array('aquariumLogID');
	//public $primaryKey = array('aquariumLogID', 'additiveID');
	public $primaryKey = 'aquariumLogID';
	public $incrementing = false;
	public $timestamps = false;


  public function aquariumLog()
	{
		return $this->belongsTo('App\AquariumLog');
	}

  public function waterAdditive()
  {
    return $this->belongsTo('App\WaterAdditive', 'waterAdditiveID');
  }

	public function toArray()
  {
    return [
      'aquariumLogID' => (integer)$this->aquariumLogID,
      'waterAdditiveID' => (integer)$this->waterAdditiveID,
      'name' => $this->waterAdditive->name,
      'amount' => (real)$this->amount
    ];
  }
}
