<head>
    <title>{{$tempat->nama_tempat}} - Web Kesehatan & Janji Dokter</title>
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
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

    <div class="row justify-content-center mt-3">
        <div class="alert alert-warning" role="alert">
            Pandemic Update -- Jaga Jarak, Rajin Cuci Tangan, dan #StayAtHome
          </div>
    </div>

    @php
    $spesialis = \DB::table('t_spesialis')->get();
    $dokter = \DB::table('t_dokter')->get();    
    @endphp

    <div class="col mt-3">
        <div class="row">
            <div class="col">
                {{-- Image --}}
                <img src="{{asset('storage/asset/tempat/'.$tempat->foto)}}" alt="{{$tempat->foto}}" class="rounded" style="width: 50rem">
            </div>
            <div class="col">
                {{-- Data --}}
                <h2>{{$tempat->nama_tempat}}</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i><b class="pre">  Alamat   :</b><br>{{$tempat->alamat}}</li>
                    <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i><b class="pre">  Telepon :</b><br><a href="tel:{{$tempat->telepon}}">{{$tempat->telepon}}</a></li>
                    <li class="list-group-item"><i class="fa fa-fax" aria-hidden="true"></i><b class="pre">  FAX       :</b><br><a href="tel:{{$tempat->fax}}">{{$tempat->fax}}</a></li>
                </ul>
                <br>
                <h4>Layanan yang Tersedia</h4>
                <ul class="list-group list-group-flush">
                    @foreach ($spesialis as $spe)
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($dokter as $dok)
                    @if ($spe->id == $dok->id_spesialis && $dok->id_tempat == $tempat->id && $count == 0)
                    <li class="list-group-item">
                      <a class="" href="{{url('/spesialis/'.$spe->id)}}">{{$spe->nama_spesialis}}</a>
                    </li>
                    @php
                        $count = 1;
                    @endphp
                    @endif
                    @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>