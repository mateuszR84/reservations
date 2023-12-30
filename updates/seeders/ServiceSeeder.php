<?php

namespace Mater\Reservations\Updates\Seeders;

use Seeder;
use Mater\Reservations\Models\ServiceType;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        if (ServiceType::count() == 0) {
            ServiceType::create([
                'service_name' => 'C3-PO',
                'service_length' => '25',
                'service_price' => '120',
            ]);

            ServiceType::create([
                'service_name' => 'R2-D2',
                'service_length' => '50',
                'service_price' => '50',
            ]);

            ServiceType::create([
                'service_name' => 'AT-AT',
                'service_length' => '60',
                'service_price' => '150',
            ]);
        }
    }
}
