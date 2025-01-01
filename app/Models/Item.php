<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'item';

    protected $fillable = [
        'item_category_id',
        'code',
        'name',
        'qty',
    ];

    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }

    public function inbounds()
    {
        return $this->hasMany(Inbound::class, 'item_id');
    }

    public function outbounds()
    {
        return $this->hasMany(Outbound::class, 'item_id');
    }

}
