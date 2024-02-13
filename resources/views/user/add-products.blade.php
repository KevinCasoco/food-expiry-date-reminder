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
                    <h2>Create Product</h2>
                    <form method="post" action="{{ route('user.create_products') }}">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Product Name:</label>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories:</label>
                            <input type="text" name="categories" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="expiration_date">Expiration Date:</label>
                            <input type="date" name="expiration_date" class="form-control" required>
                        </div>

                        <button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full mt-6">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
