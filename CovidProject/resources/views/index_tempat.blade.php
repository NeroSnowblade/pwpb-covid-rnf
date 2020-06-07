{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>MisiDok - Web Kesehatan & Janji Dokter</title>
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
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
            {{-- Kalo Belum Login --}}
            <div class="col-auto"><a href="{{url("/user/login")}}">Login</a></div>
            <div class="col-auto"><a href="{{url("/user/register")}}">Register</a></div>
            {{-- Kalo Sudah Login --}}
        </div>
    </div>

    {{-- Code Goes Here... --}}
    <h2>{{$head}}</h2>
    <div class="card-deck">
        @foreach ($tempat as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{asset("img/".$item->foto)}}" class="card-img-top" alt="{{$item->foto}}">
            <div class="card-body">
              <h5 class="card-title">{{$item->nama_tempat}}</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Alamat : </b>{{$item->alamat}}</li>
                <li class="list-group-item"><b>Banyak Spesialis : </b></li>
                <li class="list-group-item"><b>Banyak Dokter : </b></li>
              </ul>
              <div class="card-body">
                  <a href="{{url('tempat/'.$item->id_tempat)}}" class="btn btn-primary">Details</a>
              </div>
            </div>
        </div>    
        @endforeach
    </div>
</div>