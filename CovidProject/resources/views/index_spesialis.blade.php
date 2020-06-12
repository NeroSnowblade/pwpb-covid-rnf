{{-- Page Index Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Spesialis | MisiDok - Web Kesehatan & Janji Dokter</title>
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/css/search.css')}}">
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

    <div class="row justify-content-center mt-3">
        <div class="alert alert-warning" role="alert">
            Pandemic Update -- Jaga Jarak, Rajin Cuci Tangan, dan #StayAtHome
          </div>
    </div>

    <div class="mt-3">
    <h2>{{$head}}</h2>
    {{-- Search By Alphabet --}}
    <div id="selector" class="col mt-4 mb-4">
        <button type="button" class="tombol btn btn-outline-primary btn-sm active" onclick="filter('all')">ALL</button> &nbsp;
        @for ($i = "A"; $i != "AA"; $i++)
            @php
                $count = 0;
            @endphp
            @foreach ($spesialis as $item)
                @if (substr($item->nama_spesialis,0,1) == $i)
                    @php
                    $count++;    
                    @endphp
                @endif
            @endforeach
            @if ($count > 0)
            <button type="button" class="tombol btn btn-outline-primary btn-sm" onclick="filter('huruf{{strtolower($i)}}')">{{$i}}</button> &nbsp;
            @else
            <a type="button" class="btn btn-outline-secondary btn-sm disabled" tabindex="-1">{{$i}}</a> &nbsp;
            @endif
        @endfor
    </div>
    {{-- List Alphabet --}}
    @php
        $find = '';
    @endphp
    <ul class="list-group list-group-flush">
        @for ($i = "A"; $i != "AA"; $i++)
        @php
            $count = 0;
        @endphp
        @foreach ($spesialis as $item)
            @if (substr($item->nama_spesialis,0,1) == $i)
                @php
                $count++;
                @endphp
            @endif
        @endforeach
        @if ($count > 0)
        <li class="list-group-item filterDiv huruf{{strtolower($i)}} show">
            <div class="mt-4 mb-4">
                <h3>{{$i}}</h3><br>
                @foreach ($spesialis as $item)
                    @if (substr($item->nama_spesialis,0,1) == $i)
                    <a class="btn btn-primary btn-lg" href='{{url('/spesialis/'.$item->id)}}'>{{$item->nama_spesialis}}</a>
                    @endif
                @endforeach
            </div>
        </li>
        @endif
        @endfor
    </ul>
    </div>

    {{-- Filter Script from w3schools.com --}}
    <script>
        function filter(c) {
          var x, i;
          x = document.getElementsByClassName("filterDiv");
          if (c == "all") c = "";
          // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
          for (i = 0; i < x.length; i++) {
            hideClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) showClass(x[i], "show");
          }
        }

        // Show filtered elements
        function showClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
              element.className += " " + arr2[i];
            }
          }
        }

        // Hide elements that are not selected
        function hideClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
              arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
          }
          element.className = arr1.join(" ");
        }

        // Add active class to the current control button (highlight it)
        var btnContainer = document.getElementById("selector");
        var btns = btnContainer.getElementsByClassName("tombol");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }    
    </script>
</div>