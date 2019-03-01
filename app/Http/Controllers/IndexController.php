<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use App\Supplies;
use Illuminate\Http\Request;
use App\Purchase;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $supplies = Supplies::all();
        $products = Product::all()->sortByDesc('id');
        $purchases = Purchase::orderBy('id','desc')->take(10)->get();
        $from = date('Y-m-d H:m:i',strtotime( '-1 days'));
        $to = date('Y-m-d H:m:i');
        $purchaseToday = Purchase::whereBetween('created_at', [$from, $to])->get();
        return view('index',compact('products','supplies','purchases','purchaseToday'));
    }
}
