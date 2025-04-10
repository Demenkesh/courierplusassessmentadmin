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

            <form action="{{ url('tenant-auth/password/update') }}" method="POST" class="p-6">
                @csrf
                <div class="mt-2">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mt-2">
                        <label for="password" class="font-medium text-sm text-slate-600 dark:text-slate-400">Your
                            password</label>
                        <input type="password" id="password" name="password"
                            class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                            placeholder="Enter Password" required>
                    </div>

                    <div class="mt-2">
                        <label for="password" class="font-medium text-sm text-slate-600 dark:text-slate-400">Confirm
                            password</label>
                        <input type="password" id="password" name="password_confirmation"
                            class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                            placeholder="Enter Password" required>
                    </div>
                </div>

                <div class="mt-4">
                    <button
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
