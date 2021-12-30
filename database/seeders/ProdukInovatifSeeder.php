<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukInovatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_inovatifs')->insert([
            'kode' => '1.1',
            'keterangan' => 'Penggunaan bahasa Indonesia yang baik dan benar',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '1.2',
            'keterangan' => 'Kesesuaian pengutipan dan pengacuan dengan kaidah/standar yang berlaku',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.1.1',
            'keterangan' => 'Fakta atau gejala dalam lingkungan yang menarik untuk dikaji',
            'bobot' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.1.2',
            'keterangan' => 'Identifikasi masalah yang terdapat dalam fakta/gejala dalam lingkungan',
            'bobot' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.1.3',
            'keterangan' => 'Adanya uraian pihak terdampak',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.2.1',
            'keterangan' => 'Tujuan yang hendak dicapai dari solusi yang dipilih',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.2.2',
            'keterangan' => 'Uraian mengenai solusi yang berciri SMART',
            'bobot' => 15,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.2.3',
            'keterangan' => 'Uraian mengenai pihak penerima manfaat',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.2.4',
            'keterangan' => 'Rincian uraian mengenai langkah-langkah tindakan untuk mencapai solusi',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '2.2.5',
            'keterangan' => 'Uraian mengenai kebutuhan sumber daya',
            'bobot' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '3.1',
            'keterangan' => 'Keunikan Produk',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '3.2',
            'keterangan' => 'Orisinalitas Produk',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produk_inovatifs')->insert([
            'kode' => '3.3',
            'keterangan' => 'Kelayakan Produk',
            'bobot' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
