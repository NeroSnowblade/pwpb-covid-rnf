{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
@foreach ($spesialis as $item)
<head>
    <title>{{$item->nama_spesialis}} | MisiDok - Web Kesehatan & Janji Dokter</title>
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
            <div class="col-auto"><a href="{{url("/user/login")}}">Login</a></div>
            <div class="col-auto"><a href="{{url("/user/register")}}">Register</a></div>
        </div>
    </div>
    
    <div class="col">
        <h1>{{$item->nama_spesialis}}</h1>
        <p>{{$item->deskripsi}}</p>
    </div>
</div>

@endforeach