<?php

namespace Mater\Reservations\Models;

use Model;
use Carbon\Carbon;

/**
 * Calendar Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Calendar extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var string table name
     */
    public $table = 'mater_reservations_calendars';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $dates = [
        'deleted_at'
    ];

    public $fillable = [
        'date',
        'reservations_hours',
    ];

    public $jsonable = [
        'reservations_hours',
    ];

    public static function get(string $day)
    {
        $model = Self::getModel($day);

        return $model->reservations_hours;
    }

    public static function getModel($day)
    {
        $model = Self::where('date', $day)->firstOrCreate([
            'date' => $day,
        ]);

        return $model;
    }

    public function set(string $day, $startHour = null, $duration = null)
    {
        $reservationForDay = Self::getModel($day);
        $reservationForDay->reservations_hours = $this->updateAvailableHours($day, $startHour, $duration);
        $reservationForDay->save();
    }

    public function updateAvailableHours($day, $startHour, $duration): array
    {
        $timeSlots = Self::get($day) ? Self::get($day) : $this->getAvailableHours($day);

        $availableSlots = [];

        foreach ($timeSlots as $timeSlot) {
            $reservationEnd = Carbon::parse($startHour)->addMinutes($duration - 1);

            $isTimeSlotReserved = false;
            for ($current = Carbon::parse($startHour); $current <= $reservationEnd; $current = $current->addMinutes(25)) {
                if ($timeSlot == $current->format('H:i')) {
                    $isTimeSlotReserved = true;
                    break;
                }
            }

            if (!$isTimeSlotReserved) {
                $availableSlots[$timeSlot] = $timeSlot;
            }
        }

        return $availableSlots;
    }

    public static function getAvailableHours(?string $day = 'monday'): array
    {
        $slots = [];
        $weekDay = strtolower(Carbon::parse($day)->format('l'));

        $openingHours = Settings::getOpeningHoursForDay($weekDay) ? Settings::getOpeningHoursForDay($weekDay) : '9:00-17:00';
        $parts = explode('-', $openingHours);
        $startTime = Carbon::createFromFormat('H:i', $parts[0]);
        $endTime = Carbon::createFromFormat('H:i', $parts[1]);
        $interval = 25;

        while ($startTime <= $endTime) {
            $closingTimeCountdown = $startTime->diffInMinutes($endTime);
            if ($closingTimeCountdown <= $interval) {
                break;
            }
            $slots[$startTime->format('H:i')] = $startTime->format('H:i');
            $startTime = $startTime->addMinutes($interval);
        }

        return $slots;
    }

    public static function deleteOldRecords(): void
    {
        $calendars = Self::all();
        foreach ($calendars as $calendar) {
            if (Carbon::parse($calendar->date)->lte(Carbon::now()->subDays(30))) {
                $calendar->delete();
            }

            if (Carbon::parse($calendar->date)->lte(Carbon::now()->subDays(60))) {
                $calendar->forceDelete();
            }
        }
    }
}
