<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::with('category')->get();
        $categorys = Category::all();
        return view('pages.items_page', compact('items', 'categorys'));
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
        $request->validate([
            'code_item' => 'required|string|max:255|unique:items',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:1',
            'condition' => 'required|in:good,bad',
            'location' => 'required|string',
        ]);

        $image = $request->file('image');
        $imageName = null;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
        }

        Items::create([
            'code_item' => $request->code_item,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'stock' => $request->stock,
            'condition' => $request->condition,
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code_item' => 'required|string|max:255|unique:items,code_item,' . $id,
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:1',
            'condition' => 'required|in:good,bad',
            'location' => 'required|string',
        ]);

        $item = Items::findOrFail($id);

        $image = $request->file('image');
        $imageName = $item->image;
        if ($image) {
            Storage::delete('public/img/' . $imageName);
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
        }

        $item->update([
            'code_item' => $request->code_item,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'stock' => $request->stock,
            'condition' => $request->condition,
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Items::findOrFail($id);
        Storage::delete('public/img/' . $item->image);
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted successfully');
    }
}

