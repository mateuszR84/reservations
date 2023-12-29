<?php namespace Mater\Reservations\Models;

use Model;

/**
 * Settings Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'mater_reservations_settings';

    public $settingsFields = 'fields.yaml';

    public $attachOne = [
        'logo' => \System\Models\File::class,
    ];

    public static function getOpeningHoursForDay($day)
    {
        return self::instance()->$day;
    }

    public function getCurrencyOptions()
    {
        return [
            'PLN' => 'mater.reservations::lang.misc.currency.pln',
            'EUR' => 'mater.reservations::lang.misc.currency.eur',
            'USD' => 'mater.reservations::lang.misc.currency.usd',
            'GBP' => 'mater.reservations::lang.misc.currency.gbp',
        ];
    }

    public static function getCurrency()
    {
        return self::instance()->currency;
    }
}
