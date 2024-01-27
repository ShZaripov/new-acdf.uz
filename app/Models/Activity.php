<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Activity extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'body',
        'image',
        'status',
        'created_by',
    ];

    public $translatable = [
        'title',
        'body',
        'description'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function getUserNameAttribute()
    {
        return $this->user && $this->user->username ? $this->user->username : "<span style='color:red;'>Нет значение</span>";
    }

    public function delete()
    {
        deleteImage($this->image);

        parent::delete();

        return true;
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title ? $this->title : "<span style='color:red;'>Нет значение</span>";
    }

    public function getStatusNameAttribute()
    {
        $statuses = \Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }
}
