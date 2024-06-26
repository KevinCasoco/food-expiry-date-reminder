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
                            <i class="ri-file-add-fill mr-3 text-lg"></i>
                            <span class="text-sm">Add New Products</span>
                        </a>
                    </li>
                    <li class="mb-1 group active">
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
            <main class="p-6 sm:p-1 space-y-6">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <div class="container mt-5">
            {{-- For Search --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search Schedule">
                        <div class="input-group-append">
                            <button id="searchButton" class="btn btn-primary">Search Products</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    <div id="calendar" style="width: 100%;height:100vh"></div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

        <!-- Include jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Include Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendarEl = document.getElementById('calendar');
            var events = [];
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                timeZone: 'UTC',
                events: '/events',
                editable: true,

                eventContent: function(info) {
                var product_name = info.event.title; // Access title directly from info.event

                var eventElement = document.createElement('div');
                eventElement.innerHTML = '<span style="cursor: pointer;">❌</span> ' + product_name;

                eventElement.querySelector('span').addEventListener('click', function() {
                    // Trigger Bootstrap modal for confirmation
                    $('#deleteEventModal').modal('show');
                    // Handle deletion when confirmed
                    $('#confirmDeleteEvent').on('click', function() {
                        var eventId = info.event.id;
                        $.ajax({
                            method: 'DELETE',
                            url: '/calendar/' + eventId,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log('Event deleted successfully.');
                                calendar.refetchEvents(); // Refresh events after deletion
                                $('#deleteEventModal').modal('hide'); // Hide modal after deletion
                            },
                            error: function(error) {
                                console.error('Error deleting event:', error);
                                $('#deleteEventModal').modal('hide'); // Hide modal if deletion fails
                            }
                        });
                    });
                });

                return { domNodes: [eventElement] };
            },

            });

            calendar.render();

            document.getElementById('searchButton').addEventListener('click', function() {
                var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
                filterAndDisplayEvents(searchKeywords);
            });


            function filterAndDisplayEvents(searchKeywords) {
                $.ajax({
                    method: 'GET',
                    url: `/events/search?location=${searchKeywords}`,
                    success: function(response) {
                        calendar.removeAllEvents();
                        calendar.addEventSource(response);
                    },
                    error: function(error) {
                        console.error('Error searching events:', error);
                    }
                });
            }
                function formatDate(date) {
                    // Extract only the date part from the ISO string
                    return date ? date.toISOString().split('T')[0] : null;
                }
        </script>

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
        </main>

        @endif
    </x-app-layout>

