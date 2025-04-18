<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('user/img/logo.png') }}" type="image/png">
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/css/argon-dashboard.css') }}" rel="stylesheet" />
    {{-- datatable css --}}
    <link href="{{ asset('admin/css/datatable.css') }}" rel="stylesheet" />
    <style>
        #imggg {

            height: 29px;
            width: 50px;
            margin-left: 40%;
            margin-top: 4px
        }
    </style>

</head>

<body class="g-sidenav-show bg-gray-100 " >
    {{-- oncontextmenu="return false" --}}
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
        id="sidenav-main">
        <!-- sidenav bar header -->
        @include('layouts.inc.admin.sidenavbarheader')
        <hr class="horizontal dark mt-0" />
        <!-- sidenav bar -->
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            @include('layouts.inc.admin.sidenavbar')
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg">
        <!-- Navbar -->
        @include('layouts.inc.admin.nav')
        <div class=" py-4">
            @yield('content')
            @include('layouts.inc.admin.footer')
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/chartjs.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/custom.js') }}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    @yield('scripts')
    @if (session('status'))
        <script>
            swal("Good job!", "{{ session('status') }}!", "success");
        </script>
    @endif
    @if (session('error'))
        <script>
            swal("Error!", "{{ session('error') }}!", "warning");
        </script>
    @endif
    <style>
        .swal-modal {
            width: 278px !important;
        }

        .swal-text {
            text-align: -webkit-match-parent;
        }
    </style>

</body>

</html>
