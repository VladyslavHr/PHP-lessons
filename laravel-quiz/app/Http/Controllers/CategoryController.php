<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.category', [
            'categories' => Category::all(),
            'pharm' => Pharmacy::all(),
        ]);
    }
}
