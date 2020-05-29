<?php

use Carbon\Carbon;  //TimePlugin?
use Illuminate\Database\Seeder;

class TempatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TEMPLATE
        // DB::table('t_tempat')->insert(
        //     [
        //         'id_tempat'=>'',
        //         'nama_tempat'=>'',
        //         'alamat'=>'',
        //         'foto'=>'',
        //         'created_at'=>Carbon::now(),
        //         'updated_at'=>Carbon::now()
        //     ]
        // );
        
        DB::table('t_tempat')->insert(
            [
                'id_tempat'=>'rumah-sakit-sehat',
                'nama_tempat'=>'Rumah Sakit Sehat',
                'alamat'=>'Jl. Kebaktian Suci',
                'foto'=>'',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );
    }
}
