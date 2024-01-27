<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
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

    public function createdBy()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title ? $this->title : "<span style='color:red;'>Нет значение</span>";
    }

    public function getCreatedByDisplayAttribute()
    {
        $user = User::where('id', $this->created_by)->first();
        return $user ? $user->username : "<span style='color:red;'>Нет значение</span>";
    }

    public function getStatusNameAttribute()
    {
        $statuses = \Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }
    public function new()
    {
        return $this->belongsToMany('App\News');
    }
}
