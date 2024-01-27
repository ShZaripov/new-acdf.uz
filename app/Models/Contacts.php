<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contacts extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'number',
        'message',
    ];
}
