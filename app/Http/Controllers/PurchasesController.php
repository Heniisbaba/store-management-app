<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Purchase;
use App\Product;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::paginate(10);
        return view('sales.index', compact('purchases'));
    }

    public function home()
    {
        $day = date('d',time()-30);
        $from = date('Y-m-d',strtotime( '-1 month', time()));
        $to = date('Y-m-d H:m:i',time());

        $purchase = Purchase::whereBetween('created_at', [$from, $to])->get();
        return response()->json([$tok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_name' => 'required',
            'size' => 'required',
            'rate' => 'required',
            'purchase_quantity' => 'required',
            'total' => 'required',
        ]);
        if($request['customer_name'] == ''){
            $data['customer_name'] = 'Anoymous';
            $data['customer_phone'] = 'Anoymous';
            $data['customer_mail'] = 'Anoymous';
            $data['customer_address'] = 'Anoymous';
        }
        $id = $request['product_id'];
        $bought = $data['purchase_quantity'];
        $product = Product::findOrFail($id);
        $product->stock_quantity = $product->stock_quantity - $bought;
        $product->save(); 
        Purchase::create($data);
        return response()->json(['status' => $data['product_name'].' was successfully purchased']);
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
