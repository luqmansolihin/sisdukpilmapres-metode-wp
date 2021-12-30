<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianUnggulan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaian_capaian_unggulan()
    {
        return $this->hasMany(PenilaianCapaianUnggulan::class);
    }
}
