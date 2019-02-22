<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;

class ajaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Product $product)
    {
        return response()->json(['purchase' => $product]);
    }
    public function search()
    {
        $data = request()->validate([
            'search' => 'required|max:24|',
        ]);
        $text = '%'.$data['search'].'%';
        $products = DB::table('products')->where('product_name','like',$text)->get();
        return response()->json(['success' => $products]);
    }
    public function register()
    {

    }
}
