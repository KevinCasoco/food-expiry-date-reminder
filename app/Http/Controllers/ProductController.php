<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use App\Notifications\EmailNotification;
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

    public function user_new_products()
    {
        return view('user.add-products');
    }

    public function admin_new_products()
    {
        return view('admin.admin-add-products');
    }

    public function product_list()
    {
        // $data = Products::all();

        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('user.product-information', compact('data'));
    }

    public function admin_product_list()
    {
        // $data = Products::all();

        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('admin.admin-product-information', compact('data'));
    }

    public function consumed_products()
    {
        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('user.consumed-products', compact('data'));
    }

    public function admin_consumed_products()
    {
        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('admin.admin-consumed-products', compact('data'));
    }

    public function expired_products()
    {
        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('user.expired-products', compact('data'));
    }

    public function admin_expired_products()
    {
        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('admin.admin-expired-products', compact('data'));
    }

    public function calendar()
    {
        // $data = Products::all();

        // $data = Products::paginate(10); // Paginate with 10 items per page

        $users = User::where('role', 'consumer')->get();

        foreach ($users as $user) {
            // Notify user about expired products
            $user->notify(new EmailNotification());
        }

        return view('user.calendar')->with('message', 'Emails were sent successfully.');
    }

    // public function create_products(Request $request)
    // {
    //     $number = mt_rand(1000000000,9999999999);

    //     if ($this->productCodeExist($number)) {
    //         $number = mt_rand(1000000000,9999999999);
    //     }

    //     $request['product_code'] = $number;

    //     Products::create($request->all());

    //     $data = Products::paginate(10); // Paginate with 10 items per page

    //     return view('user.product-information', compact('data'));
    // }

    public function create_products(Request $request)
    {
        $number = mt_rand(1000000000,9999999999);

        if ($this->productCodeExist($number)) {
            $number = mt_rand(1000000000,9999999999);
        }

        $request['product_code'] = $number;

        // Create the product
        $product = Products::create($request->all());

        // Generate barcode HTML
        $barcodeHTML = DNS1D::getBarcodeHTML("$product->product_code", 'C128');

        // Generate barcode image
        // $barcodeImage = DNS1D::getBarcodePNGPath("$product->product_code", 'C128');

        // // Save the barcode image to storage
        // $barcodeImagePath = storage_path("app/public/barcodes/{$product->id}.png");
        // file_put_contents($barcodeImagePath, file_get_contents($barcodeImage));

        $data = Products::paginate(10); // Paginate with 10 items per page

        return view('user.product-information', compact('data'));
    }

    // public function create_products(Request $request)
    // {
    //     $number = mt_rand(1000000000, 9999999999);

    //     if ($this->productCodeExist($number)) {
    //         $number = mt_rand(1000000000, 9999999999);
    //     }

    //     $request['product_code'] = $number;

    //     // Create the product
    //     $product = Products::create($request->all());

    //     // Create directory for barcode images
    //     $directory = storage_path("app/public/barcodes");
    //     if (!file_exists($directory)) {
    //         mkdir($directory, 0777, true);
    //     }

    //     // Generate barcode image
    //     $barcodeImage = DNS1D::getBarcodePNGPath("$product->product_code", 'C128');

    //     // Save the barcode image to storage
    //     $barcodeImagePath = storage_path("app/public/barcodes/{$product->id}.png");
    //     copy($barcodeImage, $barcodeImagePath);

    //     $data = Products::paginate(10); // Paginate with 10 items per page

    //     return view('user.product-information', compact('data'));
    // }

    public function productCodeExist($number)
    {
        return Products::whereProductCode($number)->exists();
    }

    public function getEvents()
    {
        $schedules = Products::all();
        return response()->json($schedules);
    }

    public function deleteEvent($id)
    {
        $schedule = Products::findOrFail($id);
        $schedule->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();

        return redirect()->route('user.product-information')->with('message', 'Admin deleted successfully');
    }

    public function resize(Request $request, $id)
    {
        $schedule = Products::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('expiration_date'))->setTimezone('UTC');
        $schedule->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }

    public function search(Request $request)
    {
        $searchKeywords = $request->input('location');

        $matchingEvents = Products::where('location', 'like', '%' . $searchKeywords . '%')->get();

        return response()->json($matchingEvents);
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
    // public function create_products(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'product_name' => 'required|string',
    //         'categories' => 'required|string',
    //         'quantity' => 'required',
    //         'expiration_date' => 'required|string',
    //     ]);

    //     // Create the products before generating the qr_code
    //     $product = Products::create([
    //         'product_name' => $request->input('product_name'),
    //         'categories' => $request->input('categories'),
    //         'quantity' => $request->input('quantity'),
    //         'expiration_date' => $request->input('expiration_date'),
    //     ]);

    //     // Generate QR code based on product information
    //     // without spacing
    //     // $qr_code_string = $product->product_name . ' - ' . $product->categories . ' - ' . $product->quantity . ' - ' . $product->expiration_date;

    //     // with spacing new line
    //     $qr_code_string =
    //         $product->product_name . PHP_EOL .
    //         $product->categories . PHP_EOL .
    //         $product->quantity . PHP_EOL .
    //         $product->expiration_date;

    //     $qr_code = QrCode::generate($qr_code_string);

    //     // Save the QR code image to storage
    //     $imagePath = 'qrcodes/' . $product->product_name . '_qr_code.png';
    //     file_put_contents(public_path($imagePath), base64_decode($qr_code));

    //     // Update the product with the image path
    //     $product->update(['qr_code_image' => $imagePath]);

    //     return view('user.qr-code')->with('qr_code', $qr_code);
    // }

     // public qrcode folder path
     public function admin_create_products(Request $request)
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

         return view('admin.admin-qr-code')->with('qr_code', $qr_code);
     }

    public function showProductCreated(Products $product)
    {
        // Generate QR code based on product information
        $qr_code_string = $product->product_name . ' - ' . $product->categories . ' - ' . $product->quantity . ' - ' . $product->expiration_date;
        $qr_code = QrCode::generate($qr_code_string);

        return view('product-information', compact('product', 'qr_code'));
    }
}
