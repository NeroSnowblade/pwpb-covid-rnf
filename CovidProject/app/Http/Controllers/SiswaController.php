<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data["nama"]   = "Luka";
        $data["jk"]     = "P";
        return view("belajar", $data);
    }

    public function DBtest()
    {
        $data["siswa"] = \DB::table('t_siswa')->get();
        return view("db",$data);
    }
}