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
        Cart::add([
            'id' => $item->id,
            'name' => $item->name,
            'qty' => 1,
            'price' => $item->price,
            'weight' => 0,
            'options' => [
                'image' => $item->image, ]
            ]);
        return view('cart.show');
    }
}
