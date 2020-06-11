{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>{{$spesialis->nama_spesialis}} | MisiDok - Web Kesehatan & Janji Dokter</title>
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
</head>
{{-- Top Navbar --}}
<div class="container">
    <div class="row justify-content-between">
        <div class="row">
            <div class="col-xl-6"><h1>MisiDok</h1></div>
        </div>
        <div class="row">
            <div class="col-auto"><a href="{{url("/")}}">Home</a></div>
            <div class="col-auto"><a href="{{url("/spesialis")}}">Spesialis</a></div>
            <div class="col-auto"><a href="{{url("/tempat")}}">Tempat</a></div>
            @if ($session == 1)
            {{-- Kalo Sudah Login --}}
            @foreach ($Saccess as $item)
                @if ($item->access == 'admin')
                    <div class="col-auto"><a href="{{url('/admin')}}">Admin</a></div>
                    <div class="col-auto"><a href="{{url("/user/logout")}}">Log Out</a></div>
                @else
                    <div class="col-auto">Hello, {{$Susername}}</div>
                    <div class="col-auto"><a href="{{url("/user/logout")}}">Log Out</a></div>
                @endif
            @endforeach
            @else
            {{-- Kalo Belum Login --}}
            <div class="col-auto"><a href="{{url("/user/login")}}">Login</a></div>
            <div class="col-auto"><a href="{{url("/user/register")}}">Register</a></div>
            @endif
        </div>
    </div>
    
    <div class="col mt-3">
        <h2>{{$spesialis->nama_spesialis}}</h2>
        <p>{{$spesialis->deskripsi}}</p>
    </div>
    
    {{-- Tempat yang Menyediakan --}}
    <div class="col mt-3">
        <h2>Tempat yang Menyediakan Layanan</h2>
        @php
            $tempat = \DB::table('t_tempat')->get();
            $dokter = \DB::table('t_dokter')->get();
            $count = 0;
        @endphp
        @foreach ($tempat as $tem)
        @php
            $jml = 0;
        @endphp
        @foreach ($dokter as $dok)
        @if ($spesialis->id == $dok->id_spesialis && $dok->id_tempat == $tem->id && $jml == 0)
            @if ($count == 0 || $count % 2 == 0)
            <div class="card-deck mt-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{asset("storage/asset/tempat/".$tem->foto)}}" class="card-img-top" alt="{{$tem->foto}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$tem->nama_tempat}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i><b class="pre">  Alamat   : </b>{{$tem->alamat}}</li>
                            <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i><b class="pre">  Telepon  : </b>{{$tem->telepon}}</li>
                            <li class="list-group-item"><i class="fa fa-fax" aria-hidden="true"></i><b class="pre">  FAX        : </b>{{$tem->fax}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{url('tempat/'.$tem->id)}}" class="btn btn-primary">Details</a>
                      </div>
                    </div>
                </div>    
            @else
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{asset("storage/asset/tempat/".$tem->foto)}}" class="card-img-top" alt="{{$tem->foto}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$tem->nama_tempat}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i><b class="pre">  Alamat   : </b>{{$tem->alamat}}</li>
                            <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i><b class="pre">  Telepon  : </b>{{$tem->telepon}}</li>
                            <li class="list-group-item"><i class="fa fa-fax" aria-hidden="true"></i><b class="pre">  FAX        : </b>{{$tem->fax}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{url('tempat/'.$tem->id)}}" class="btn btn-primary">Details</a>
                      </div>
                    </div>
                </div>    
            </div>
            @endif
            @php
                $count++;
            @endphp
        @endif
        @endforeach
        @endforeach
    </div>
</div>
