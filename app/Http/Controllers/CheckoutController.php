<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = $request->user();

        $carts = $user->carts;
        
        return view('user.checkout',compact('carts'));
    }

    
}
