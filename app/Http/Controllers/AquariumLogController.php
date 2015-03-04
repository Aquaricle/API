<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use Auth;
use Response;
use Input;
use DB;
use App\AquariumLog;

class AquariumLogController extends Controller
{

	function __construct()
	{

	}

	public function index($aquariumID)
	{
		$limit = Input::get('limit') ?: 30;

		if($limit > 100)
			return Response::json(['error' => ['message' => 'Requested limit too high']], 403);

		$logs = AquariumLog::where('aquariumID', '=', $aquariumID)
			->orderBy('logDate', 'desc')
			->simplePaginate($limit);

		foreach ($logs as $log)
			$log = $log->toArray();
    return Response::json($logs, 200);
	}

	public function show($aquariumID, $aquariumLogID)
	{
		DB::beginTransaction();

		$aquariumLog = AquariumLog::where('aquariumID', '=', $aquariumID)
			->where('aquariumLogID', '=', $aquariumLogID)
			->first();

		if(!$aquariumLog)
		{
			DB::rollback();
			return Response::json(['error' => ['message' => 'Log not found']], 404);
		}
		$aquariumLog->toArray();

		DB::commit();
		return Response::json($aquariumLog, 200);
	}

}
