<?php

use Carbon\Carbon;  //TimePlugin?
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TEMPLATE
        // DB::table('t_dokter')
        // ->insert(
        //     [
        //         'id'=>'',
        //         'nama_dokter'=>'',
        //         'foto'=>'',
        //         'email'=>'',
        //         'no_telp'=>'',
        //         'id_spesialis'=>'',
        //         'id_tempat'=>'',
        //         'created_at'=>Carbon::now(),
        //         'updated_at'=>Carbon::now()
        //     ]
        // );
        
        DB::table('t_dokter')->insert(
            [
                'id'=>'nero-snowblade',
                'nama_dokter'=>'Nero Snowblade',
                'foto'=>'default.png',
                'email'=>'nerosnowblade@gmail.com',
                'no_telp'=>'081321294102',
                'id_spesialis'=>'optometry',
                'id_tempat'=>'rumah-sakit-indah',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_dokter')->insert(
            [
                'id'=>'luka-darkpale',
                'nama_dokter'=>'Luka Darkpale',
                'foto'=>'default.png',
                'email'=>'lukadarkpale@gmail.com',
                'no_telp'=>'08540295102',
                'id_spesialis'=>'dermatology',
                'id_tempat'=>'rumah-sakit-sehat',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_dokter')->insert(
            [
                'id'=>'rei-sabilillah',
                'nama_dokter'=>'Rei Sabilillah',
                'foto'=>'default.png',
                'email'=>'reichan@gmail.com',
                'no_telp'=>'08912315722',
                'id_spesialis'=>'ear-nose-throat',
                'id_tempat'=>'rumah-sakit-sehat',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );
        
        DB::table('t_dokter')->insert(
            [
                'id'=>'chen-chanistar',
                'nama_dokter'=>'Chen Chanistar',
                'foto'=>'default.png',
                'email'=>'chenstar123@gmail.com',
                'no_telp'=>'08538519284',
                'id_spesialis'=>'endocrinology',
                'id_tempat'=>'rumah-sakit-indah',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );
    }
}
