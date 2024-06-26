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
                    <li class="mb-1 group active">
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
    <main class="p-3 sm:p-4 space-y-5">
      <!-- Start Table -->
<div id='recipients' class="p-4 m-1 lg:mt-0 rounded shadow-lg bg-white overflow-x-auto">
    <div class="mb-4 flex sm:justify-center md:justify-start lg:justify-start">
                <h2 class="text-2xl font-bold">EXPIRED PRODUCTS</h2>
            </div>

            <div x-data="{ adminDelete: false, adminView: false, adminEdit: false, adminNewUsers: false, itemToDelete: null, itemToEdit: null, itemToView: null}">
                 {{-- Web View --}}
                 <div class="hidden md:block">
                    <div
                        class="flex flex-col mb-2 sm:justify-end md:flex-row md:justify-end items-center lg:justify-end">
                        <select id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-full md:w-[280px] mr-2 z-20 mt-2">
                            <option value="">Select Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                {{-- <button @click="adminNewUsers = true" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm  px-14 py-2.5 md:px-5 md:py-2.5 lg:px-5 lg:py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mb-2 md:mb-0"><i class="ri-add-circle-line mr-1"></i>Add New Products</button> --}}
                <div class="md:flex-shrink-0 mt-[47px]">

                </div>
            </div>

            <table id="example" class="stripe hover display dataTable " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                {{-- <th data-priority="2">Product Code</th> --}}
                                <th data-priority="3">Product Name</th>
                                <th data-priority="4">Categories</th>
                                {{-- <th data-priority="5">Quantity</th> --}}
                                <th data-priority="6">Expiration Date</th>
                                <th data-priority="7">Status</th>
                                {{-- <th data-priority="8">Edit</th> --}}
                                <th data-priority="9">Delete</th>
                                <th data-priority="10">View</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($data as $products)
                            <tr>
                                <td >{{ $products->id }}</td>
                                {{-- bar code with id --}}
                                {{-- <td class="h-16">
                                    {!! DNS1D::getBarcodeHTML("$products->product_code", 'C128', 2, 60) !!}
                                    <p>p - {{ $products->product_code }}</p>
                                </td>                                                                 --}}
                                {{-- qr code --}}
                                {{-- <td>{!!DNS2D::getBarcodeHTML("$products->product_code", 'QRCODE')!!}</td> --}}
                                {{-- <td >{{ $products->product_code }}</td> --}}
                                <td >{{ $products->product_name }}</td>
                                <td >{{ $products->categories }}</td>
                                {{-- <td >{{ $products->quantity }}</td> --}}
                                <td >{{ $products->expiration_date }}</td>
                                <td >{{ $products->status }}</td>
                                {{-- <td class="text-center ">
                                    <button
                                        @click="adminEdit = true; itemToEdit = $event.target.getAttribute('data-item-id')"
                                        data-item-id="{{ $products->id }}"
                                        class="py-1 px-4 rounded bg-sky-500 hover:bg-sky-700 text-white">
                                        <i class="ri-edit-box-fill mr-1"></i>Edit
                                    </button>
                                </td> --}}
                                <td class="text-center ">
                                    <button
                                        @click="adminDelete = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                                        data-item-id="{{ $products->id }}"
                                        class="py-1 px-4 rounded bg-red-500 hover:bg-red-700 text-white">
                                        <i class="ri-delete-bin-5-fill mr-1"></i>Delete
                                    </button>
                                </td>
                                <td class="text-center ">
                                    <button @click="adminView = true; itemToView = $event.target.getAttribute('data-item-id')"
                                        data-item-id="{{ $products->id }}"
                                        class="py-1 px-4 rounded bg-[#4ECE5D] hover:bg-[#4ECE5D] text-white">
                                        <i class="ri-edit-box-fill mr-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                     <!-- Add New Users Modal -->
                 <div x-show="adminNewUsers" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="adminNewUsers" @click.away="adminNewUsers = false"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                        <!-- ... (modal content) ... -->
                        <div class="bg-white py-3 w-full sm:w-[340px] h-full sm:h-[420px]">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pb-3 ml-5">
                                    Add New Products
                                </h3>
                            </div>
                            <hr class="bg-black border-gray-300 w-full">
                            <form action="{{ route('user.create_products') }}" method="post" class="pl-5 pr-5 pt-3 pb-3">
                                @csrf
                                <label for="product_name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Product Name:</label>
                                <input type="text" name="product_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required>

                                <label for="categories" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Categories:</label>
                                    <select name="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px] mb-2" required>
                                        <option value="sample">Select Categories</option>
                                        <option value="frozen food">Frozen Food</option>
                                        <option value="snacks">Snacks</option>
                                        <option value="biscuits">Biscuits</option>
                                    </select>

                                {{-- <label for="quantity" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Quantity</label>
                                <input type="number" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required> --}}

                                <label for="expiration_date" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Expiration Date:</label>
                                <input type="date" name="expiration_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required>

                                <label for="status" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Status:</label>
                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px] mb-2" required>
                                    <option value="">Select Status</option>
                                    <option value="available" selected>Available</option>
                                    <option value="consumed">Consumed</option>
                                    <option value="expired">Expired</option>
                                </select>

                            <div class="flex justify-end mt-3">
                                <button type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Create
                                </button>
                            </form>
                            <div class="absolute mr-[90px]">
                            <button @click="adminNewUsers = false"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- View Modal -->
                <div x-show="adminView"
                class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div x-show="adminView" @click.away="adminView = false"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                    <div class="bg-white py-3 w-full sm:w-[345px] h-full sm:h-[230px]">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pt-2 pb-3 ml-5">
                                Product Information
                            </h3>
                            <button @click="adminView = false" aria-label="Close"
                                class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                                <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <hr class="bg-black border-gray-300 w-full">
                        @foreach ($data as $products)
                            <div x-show="itemToView === '{{ $products->id }}'">
                                <form method="post"
                                    :action="`{{ route('user.product-information.update_products', '') }}/${itemToView}`"
                                    class="pl-5 pr-5 pt-2 pb-1">
                                    @csrf
                                    @method('patch')

                                    <div class="flex flex-col items-center">
                                        <label for="barcode_id"
                                            class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Barcode ID:</label>
                                        <div class="h-16">
                                            {!! DNS1D::getBarcodeHTML("$products->product_code", 'C128', 2, 60) !!}
                                            <p>p - {{ $products->product_code }}</p>
                                        </div>
                                        <br>
                                        {{-- Download button --}}
                                        <a href="{{ route('user.product-information.downloadBarcode', $products->product_code) }}"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                            download>
                                            Download Barcode
                                        </a>
                                    </div>

                                    <div class="md:hidden">
                                        <button type="submit"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                            disabled>
                                            Update
                                        </button>
                                        <div class="md:hidden absolute mr-[93px]">
                                            <button @click.prevent="adminView = false"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>

                <!-- Delete Modal -->
                <div x-show="adminDelete"
                class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div x-show="adminDelete" @click.away="adminDelete = false"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                    <!-- ... (modal content) ... -->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure
                            you want to delete this product?</h3>
                        <div class="flex justify-end items-end pb-2">
                            <form method="post"
                                :action="`{{ route('user.product-information.destroy', '') }}/${itemToDelete}`">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Delete
                                </button>
                            </form>
                            <div class="absolute mr-[90px]">
                                <button @click="adminDelete = false"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div x-show="adminEdit"
            class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div x-show="adminEdit" @click.away="adminEdit = false"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="rounded-lg overflow-hidden transform transition-all flex justify-start">
                <!-- ... (modal content) ... -->
                <div class="bg-white py-3 w-full sm:w-[345px] h-full sm:h-[500px]">
                    <div class="flex items-center justify-between">
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-white w-full pt-2 pb-3 ml-5">
                            Edit Product Information
                        </h3>
                        <button @click="adminEdit = false" aria-label="Close"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                            <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <hr class="bg-black border-gray-300 w-full">
                    @foreach ($data as $products)
                        <div x-show="itemToEdit.toString() === '{{ $products->id }}'">
                            <form method="post"
                                :action="`{{ route('user.product-information.update_products', '') }}/${itemToEdit}`"
                                class="pl-5 pr-5 pt-2 pb-1">
                                @csrf
                                @method('patch')
                                {{-- <label for="id"
                                    class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">ID:</label>
                                <input type="number" name="id" value="{{ $products->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white  w-full sm:w-[300px]"
                                    disabled> --}}

                                <label for="barcode_id"
                                    class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Barcode ID:</label>
                                <input type="number" name="id" value="{{ $products->product_code }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white  w-full sm:w-[300px]"
                                    disabled>

                                <label for="first_name"
                                    class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Product
                                    Name:</label>
                                <input type="text" name="product_name"
                                    value="{{ $products->product_name }}"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-full sm:w-[300px]"
                                    required>

                                    <label for="categories" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Categories:</label>
                                    <select name="categories"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full w-[300px]">
                                        <option value="frozen food" {{ $products->categories === 'frozen_food' ? 'selected' : '' }}>Frozen Food</option>
                                        <option value="snacks" {{ $products->categories === 'snacks' ? 'selected' : '' }}>Snacks</option>
                                        <option value="biscuits" {{ $products->categories === 'biscuits' ? 'selected' : '' }}>Biscuits</option>
                                    </select>


                                {{-- <label for="quantity"
                                    class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Quantity
                                </label>
                                <input type="number" name="quantity"
                                    value="{{ $products->quantity }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]"
                                    required> --}}

                                    <label for="status"
                                                    class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Expiration Date
                                                    </label>
                                                <input type="date"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]"
                                                    id="expiration_date" name="expiration_date" value="{{ $products->expiration_date }}"
                                                    required>

                                                    <label for="status" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Status:</label>
                                                    <select name="status"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full w-[300px]">
                                                        <option value="available" {{ $products->status === 'available' ? 'selected' : '' }}>Available</option>
                                                        <option value="consumed" {{ $products->status === 'consumed' ? 'selected' : '' }}>Consumed</option>
                                                        <option value="expired" {{ $products->status === 'expired' ? 'selected' : '' }}>Expired</option>
                                                    </select>



                                <div class="flex justify-end items-end pt-1">
                                    <button type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Update
                                    </button>
                                    <div class="md:hidden absolute mr-[93px]">
                                        <button @click.prevent="adminEdit = false"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

                </div>
            </div>
        </div>
    </div>

     {{-- Alphine --}}
     <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
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
                    ],
                    initComplete: function() {
                        // Event listener for category filter
                        $('#categories').on('change', function() {
                            var category = $(this).val(); // Get the selected category name
                            empDataTable.column(2).search(category).draw(); // Filter the table based on the selected category
                        });
                    }
                });
            });
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

    <script>
        function deleteItem(itemId) {
            // Set the itemToDelete value based on the clicked item's ID
            this.itemToDelete = itemId;
            this.itemToView = itemId;
        }
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            Alpine.data('yourComponentName', () => ({
                collectorEdit: false,
                itemToEdit: null, // Variable to store the selected item
            }));
        });
    </script>

    <script>
        function generateAndDownloadBarcode() {
            var productCode = "{{ $products->product_code }}"; // Get product code
            var barcodeHtml = `{!! DNS1D::getBarcodeHTML("$products->product_code", 'C128', 2, 60) !!}`; // Generate barcode HTML

            // Create a temporary div element to hold the barcode HTML
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = barcodeHtml;

            // Convert barcode SVG to base64 encoded PNG image
            var barcodeSvg = tempDiv.firstChild;
            var svgString = new XMLSerializer().serializeToString(barcodeSvg);
            var image = new Image();
            image.src = 'data:image/svg+xml;base64,' + btoa(svgString);

            // Create a temporary anchor element to trigger the download
            var a = document.createElement('a');
            a.href = image.src;
            a.download = 'barcode.png'; // Set the filename for the downloaded image
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    </script>
    @endif
</x-app-layout>
