<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ViewController extends Controller
{
    //

    public function index(Request $request, Product $product){

        $products=Product::where('id',$product->id)->get();

        return view('user.view',compact('products'));
    }
}
