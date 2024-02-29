<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'categories',
        'expiration_date',
        'date_consumed',
        'status',
        'quantity',
        'qr_code_image',
    ];

}
