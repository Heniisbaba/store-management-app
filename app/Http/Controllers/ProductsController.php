<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'product_name' => 'required|max:128|unique:products,product_name',
            'product_images' => 'required',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric|max:1|min:1',
            'purchase_cost' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'supplier_id' => 'required|numeric|min:1|max:1',
            'stock_quantity' => 'required|numeric',
            'physical_quantity_units' => 'required',
            'physical_quantity' => 'required',
        ]);
        if($request->hasfile('product_images'))
        {
            foreach($request->file('product_images') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $image_list[] = $name;  
            }
        }
        $product_images = json_encode($image_list);
        $data['product_images'] = $product_images;
        Product::create($data);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = request()->validate([
            'product_name' => 'required|max:128|unique:products,product_name,'.$product->id,
            'product_images' => 'required',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric|max:1|min:1',
            'purchase_cost' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'supplier_id' => 'required|numeric|min:1|max:1',
            'stock_quantity' => 'required|numeric',
            'physical_quantity_units' => 'required',
            'physical_quantity' => 'required',
        ]);
        $data['stock_quantity'] = $product->stock_quantity + $data['stock_quantity'];
        if($request->hasfile('product_images'))
        {
            foreach($request->file('product_images') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $image_list[] = $name;  
            }
        }
        $product_images = json_encode($image_list);
        $data['product_images'] = $product_images;
        $product->update($data);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
