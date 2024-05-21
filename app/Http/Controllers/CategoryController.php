<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($name)
    {
        $products=Product::where('category',$name)->get();

        return view('user.category',compact('products','name'));
    }
}
