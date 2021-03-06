{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Register | MisiDok - Web Kesehatan & Janji Dokter</title>
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
        <h2>Register</h2>
        <div class="mt-4">
            <form action="{{url('/user/register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
                </div>
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullname" name="nama_user" value="{{old('nama_user')}}">
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="l" value="L" {{old('gender') == "L" ? "checked" : ""}}>
                        <label class="form-check-label" for="l">Laki Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="p" value="P" {{old('gender') == "P" ? "checked" : ""}}>
                        <label class="form-check-label" for="p">Perempuan</label>
                      </div>
                </div>
                <div class="form-group">
                    <label for="date">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                    <small class="form-text text-muted">Input your Birth Date.</small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                    <small class="form-text text-muted">Input your Email</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                    <small class="form-text text-muted">Input your Password. Minimum 8 Character</small>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <small id="emailHelp" class="form-text text-muted">Already have account? <a href="{{url('/user/login')}}">Log in</a></small>
            </form>
        </div>
    </div>
</div>