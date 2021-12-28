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
        return view('product.index', [
            'products' => Product::all(),
            'pharmacies' => Pharmacy::all(),
        ]);
    }
}
