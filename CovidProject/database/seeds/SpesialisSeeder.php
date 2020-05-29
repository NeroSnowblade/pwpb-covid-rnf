<?php

use Carbon\Carbon; //TimePlugin?
use Illuminate\Database\Seeder;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TEMPLATE
        // DB::table('t_spesialis')->insert(
        //     [
        //         'id_spesialis'=>'',
        //         'nama_spesialis'=>'',
        //         'created_at'=>Carbon::now(),
        //         'updated_at'=>Carbon::now()
        //     ]
        // );

        DB::table('t_spesialis')->insert(
            [
                'id_spesialis'=>'ear-nose-throat',
                'nama_spesialis'=>'Ear, Nose, Throat',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_spesialis')->insert(
            [
                'id_spesialis'=>'endocrinology', 
                'nama_spesialis'=>'Endocrinology', 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_spesialis')->insert(
            [
                'id_spesialis'=>'dermatology', 
                'nama_spesialis'=>'Dermatology', 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_spesialis')->insert(
            [
                'id_spesialis'=>'optometry', 
                'nama_spesialis'=>'Optometry', 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
        );
    }
}
