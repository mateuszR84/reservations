<?php namespace Mater\Reservations\Models;

use Model;

/**
 * ServiceType Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class ServiceType extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_reservations_service_types';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $hasMany = [
        'reservations' => Reservation::class,   
    ];
}
