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
        if ($request->has('ajax')) {
           return $this->estimate_api($request);
        }
        $product_id = $request->get('product_id');
        $pharmacy_id = $request->get('pharmacy_id');
        $data = [
            'product_id' => $product_id,
            'pharmacy_id' => $pharmacy_id,
            'mark_1' => $request->get('mark_1'),
            'mark_2' => $request->get('mark_2'),
            'mark_3' => $request->get('mark_3'),
            'mark_4' => $request->get('mark_4'),
            'user_id' => auth()->user()->id,
        ];

        $mark = Mark::where('product_id', $product_id)
            ->where('pharmacy_id', $pharmacy_id)
                ->where('user_id', auth()->user()->id)->first();
        if($mark){
            $mark->update($data);
        }else{
            Mark::create($data);
        }
        return redirect()->back();

    }

    public function estimate_api(Request $request)
    {
        if ($request->get('mark_1') == 0 &&
            $request->get('mark_2') == 0 &&
            $request->get('mark_3') == 0 &&
            $request->get('mark_4') == 0 ) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please add at least one mark',
                ]);
        }

        $product_id = $request->get('product_id');
        $pharmacy_id = $request->get('pharmacy_id');
        $data = [
            'product_id' => $product_id,
            'pharmacy_id' => $pharmacy_id,
            'mark_1' => $request->get('mark_1'),
            'mark_2' => $request->get('mark_2'),
            'mark_3' => $request->get('mark_3'),
            'mark_4' => $request->get('mark_4'),
            'user_id' => auth()->user()->id,
        ];

        $mark = Mark::where('product_id', $product_id)
            ->where('pharmacy_id', $pharmacy_id)
                ->where('user_id', auth()->user()->id)->first();
        if($mark){
            $mark->update($data);
        }else{
            Mark::create($data);
        }
        return [
            'status' => 'ok',
            'message' => 'Graded'
        ];

    }

}
