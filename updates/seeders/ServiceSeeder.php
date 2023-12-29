<?php

namespace Mater\Reservations\Updates\Seeders;

use Seeder;
use Mater\Reservations\Models\ServiceType;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        ServiceType::create([
            'service_name' => 'Service 1',
            'service_length' => '25',
            'service_price' => '120',
        ]);

        ServiceType::create([
            'service_name' => 'Service 2',
            'service_length' => '50',
            'service_price' => '50',
        ]);

        ServiceType::create([
            'service_name' => 'Service 3',
            'service_length' => '60',
            'service_price' => '150',
        ]);
    }
}
