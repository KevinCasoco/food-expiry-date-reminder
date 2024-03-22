<x-app-layout>
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
                <li class="mb-1 group">
                    <a href="{{ asset('dashboard') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-dashboard-fill mr-3 text-lg"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group active">
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
    <main class="p-3 sm:p-4 space-y-5">
      <!-- Start Table -->
<div id='recipients' class="p-4 m-1 lg:mt-0 rounded shadow-lg bg-white overflow-x-auto">
    <div class="mb-4 flex sm:justify-center md:justify-start lg:justify-start">
                <h2 class="text-2xl font-bold">USERS TABLE</h2>
            </div>
                    <table id="example" class="stripe hover display dataTable " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">First Name</th>
                                <th data-priority="3">Middle Name</th>
                                <th data-priority="4">Last Name</th>
                                <th data-priority="5">Email</th>
                                <th data-priority="6">Role</th>
                                <th data-priority="7">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($data as $user)
                            {{-- <tr x-on:click="itemToEdit = {{ $item->id }};"> --}}
                            <tr>
                                <td >{{ $user->id }}</td>
                                <td >{{ $user->first_name }}</td>
                                <td >{{ $user->middle_name }}</td>
                                <td >{{ $user->last_name }}</td>
                                <td >{{ $user->email }}</td>
                                <td >{{ $user->role }}</td>
                                <td >{{ $user->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var empDataTable = $('#example').DataTable({
                    responsive: true,
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'copy',
                        },
                        {
                            extend: 'pdf',
                            title: 'Waste Disposal Tracking System PDF Report',
                            customize: function(doc) {
                                // Add custom design to PDF header
                                doc.content.splice(0, 1, {
                                    text: 'Waste Disposal Tracking System PDF Report',
                                    style: {
                                        alignment: 'center',
                                        color: 'red', // Change color as needed
                                        fontSize: 16 // Adjust font size as needed
                                    }
                                });
                                 // Set page size and orientation
                                doc.pageSize = 'A4'; // You can change to 'letter' or other sizes
                                doc.pageOrientation = 'portrait'; // 'portrait' or 'landscape'
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7] // Specify the column indices you want to export
                            }
                        },
                        {
                            extend: 'csv',
                            title: 'Waste Disposal Tracking System CSV Report',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7] // Specify the column indices you want to export
                            },
                            customize: function (csv) {
                                // Custom CSV header with a single cell spanning all columns
                                var customHeader = 'Waste Disposal Tracking System Report\n';
                                return customHeader + csv;
                            },
                        },
                        {
                            extend: 'excel',
                            title: 'Waste Disposal Tracking System Excel Report',
                            customize: function(xlsx) {
                                // // Add custom design to Excel header
                                // var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                // $('row:first c', sheet).attr('s', '32'). // Change the style as needed
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7] // Specify the column indices you want to export
                            }
                        },
                        {
                            extend: 'print', // Add print button
                            title: 'Waste Disposal Tracking System Print Report',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7]
                            }
                        }
                    ]
                });
            });
        </script>
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
