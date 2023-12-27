<?php namespace Mater\Reservations\Models;

use Model;

/**
 * Employee Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Employee extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    protected $slugs = [
        'slug' => ['first_name', 'last_name']
    ];

    /**
     * @var string table name
     */
    public $table = 'mater_reservations_employees';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $attachOne = [
        'avatar' => \System\Models\File::class
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
