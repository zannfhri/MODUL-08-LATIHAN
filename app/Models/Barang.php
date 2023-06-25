<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
