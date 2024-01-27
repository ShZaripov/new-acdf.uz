<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;

/**
 *
 * @property int            $id
 * @property int            $type
 * @property string         $title
 * @property string         $description
 * @property string         $content
 * @property int            $order
 * @property int            $status
 * @property string         $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool           $status_name
 * @property bool           $type_name
 */
class Blocks extends Model
{
    use HasTranslations;

    protected $fillable = [
        'type',
        'title',
        'description',
        'content',
        'order',
        'status',
        'image',
    ];

    public $translatable = [
        'title',
        'description',
        'content',
    ];

    public function getStatusNameAttribute()
    {
        $statuses = Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }

    public function getTypeNameAttribute()
    {
        $types = Config::get('settings.blocks_types');
        $type  = isset($types[$this->type]) ? $types[$this->type] : false;
        return $type;
    }

    public function delete()
    {
        deleteImage($this->image);
        return parent::delete();
    }
}