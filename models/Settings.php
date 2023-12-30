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

    public function getFrequencyOptions()
    {
        return [
            'daily' => 'mater.reservations::lang.settings.general.frequency_daily',
            'weekly' => 'mater.reservations::lang.settings.general.frequency_weekly',
            'monthly' => 'mater.reservations::lang.settings.general.frequency_monthly',
            'custom' => 'mater.reservations::lang.settings.general.frequency_custom',
        ];    
    }

    public function getUnitOptions()
    {
        return [
            'day' => 'mater.reservations::lang.settings.general.frequency_day',
            'week' => 'mater.reservations::lang.settings.general.frequency_week',
            'month' => 'mater.reservations::lang.settings.general.frequency_month',
        ];    
    }

    public static function getDailyReminder(): array
    {
        $dailyReminder = [
            'is_enabled' => Self::instance()->daily_reminder,
            'frequency' => Self::instance()->frequency,
            'sent_at' => Self::instance()->hour_sent,
        ];   

        if (Self::instance()->frequency == 'custom') {
            $dailyReminder = array_merge($dailyReminder, [
                'frequency_custom' => Self::instance()->frequency_custom
            ]);
        }

        return $dailyReminder;
    }
}
