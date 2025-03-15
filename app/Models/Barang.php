<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'stok', 'jenis', 'created_at', 'updated_at'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'barang_id', 'id');
    }
}
