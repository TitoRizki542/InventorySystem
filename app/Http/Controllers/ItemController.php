<?php

namespace App\Http\Controllers;
use App\Models\ItemCategory;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::with('item_category')->get();
        return view('item.index', compact('item'));
    }

    public function create()
    {
        $itemCategory = ItemCategory::all();

        return view('item.create', compact('itemCategory'));
    }

    public function store(Request $request) 
    {

        $item = $request->validate([
            'item_category_id' => 'required',
            'name' => 'required',
        ]);

        $item['code'] = 'ITM-' . date('ds');
        $item['qty'] = 0; 

        Item::create($item);

        // dd($item['code']);
        return redirect()->route('item.index');
    }
}
