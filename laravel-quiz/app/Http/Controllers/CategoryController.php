<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.category');
    }
}
