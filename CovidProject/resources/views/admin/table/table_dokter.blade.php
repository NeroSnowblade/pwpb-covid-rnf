{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Admin Table Dokter | MisiDok - Web Kesehatan & Janji Dokter</title>
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

    {{-- Navigasi BreadCrumb --}}
    <div class="mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Table Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table Dokter</li>
            </ol>
        </nav>
    </div>

    <div class="mt-3">
        <h2>Table Dokter</h2>
        <div class="mt-4">
            <h5><a href="{{url('/admin/dokter/form')}}">Create Data</a></h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col" class="text-nowrap">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Tempat</th>
                        <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokter as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td><img src="{{url('/asset/dokter/'.$item->foto)}}" alt="{{$item->foto}}" class="rounded dokter"></td>
                        <td>{{$item->nama_dokter}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->no_telp}}</td>
                        <td>{{ucwords(str_replace("-"," ",$item->id_spesialis))}}</td>
                        <td>{{ucwords(str_replace("-"," ",$item->id_tempat))}}</td>
                        <td><a href="" class="btn btn-success">Edit</a></td>
                        <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>