<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use Auth;
use App\Aquarium;

class AquariumController extends Controller
{

	function __construct()
	{

	}

	public function index()
	{
		return Aquarium::byAuthUser()->select('aquariumID', 'name')->get();
	}

	public function get($aquariumID)
	{
		if ($aquariumID == null)
			return;
		return Aquarium::singleAquarium($aquariumID);
	}

}
