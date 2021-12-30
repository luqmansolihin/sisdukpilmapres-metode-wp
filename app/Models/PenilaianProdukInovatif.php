<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianProdukInovatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produk_inovatif()
    {
        return $this->belongsTo(ProdukInovatif::class);
    }

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
