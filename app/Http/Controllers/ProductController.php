<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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

    public function create_products(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string',
            'categories' => 'required|string',
            'quantity' => 'required',
            'expiration_date' => 'required|string',
        ]);

        // Create the products before generate qr_code
        $product = Products::create([
            'product_name' => $request->input('product_name'),
            'categories' => $request->input('categories'),
            'quantity' => $request->input('quantity'),
            'expiration_date' => $request->input('expiration_date'),
        ]);

        // Generate QR code based on product information
        $qr_code_string = $product->product_name . ' - ' . $product->categories . ' - ' . $product->quantity . ' - ' . $product->expiration_date;
        $qr_code = QrCode::generate($qr_code_string);

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