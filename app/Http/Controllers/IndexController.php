<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use App\Supplies;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $supplies = Supplies::all();
        $products = Product::all();
        return view('index',compact('products','supplies'));
    }
}
