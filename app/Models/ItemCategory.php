<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'item_category';

    protected $fillable = ['name'];

    public function item()
    {
        return $this->hasMany(Item::class, 'item_id');
    }

}
