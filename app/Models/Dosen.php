<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penilaian_gagasan_kreatif()
    {
        return $this->hasMany(PenilaianGagasanKreatif::class);
    }

    public function penilaian_produk_inovatif()
    {
        return $this->hasMany(PenilaianProdukInovatif::class);
    }
}
