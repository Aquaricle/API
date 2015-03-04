<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model {
	protected $table = 'EquipmentTypes';
	protected $guarded = array('equipmentTypeID');
	public $primaryKey = 'equipmentTypeID';
	public $timestamps = false;
}
