<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class ItemController extends Controller
{
    /**
     * Manage permissions.
     */
    public function __construct()
    {
        $this->middleware('permission:create_items', ['only' => ['new','create','store']]);
        $this->middleware('permission:edit_items', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_items', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $items)
    {
        $items = Item::all();
        return view('items/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|numeric|digits_between:0,1000000',
            'image' => 'required|image|max:10000'
        ]);

        $request->image->store('public');
        $url = Storage::url($request->image->hashName());

        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'units' => $request->units,
            'image' => $url,
            'category' => 'Sports & Outdoors',
            'seller_id' => auth()->user()->id
        ]);

        return view('items.show', compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        switch ($item->category) {
            case 'Book':
                return view('items.book.edit', compact('item'));
                break;
            case 'Music':
                return view('items.music.edit', compact('item'));
                break;
            case 'Clothing':
                return view('items.clothing.edit', compact('item'));
                break;
            default:
                return view('items.edit', compact('item'));
                break;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|numeric|digits_between:0,1000000',
            'image' => 'nullable|image|max:10000',
        ]);
        $item->update(request(['name', 'descriptions', 'price', 'units']));

        if (!is_null($request->image)) {
            $request->image->store('public');
            $url = Storage::url($request->image->hashName());
            $item->image = $url;
        }
        $item->save();

        return view('items.show', compact('item'));
    }

    public function search(Request $request)
    {
        $items = Item::search($request->search)->get();
        return view('items/index', compact('items'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('items');
    }
}
