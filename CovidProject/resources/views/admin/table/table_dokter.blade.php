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

    {{-- TOASTER /NOTIFICATION --}}
    @if(session('success'))
    <script type="text/javascript">
        $(function()
        {
            $('.toast').toast('show');
            $('.mr-auto').html('Notification');
            $('.toast-body').html('{{session("success")}}');
        }
        );
        </script>
    @endif

    @if(session('error'))
    <script type="text/javascript">
        $(function()
        {
            $('.toast').toast('show');
            $('.mr-auto').html('Notification');
            $('.toast-body').html('{{session("error")}}');
        }
        );
        </script>
    @endif

    <!-- Toast Dialog -->
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
        <!-- Position it -->
        <div style="position: absolute; top: 0; right: 0;">
        <!-- Then put toasts within -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                <div class="toast-header">
                    <strong class="mr-auto"></strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body"></div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <h2>Table Dokter</h2>
        <div class="mt-4">
            <h5><a href="{{url('/admin/dokter/create')}}">Create Data</a></h5>
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
                        <td><img src="{{url('storage/asset/dokter/'.$item->foto)}}" alt="{{$item->foto}}" class="rounded dokter"></td>
                        <td>{{$item->nama_dokter}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->no_telp}}</td>
                        <td>{{ucwords(str_replace("-"," ",$item->id_spesialis))}}</td>
                        <td>{{ucwords(str_replace("-"," ",$item->id_tempat))}}</td>
                        <td><a href="{{url('/admin/dokter/update/'. $item->id)}}" class="btn btn-success">Edit</a></td>
                        <td>
                            <form action="{{ url('/admin/dokter/delete/'. $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>