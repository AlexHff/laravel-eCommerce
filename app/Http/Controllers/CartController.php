<?php

namespace App\Http\Controllers;

use Cart;
use App\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        Cart::setGlobalTax(0);
        return view('cart.show');
    }

    public function delete(Request $request)
    {
        Cart::setGlobalTax(0);
        Cart::remove($request->rowId);
        return view('cart.show');
    }

    public function add(Request $request)
    {
        Cart::setGlobalTax(0);
        $item = Item::findOrFail($request->itemId);
        Cart::add($item->id, $item->name, 1, $item->price);
        return view('cart.show');
    }
}
