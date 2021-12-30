<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianGagasanKreatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gagasan_kreatif()
    {
        return $this->belongsTo(GagasanKreatif::class);
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
