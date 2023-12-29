<?php namespace Mater\Reservations;

use Backend;
use Carbon\Carbon;
use System\Classes\PluginBase;
use Mater\Reservations\Models\Calendar;

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
        //
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
        })->dailyAt('08:00');
    }
}
