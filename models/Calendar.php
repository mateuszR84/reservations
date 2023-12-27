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
        $hours = Self::get($day) ? Self::get($day) : $this->getAvailableHours($day);

        // TODO remove all records that are covered by reservation duration
        // if (($duration - 25) >= 25 ) {
        //     unset($hours[$startHour], $hours[$startHour + ]);
        // }

        return $hours;
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
