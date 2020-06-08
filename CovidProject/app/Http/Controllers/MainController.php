<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function sessionManager(Request $request)
    {
        // Session Logic
        if($request->session()->has('username') && $request->session()->has('password'))
        {
            $data['session'] = 1;
            $data['Susername'] = $request->session()->get('username');
            $data['Saccess'] = \DB::table('t_user')->where('username',$data['Susername'])->get();
            $data['idk'] = \DB::table('t_user')->select('access')->where('username',$data['Susername'])->get();
        }
        else
        {
            $data['session'] = 0;
        }

        return $data;
    }
    // Index Interaction
    public function index(Request $request)
    {
        $data = $this->sessionManager($request);
        return view("index",$data);
    }
    public function dataIndex(Request $request, $site)
    {
        $data = $this->sessionManager($request);
        $data["head"] = \ucwords($site);
        $data["url"] = url('/'.$site);
        $data[$site] = \DB::table('t_'.$site)->orderBy('nama_'.$site,'ASC')->get();
        return view("index_".$site, $data);
    }

    // Detailed Data Interaction
    public function dataDetail(Request $request, $site, $id)
    {
        $data = $this->sessionManager($request);
        $data['spesialis'] = \DB::table('t_spesialis')->get()->where('id_spesialis',$id);
        $data['dokter'] = \DB::table('t_dokter')->get()->where('id_dokter',$id);
        $data['tempat'] = \DB::table('t_tempat')->get()->where('id_tempat',$id);
        return view($site, $data);
    }

    // Account Interaction
    public function account(Request $request, $form)
    {
        $data = $this->sessionManager($request);
        return view("user_".$form, $data);
    }
    public function login(Request $request)
    {
        $rule   = [ 'username'=>'required',
                    'password'=>'required'
                  ];
        $this->validate($request, $rule);
        
        $data = \DB::table('t_user')->where([['username',$request->username],['password',$request->password]])->count();
        if ($data != 0) 
        {
            $request->session()->put('username',$request->username);
            $request->session()->put('password',$request->password);
            return redirect('/')->with('success', 'Login berhasil');
        }
        else
        {
            return redirect('/user/login')->with('error', 'Username atau Password mungkin salah');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('success','Berhasil Logout');
    }

    // DataPost Interaction
    public function postRegister(Request $request)
    {
        $rule   = [ 'username'=>'required', 
                    'nama_user'=>'required|string',
                    'gender'=>'required',
                    'tanggal_lahir'=>'required',
                    'email'=>'required',
                    'password'=>'required|min:8'
                  ];
        $this->validate($request, $rule);
        
        $request->tanggal_lahir = date('Y-m-d', strtotime($request->tanggal_lahir));
        $input  = $request->all();

        unset($input['_token']);
        $status = \DB::table('t_user')->insert($input);

        if($status)
        {
            return redirect('/user/register')->with('success', 'Akun Berhasil dibuat, Silakan menuju page Login untuk Masuk.');
        }
        else
        {
            return redirect('/user/register')->with('error', 'Akun Gagal dibuat, Silakan coba lagi');
        }
    }

    // Admin Interaction
    public function adminIndex(Request $request)
    {
        $data = $this->sessionManager($request);
        if ($data['session'] == 1) 
        {
            foreach ($data['Saccess'] as $key)
            {
                if($key->access == 'admin')
                {
                    // Admin Account
                    return view("admin.library",$data);
                }
                else
                {
                    // User Account
                    return redirect('/')->with('error','Hanya Admin yang dapat mengakses URL ini');
                }
            }
        }
        else
        {
            // Not Logged In
            return redirect('/')->with('error','Harap Login terlebih dahulu');
        }
    }
    public function tableIndex(Request $request, $site)
    {
        $data = $this->sessionManager($request);
        if ($data['session'] == 1 ) 
        {
            foreach ($data['Saccess'] as $key)
            {
                if($key->access == 'admin')
                {
                    // Admin Account
                    $data[$site] = \DB::table('t_'.$site)->get();
                    $data['i'] = 1;
                    return view("admin.table.table_$site", $data);
                }
                else
                {
                    // User Account
                    return redirect('/')->with('error','Hanya Admin yang dapat mengakses URL ini');
                }
            }
        }
        else
        {
            // Not Logged In
            return redirect('/')->with('error','Harap Login terlebih dahulu');
        }
        
    }
    public function tableData(Request $request, $site, $id)
    {
        $data = $this->sessionManager($request);
        if ($data['session'] == 1 ) 
        {
            foreach ($data['Saccess'] as $key)
            {
                if($key->access == 'admin')
                {
                    // Admin Account
                    return view("admin.form.form_$site",$data);
                }
                else
                {
                    // User Account
                    return redirect('/')->with('error','Hanya Admin yang dapat mengakses URL ini');
                }
            }
        }
        else
        {
            // Not Logged In
            return redirect('/')->with('error','Harap Login terlebih dahulu');
        }
    }
}