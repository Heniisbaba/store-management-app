<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplies;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\ProductsSupplied;

class SupplierSuppliesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = request()->validate([
            'supplier_id' => 'numeric|required',
            'goods_supplied' => 'required',
            'description' => 'required|string|min:8',
            'complete' => ''
        ]);
        $desc = $data['description'];
        $goods = $data['goods_supplied'];
        $data['goods_supplied'] = implode(',',$data['goods_supplied']);
        $products = Product::all()->whereIn('id', $goods);
        $data['complete'] = request()->has('complete');
        $id = Supplies::create($data)->id;
        foreach($products as $product){
            $update = ['updated_at' => time() ];
            $product->update($update);
            $product_name[] = $product->product_name;
        }
        auth()->user()->notify(new ProductsSupplied($id,$product_name,$desc));
        return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
