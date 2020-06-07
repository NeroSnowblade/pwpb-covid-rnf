{{-- Page Index Spesialis --}}
{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>Spesialis | MisiDok - Web Kesehatan & Janji Dokter</title>
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
            <div class="col-auto"><a href="{{url("/user/login")}}">Login</a></div>
            <div class="col-auto"><a href="{{url("/user/register")}}">Register</a></div>
        </div>
    </div>
    
    <h2>{{$head}}</h2>
    {{-- Search By Alphabet --}}
    <div class="col">
        @php
            for ($i="A"; $i != "AA"; $i++) 
            { 
                $count = 0;
                foreach ($spesialis as $item) 
                {
                    if(substr($item->nama_spesialis,0,1) == $i)
                    {
                        $count++;
                    }
                }
                if ($count > 0) {   echo ("<a href=''>$i</a> &emsp;");  }
                else {  echo ("$i &emsp;");   }
            }
        @endphp
    </div>
    {{-- List Alphabet --}}
    @php
    for ($i="A"; $i != "AA" ; $i++) 
    { 
        $count = 0;
        foreach ($spesialis as $item) 
        {
            if(substr($item->nama_spesialis,0,1) == $i)
            {
                $count++;
            }
           
        }
        if($count > 0)
        {
            echo("<h4>$i</h4>");
            echo("<ul>");
            foreach ($spesialis as $item) 
            {
                if(substr($item->nama_spesialis,0,1) == $i)
                {
                    echo "<li><a href='$url"."/"."$item->id_spesialis'>$item->nama_spesialis</a></li>";
                }
            }
            echo("</ul>");
        }
    }   
    @endphp
</div>