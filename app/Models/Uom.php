<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'uom';

    protected $fillable = ['name'];

    public function inbound()
    {
        return $this->hasMany(Inbound::class, 'inbound_id');
    }

    public function outbound()
    {
        return $this->hasMany(Outbound::class, 'outbound_id');
    }
}
