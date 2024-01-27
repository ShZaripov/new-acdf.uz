<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $table = "form";
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'country_city',
        'country_residence',
        'address',
        'phone',
        'social_media_account',
        'educational',
        'failOf_studies',
        'yearOfStudies',
        'email',
        'expected_year_graduation',
        'will_you_still',
        'can_you_be_fully',
        'english_level',
        'level_of_italian',
        'other_languages',
        'about_you_eng',
        'Citizenship',           
    ];
}
