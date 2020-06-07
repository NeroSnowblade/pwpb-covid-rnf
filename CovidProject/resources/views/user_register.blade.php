{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Register | MisiDok - Web Kesehatan & Janji Dokter</title>
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

    <h2>Register</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullname" name="nama_user">
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="l" value="L">
                <label class="form-check-label" for="l">Laki Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="p" value="P">
                <label class="form-check-label" for="p">Perempuan</label>
              </div>
        </div>
        <div class="form-group">
            <label for="date">Tanggal Lahir</label>
            <input type="date" class="form-control" id="date" name="tanggal_lahir">
            <small class="form-text text-muted">Input your Birth Date</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            <small class="form-text text-muted">Input your Email</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <small id="emailHelp" class="form-text text-muted">Already have account? <a href="{{url('/user/login')}}">Log in</a></small>
    </form>
</div>