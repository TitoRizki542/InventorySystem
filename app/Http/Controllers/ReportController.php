<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Uom;
use App\Models\Item;
use App\Models\Outbound;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function inbound()
    {
        //Mengambil data item dan uom
        $item  = Item::all();
        $uom = Uom::all();

        //Mengambil data inbound dengan relasi item dan uom
        $inbound = Inbound::with('item', 'uom')->get();
        
        //mengembalikan nilai ke view
        return view('report.inbound', compact('item', 'uom', 'inbound'));
    }

    public function inbound_store(Request $request)
    {
        //Menampung Request
        $inbound = $request->validate([
            'doc_date' => 'required',
            'qty' => 'required',
            'item_id' => 'required',
            'uom_id' => 'required',
        ]);

        //Generate nomor dokumen
        $lastNumber = Inbound::count('id') ?? 0;
        $newNumber = $lastNumber + 1;

        $inbound['doc_number'] = 'INBND-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        //Simpan data ke dalam tabel Inbound
        Inbound::create($inbound);

        //  Menambah qty item
        $item = Item::find($inbound['item_id']);
        $item->increment('qty', $inbound['qty']);

        return redirect()->route('report.inbound');
    }

    public function outbound()
    {
        $item  = Item::where('qty', '>', 0)->get();
        $uom = Uom::all();
        
        $outbound = Outbound::with('item', 'uom')->get();

        return view('report.outbound', compact('item', 'uom', 'outbound'));
    }

    public function outbound_store(Request $request)
    {
        $item = Item::find($request['item_id']);

        //Menampung Request
        $outbound = $request->validate([
            'doc_date' => 'required',
            'Qty' => 'required',
            'item_id' => 'required',
            'uom_id' => 'required',
        ]);

        
        //Generate nomor dokumen
        $lastNumber = Outbound::count('id') ?? 0;
        $newNumber = $lastNumber + 1;

        $outbound['doc_number'] = 'OUTBND-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        
        //mengecek stok item
        if($item->qty < $outbound['Qty']){
            return redirect()->route('report.outbound')->with('error', 'Stok item tidak mencukupi');
        }

        //Mengurangi qty item
        $item->decrement('qty', $outbound['Qty']);

        //Cek stok item
        if($item->qty < 0){
            // Mengembalikan qty item jika pengurangan menyebabkan stok menjadi minus
            $item->increment('qty', $outbound['Qty']);
            return redirect()->route('report.outbound');
        }

        //Simpan data ke dalam tabel Outbound
        Outbound::create($outbound);


        return redirect()->route('report.outbound');
        
    }
}
