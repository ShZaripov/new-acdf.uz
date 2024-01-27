<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
	
  protected $fillable = [
  	'title',
  	'icon',
    'url',
  ];

  public function delete()
  {
    deleteStorageFile($this->icon);

    parent::delete();

    return true;
  }

}
