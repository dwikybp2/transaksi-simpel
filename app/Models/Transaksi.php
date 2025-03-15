<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['barang_id', 'created_at', 'updated_at'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
