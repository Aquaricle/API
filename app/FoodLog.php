<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodLog extends Model {

	protected $table = 'FoodLogs';
	protected $guarded = array('aquariumLogID');
	public $primaryKey = 'aquariumLogID';
	public $incrementing = false;
	public $timestamps = false;

  public function aquariumLog()
  {
    return $this->belongsTo('App\AquariumLog');
  }

  public function food()
	{
		return $this->belongsTo('App\Food', 'foodID');
	}

	public function scopeFeedingsByDays($query, $aquariumID, $days = 30)
	{
		DB::statement('SELECT @colorsCnt := (SELECT MAX(colorID) FROM Colors)');
		DB::statement('SELECT @rowNumber := 0');

		 return DB::select(
			"SELECT @rowNumber:=@rowNumber + 1 AS rowNumber,
				Food.name AS label, COUNT(Food.name) AS value,
				(SELECT CONCAT('#', LPAD(CONV(color, 10, 16), 6, '0'))
					FROM Colors WHERE colorID = (@rowNumber % @colorsCnt)) AS color
			 FROM AquariumLogs
			 JOIN FoodLogs ON FoodLogs.aquariumLogID = AquariumLogs.aquariumLogID
			 JOIN Food ON Food.foodID = FoodLogs.foodID
			 WHERE AquariumLogs.aquariumID = ?
			 AND logDate >= DATE_SUB(NOW(), INTERVAL ? Day)
			 GROUP BY Food.name", array($aquariumID, $days));
	 }

   public function toArray()
   {
     return [
       'aquariumLogID' => (integer)$this->aquariumLogID,
       'foodID' => (integer)$this->foodID,
       'name' => $this->food->name
     ];
   }
}
