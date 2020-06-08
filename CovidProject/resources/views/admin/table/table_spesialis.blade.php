{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Admin Table Spesialis | MisiDok - Web Kesehatan & Janji Dokter</title>
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
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Table Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table Spesialis</li>
            </ol>
        </nav>
    </div>

    <div class="mt-3">
        <h2>Table Spesialis</h2>
        <div class="mt-4">
            <h5><a href="{{url('/admin/spesialis/form')}}">Create Data</a></h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-nowrap">Nama Spesialis</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spesialis as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->nama_spesialis}}</td>
                        <td><p>{{$item->deskripsi}}</p></td>
                        <td><a href="" class="btn btn-success">Edit</a></td>
                        <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>