<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AquariumFile extends Model {

	protected $table = 'Files';
	protected $guarded = array('fileID', 'aquariumID');
	public $primaryKey = 'fileID';
	protected $dates = ['createdAt', 'updatedAt'];
	public $timestamps = true;

	public static $thumbHeight = 160;
	public static $fullHeight = 2048;

	/* Relationships */
	public function aquarium()
	{
		return $this->belongsTo('App\Aquarium', 'aquariumID');
	}

  public function aquariumLogFile()
	{
		return $this->hasMany('App\AquariumLogFile', 'fileID');
	}


  public function filePath()
  {
    $path = "/files/".$this->userID."/".$this->fileID;
    return [
      'thumbnail' => "$path-thumb.".$this->fileType,
      'fullsize' => "$path-full.".$this->fileType,
    ];
  }

  public function toArray()
  {
    return [
      'fileID' => (integer)$this->fileID,
      'location' => $this->filePath(),
    ];
  }
}
