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
                    <h1>Product Created Successfully</h1>
                    <p>Product Details:</p>
                    <ul>
                        <li><strong>Product Name:</strong> {{ $product->product_name }}</li>
                        <li><strong>Categories:</strong> {{ $product->categories }}</li>
                        <li><strong>Quantity:</strong> {{ $product->quantity }}</li>
                        <li><strong>Expiration Date:</strong> {{ $product->expiration_date }}</li>
                    </ul>

                    <hr>

                    <h2>QR Code:</h2>
                    {!! $qr_code !!}
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
