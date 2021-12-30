<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriterias')->insert([
            'name' => 'Capaian Unggulan',
            'bobot' => 0,
            'program_pendidikan' => 'Sarjana',
            'keterangan' => 'benefit',
            'bobot_normalisasi' => 0,
            'bobot_pangkat' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kriterias')->insert([
            'name' => 'Gagasan Kreatif',
            'bobot' => 0,
            'program_pendidikan' => 'Sarjana',
            'keterangan' => 'benefit',
            'bobot_normalisasi' => 0,
            'bobot_pangkat' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kriterias')->insert([
            'name' => 'Capaian Unggulan',
            'bobot' => 0,
            'program_pendidikan' => 'Diploma',
            'keterangan' => 'benefit',
            'bobot_normalisasi' => 0,
            'bobot_pangkat' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kriterias')->insert([
            'name' => 'Produk Inovatif',
            'bobot' => 0,
            'program_pendidikan' => 'Diploma',
            'keterangan' => 'benefit',
            'bobot_normalisasi' => 0,
            'bobot_pangkat' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
