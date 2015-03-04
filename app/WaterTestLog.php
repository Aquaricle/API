<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterTestLog extends Model {

	protected $table = 'WaterTestLogs';
	protected $guarded = array('aquariumLogID');
	public $primaryKey = 'aquariumLogID';
	public $timestamps = false;

	public function aquariumLog()
	{
		return $this->belongsTo('App\AquariumLog');
	}

	public function scopeCycleData($query, $aquariumID)
	{
		return self::selectRaw('DATE(logDate) AS logDate,
				ammonia, nitrites, nitrates')
			->join('AquariumLogs', 'AquariumLogs.aquariumLogID',
				'=', 'WaterTestLogs.aquariumLogID')
			->where('AquariumLogs.aquariumID', '=', $aquariumID)
			->whereNotNull('ammonia')
			->whereNotNull('nitrites')
			->whereNotNull('nitrates')
			->orderBy('logDate', 'asc');
	}

	public function scopePhosphateData($query, $aquariumID)
	{
		return self::selectRaw('DATE(logDate) AS logDate, phosphates')
		->join('AquariumLogs', 'AquariumLogs.aquariumLogID',
			'=', 'WaterTestLogs.aquariumLogID')
		->where('AquariumLogs.aquariumID', '=', $aquariumID)
		->whereNotNull('phosphates')
		->orderBy('logDate', 'asc');
	}

	public function scopeWaterExchangeDate($query, $aquariumID)
	{
	 	return self::selectRaw('DATE(logDate) AS logDate, amountExchanged')
		->join('AquariumLogs', 'AquariumLogs.aquariumLogID',
			'=', 'WaterTestLogs.aquariumLogID')
		->where('AquariumLogs.aquariumID', '=', $aquariumID)
		->whereNotNull('amountExchanged')
		->orderBy('logDate', 'asc');
	}

	public function toArray()
	{
		return [
			'aquariumLogID' => (integer)$this->aquariumLogID,
			'temperature' => $this->temperature ? (real)$this->temperature : null,
			'ammonia' => $this->ammonia ? (real)$this->ammonia : null,
			'nitrites' => $this->nitrites ? (real)$this->nitrites : null,
			'nitrates' => $this->nitrates ? (real)$this->nitrates : null,
			'phosphates' => $this->phosphates ? (real)$this->phosphates : null,
			'pH' => $this->pH ? (real)$this->pH : null,
			'KH' => $this->KH ? (int)$this->KH : null,
			'GH' => $this->GH ? (int)$this->GH : null,
			'TDS' => $this->TDS ? (int)$this->TDS : null,
			'amountExchanged' => $this->amountExchanged ? (int)$this->amountExchanged : null
		];
	}
}
