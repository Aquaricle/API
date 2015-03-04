<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AquariumLogFile extends Model {

	protected $table = 'AquariumLogFiles';
	protected $guarded = array('fileID', 'aquariumLogID');
//	public $primaryKey = 'fileID';
	public $timestamps = false;

	/* Relationships */
	public function file()
	{
		return $this->belongsTo('App\AquariumFile', 'fileID');
	}

	public function aquariumLog()
	{
		return $this->belongsTo('App\AquariumLog', 'aquariumLogID');
	}

  public function toArray()
  {
    return [
      'aquariumLogID' => (integer)$this->aquariumLogID,
      'fileID' => (integer)$this->fileID,
      'location' => $this->file->filePath(),
    ];
  }
}
