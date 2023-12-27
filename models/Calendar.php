<?php namespace Mater\Reservations\Models;

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

    /**
     * @var string table name
     */
    public $table = 'mater_reservations_calendars';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public function addReservationToCalendar($hour, $length) 
    {
        if (empty($this->date)) {
            $this->saveReservation($this->date, $hour, $length);
        }

        $weekDay = Carbon::parse($this->date)->format('l');

        $openingHours = Settings::getOpeningHoursForDay($weekDay);


    }

    public function saveReservation($date, $hours, $length)
    {
        $this->date = $date;
        
        $this->reservation_hours = $this->updateAvailableHours($hours, $length);
    }

    public function updateAvailableHours(string $hours = null, string $length = null): array
    {
        $availableHours = $this->reservation_hours;
        if (empty($availableHours)) {
            
        } 
        
    }

    public static function getAvailableHours($day): array
    {
        $slots = [];
        $weekDay = strtolower(Carbon::parse($day)->format('l'));

        $openingHours = Settings::getOpeningHoursForDay($weekDay);
        $parts = explode('-', $openingHours);
        $startTime = Carbon::createFromFormat('H:i', $parts[0]);
        $endTime = Carbon::createFromFormat('H:i', $parts[1]);
        $interval = 25;

        while($startTime <= $endTime) {
            $closingTimeCountdown = $startTime->diffInMinutes($endTime);
            if ($closingTimeCountdown <= $interval) {
                break;
            }
            $slots[$startTime->format('H:i')] = $startTime->format('H:i');
            $startTime = $startTime->addMinutes($interval);
        }

        return $slots;
    }
}
