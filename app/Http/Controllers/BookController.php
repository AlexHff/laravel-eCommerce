<?php

namespace App\Http\Controllers;

use App\Item;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class BookController extends Controller
{
    /**
     * Manage permissions.
     */
    public function __construct()
    {
        $this->middleware('permission:create_items', ['only' => ['create','store']]);
        $this->middleware('permission:edit_items', ['only' => ['edit','update']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('items.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'author' => 'required|max:191',
            'release' => 'required|numeric|max:2019',
            'description' => 'required|max:191',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|numeric|digits_between:0,1000000',
            'image' => 'required|image|max:10000',
        ]);

        $request->image->store('public');
        $url = Storage::url($request->image->hashName());

        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'units' => $request->units,
            'image' => $url,
            'category' => 'Book',
            'seller_id' => auth()->user()->id
        ]);

        Book::create([
            'item_id' => $item->id,
            'author' => $request->author,
            'release' => $request->release,
        ]);

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
        return view('items.book.edit', compact('item'));
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
            'author' => 'required|max:191',
            'release' => 'required|numeric|max:2019',
            'description' => 'required|max:191',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|numeric|digits_between:0,1000000',
            'image' => 'nullable|image|max:10000',
        ]);

        $item->update(request(['name', 'descriptions', 'price', 'units']));
        $item->book->author = $request->author;
        $item->book->release = $request->release;

        if (!is_null($request->image)) {
            $request->image->store('public');
            $url = Storage::url($request->image->hashName());
            $item->image = $url;
        }
        $item->save();

        return view('items.show', compact('item'));
    }
}
