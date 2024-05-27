<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $wishlists = $user->wishlists;

        // Retorna la vista pasando la variable $count_wishlist_items
        return view('user.wishlist', compact('wishlists'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(deseos $deseos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(deseos $deseos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, deseos $deseos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
        Wishlist::query()->delete();

        return redirect()->route('wishlist.index');
    }
}
