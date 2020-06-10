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
        //         'id'=>'',
        //         'nama_spesialis'=>'',
        //         'deskripsi'=>'',
        //         'created_at'=>Carbon::now(),
        //         'updated_at'=>Carbon::now()
        //     ]
        // );

        DB::table('t_spesialis')->insert(
            [
                'id'=>'ear-nose-throat',
                'nama_spesialis'=>'Ear, Nose, Throat',
                'deskripsi'=>'Ear, nose and throat physicians are trained in the medical and surgical management and treatment of patients with diseases and disorders of the ear, nose, throat (ENT), and related structures of the head and neck.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_spesialis')->insert(
            [
                'id'=>'endocrinology', 
                'nama_spesialis'=>'Endocrinology', 
                'deskripsi'=>'Endocrinologists are experts at diagnosing and treating a number of diseases and disorders, ranging from diabetes to thyroid disorders.', 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_spesialis')->insert(
            [
                'id'=>'dermatology', 
                'nama_spesialis'=>'Dermatology', 
                'deskripsi'=>'Dermatologists offer a full range of services for patients with skin disorders. Patients are seen for common conditions such as acne, eczema, dermatitis, psoriasis, rosacea, warts and common skin infections, as well as more complex skin disorders.', 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
        );

        DB::table('t_spesialis')->insert(
            [
                'id'=>'optometry', 
                'nama_spesialis'=>'Optometry', 
                'deskripsi'=>'Optometry is comprehensive, professional eye care performed by optometric physicians (known as an optometrists) who examine, diagnose, treat and manage diseases and disorders of the visual system, the eye and associated structures as well as diagnose related systemic conditions.', 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
        );
    }
}
