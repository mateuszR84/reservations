<?php

namespace Mater\Reservations\Updates\Seeders;

use Seeder;
use Mater\Reservations\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        if (Client::count() == 0) {
            Client::create([
                'first_name' => 'Han',
                'last_name' => 'Solo',
                'phone_no' => '15991357',
                'email' => 'han@hoth.com'
            ]);

            Client::create([
                'first_name' => 'Obi-Wan',
                'last_name' => 'Kenobi',
                'phone_no' => '156489765',
                'email' => 'obi-wan@hoth.com'
            ]);

            Client::create([
                'first_name' => 'Lord',
                'last_name' => 'Vader',
                'phone_no' => '123456789',
                'email' => 'lord@hoth.com'
            ]);
        }
    }
}
