<?php

namespace App\Http\Controllers;

use App\Item;
use App\Music;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class MusicController extends Controller
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
        return view('items.music.create');
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
            'album' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'required|image|max:10000',
            'image2' => 'nullable|image|max:10000',
            'video' =>'nullable'
        ]);

        $request->image->store('public');
        $url = Storage::url($request->image->hashName());

        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'units' => 1000000,
            'image' => $url,
            'category' => 'Music',
            'seller_id' => auth()->user()->id,
            'video' => $request->video
        ]);

        if (isset($request->image2)) {
            $request->image2->store('public');
            $url2 = Storage::url($request->image2->hashName());
            $item->image2 = $url2;
            $item->save();
        }

        Music::create([
            'item_id' => $item->id,
            'author' => $request->author,
            'album' => $request->album,
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
        return view('items.music.edit', compact('item'));
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
            'album' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'nullable|image|max:10000',
            'image2' => 'nullable|image|max:10000',
            'video' => 'nullable'
        ]);

        $item->update(request(['name', 'descriptions', 'price', 'video']));
        $item->music->author = $request->author;
        $item->music->album = $request->album;

        if (!is_null($request->image)) {
            $request->image->store('public');
            $url = Storage::url($request->image->hashName());
            $item->image = $url;
        }
        if (!is_null($request->image2)) {
            $request->image2->store('public');
            $url2 = Storage::url($request->image2->hashName());
            $item->image2 = $url2;
        }
        $item->save();

        return view('items.show', compact('item'));
    }
}
