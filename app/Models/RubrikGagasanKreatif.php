<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubrikGagasanKreatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gagasan_kreatif()
    {
        return $this->belongsTo(GagasanKreatif::class);
    }
}
