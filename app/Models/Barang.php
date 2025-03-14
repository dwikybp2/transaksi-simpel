<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'barang_id', 'id');
    }
}
