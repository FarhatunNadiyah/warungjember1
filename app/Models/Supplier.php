<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'kode_pos'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
}
