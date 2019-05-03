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
        $item = Item::findOrFail(Cart::get($request->rowId)->id);
        $item->units = $item->units + Cart::get($request->rowId)->qty;
        $item->save();
        Cart::remove($request->rowId);
        return view('cart.show');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'units'=>'required|numeric|min:1',
        ]);

        Cart::setGlobalTax(0);
        $item = Item::findOrFail($request->itemId);
        if (($item->units < $request->units)) {
            return back()->withError('Not enough units in stock.')->withInput();
        }
        else {
            Cart::add([
                'id' => $item->id,
                'name' => $item->name,
                'qty' => $request->units,
                'price' => $item->price,
                'weight' => 0,
                'options' => [
                    'image' => $item->image, ]
            ]);
            $item->units = $item->units - $request->units;
            $item->save();
            return view('cart.show');
        }
    }
}
