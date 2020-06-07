<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Index Interaction
    public function index()
    {
        return view("index");
    }
    public function dataIndex($site)
    {
        $data["head"] = \ucfirst($site);
        $data["url"] = url('/'.$site);
        $data[$site] = \DB::table('t_'.$site)->orderBy('nama_'.$site,'ASC')->get();
        return view("index_".$site, $data);
    }

    // Detailed Data Interaction
    public function data($site, $id)
    {
        $data['spesialis'] = \DB::table('t_spesialis')->get()->where('id_spesialis',$id);
        $data['dokter'] = \DB::table('t_dokter')->get()->where('id_dokter',$id);
        $data['tempat'] = \DB::table('t_tempat')->get()->where('id_tempat',$id);
        return view($site, $data);
    }
    
    // Account Interaction
    public function account($access, $form)
    {
        return view($access."_".$form);
    }
}