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
            $table->string('id');
            $table->string('username');
            $table->string('nama_user');
            $table->string('gender');
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('password');
            $table->string('access')->default('user');
            
            $table->timestamps();
            $table->primary('id');
        });

        Schema::create('t_spesialis', function (Blueprint $table) {
            $table->string('id');
            $table->string('nama_spesialis');
            $table->longText('deskripsi');
            $table->timestamps();
            $table->primary('id');
        });
        
        Schema::create('t_tempat', function (Blueprint $table) {
            $table->string('id'); 
            $table->string('nama_tempat');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('fax');
            $table->string('foto')->default('default.png');
            
            $table->timestamps();
            $table->primary('id');
        });
        
        Schema::create('t_dokter', function (Blueprint $table) {
            $table->string('id');
            $table->string('nama_dokter');
            $table->string('foto')->default('default.png');
            $table->string('email');
            $table->string('no_telp');
            $table->string('id_spesialis');
            $table->string('id_tempat'); 
            $table->primary('id');
            $table->foreign('id_spesialis')->references('id')->on('t_spesialis');
            $table->foreign('id_tempat')->references('id')->on('t_tempat');
            
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
