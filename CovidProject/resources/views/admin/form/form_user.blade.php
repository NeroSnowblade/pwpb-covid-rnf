{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Admin Form Table User | MisiDok - Web Kesehatan & Janji Dokter</title>
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
                <li class="breadcrumb-item"><a href="{{url('/admin/user')}}">Table User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form User</li>
                @if ($mode == 'update')
                <li class="breadcrumb-item active" aria-current="page">{{$user->nama_user}}</li>
                @endif
            </ol>
        </nav>
    </div>

    {{-- Error List --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Warning</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-3">
        <h2>User | {{$mode == 'update' ? 'Edit' : 'Add'}} Data</h2>
        <div class="mt-4">
            <form action="{{url($mode == 'update' ? '/admin/'.$site.'/update/'.$user->username : '/admin/'.$site.'/create')}}" method="POST">
                @csrf
                @if ($mode == 'update')
                @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', @$user->username) }}" {{$mode == 'update' ? 'readonly' : ''}}>
                </div>
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullname" name="nama_user" value="{{ old('nama_user', @$user->nama_user) }}">
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="l" value="L" {{ old('gender', @$user->gender) == 'L' ? 'checked' : ''}}>
                        <label class="form-check-label" for="l">Laki Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="p" value="P" {{ old('gender', @$user->gender) == 'P' ? 'checked' : ''}}>
                        <label class="form-check-label" for="p">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', @$user->tanggal_lahir) }}">
                    <small class="form-text text-muted">Input your Birth Date.</small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', @$user->email) }}">
                    <small class="form-text text-muted">Input your Email</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('email', @$user->password) }}">
                    <small class="form-text text-muted">Input your Password. Minimum 8 Character</small>
                </div>
                <div class="form-group">
                    <label for="gender">Access</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="access" id="l" value="user" {{ old('access', @$user->access) == 'user' ? 'checked' : ''}}>
                        <label class="form-check-label" for="l">User</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="access" id="p" value="admin" {{ old('access', @$user->access) == 'admin' ? 'checked' : ''}}>
                        <label class="form-check-label" for="p">Admin</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{$mode == 'update' ? 'Edit' : "Add"}} Data</button>
            </form>
        </div>
    </div>
</div>