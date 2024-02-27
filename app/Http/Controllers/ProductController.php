<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function generateQrCode($product_id)
    {
        $product = Products::findOrFail($product_id);

        $product_name = $product->product_name;
        $category = $product->category;

        $qr_string = "$product_name - $category"; // Customize this based on how you want the QR code content

        $qr_code = QrCode::generate($qr_string);

        return view('qr-code')->with('qr_code', $qr_code);
    }

    public function createForm()
    {
        return view('user.add-products');
    }

    public function product_list()
    {
        // $data = Products::all();

        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('user.product-information', compact('data'));
    }

    public function consumed_products()
    {
        return view('user.consumed-products');
    }

    public function expired_products()
    {
        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('user.expired-products', compact('data'));
    }

    // without saving the qr code image to public folder
    // public function create_products(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'product_name' => 'required|string',
    //         'categories' => 'required|string',
    //         'quantity' => 'required',
    //         'expiration_date' => 'required|string',
    //     ]);

    //     // Create the products before generate qr_code
    //     $product = Products::create([
    //         'product_name' => $request->input('product_name'),
    //         'categories' => $request->input('categories'),
    //         'quantity' => $request->input('quantity'),
    //         'expiration_date' => $request->input('expiration_date'),
    //     ]);

    //     // Generate QR code based on product information
    //     $qr_code_string = $product->product_name . ' - ' . $product->categories . ' - ' . $product->quantity . ' - ' . $product->expiration_date;
    //     $qr_code = QrCode::generate($qr_code_string);

    //     return view('qr-code')->with('qr_code', $qr_code);
    // }

    // public qrcode folder path
    public function create_products(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string',
            'categories' => 'required|string',
            'quantity' => 'required',
            'expiration_date' => 'required|string',
        ]);

        // Create the products before generating the qr_code
        $product = Products::create([
            'product_name' => $request->input('product_name'),
            'categories' => $request->input('categories'),
            'quantity' => $request->input('quantity'),
            'expiration_date' => $request->input('expiration_date'),
        ]);

        // Generate QR code based on product information
        // without spacing
        // $qr_code_string = $product->product_name . ' - ' . $product->categories . ' - ' . $product->quantity . ' - ' . $product->expiration_date;

        // with spacing new line
        $qr_code_string =
            $product->product_name . PHP_EOL .
            $product->categories . PHP_EOL .
            $product->quantity . PHP_EOL .
            $product->expiration_date;

        $qr_code = QrCode::generate($qr_code_string);

        // Save the QR code image to storage
        $imagePath = 'qrcodes/' . $product->product_name . '_qr_code.png';
        file_put_contents(public_path($imagePath), base64_decode($qr_code));

        // Update the product with the image path
        $product->update(['qr_code_image' => $imagePath]);

        return view('qr-code')->with('qr_code', $qr_code);
    }

    public function showProductCreated(Products $product)
    {
        // Generate QR code based on product information
        $qr_code_string = $product->product_name . ' - ' . $product->categories . ' - ' . $product->quantity . ' - ' . $product->expiration_date;
        $qr_code = QrCode::generate($qr_code_string);

        return view('product-information', compact('product', 'qr_code'));
    }
}
