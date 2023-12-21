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
}
