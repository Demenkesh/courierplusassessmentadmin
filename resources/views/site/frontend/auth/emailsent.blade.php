@extends('site.frontend.layouts.auth')
@section('title')
    {{ getTenantName() }} : Admin Login Page
@endsection
@section('content')
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div
            class="w-full  m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md">
            <div class="text-center p-6 rounded-t">
                <a href=""><img src="https://flowbite.com/docs/images/logo.svg" alt=""
                        class="w-14 h-14 mx-auto mb-2"></a>
                <h3 class="font-semibold text-black text-xl mb-1">Let's Get Started with {{ getTenantName() }}
                </h3>
                <p class="text-xs text-slate-400">Sign in to continue to {{ getTenantName() }}.</p>
            </div>

            <form class="p-6">
                <div class="flex items-center justify-center bg-blue-100 min-w-screen">
                    <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
                        <h3 class="text-2xl">Password reset link sent successfully to your email!</h3>
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-green-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                            </svg>
                        </div>

                        @if (session('status'))
                            <div class="mt-4">
                                <button
                                    class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600"
                                    onclick="window.open('https://mail.google.com/', '_blank')">
                                    Open gmail
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
