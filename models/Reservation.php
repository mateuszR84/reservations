<?php

namespace Mater\Reservations\Models;

use Lang;
use Mail;
use Model;
use Carbon\Carbon;
use ApplicationException;
use Mater\Reservations\Models\Client;
use Mater\Reservations\Models\Employee;

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
        'employee' => Employee::class,
    ];

    public function getClientNameAttribute()
    {
        return $this->client()->first()->full_name;
    }

    public function getNotificationMethodOptions()
    {
        return [
            'phone' => 'mater.reservations::lang.misc.notification.phone',
            'email' => 'mater.reservations::lang.misc.notification.email',
            'both' => 'mater.reservations::lang.misc.notification.both',
        ];
    }

    public function beforeSave()
    {
        if (($this->notification_method !== 'phone') && empty($this->client->email)) {
            throw new ApplicationException(Lang::get('mater.reservations::lang.misc.notification.no_email'));
        }

        $day = Carbon::parse($this->date)->format('Y-m-d');
        $duration = $this->service->service_length;
        (new Calendar)->set($day, $this->hour, $duration);
    }

    public function afterSave()
    {
        if ($this->notification_method !== 'phone') {
            $this->sendEmail();
        }
    }

    public function sendEmail()
    {
        $serviceType = ServiceType::find($this->service_id)->pluck('service_name');

        $data = [
            'date' => $this->date,
            'serviceType' => $serviceType,
        ];

        Mail::send('mater.reservations::mail.reservation_confirmation', $data, function ($message) {
            $message->to($this->client->email, $this->client->first_name);
        });
    }

    public function getHourOptions()
    {
        $day = Carbon::parse($this->date)->format('Y-m-d');

        return Calendar::get($day) ? Calendar::get($day) : Calendar::getAvailableHours($day);
    }
}
