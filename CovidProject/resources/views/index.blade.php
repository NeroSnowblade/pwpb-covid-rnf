{{-- Header : Title, Plugin, Etc --}}
<head>
    <title>MisiDok - Web Kesehatan & Janji Dokter</title>
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
                    <div class="col-auto"><a href="{{url("/user/logout")}}" class="logout">Log Out</a></div>
                @endif
            @endforeach
            @else
            {{-- Kalo Belum Login --}}
            <div class="col-auto"><a href="{{url("/user/login")}}">Login</a></div>
            <div class="col-auto"><a href="{{url("/user/register")}}">Register</a></div>
            @endif
        </div>
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

    <!-- Modal Dialog -->
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger yes">Yes</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script Showing the Modal -->
    <script type="text/javascript">
        $(function()
            {
                $(".logout").on("click", function(e)
                {
                    e.preventDefault();

                    $(".modal").modal("show");
                    $(".modal-title").html("Confirmation");
                    $(".modal-body").html("Are you sure want to Log Out?");
                    
                    $(".yes").off();
                    $(".yes").on("click", function()
                    {
                        $(".modal").modal("hide");
                        window.location.replace("{{url('/user/logout')}}");
                    }
                    );
                }
                );
            }
        );
    </script>

    <div class="col mt-3">
        <div class="alert alert-warning" role="alert">
            Pandemic Update -- Jaga Jarak, Rajin Cuci Tangan, dan #StayAtHome
          </div>
    </div>

    <div>
        <div class="col mt-3">
            <img src="{{asset('/home.jpg')}}" alt="Corona.jpg" style="width: 67rem;">
        </div>
        <div class="col mt-3">
            <h1>Pandemi : CoronaVirus</h1>
        </div>
        <div class="row">
            <div class="col mt-3 col-10">
                <h3>Apa itu CoronaVirus?</h3>
                <p>Coronavirus atau virus corona merupakan keluarga besar virus yang menyebabkan infeksi saluran pernapasan atas ringan hingga sedang, seperti penyakit flu. Banyak orang terinfeksi virus ini, setidaknya satu kali dalam hidupnya.</p>
                <p>Namun, beberapa jenis virus corona juga bisa menimbulkan penyakit yang lebih serius, seperti:</p>
                <ul>
                    <li>Middle East Respiratory Syndrome (MERS-CoV)</li>
                    <li>Severe Acute Respiratory Syndrome (SARS-CoV)</li>
                    <li>Pneumonia</li>
                </ul>
                <p>Sampai saat ini terdapat tujuh Coronavirus (HCoVs) yang telah diidentifikasi, yaitu:</p>
                <ul>
                    <li>HCoV-229E.</li>
                    <li>HCoV-OC43.</li>
                    <li>HCoV-NL63.</li>
                    <li>HCoV-HKU1.</li>
                    <li>SARS-COV (yang menyebabkan sindrom pernapasan akut).</li>
                    <li>MERS-COV (sindrom pernapasan Timur Tengah).</li>
                    <li>COVID-19 atau dikenal juga dengan Novel Coronavirus (menyebabkan wabah pneumonia di kota Wuhan, Tiongkok pada Desember 2019, dan menyebar ke negara lainnya mulai Januari 2020. Indonesia sendiri mengumumkan adanya kasus covid 19 dari Maret 2020)</li>
                </ul>
            </div>
        </div>
    
        <div class="row">
            <div class="col mt-3 col-10">
                <h3>Faktor Risiko Infeksi Coronavirus</h3>
                <p>Siapa pun dapat terinfeksi virus corona. Akan tetapi, bayi dan anak kecil, serta orang dengan kekebalan tubuh yang lemah lebih rentan terhadap serangan virus ini. Selain itu, kondisi musim juga mungkin berpengaruh. Contohnya, di Amerika Serikat, infeksi virus corona lebih umum terjadi pada musim gugur dan musim dingin.</p>
                <p>Di samping itu, seseorang yang tinggal atau berkunjung ke daerah atau negara yang rawan virus corona, juga berisiko terserang penyakit ini. Misalnya, berkunjung ke Tiongkok, khususnya kota Wuhan, yang pernah menjadi wabah COVID-19 yang bermulai pada Desember 2019.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col mt-3 col-10">
                <h3>Penyebab Infeksi Coronavirus</h3>
                <p>Infeksi coronavirus disebabkan oleh virus corona itu sendiri. Kebanyakan virus corona menyebar seperti virus lain pada umumnya, seperti:</p>
                <ul>
                    <li>Percikan air liur pengidap (bantuk dan bersin).</li>
                    <li>Menyentuh tangan atau wajah orang yang terinfeksi.</li>
                    <li>Menyentuh mata, hidung, atau mulut setelah memegang barang yang terkena percikan air liur pengidap virus corona.</li>
                    <li>Tinja atau feses (jarang terjadi)</li>
                </ul>
                <p>Khusus untuk COVID-19, masa inkubasi belum diketahui secara pasti. Namun, rata-rata gejala yang timbul setelah 2-14 hari setelah virus pertama masuk ke dalam tubuh. Di samping itu, metode transmisi COVID-19 juga belum diketahui dengan pasti. Awalnya, virus corona jenis COVID-19 diduga bersumber dari hewan. Virus corona COVID-19 merupakan virus yang beredar pada beberapa hewan, termasuk unta, kucing, dan kelelawar.</p>
                <p>Sebenarnya virus ini jarang sekali berevolusi dan menginfeksi manusia dan menyebar ke individu lainnya. Namun, kasus di Tiongkok kini menjadi bukti nyata kalau virus ini bisa menyebar dari hewan ke manusia. Bahkan, kini penularannya bisa dari manusia ke manusia.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col mt-3 col-10">
                <h3>Gejala Infeksi Coronavirus</h3>
                <p>Virus corona bisa menimbulkan beragam gejala pada pengidapnya. Gejala yang muncul ini bergantung pada jenis virus corona yang menyerang, dan seberapa serius infeksi yang terjadi. Berikut beberapa gejala virus corona yang terbilang ringan:</p>
                <ul>
                    <li>Hidung beringus.</li>
                    <li>Sakit kepala.</li>
                    <li>Batuk.</li>
                    <li>Sakit tenggorokan.</li>
                    <li>Demam.</li>
                    <li>Merasa tidak enak badan.</li>
                </ul>
                <p>Hal yang perlu ditegaskan, beberapa virus corona dapat menyebabkan gejala yang parah. Infeksinya dapat berubah menjadi bronkitis dan pneumonia (disebabkan oleh COVID-19), yang mengakibatkan gejala seperti:</p>
                <ul>
                    <li>Demam yang mungkin cukup tinggi bila pasien mengidap pneumonia.</li>
                    <li>Batuk dengan lendir.</li>
                    <li>Sesak napas.</li>
                    <li>Nyeri dada atau sesak saat bernapas dan batuk.</li>
                    <li>Infeksi bisa semakin parah bila menyerang kelompok individu tertentu. Contohnya, orang dengan penyakit jantung atau paru-paru, orang dengan sistem kekebalan yang lemah, bayi, dan lansia.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col mt-3 col-10">
        <h1 style="text-align: center;">The Team</h1>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="{{asset('/storage/asset/dokter/default.png')}}" alt="default">
                <div class="card-body">
                    <h4 class="card-title">Fajar Mustaqim</h4>
                    <p class="card-text">Back-End Developer</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{asset('/storage/asset/dokter/default.png')}}" alt="default">
                <div class="card-body">
                    <h4 class="card-title">Najieb Ramdani</h4>
                    <p class="card-text">Front-End Developer</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{asset('/storage/asset/dokter/default.png')}}" alt="default">
                <div class="card-body">
                    <h4 class="card-title">Rizky Anugrah</h4>
                    <p class="card-text">Web Designer</p>
                </div>
            </div>
        </div>
    </div>
</div>