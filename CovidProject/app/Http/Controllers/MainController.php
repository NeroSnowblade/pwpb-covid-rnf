<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function spesialis($id)
    {
        $data["spesialis"] = \DB::table('t_spesialis')->get()->where('id_spesialis',$id);
        return view("spesialis", $data);
    }
}