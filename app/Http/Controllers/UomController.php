<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UomController extends Controller
{
     public function index()
    {
        $uom = Uom::all();

        return view('uom.index',compact('uom'));
    }

    public function create()
    {
        return view('uom.create');
    }

    public function store(Request $request)
    {
        // validasi request
        $uom = $request->validate([
            'name' => 'required',
        ]);
        // store request
        Uom::create($uom);

        return redirect()->route('uom.index');
    }
}
