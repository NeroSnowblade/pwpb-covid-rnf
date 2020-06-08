<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('nama_user');
            $table->string('gender');
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('password');
            $table->string('access')->default('user');
            
            $table->timestamps();
        });

        Schema::create('t_spesialis', function (Blueprint $table) {
            $table->string('id_spesialis');
            $table->string('nama_spesialis');
            $table->longText('deskripsi');
            $table->timestamps();
            $table->primary('id_spesialis');
        });
        
        Schema::create('t_tempat', function (Blueprint $table) {
            $table->string('id_tempat'); 
            $table->string('nama_tempat');
            $table->string('alamat');
            $table->string('foto');
            
            $table->timestamps();
            $table->primary('id_tempat');
        });
        
        Schema::create('t_dokter', function (Blueprint $table) {
            $table->string('id_dokter');
            $table->string('nama_dokter');
            $table->string('foto');
            $table->string('email');
            $table->string('no_telp');
            $table->string('id_spesialis');
            $table->string('id_tempat'); 
            $table->primary('id_dokter');
            $table->foreign('id_spesialis')->references('id_spesialis')->on('t_spesialis');
            $table->foreign('id_tempat')->references('id_tempat')->on('t_tempat');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_dokter');
        Schema::drop('t_tempat');
        Schema::drop('t_spesialis');
        Schema::drop('t_user');
    }
}
