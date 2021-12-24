<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.product', [
            'products' => Product::all(),
            'pharm' => Pharmacy::all(),
        ]);
    }
}
