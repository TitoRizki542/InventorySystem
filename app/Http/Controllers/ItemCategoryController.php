<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {
        $itemCategory = ItemCategory::all();

        return view('item-category.index', compact('itemCategory'));
    }

    public function create()
    {
        return view('item-category.create');
    }

    public function store(Request $request)
    {
        // validasi request
        $itemCategory = $request->validate([
            'name' => 'required',
        ]);

        // store request
        ItemCategory::create($itemCategory);

        return redirect()->route('item-category.index');
    }
}
