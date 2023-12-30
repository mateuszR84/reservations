<?php

namespace Mater\Reservations\Updates\Seeders;

use Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(\Mater\Reservations\Updates\Seeders\ClientSeeder::class);
        $this->call(\Mater\Reservations\Updates\Seeders\ServiceSeeder::class);
        $this->call(\Mater\Reservations\Updates\Seeders\EmployeeSeeder::class);
    }
}
