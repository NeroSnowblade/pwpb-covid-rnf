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
        //         'id'=>'',
        //         'nama_tempat'=>'',
        //         'alamat'=>'',
        //         'foto'=>'',
        //         'created_at'=>Carbon::now(),
        //         'updated_at'=>Carbon::now()
        //     ]
        // );
        
        DB::table('t_tempat')->insert(
            [
                'id'=>'rumah-sakit-sehat',
                'nama_tempat'=>'Rumah Sakit Sehat',
                'alamat'=>'Jl. Kebaktian Suci',
                'foto'=>'default.png',
                'telepon'=>'0221239812',
                'fax'=>'022128381293',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );
        
        DB::table('t_tempat')->insert(
            [
                'id'=>'rumah-sakit-indah',
                'nama_tempat'=>'Rumah Sakit Iehat',
                'alamat'=>'Jl. Kesejukan Suci',
                'foto'=>'default.png',
                'telepon'=>'0221239812',
                'fax'=>'022128381293',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );
    }
}
