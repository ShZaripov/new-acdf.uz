<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Employee extends Model
{
  use HasTranslations;
  
  protected $fillable = [
  	'image',
  	'name',
  	'position',
  	'description',
  ];

  public $translatable = [
  	'name',
  	'position',
  	'description',
  ];

  public function delete()
  {
    deleteImage($this->image);

    parent::delete();

    return true;
  }

  public function getNameDisplayAttribute()
  {
  	return $this->name?$this->name:"<span style='color:red;'>Нет значение</span>";
  }

  public function getPositionDisplayAttribute()
  {
  	return $this->position?$this->position:"<span style='color:red;'>Нет значение</span>";
  }

}
