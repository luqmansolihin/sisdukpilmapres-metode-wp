<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubrikProdukInovatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produk_inovatif()
    {
        return $this->belongsTo(ProdukInovatif::class);
    }
}
