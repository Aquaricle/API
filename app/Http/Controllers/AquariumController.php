<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Aquarium;

class AquariumController extends Controller
{

	function __construct()
	{

	}

	public function index()
	{
		return self::getAquariums();
	}

	public function getIndex()
	{
		return self::getAquariums();
	}

	public function getAquariums()
	{
		return Aquarium::get();
	}
}
