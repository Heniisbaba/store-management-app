<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Product;
use App\Supplies;

use Illuminate\Http\Request;

class SuppliesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $supplies = Supplies::all();
        $products = Product::all();
        return view('supplies.index',compact('suppliers','products','supplies'));
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
            'supplier' => 'required|min:3|max:128|unique:suppliers,supplier'
        ]);
        Supplier::create($data);
        return redirect('/supplies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplies.index', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplies.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $supplier = Supplier::find($id);
        $data = request()->validate([
            'supplier' => 'required|min:3|max:128|unique:suppliers,supplier,'.$supplier->id
        ]);
        $supplier->update($data);
        return redirect('/supplies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/supplies');
    }
}
