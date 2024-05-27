<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $carts = $user->carts;

        return view('user.cart',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request=$request->all();
        //dd($request);
        $request['user_id']=Auth::user()->id;

        if(isset($request['add_to_cart'])){
            
            Cart::create($request);

            $wish=Wishlist::where('name',$request['name'])->where('user_id',$request['user_id'])->first();

            if($wish){
                $wish->delete();
            }
            
            return redirect()->route('cart.index');

        }else{

            Wishlist::create($request);
    
            return redirect()->route('wishlist.index');

        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //

        $data = $request->all();

        $model = $cart;

        $model->update($data);

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart=null)
    {
        //

        if ($cart) {
            // Si se proporciona un ID de carrito, elimina ese carrito específico
            $cart->delete();
        } else {
            // Si no se proporciona un ID de carrito, elimina todos los registros de la tabla Cart
            Cart::query()->delete();
        }

        return redirect()->route('cart.index');
    }
}
