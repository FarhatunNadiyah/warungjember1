<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'gambar', 'kategori_id', 'stok', 'harga'];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);

    }
}
