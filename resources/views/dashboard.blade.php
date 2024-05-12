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
                    <li class="mb-1 group active">
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
                            <i class="ri-file-add-fill mr-3 text-lg"></i>
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
                    {{-- <li class="mb-1 group">
                        <a href="{{ route('user.qr-code-scanner') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-qr-scan-fill mr-3 text-lg"></i>
                            <span class="text-sm">QR Code Scanner</span>
                        </a>
                    </li> --}}
                    <li class="mb-1 group">
                        <a href="{{ route('user.product-information') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-shopping-cart-fill mr-3 text-lg"></i>
                            <span class="text-sm">Product List</span>
                        </a>
                    </li>
                    {{-- <li class="mb-1 group">
                        <a href="{{ route('user.consumed-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Consumed Products</span>
                        </a>
                    </li> --}}
                    <li class="mb-1 group">
                        <a href="{{ route('user.expired-product-information') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-pass-expired-fill mr-3 text-lg"></i>
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

            <!--Logout Modals -->
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

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-6 sm:p-10 space-y-6">

                    <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                      {{-- <a href="{{ route('admin') }}"> --}}
                      <div class="flex items-center p-6 bg-blue-500 hover:bg-blue-600 shadow-lg  rounded-lg hover:shadow-xl">

                          <div class="w-3/5 flex justify-start">
                              <ul>
                                  <li class="font-extrabold text-white">
                                      Users</li>
                                  <li class="font-extrabold text-white text-xl">{{ $countConsumer }}</li>
                                  <i class="ri-admin-fill mr-3 text-lg text-white"></i>
                              </ul>
                          </div>
                      </div>
                      </a>

                      <a href="{{ asset('') }}">
                          <div class="flex items-center p-6 bg-[#FF4069] hover:bg-[#e5395e] shadow-lg rounded-lg hover:shadow-xl">

                              <div class="w-3/5 flex justify-start">
                                  <ul>
                                      <li class="font-extrabold text-white">
                                          Products</li>
                                      <li class="font-extrabold text-white text-xl">{{ $countProducts }}</li>
                                      <i class="ri-shopping-cart-fill mr-3 text-lg text-white"></i>
                                  </ul>
                              </div>
                          </div>

                          <a href="{{ asset('') }}">
                              <div class="flex items-center p-6 bg-orange-400  hover:bg-orange-500 shadow-lg rounded-lg hover:shadow-xl">

                                  <div class="w-3/5 flex justify-start">
                                      <ul>
                                          <li class="font-bold text-white">Consumed</li>
                                          <li class="font-extrabold text-white text-xl">{{ $countConsumed }}</li>
                                          <i class="ri-calendar-2-fill text-lg text-white"></i>
                                      </ul>
                                  </div>
                              </div>
                              </a>
                                  <div class="flex items-center p-6 bg-[#4ECE5D] hover:bg-[#46b953] shadow-lg rounded-lg hover:shadow-xl">

                                      <div class="w-3/5 flex justify-start">
                                          <ul>
                                              <li class="font-bold text-white">Expired</li>
                                              <li class="font-extrabold text-white text-xl">{{ $countExpired }}</li>
                                              <i class="ri-pass-expired-fill mr-3 text-lg text-white"></i>
                                          </ul>
                                      </div>
                                  </div>
                    </section>

            {{-- Chart --}}
<section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
    <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
        <div class="p-4 flex-grow">
            <h2 class="text-xl font-semibold text-center">List of Products</h2>
                                <div class="w-[100%] h-[100%] flex justify-center items-center">
                                    <canvas id="myBarChart"></canvas>
                                </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const barchart = document.getElementById('myBarChart');

                new Chart(barchart, {
                    type: 'bar',
                    data: {
                        labels: ['Snacks', 'Biscuits', 'Frozen Food'],
                        datasets: [{
                            label: 'Products',
                            data: [{{ $countSnacksCategory}},
                                    {{$countBiscuitsCategory}},
                                    {{$countFrozenCategory}}],
                            backgroundColor: [
                                '#FF4069',
                                '#FF4069',
                                '#FF4069',
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(173, 216, 230)',
                                'rgb(255, 159, 64)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    boxWidth: 20,
                                    usePointStyle: true
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="flex items-center flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold mt-4 text-center">Status of Products</h2>
        <div class="w-[60%] px-6 py-5 font-semibold border-b border-gray-100">
            <div>
                <canvas class="flex justify-center items-center" id="myChart"></canvas>
            </div>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Available', 'Consumed', 'Expired'],
            datasets: [{
                label: 'Status of Products',
                data: [
                    {{ $countAvailable }},
                    {{ $countConsumed }},
                    {{ $countExpired }}
                ],
                backgroundColor: [
                    '#059BFF',
                    '#FF4069',
                    '#FF9020',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center', // Optional: Align the legend items to the center
                    labels: {
                        boxWidth: 15, // Optional: Adjust the box width of legend items
                        padding: 10, // Optional: Add padding between legend items
                        usePointStyle: true, // Optional: Use point style for legend items
                    },
                    maxItems: 3 // Set the maximum number of items to fit in one line
                }
            }
        }
    });
</script>

        </div>
    </div>
</section>


          </div>
          <script>
            // grab everything we need
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");
        let isSidebarOpen = false;

        // add our event listener for the click
        btn.addEventListener("click", () => {
          sidebar.classList.toggle("-translate-x-full");
        });


        </script>
        @endif

    @if (Auth::user()->role == 'admin')
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
                    <li class="mb-1 group active">
                        <a href="{{ asset('dashboard') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-dashboard-fill mr-3 text-lg"></i>
                            <span class="text-sm">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('admin.admin-user-list') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-admin-fill mr-3 text-lg"></i>
                            <span class="text-sm">User List</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('admin.admin-add-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-file-add-fill mr-3 text-lg"></i>
                            <span class="text-sm">Add New Products</span>
                        </a>
                    </li>
                    {{-- <li class="mb-1 group">
                        <a href="{{ route('user.calendar') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Calendar</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('user.qr-code-scanner') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">QR Code Scanner</span>
                        </a>
                    </li> --}}
                    <li class="mb-1 group">
                        <a href="{{ route('admin.admin-product-information') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-shopping-cart-fill mr-3 text-lg"></i>
                            <span class="text-sm">Product List</span>
                        </a>
                    </li>
                    {{-- <li class="mb-1 group">
                        <a href="{{ route('admin.admin-consumed-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                            <span class="text-sm">Consumed Products</span>
                        </a>
                    </li>
                    <li class="mb-1 group">
                        <a href="{{ route('admin.admin-expired-products') }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                            <i class="ri-pass-expired-fill mr-3 text-lg"></i>
                            <span class="text-sm">Expired Products</span>
                        </a>
                    </li> --}}
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

            <!--Logout Modals -->
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

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-6 sm:p-10 space-y-6">

                    <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                      {{-- <a href="{{ route('admin') }}"> --}}
                      <div class="flex items-center p-6 bg-blue-500 hover:bg-blue-600 shadow-lg  rounded-lg hover:shadow-xl">

                          <div class="w-3/5 flex justify-start">
                              <ul>
                                  <li class="font-extrabold text-white">
                                      Admin</li>
                                  <li class="font-extrabold text-white text-xl">{{ $countAdmins }}</li>
                                <i class="ri-admin-fill mr-3 text-lg text-white"></i>
                              </ul>
                          </div>
                      </div>
                      </a>

                      <a href="{{ asset('') }}">
                          <div class="flex items-center p-6 bg-[#FF4069] hover:bg-[#e5395e] shadow-lg rounded-lg hover:shadow-xl">

                              <div class="w-3/5 flex justify-start">
                                  <ul>
                                      <li class="font-extrabold text-white">
                                          Consumer</li>
                                      <li class="font-extrabold text-white text-xl">{{ $countConsumer }}</li>
                                      <i class="ri-map-pin-user-fill mr-3 text-lg text-white"></i>
                                  </ul>
                              </div>
                          </div>

                          <a href="{{ asset('') }}">
                              <div class="flex items-center p-6 bg-orange-400  hover:bg-orange-500 shadow-lg rounded-lg hover:shadow-xl">

                                  <div class="w-3/5 flex justify-start">
                                      <ul>
                                          <li class="font-bold text-white">Products</li>
                                          <li class="font-extrabold text-white text-xl">{{ $countProducts }}</li>
                                          <i class="ri-shopping-cart-fill mr-3 text-lg text-white"></i>
                                      </ul>
                                  </div>
                              </div>
                              </a>
                                  <div class="flex items-center p-6 bg-[#4ECE5D] hover:bg-[#46b953] shadow-lg rounded-lg hover:shadow-xl">

                                      <div class="w-3/5 flex justify-start">
                                          <ul>
                                              <li class="font-bold text-white">Total Users</li>
                                              <li class="font-extrabold text-white text-xl">{{ $totalUser }}</li>
                                              <i class="ri-user-fill mr-3 text-lg text-white"></i>
                                          </ul>
                                      </div>
                                  </div>
                    </section>

                       {{-- Chart --}}
<section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
    <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
        <div class="p-4 flex-grow">
            <h2 class="text-xl font-semibold text-center">List of Products</h2>
                                <div class="w-[100%] h-[100%] flex justify-center items-center">
                                    <canvas id="myBarChart"></canvas>
                                </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const barchart = document.getElementById('myBarChart');

                new Chart(barchart, {
                    type: 'bar',
                    data: {
                        labels: ['Snacks', 'Biscuits', 'Frozen Food'],
                        datasets: [{
                            label: 'Products',
                            data: [{{ $countSnacksCategory}},
                                    {{$countBiscuitsCategory}},
                                    {{$countFrozenCategory}}],
                            backgroundColor: [
                                '#FF9020',
                                '#FF9020',
                                '#FF9020',
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(173, 216, 230)',
                                'rgb(255, 159, 64)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    boxWidth: 20,
                                    usePointStyle: true
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="flex items-center flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold mt-4 text-center">Total Users</h2>
        <div class="w-[60%] px-6 py-5 font-semibold border-b border-gray-100">
            <div>
                <canvas class="flex justify-center items-center" id="myChart"></canvas>
            </div>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Admin', 'Consumer'],
            datasets: [{
                label: 'Total Users',
                data: [
                    {{ $countAdmins }},
                    {{ $countConsumer }},
                ],
                backgroundColor: [
                    '#059BFF',
                    '#FF4069',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center', // Optional: Align the legend items to the center
                    labels: {
                        boxWidth: 15, // Optional: Adjust the box width of legend items
                        padding: 10, // Optional: Add padding between legend items
                        usePointStyle: true, // Optional: Use point style for legend items
                    },
                    maxItems: 3 // Set the maximum number of items to fit in one line
                }
            }
        }
    });
</script>
        </div>
    </div>
</section>
            </div>

          </div>
          <script>
            // grab everything we need
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");
        let isSidebarOpen = false;

        // add our event listener for the click
        btn.addEventListener("click", () => {
          sidebar.classList.toggle("-translate-x-full");
        });


        </script>
        @endif
</x-app-layout>

