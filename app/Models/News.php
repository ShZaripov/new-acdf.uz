<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;

    protected $fillable = [
 	// 'subject_id',
        'title',
        'name',
        'content',
        'description',
        'image',
        'status',
        'date',
        'albums_id',
        'category_id',
        'created_by'
    ];

    public $translatable = [
        'title',
        'content',
        'description'
    ];

    public function subject()
    {
        return $this->hasOne('App\Models\NewsSubject', 'id', 'subject_id');
    }
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function delete()
    {
        deleteImage($this->image);

        parent::delete();

        return true;
    }

    public function getSubjectTitleAttribute()
    {
        return $this->subject && $this->subject->title ? $this->subject->title : "<span style='color:red;'>Нет значение</span>";
    }
    public function getCategoryTitleAttribute()
    {
        return $this->category && $this->category->title ? $this->category->title : "<span style='color:red;'>Нет значение</span>";
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

    public function album()
    {
        return $this->hasOne('App\Models\Albums', 'id', 'albums_id');
    }

    public function albumSite()
    {
        return $this->album()->where('status', 1);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'new_tag', 'new_id', 'tag_id');
    }
}
