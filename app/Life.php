<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Life extends Model {

	protected $table = 'Life';
	protected $guarded = array('lifeID', 'userID');
	public $primaryKey = 'lifeID';
	public $timestamps = false;

	/* Relationships */
	public function user()
	{
		return $this->belongsTo('App\User', 'userID');
	}

	public function lifeType()
	{
		return $this->belongsTo('App\LifeType', 'lifeTypeID');
	}

}
