{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Admin Table User | MisiDok - Web Kesehatan & Janji Dokter</title>
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
                <li class="breadcrumb-item active" aria-current="page">Table User</li>
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
        <h2>Table User</h2>
        <div class="mt-4">
            <h5><a href="{{url('/admin/user/create')}}">Create Data</a></h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col" class="text-nowrap">Nama Lengkap</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Email</th>
                        <th scope="col">Akses</th>
                        <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->username}}</td>
                        <td>{{$item->nama_user}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->tanggal_lahir}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->access}}</td>
                        <td><a href="{{url('/admin/user/update/'.$item->id)}}" class="btn btn-success">Edit</a></td>
                        <td>
                            <form action="{{ url('/admin/user/delete/'. $item->id) }}" method="POST">
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