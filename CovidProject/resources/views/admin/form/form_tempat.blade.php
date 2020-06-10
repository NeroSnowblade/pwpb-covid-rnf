{{-- Page Detail Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Admin Form Table Tempat | MisiDok - Web Kesehatan & Janji Dokter</title>
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
                <li class="breadcrumb-item"><a href="{{url('/admin/tempat')}}">Table Tempat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Tempat</li>
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
            <form action="{{url($mode == 'update' ? '/admin/'.$site.'/update/'.$tempat->nama_tempat : '/admin/'.$site.'/create')}}" method="POST">
                @csrf
                @if ($mode == 'update')
                @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="nama_tempat">Nama Tempat</label>
                    <input type="text" class="form-control" id="nama_tempat" name="nama_tempat" value="{{ old('nama_tempat', @$tempat->nama_tempat) }}" {{$mode == 'update' ? 'readonly' : ''}}>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', @$tempat->alamat) }}">
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', @$tempat->telepon) }}">
                </div>
                <div class="form-group">
                    <label for="fax">FAX</label>
                    <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax', @$tempat->fax) }}">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" onchange="previewImage();"><br>
                    <img src="{{asset('storage/asset/tempat/'.@$tempat->foto)}}" alt="{{@$tempat->foto}}" class="rounded tempat" id="image-preview">
                </div>
                <button type="submit" class="btn btn-primary">{{$mode == 'update' ? 'Edit' : "Add"}} Data</button>
            </form>
        </div>
    </div>

    {{-- Image Preview Script Template --}}
    <script>
        function previewImage() 
        {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("foto").files[0]);
 
            oFReader.onload = function(oFREvent) 
            {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
</div>