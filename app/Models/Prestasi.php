<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Prestasi extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function tahun_seleksi()
    {
        return $this->belongsTo(TahunSeleksi::class);
    }

    public function penilaian_capaian_unggulan()
    {
        return $this->hasMany(PenilaianCapaianUnggulan::class);
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
