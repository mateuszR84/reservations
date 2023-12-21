<?php namespace Mater\Reservations\Models;

use Model;

/**
 * Client Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Client extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_reservations_clients';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_no' => 'required',
        'email' => 'email'
    ];

    public $hasMany = [
        'reservations' => Reservation::class,   
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;  
    }
}
