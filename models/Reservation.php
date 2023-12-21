<?php namespace Mater\Reservations\Models;

use Model;
use Mater\Reservations\Models\Client;

/**
 * Reservation Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Reservation extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_reservations_reservations';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsTo = [
        'client' => Client::class,
        'service' => ServiceType::class,
    ];

    public function getClientNameAttribute()
    {
        return $this->client()->first()->full_name;
    }
}
