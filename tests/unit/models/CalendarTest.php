<?php

namespace Mater\Reservations\Tests\Unit\Models;

use Carbon\Carbon;
use PluginTestCase;
use Mater\Reservations\Models\Calendar;

class CalendarTest extends PluginTestCase
{
    public function testDeleteOldRecords()
    {
        $calendar = new Calendar();
        $calendar->date = Carbon::now()->subDays(2);
        $calendar->save();

        $calendar = new Calendar();
        $calendar->date = Carbon::now()->subDays(29);
        $calendar->save();

        $calendar = new Calendar();
        $calendar->date = Carbon::now()->subDays(49);
        $calendar->save();

        $calendar = new Calendar();
        $calendar->date = Carbon::now()->subDays(37);
        $calendar->save();

        $calendar = new Calendar();
        $calendar->date = Carbon::now()->subDays(61);
        $calendar->save();

        $calendar = new Calendar();
        $calendar->date = Carbon::now()->subDays(75);
        $calendar->save();

        $this->assertEquals(6, Calendar::count());

        Calendar::deleteOldRecords();

        $this->assertEquals(4, Calendar::withTrashed()->count());

        $this->assertEquals(2, Calendar::count());
    }
}
