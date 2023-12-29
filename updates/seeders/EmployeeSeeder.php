<?php

namespace Mater\Reservations\Updates\Seeders;

use Seeder;
use Mater\Reservations\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'first_name' => 'Jabba',
            'last_name' => 'The Hutt',
            'phone_no' => '77885511',
            'email' => 'jabba@hoth.com'
        ]);

        Employee::create([
            'first_name' => 'Luke',
            'last_name' => 'Skywalker',
            'phone_no' => '3231654987',
            'email' => 'luke@hoth.com'
        ]);
    }
}
