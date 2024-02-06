<x-app-layout>
    @if (Auth::user()->role == 'consumer')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table id="example" class="stripe hover display dataTable " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">Product Name</th>
                                <th data-priority="3">Categories</th>
                                <th data-priority="4">Quantity</th>
                                <th data-priority="5">Expiration Date</th>
                                <th data-priority="6">QR CODE</th>
                                {{-- <th data-priority="6">Edit</th>
                                <th data-priority="7">Delete</th>
                                <th data-priority="8">Status</th> --}}
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($data as $products)
                            {{-- <tr x-on:click="itemToEdit = {{ $item->id }};"> --}}
                            <tr>
                                <td >{{ $products->id }}</td>
                                <td >{{ $products->product_name }}</td>
                                <td >{{ $products->categories }}</td>
                                <td >{{ $products->quantity }}</td>
                                <td >{{ $products->expiration_date }}</td>
                                <td ><img src="{{ asset($products->qr_code_image) }}" alt="QR Code"></td>
                                {{-- <td class="text-center ">
                                    <button @click="adminEdit = true; itemToEdit = $event.target.getAttribute('data-item-id')"
                                    data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-sky-500 hover:bg-sky-700 text-white"> <i class="ri-edit-box-fill mr-1"></i>Edit
                                    </button>
                                </td>
                                <td class="text-center ">
                                    <button @click="adminDelete = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                                    data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-red-500 hover:bg-red-700 text-white"> <i class="ri-delete-bin-5-fill mr-1"></i>Delete
                                    </button>
                                </td> --}}
                                {{-- <td class="text-center ">
                                    <form action="{{ route('admin.toggleUserStatus', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                        class='py-1 px-4 rounded
                                        @if ($item->status == 'active')
                                            bg-green-500 hover:bg-green-700 text-white
                                        @else
                                            bg-red-500 hover:bg-red-700 text-white
                                        @endif'>
                                        @if ($item->status == 'active')
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- data for pagination xx
                    {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
