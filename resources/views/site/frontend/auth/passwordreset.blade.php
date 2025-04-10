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

            <form action="{{ url('tenant-auth/password/forget') }}" method="POST" class="p-6">
                @csrf
                <div class="mt-2">
                    <label for="email" class="font-medium text-sm text-slate-600 dark:text-slate-400">Email</label>
                    <input type="email" id="email" name="email"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                        placeholder="Enter Email" required>

                    <input class="form--control" name="callback_url" required readonly hidden type="text"
                        value="{{ url('/tenant-auth/password/reset') }}">
                </div>

                <div class="mt-4">
                    <button
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Submit
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500"> <a href="{{ url('tenant-auth/login') }}"
                    class="font-medium text-brand-500 hover:underline"> Back to login</a>
            </p>
        </div>
    </div>
@endsection
