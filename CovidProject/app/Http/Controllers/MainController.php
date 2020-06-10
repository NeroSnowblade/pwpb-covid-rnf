<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $data['imgtest'] = \Storage::url('public/asset/dokter/default.png');
        return view("index",$data);
        // return \Storage::get('public/asset/dokter/default.png');;
    }
    public function dataIndex(Request $request, $site)
    {
        $data = $this->sessionManager($request);
        $data["url"] = url('/'.ucwords($site));
        $data["head"] = ucwords($site);
        $data[$site] = \DB::table('t_'.$site)->orderBy('nama_'.$site,'ASC')->get();
        return view("index_".$site, $data);
    }

    // Detailed Data Interaction
    public function dataDetail(Request $request, $site, $id)
    {
        $data = $this->sessionManager($request);
        // $data['spesialis'] = \DB::table('t_spesialis')->get()->where('id_spesialis',$id);
        $data['spesialis'] = \DB::table('t_spesialis')->find($id);
        $data['dokter'] = \DB::table('t_dokter')->find($id);
        $data['tempat'] = \DB::table('t_tempat')->find($id);
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
        $id_table = strtolower(str_replace(' ','-',$request->nama_user));
        $request->merge(['id' => $id_table]);
        $request->merge(['created_at' => Carbon::now()]);
        $request->merge(['updated_at' => Carbon::now()]);
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
                    $data['base_url'] = url('/admin/'.$site);
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
    public function tableCreate(Request $request, $site, $id)
    {
        $data = $this->sessionManager($request);
        if ($data['session'] == 1 ) 
        {
            foreach ($data['Saccess'] as $key)
            {
                if($key->access == 'admin')
                {
                    // Admin Account
                    $data['mode'] = $id;
                    $data['site'] = $site;
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
    public function tableEdit(Request $request, $site, $id, $row)
    {
        $data = $this->sessionManager($request);
        if ($data['session'] == 1 ) 
        {
            foreach ($data['Saccess'] as $key)
            {
                if($key->access == 'admin')
                {
                    // Admin Account
                    $data['mode'] = $id;
                    $data['site'] = $site;
                    $data[$site] = \DB::table('t_'.$site)->find($row);
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

    // Admin Data Table System
    public function tablePost(Request $request, $site, $id)
    {
        if($site == 'user')
        {
            $rule   = [ 'username'=>'required', 
                        'nama_user'=>'required|string',
                        'gender'=>'required',
                        'tanggal_lahir'=>'required',
                        'email'=>'required',
                        'access'=>'required',
                        'password'=>'required|min:8'
                      ];
                      $id_table = strtolower(str_replace(' ','-',$request->nama_user));
                      $request->tanggal_lahir = date('Y-m-d', strtotime($request->tanggal_lahir));
        }
        else if($site == 'dokter')
        {
            $rule   = [ 'nama_dokter'=>'required|string',
                        'email'=>'required',
                        'no_telp'=>'required',
                        'id_spesialis'=>'required',
                        'id_tempat'=>'required'
                      ];
                      $id_table = strtolower(str_replace(' ','-',$request->nama_dokter));
        }
        else if($site == 'spesialis')
        {
            $rule   = [ 'nama_spesialis'=>'required', 
                        'deskripsi'=>'required'
                      ];
                      $id_table = strtolower(str_replace(' ','-',$request->nama_spesialis));
        }
        else if($site == 'tempat')
        {
            $rule   = [ 'nama_tempat'=>'required', 
                        'alamat'=>'required',
                        'telepon'=>'required|numeric',
                        'fax'=>'required|numeric'
                      ];
                      $id_table = strtolower(str_replace(' ','-',$request->nama_tempat));
                      \Storage::put('public/asset/tempat/'.$request->foto, $request->foto);
        }
                  
        $this->validate($request, $rule);
        $request->merge(['id'=> $id_table]);
        $request->merge(['created_at' => Carbon::now()]);
        $request->merge(['updated_at' => Carbon::now()]);
        
                  
        $input  = $request->all();
        unset($input['_token']);
        $status = \DB::table('t_'.$site)->insert($input);
        
        if($status)
        {
            return redirect('/admin/'.$site)->with('success', 'Data berhasil ditambahkan');
        }
        else
        {
            return redirect('/admin/'.$site)->with('error', 'Data gagal ditambahkan');
        }
    }
    public function tableDelete(Request $request, $site, $id, $row)
    {
        $status = \DB::table('t_'.$site)->where('id', $row)->delete();

        if($status)
        {
            return redirect('/admin/'.$site)->with('success', 'Data Berhasil dihapus');
        }
        else
        {
            return redirect('/admin/'.$site)->with('error', 'Data Gagal dihapus');
        }
    }
    public function tableUpdate(Request $request, $site, $id, $row)
    {
        if($site == 'user')
        {
            $rule   = [ 'username'=>'required', 
                        'nama_user'=>'required|string',
                        'gender'=>'required',
                        'tanggal_lahir'=>'required',
                        'email'=>'required',
                        'access'=>'required',
                        'password'=>'required|min:8'
                      ];
            $request->tanggal_lahir = date('Y-m-d', strtotime($request->tanggal_lahir));
        }
        else if($site == 'dokter')
        {
            $rule   = [ 'nama_dokter'=>'required|string',
                        'email'=>'required',
                        'no_telp'=>'required',
                        'id_spesialis'=>'required',
                        'id_tempat'=>'required'
                      ];
        }
        else if($site == 'spesialis')
        {
            $rule   = [ 'nama_spesialis'=>'required', 
                        'deskripsi'=>'required'
                      ];
        }
        else if($site == 'tempat')
        {
            $rule   = [ 'nama_tempat'=>'required', 
                        'alamat'=>'required',
                        'telepon'=>'required|numeric',
                        'fax'=>'required|numeric'
                      ];
                      \Storage::put('public/asset/tempat/'.$request->foto, $request->foto);
        }
                  
        $this->validate($request, $rule);
        
        $request->input('updated_at', Carbon::now());
                  
        $input  = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = \DB::table('t_'.$site)->where('id', $row)->update($input);

        if($status)
        {
            return redirect('/admin/'.$site)->with('success', 'Data berhasil diubah');
        }
        else
        {
            return redirect('/admin/'.$site)->with('error', 'Data gagal diubah');
        }
    }
}