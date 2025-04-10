@extends('site.frontend.layouts.auth')
@section('title')
    {{ config('app.name', 'Laravel') }} : Admin Login Page
@endsection
@section('content')
    <div class="relative flex items-center justify-center min-h-screen bg-gray-100">
        <div
            class="w-full bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md">
            <div class="text-center p-6 rounded-t">
                <a href=""><img src="https://flowbite.com/docs/images/logo.svg" alt=""
                        class="w-14 h-14 mx-auto mb-2"></a>
                <h3 class="font-semibold text-black text-xl mb-1">Let's Get Started with {{ config('app.name', 'Laravel') }}
                </h3>
                <p class="text-xs text-slate-400">Sign in to continue to {{ config('app.name', 'Laravel') }}.</p>
            </div>

            <form id="otpForm" class="p-6" action="{{ url('tenant-auth/email/verification') }}" method="POST">
                @csrf
                <div class="flex justify-center mb-4 space-x-2 rtl:space-x-reverse">
                    @for ($i = 1; $i <= 6; $i++)
                        <div>
                            <label for="code-{{ $i }}" class="sr-only">Code {{ $i }}</label>
                            <input type="text" maxlength="1" id="code-{{ $i }}" name="code[]"
                                data-focus-input-init data-focus-input-next="code-{{ $i < 6 ? $i + 1 : '' }}"
                                data-focus-input-prev="code-{{ $i > 1 ? $i - 1 : '' }}"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required />
                        </div>
                    @endfor
                </div>
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400 text-center">Please
                    introduce the
                    6-digit code we sent via email.</p>

                <div class="mt-4">
                    <button type="submit"
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Submit
                    </button>
                </div>
            </form>

            <div>
                <p class="text-gray-600 text-sm text-center">
                    @lang('If you don\'t get any code'), <span class="countdown-wrapper">
                        @lang('try again after') <span id="countdown" class="font-bold">--</span>
                        @lang('seconds.')
                    </span>
                    <a href="#" class="text-blue-600 hover:underline try-again-link hidden"
                        onclick="event.preventDefault(); document.getElementById('resendEmailForm').submit();">
                        @lang('Try again.')
                    </a>
                </p>
            </div>
            <br />
            <form id="resendEmailForm" action="{{ url('tenant-auth/email/resend') }}" method="POST" class="hidden">
                @csrf
            </form>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        // use this simple function to automatically focus on the next input
        function focusNextInput(el, prevId, nextId) {
            if (el.value.length === 0) {
                if (prevId) {
                    document.getElementById(prevId).focus();
                }
            } else {
                if (nextId) {
                    document.getElementById(nextId).focus();
                }
            }
        }

        document.querySelectorAll('[data-focus-input-init]').forEach(function(element) {
            element.addEventListener('keyup', function() {
                const prevId = this.getAttribute('data-focus-input-prev');
                const nextId = this.getAttribute('data-focus-input-next');
                focusNextInput(this, prevId, nextId);
            });

            // Handle paste event to split the pasted code into each input
            element.addEventListener('paste', function(event) {
                event.preventDefault();
                const pasteData = (event.clipboardData || window.clipboardData).getData('text');
                const digits = pasteData.replace(/\D/g, ''); // Only take numbers from the pasted data

                // Get all input fields
                const inputs = document.querySelectorAll('[data-focus-input-init]');

                // Iterate over the inputs and assign values from the pasted string
                inputs.forEach((input, index) => {
                    if (digits[index]) {
                        input.value = digits[index];
                        // Focus the next input after filling the current one
                        const nextId = input.getAttribute('data-focus-input-next');
                        if (nextId) {
                            document.getElementById(nextId).focus();
                        }
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('[data-focus-input-init]');
            const form = document.getElementById('otpForm');
            const countdownElement = document.getElementById('countdown');
            const countdownWrapper = document.querySelector('.countdown-wrapper');
            const retryLink = document.querySelector('.try-again-link');

            // Automatic form submission when all inputs are filled
            inputs.forEach((input) => {
                input.addEventListener('keyup', function() {
                    const allFilled = [...inputs].every((el) => el.value.trim() !== '');
                    if (allFilled) {
                        form.submit();
                    }
                });
            });

            // OTP Paste functionality
            inputs.forEach((input) => {
                input.addEventListener('paste', function(event) {
                    event.preventDefault();
                    const pasteData = (event.clipboardData || window.clipboardData).getData('text')
                        .replace(/\D/g, '');
                    pasteData.split('').forEach((char, index) => {
                        if (inputs[index]) inputs[index].value = char;
                    });

                    // Check if all inputs are filled after paste
                    const allFilled = [...inputs].every((el) => el.value.trim() !== '');
                    if (allFilled) {
                        // form.submit();
                    }
                });
            });
        });

        // Countdown logic for retry
        document.addEventListener("DOMContentLoaded", function() {
            // Get the timestamp for the countdown
            var distance = Number("{{ @$user->updated_at->addMinutes(1)->timestamp - time() }}");

            if (distance > 0) {
                var countdownElement = document.getElementById("countdown");
                var countdownWrapper = document.querySelector('.countdown-wrapper');
                var tryAgainLink = document.querySelector('.try-again-link');

                var x = setInterval(function() {
                    // Decrement distance and update the display
                    distance--;

                    // Format time in seconds
                    countdownElement.innerHTML = distance;

                    // When the countdown ends
                    if (distance <= 0) {
                        clearInterval(x);
                        countdownWrapper.classList.add('hidden'); // Hide the countdown wrapper
                        tryAgainLink.classList.remove('hidden'); // Show the try-again link
                    }
                }, 1000);
            } else {
                // Show the retry link if the countdown has already ended
                document.querySelector('.countdown-wrapper').classList.add('hidden');
                document.querySelector('.try-again-link').classList.remove('hidden');
            }
        });
    </script>
@endpush
