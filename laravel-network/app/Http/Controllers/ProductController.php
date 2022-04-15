<?php

namespace App\Http\Controllers;

use App\Models\{Product, ProductImage};
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function cart()
    {

        $total = product::paginate(5)->sum('price');

        $delivery_price = 100;

        return view('products.cart',[
            'products' => Product::paginate(5),
            'user' => auth()->user(),
            'total' => $total,
            'delivery_price' => $delivery_price,
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',[
            'products' => Product::paginate(24),
            'user' => auth()->user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    // public function store(Request $request)
    {
        $validated = $request->validated();

        // image save
        // $request->file('image')
        if ($request->hasfile('image')) {

            $path = $request->file('image')->store('product-images', 'public');

            $validated['image'] = '/storage/' . $path;
        }else{
            $validated['image'] = '/images/no-image.png';
        }





        $validated['user_id'] = auth()->user()->id;

        $validated['slug'] = Str::slug($validated['title']);

        // dd($validated);
        $product = Product::create($validated);


        if($request->hasfile('gallery'))
        {
            if (count($request->file('gallery')) > 8) {
                return redirect()->back()->withErrors('Максимум 8 изображений')->withInput($request->all);
            }

            foreach($request->file('gallery') as $key => $file)
            {

                $path = $file->store('product-gallery', 'public');
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->url = '/storage/'.$path;
                $product_image->save();


                // ProductImage::create([
                //     'product_id' => $product->id,
                //     'url' => '/storage/'.$path,
                // ]);


            }
        }



        if($request->has('save')) {
            return redirect()->route('products.edit', $product)->with('status', 'Товар сохранен');
        }
        if($request->has('view')){
            return redirect()->route('products.show', $product)->with('status', 'Товар создан');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'user' => auth()->user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        // image save
        if ($request->hasfile('image')) {

            $path = $request->file('image')->store('product-images', 'public');

            $validated['image'] = '/storage/' . $path;

            $path = public_path($product->image);
            if (file_exists($path) && strpos($product->image, '/images/') === false )
            {
                unlink($path);
            }
        }


        if($request->hasfile('gallery'))
        {
            if (count($request->file('gallery')) > 8) {
                return redirect()->back()->withErrors('Максимум 8 изображений')->withInput($request->all);
            }

            foreach($request->file('gallery') as $key => $file)
            {

                $path = $file->store('product-gallery', 'public');
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->url = '/storage/'.$path;
                $product_image->save();


                // ProductImage::create([
                //     'product_id' => $product->id,
                //     'url' => '/storage/'.$path,
                // ]);


            }
        }

        $validated['user_id'] = auth()->user()->id;

        $validated['slug'] = Str::slug($validated['title']);

        // dd($validated);
        $saved = $product->update($validated);

        // if($saved) {
            return redirect()->route('products.show', $product->id)->with('status', 'Товар обновлен');
        // }else{
            // return redirect()->back()->withInput()->withErrors('error', 'Server error');
        // }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $title = $product->title;
        $path = public_path($product->image);
        if (file_exists($path) && strpos($product->image, '/images/') === false )
        {
            unlink($path);
        }
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Товар "' . $title . '" удален');
    }



}
