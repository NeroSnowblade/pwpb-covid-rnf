<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_user')->insert(
            [
                'id' => 'admin',
                'username' => 'admin',
                'nama_user' => 'admin',
                'gender' => 'L',
                'tanggal_lahir' => '2002/10/30',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'access' => 'admin',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );
    }
}
