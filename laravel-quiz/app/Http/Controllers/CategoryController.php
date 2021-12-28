<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pharmacy;
use App\Models\Product;
use App\Models\Mark;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::all(),
            'pharmacies' => Pharmacy::all(),
        ]);
    }

    public function show(Pharmacy $pharmacy, Category $category,)
    {
        //dump($category->id);
        //dump($pharmacy->id);
        // dd($category->products[0]->category->products[2]->title);

        // $products = Product::where('category_id', $category->id)->get();
        return view('category.show', [
            'category' => $category,
            'pharmacy' => $pharmacy,
            // 'products' => $products,
        ]);
    }

    public function estimate(Request $request)
    {
        $product_id = $request->get('product_id');
        $pharmacy_id = $request->get('pharmacy_id');
        $pharmacy_pzs = $request->get('pharmacy_pzs');
        $product_title = $request->get('product_title');
        $product_brand = $request->get('product_brand');

        $data = [
            'product_id' => $product_id,
            'pharmacy_id' => $pharmacy_id,
            'pharmacy_pzs' => $pharmacy_pzs,
            'product_title' => $product_title,
            'product_brand' => $product_brand,
            'mark_1' => $request->get('mark_1'),
            'mark_2' => $request->get('mark_2'),
            'mark_3' => $request->get('mark_3'),
            'mark_4' => $request->get('mark_4'),
            'user_id' => auth()->user()->id,
        ];

        $mark = Mark::where('product_id', $product_id)
            ->where('pharmacy_id', $pharmacy_id)
            ->where('product_title', $product_title)
            ->where('product_brand', $product_brand)
            ->where('pharmacy_pzs', $pharmacy_pzs)
                ->where('user_id', auth()->user()->id)->first();
        if($mark){
            $mark->update($data);
        }else{
            Mark::create($data);
        }
        return redirect()->back();

    }
}
