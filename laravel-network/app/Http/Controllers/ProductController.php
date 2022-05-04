<?php

namespace App\Http\Controllers;

use App\Models\{Product, ProductImage, User};
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
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
	{
		$validated = $request->validated();

		// image save
		if ($request->hasfile('image')) {
			$path = $request->file('image')->store('product-images', 'public');
			$validated['image'] = '/storage/' . $path;
		}else{
			$validated['image'] = '/images/no-image.png';
		}

		$validated['user_id'] = auth()->user()->id;

		$validated['slug'] = Str::slug($validated['title']);

		$product = Product::create($validated);

        if($request->hasfile('gallery'))
        {
            if(count($request->file('gallery')) > 8){
                return redirect()->back()->withErrors('Максимум 8 изображений!')->withInput($request->all());
            }
            foreach($request->file('gallery') as $key => $file)
            {
                $path = $file->store('product-gallery', 'public');
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->url = '/storage/'.$path;
                $product_image->save();

                // ProductImage::create([
                // 	'product_id' => $product->id,
                // 	'url' => '/storage/'.$path,
                // ]);
            }
        }

		if ($request->has('save')) {
			return redirect()->route('products.edit', $product)->with('success', 'Товар создан');
		}
		if ($request->has('view')) {
			return redirect()->route('products.show', $product)->with('success', 'Товар создан');
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

	public function bySlug($slug)
	{
		$product = Product::where('slug', $slug)->firstOrFail();
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
	        if (file_exists($path) && strpos($path, '/images/') === false) {
	            unlink($path);
	        }
		}

        if($request->hasfile('gallery'))
        {
            if(count($request->file('gallery')) > 8){
                return redirect()->back()->withErrors('Максимум 8 изображений!')->withInput($request->all());
            }
            foreach($request->file('gallery') as $key => $file)
            {
                $path = $file->store('product-gallery', 'public');
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->url = '/storage/'.$path;
                $product_image->save();
            }
        }

		$validated['user_id'] = auth()->user()->id;

		$validated['slug'] = Str::slug($validated['title']);

		$saved = $product->update($validated);

		if ($request->has('save')) {
			return redirect()->route('products.edit', $product)->with('success', 'Товар создан');
		}
		if ($request->has('view')) {
			return redirect()->route('products.show', $product)->with('success', 'Товар создан');
		}
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
        if (file_exists($path) && strpos($path, '/images/') === false) {
            unlink($path);
        }

        foreach ($product->images as $product_image) {
	        $path = public_path($product_image->url);
	        if (file_exists($path) && strpos($path, '/images/') === false) {
	            unlink($path);
	        }
	        $product_image->delete();
        }

		$product->delete();

		return redirect()->route('products.index')->with('status', 'Товар "' . $title . '" удален');
	}


	public function productImageDelete(ProductImage $product_image)
	{

        $path = public_path($product_image->url);
        if (file_exists($path) && strpos($path, '/images/') === false) {
            unlink($path);
        }
		$product_image->delete();
		return redirect()->back()->with('status', 'Picture removed');
	}


    public function cart()
    {

        // $total = Product::paginate(5)->sum('price');

        // $total = auth()->user()->product->sum('price');


        // $product =Product::all();
        // $user = auth()->user();
        $delivery_price = 100;

        // $cart = auth()->user()->cart_array;
        // dd($cart);

        // $cart = $user->cart_products('product_id') * cart_products('product->price');

        return view('products.cart',[
            // 'total' => $total,
            // 'cart' => $cart,
            'delivery_price' => $delivery_price,
        ]);
    }


    public function addToCart($product_id)
    {
        // $token = request('token');
        // dd($token);
    	auth()->user()->cart_add($product_id);
    	return back()->with('status', 'Товар добавлен в корзину.');
    }


    public function cartItemDelete($product_id)
    {
    	auth()->user()->cart_delete_row($product_id);
    	return back()->with('status', 'Товар удален из корзины.');
    }

    public function cartItemMinus($product_id)
    {
    	auth()->user()->cart_item_minus($product_id);
    	return back()->with('status', 'Товар удален.');
    }

    public function cartItemPlus($product_id)
    {
    	auth()->user()->cart_item_plus($product_id);
    	return back()->with('status', 'Товар добавлен.');
    }

    public function cartDestroy()
    {
        auth()->user()->cart_destroy();
        return back()->with('status', 'Корзина очищена.');
    }

}
