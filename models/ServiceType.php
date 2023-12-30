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

    public $fillable = [
        'service_name',
        'service_length',
        'service_price',
    ];

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

    public function getCurrency()
    {
        $currency = Settings::getCurrency();

        $symbols = [
            'PLN' => 'PLN',
            'USD' => 'usd',
            'EUR' => 'eur',
            'GBP' => 'gbp'
        ];

        $symbol = '';
        if (array_key_exists($currency, $symbols)) {
            $symbol = array_get($symbols, $currency);
        }

        return $symbol;
    }
}
