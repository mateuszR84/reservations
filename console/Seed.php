<?php

namespace Mater\Reservations\Console;

use App;
use Illuminate\Console\Command;
use Mater\Reservations\Updates\Seeders\DatabaseSeeder;

class Seed extends Command
{
    protected $name = 'seed:db';
    protected $description = 'Seed database with dummy data';

    public function handle()
    {
        $this->seed();
    }

    public function seed()
    {
        App::make(DatabaseSeeder::class)->run();
    }
}
