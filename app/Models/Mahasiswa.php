<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['tanggal_lahir'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function temp_hasil()
    {
        return $this->hasOne(TempHasil::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
