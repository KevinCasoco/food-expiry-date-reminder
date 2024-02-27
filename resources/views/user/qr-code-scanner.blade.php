<x-app-layout>
    @if (Auth::user()->role == 'consumer')
        <div class="relative min-h-screen md:flex">

            <!-- mobile menu bar -->
            <div class="bg-white text-black flex justify-end md:hidden">

              <!-- mobile menu button -->
              <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
              </button>
            </div>

            <!-- sidebar -->
            <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20 shadow">

              <!-- nav -->
              <nav>
                <ul class="mt-2">
                    <li class="mb-1 group">
                        <a href="{{ asset('dashboard') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-dashboard-fill mr-3 text-lg"></i>
                            <span class="text-sm">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="mb-1 group">
                        <a href="{{ route('user.user-list') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-admin-fill mr-3 text-lg"></i>
                            <span class="text-sm">User List</span>
                        </a>
                    </li> --}}
                    <li class="mb-1 group">
                        <a href="{{ route('user.add-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Add New Products</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('user.calendar') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Calendar</span>
                        </a>
                    </li>
                    <li class="mb-1 group active">
                        <a href="{{ route('user.qr-code-scanner') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">QR Code Scanner</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('user.product-information') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Product List</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('user.consumed-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Consumed Products</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('user.expired-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Expired Products</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ asset('profile') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-user-settings-line mr-3 text-lg"></i>
                            <span class="text-sm">Profile</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a onclick="document.getElementById('logoutModal').classList.remove('hidden')"
                            class="flex items-center py-2 px-4 text-black hover:bg-red-500 hover:text-gray-100 rounded-md group-[.active]:bg-red-500 group-[.active]:text-white group-[.selected]:bg-red500 group-[.selected]:text-white transition duration-200">
                                <i class="ri-logout-box-line mr-3 text-lg"></i>
                            <span class="text-sm">Logout</span>
                        </a>
                    </li>
                </ul>

              </nav>
            </div>

            <!-- Logout Modal -->
            <div id="logoutModal" class="hidden fixed inset-0 overflow-y-auto flex items-center justify-center z-30">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-end p-2">
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?</h3>
                        <div class="flex justify-end items-end">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-3 text-center">
                                    <i class="ri-logout-box-line mr-1 text-lg"></i>
                                    <span class="text-sm">Logout</span>
                                </a>
                            </form>
                            <div class="absolute mr-[100px] -mb-2.5">
                                <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-3 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <style>
        main {
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
        }
        #reader {
            width: 600px;
        }
        #result {
            text-align: center;
            font-size: 1.5rem;
        }
    </style>

    <main>
        <div id="reader"></div>
        <div id="result"></div>
    </main>


    <script>

        const scanner = new Html5QrcodeScanner('reader', {
            // Scanner will be initialized in DOM inside element with id of 'reader'
            qrbox: {
                width: 250,
                height: 250,
            },  // Sets dimensions of scanning box (set relative to reader element width)
            fps: 20, // Frames per second to attempt a scan
        });


        scanner.render(success, error);
        // Starts scanner

        function success(result) {

            document.getElementById('result').innerHTML = `
            <h2>Success!</h2>
            <p><a href="${result}">${result}</a></p>
            `;
            // Prints result as a link inside result element

            scanner.clear();
            // Clears scanning instance

            document.getElementById('reader').remove();
            // Removes reader element from DOM since no longer needed

        }

        function error(err) {
            console.error(err);
            // Prints any errors to the console
        }

    </script>
    @endif
</x-app-layout>
