<?php namespace App;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
//    use SoftDeletingTrait;

	protected $table = 'Equipment';
	protected $guarded = array('equipmentID');
	protected $dates = ['createdAt', 'updatedAt', 'deletedAt'];
	public $primaryKey = 'equipmentID';
	public $timestamps = true;

	public function equipmentType()
	{
		return $this->belongsTo('App\EquipmentType', 'equipmentTypeID');
	}

	public function nextMaintClass()
	{
		if(!isset($this->nextMaintDays))
			return "equipmentMaintDays";
		if($this->nextMaintDays > 2)
			return "equipmentMaintDays";
		if($this->nextMaintDays > 1)
			return "equipmentMaintDueSoon";
		if($this->nextMaintDays > 0)
			return "equipmentMaintDue";
		return "equipmentMaintOverdue";
	}

	public function scopeByLastMaintenance($query, $aquariumID)
	{
		return $query->select(DB::raw(
				'Equipment.equipmentID, Equipment.name,
				MAX(AquariumLogs.logDate) AS lastMaint,
				DATEDIFF(UTC_TIMESTAMP(), MAX(AquariumLogs.logDate)) AS daysSinceMaint,
				CAST(Equipment.maintInterval AS signed) - DATEDIFF(UTC_TIMESTAMP(),
				MAX(AquariumLogs.logDate)) AS nextMaintDays'))
			->leftjoin('EquipmentLogs', function($join)
			{
				$join->on('EquipmentLogs.equipmentID', '=', 'Equipment.equipmentID')
					->where('EquipmentLogs.maintenance', '=', 'Yes');
			})
			->leftjoin('AquariumLogs',
				'AquariumLogs.aquariumLogID', '=', 'EquipmentLogs.aquariumLogID')
			->where('Equipment.aquariumID', '=', $aquariumID)
			->whereNotNull('maintInterval')
			->whereNull('Equipment.deletedAt')
			->groupby('Equipment.equipmentID')
			->orderby('nextMaintDays', 'asc')
			->get();
	}
}
