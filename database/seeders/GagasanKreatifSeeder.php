<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GagasanKreatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gagasan_kreatifs')->insert([
            'kode' => '1.1',
            'keterangan' => 'Penggunaan bahasa Indonesia yang baik dan benar',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '1.2',
            'keterangan' => 'Kesesuaian pengutipan dan pengacuan dengan kaidah/standar yang berlaku',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.1',
            'keterangan' => 'Fakta atau gejala dalam lingkungan yang menarik untuk dikaji',
            'bobot' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.2',
            'keterangan' => 'Identifikasi masalah yang terdapat dalam fakta/gejala dalam lingkungan',
            'bobot' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.3',
            'keterangan' => 'Rumusan masalah sebagai hasil identifikasi masalah',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.4',
            'keterangan' => 'Uraian mengenai akibat pembiaran yang merugikan lingkungan',
            'bobot' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.5',
            'keterangan' => 'Uraian mengenai solusi yang berciri SMART',
            'bobot' => 15,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.6',
            'keterangan' => 'Uraian mengenai dampak lanjutan (efek bola salju) dari pencapaian solusi',
            'bobot' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.7',
            'keterangan' => 'Rincian uraian mengenai langkah-langkah tindakan untuk mencapai solusi',
            'bobot' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '2.8',
            'keterangan' => 'Uraian mengenai kendala/hambatan pelaksanaan gagasan dan antisipasinya',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '3.1',
            'keterangan' => 'Keunikan dan Orisinalitas Gagasan',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('gagasan_kreatifs')->insert([
            'kode' => '3.2',
            'keterangan' => 'Keterlaksanaan Gagasan',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
