{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Admin Library - Web Kesehatan & Janji Dokter</title>
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
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

    {{-- Navigasi BreadCrumb --}}
    <div class="mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Admin Library</li>
            </ol>
        </nav>
    </div>

    <div class="mt-3">
        <h2>Table Library</h2><br>
        <div class="card-deck">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Table User</h5>
                    <p class="card-text"></p>
                    <a href="{{url('/admin/user')}}" class="card-link">View</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Table Spesialis</h5>
                    <p class="card-text"></p>
                    <a href="{{url('/admin/spesialis')}}" class="card-link">View</a>
                </div>
            </div>
        </div>
        <br>
        <div class="card-deck">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Table Tempat</h5>
                    <p class="card-text"></p>
                    <a href="{{url('/admin/tempat')}}" class="card-link">View</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Table Dokter</h5>
                    <p class="card-text"></p>
                    <a href="{{url('/admin/dokter')}}" class="card-link">View</a>
                </div>
            </div>
        </div>
    </div>
</div>