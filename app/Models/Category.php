<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'status',
        'created_by',
    ];

    public $translatable = [
        'title',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function getUserNameAttribute()
    {
        return $this->user && $this->user->username ? $this->user->username : "<span style='color:red;'>Нет значение</span>";
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
    public function news()
    {
        return $this->hasMany('App\Models\News', 'category_id', 'id');
    }

}
