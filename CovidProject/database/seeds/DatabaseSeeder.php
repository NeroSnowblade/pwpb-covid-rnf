<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Command : php artisan db:seed
     * @return void
     */
    public function run()
    {
        // EXAMPLE $this->call(UsersTableSeeder::class);
        $this->call(SpesialisSeeder::class);
        $this->call(TempatSeeder::class);
        // $this->call(DokterSeeder::class);        Cara Worknya gimana qwq
    }
}
