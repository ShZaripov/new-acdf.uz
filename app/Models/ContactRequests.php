<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int            $id
 * @property string         $name
 * @property string         $email
 * @property string         $subject
 * @property string         $message
 * @property boolean        $checked
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class ContactRequests extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'address',
        'tel_num',
        'social_media_account',
        'educational',
        'failOf_studies',
        'yearOfStudies',
        'email',
        'expected_year_graduation',
        'will_you_still',
        'can_you_be_fully',
        'english_level',
        'other_languages',
        'about_you_eng',
        'citizen',      
        'message',
        'checked',
    ];
}