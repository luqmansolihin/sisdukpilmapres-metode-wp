<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunSeleksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['tanggal_buka', 'tanggal_tutup'];

    public function getRouteKeyName()
    {
        return 'tahun_akademik';
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function temp_hasil()
    {
        return $this->hasMany(TempHasil::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
