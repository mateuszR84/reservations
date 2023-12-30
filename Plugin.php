<?php namespace Mater\Reservations;

use Backend;
use Carbon\Carbon;
use System\Classes\PluginBase;
use Mater\Reservations\Models\Calendar;
use Mater\Reservations\Models\Settings;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->registerConsoleCommand('seed.database', \Mater\Reservations\Console\Seed::class);
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Mater\Reservations\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mater.reservations.some_permission' => [
                'tab' => 'Reservations',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'reservations' => [
                'label' => 'mater.reservations::lang.settings.label',
                'description' => 'mater.reservations::lang.settings.description',
                'category' => 'mater.reservations::lang.settings.category',
                'icon' => 'icon-ticket',
                'class' => 'Mater\Reservations\Models\Settings',
                'order' => 100,
            ]
        ];
    }

    public function registerSchedule($schedule)
    {
        $schedule->call(function () {
            Calendar::deleteOldRecords();
        })->dailyAt('09:00');

        $dailyReminder = Settings::getDailyReminder();
        if($dailyReminder['is_enabled'] == 1){
            $schedule->call(function () {
            //TODO send email
            })->dailyAt($dailyReminder['sent_at']);
        }
    }


}
