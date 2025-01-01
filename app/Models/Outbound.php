<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbound extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'outbound';

    protected $fillable = [
        'uom_id',
        'item_id',
        'doc_number',
        'doc_date',
        'Qty',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id');
    }
}
