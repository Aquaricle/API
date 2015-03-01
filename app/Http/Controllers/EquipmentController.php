<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use Auth;
use App\Equipment;

class EquipmentController extends Controller
{

  public function getMaintenance($aquariumID, $state = null)
  {
    return Equipment::byLastMaintenance($aquariumID);

    /*
    if($state == 'active')
    {
      return Equipment::where('aquariumID', '=', $aquariumID)
       ->join('EquipmentTypes',
         'EquipmentTypes.equipmentTypeID',
         '=',
         'Equipment.equipmentTypeID')
       ->whereNull('deletedAt')
       ->select('equipmentID', 'name', 'typeName', 'purchasePrice', 'createdAt', 'maintInterval')
       ->get();
     }
     if($state == 'inactive')
     {
       return Equipment::where('aquariumID', '=', $aquariumID)
   			->join('EquipmentTypes',
   				'EquipmentTypes.equipmentTypeID',
   				'=',
   				'Equipment.equipmentTypeID')
   			->whereNotNull('deletedAt')
   			->select('equipmentID', 'name', 'typeName', 'purchasePrice', 'createdAt', 'deletedAt', 'maintInterval')
   			->get();
     }
     return Equipment::where('aquariumID', '=', $aquariumID)
       ->join('EquipmentTypes',
         'EquipmentTypes.equipmentTypeID',
         '=',
         'Equipment.equipmentTypeID')
       ->select('equipmentID', 'name', 'typeName', 'purchasePrice', 'createdAt', 'deletedAt', 'maintInterval')
       ->get();
       */
  }
}
