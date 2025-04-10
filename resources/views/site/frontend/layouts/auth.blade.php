<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="{{ getTenantName() }} Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Mannatthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/template2/images/favicon.ico" />

    <!-- Css -->
    <!-- Main Css -->
    <link href="{{ asset('assets/template2/libs/icofont/icofont.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/template2/libs/flatpickr/flatpickr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/template2/css/tailwind.min.css') }}" rel="stylesheet" />
    @stack('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body data-layout-mode="light" data-sidebar-size="default" data-theme-layout="vertical"
    class="bg-[#EEF0FC] dark:bg-gray-900">

    @yield('content')

    <!-- JAVASCRIPTS -->
    <!-- <div class="menu-overlay"></div> -->
    <script src="{{ asset('assets/template2/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/template2/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/template2/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/template2/libs/@frostui/tailwindcss/frostui.js') }}"></script>
    <script src="{{ asset('assets/template2/js/app.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (session('status'))
        <script>
            toastr.success('{{ session('status') }}', 'Success', {
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}', 'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
            </script>
        @endforeach
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}', 'Error!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        </script>
    @endif


    @stack('scripts')
    <!-- JAVASCRIPTS -->
</body>

</html>
