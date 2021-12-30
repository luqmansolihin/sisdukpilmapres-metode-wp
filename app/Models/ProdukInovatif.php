<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukInovatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaian_produk_inovatif()
    {
        return $this->hasMany(PenilaianProdukInovatif::class);
    }

    public function rubrik_produk_inovatif()
    {
        return $this->hasMany(RubrikProdukInovatif::class);
    }
}
