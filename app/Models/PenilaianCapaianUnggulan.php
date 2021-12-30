<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PenilaianCapaianUnggulan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class);
    }

    public function capaian_unggulan()
    {
        return $this->belongsTo(CapaianUnggulan::class);
    }
}
