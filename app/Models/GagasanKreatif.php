<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GagasanKreatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaian_gagasan_kreatif()
    {
        return $this->hasMany(PenilaianGagasanKreatif::class);
    }

    public function rubrik_gagasan_kreatif()
    {
        return $this->hasMany(RubrikGagasanKreatif::class);
    }
}
