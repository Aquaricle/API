<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use Auth;
use App\AquariumLog;

class AquariumLogController extends Controller
{

	function __construct()
	{

	}

	public function index($aquariumID)
	{
    return AquariumLog::where('aquariumID', '=', $aquariumID)
      ->orderBy('logDate', 'desc')
      ->paginate(20);
	}
}
