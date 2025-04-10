        <!-- Navbar -->
        <nav class="bg-white fixed w-full z-20 top-0 start-0  border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center sm:space-x-2 sm:text-2xl  rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center sm:text-2xl  lg:text-2xl  font-semibold whitespace-nowrap">TheCartz</span>
                </a>
                
                <div
                    class="flex md:order-2 xs:space-x-4  sm:space-x-2 md:space-x-0 rtl:space-x-reverse lg:gap-11 sm:gap-11 ">
                    <a href="{{url('tenant-auth/register')}}"
                        class="bg-[#000080]  text-white px-4 py-2 rounded-lg hover:bg-indigo-700 lg:block sm:block  xs:hidden">Vendor Sign Up</a>

                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-[#000080] dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-[#ffffff] md:dark:bg-[#ffffff] dark:border-[#ffffff]">
                        <li>
                            <a href="{{ url('/') }}"
                                class="block py-2 px-3 text-white bg-[#7b7be9] rounded md:bg-transparent md:text-[#000080] md:p-0 md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/about_us') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#000080] md:p-0 md:dark:hover:text-blue-500 dark:text-[#000080] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>

                        <li>
                            <a href="{{ url('/pricing') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#000080] md:p-0 md:dark:hover:text-blue-500 dark:text-[#000080] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                        </li>

                        <li>
                            <a href="{{ url('support') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#000080] md:p-0 md:dark:hover:text-blue-500 dark:text-[#000080] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Support</a>
                        </li>

                    </ul>
                    <!-- Display the button independently for mobile -->  
                    <a href="{{url('tenant-auth/login')}}"
                        class="bg-[#000080] text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-sm sm:text-base block md:hidden mt-2">
                        Vendor Sign In
                    </a>

                    <a href="{{url('tenant-auth/register')}}"
                        class="bg-[#000080] text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-sm sm:text-base block md:hidden mt-2">
                        Vendor Sign Up
                    </a>
                </div>

            </div>
        </nav>
