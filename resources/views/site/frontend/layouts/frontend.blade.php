<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/site/style.css') }}" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/site/custom.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="font-serif antialiased">

    <div id="skeleton" class="w-full h-full fixed inset-0 flex flex-col space-y-4 p-6 bg-white animate-pulse z-50">
        <!-- Header Placeholder -->
        <div class="h-12 bg-gray-300 rounded w-3/4 mx-auto"></div>
        <!-- Image Placeholder -->
        <div class="flex-grow bg-gray-300 rounded-lg w-full max-w-3xl mx-auto"></div>
        <!-- Text Placeholder -->
        <div class="w-full max-w-3xl mx-auto space-y-2 mt-4">
            <div class="h-4 bg-gray-300 rounded w-2/3"></div>
            <div class="h-4 bg-gray-300 rounded w-1/2"></div>
            <div class="h-4 bg-gray-300 rounded w-full"></div>
            <div class="h-4 bg-gray-300 rounded w-3/4"></div>
        </div>
    </div>
    <div id="content" class="hidden">
        @include('site.frontend.layouts.inc.navbar')
        @yield('content')
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    {{-- to save message on cookie and dispaly it  --}}
    {{-- @if (request()->cookie('error_message'))
        <script>
            toastr.error('{{ request()->cookie('error_message') }}', 'Error!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        </script>
    @endif --}}

</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@stack('scripts')

</html>
