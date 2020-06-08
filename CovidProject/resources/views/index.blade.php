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


    {{-- Code Goes Here... --}}
</div>