<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Inbound;
use App\Models\Outbound;
use App\Models\ItemCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $item = Item::count();
        $inbound = Inbound::count();
        $outbound = Outbound::count();
        $itemCategory = ItemCategory::count();
        return view('index', compact('item', 'inbound', 'outbound', 'itemCategory'));
    }    
}
