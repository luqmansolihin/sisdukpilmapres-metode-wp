<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianUnggulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A1',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Perorangan',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A2',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Perorangan',
            'kategori' => 'Internasional',
            'skor' => '45',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A3',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Perorangan',
            'kategori' => 'Internasional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A4',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Perorangan',
            'kategori' => 'Internasional',
            'skor' => '32',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A5',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Beregu',
            'kategori' => 'Internasional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A6',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Beregu',
            'kategori' => 'Internasional',
            'skor' => '35',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A7',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Beregu',
            'kategori' => 'Internasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1A8',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Beregu',
            'kategori' => 'Internasional',
            'skor' => '24',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '1B1',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Perorangan',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B2',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Perorangan',
            'kategori' => 'Regional',
            'skor' => '35',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B3',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Perorangan',
            'kategori' => 'Regional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B4',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Perorangan',
            'kategori' => 'Regional',
            'skor' => '24',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B5',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Beregu',
            'kategori' => 'Regional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B6',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Beregu',
            'kategori' => 'Regional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B7',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Beregu',
            'kategori' => 'Regional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1B8',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Beregu',
            'kategori' => 'Regional',
            'skor' => '16',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '1C1',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Perorangan',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C2',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Perorangan',
            'kategori' => 'Nasional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C3',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Perorangan',
            'kategori' => 'Nasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C4',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Perorangan',
            'kategori' => 'Nasional',
            'skor' => '16',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C5',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Beregu',
            'kategori' => 'Nasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C6',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Beregu',
            'kategori' => 'Nasional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C7',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Beregu',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1C8',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Beregu',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '1D1',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Perorangan',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D2',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Perorangan',
            'kategori' => 'Provinsi',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D3',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Perorangan',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D4',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Perorangan',
            'kategori' => 'Provinsi',
            'skor' => '8',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D5',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-1 Beregu',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D6',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-2 Beregu',
            'kategori' => 'Provinsi',
            'skor' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D7',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara-3 Beregu',
            'kategori' => 'Provinsi',
            'skor' => '6',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '1D8',
            'bidang' => 'Kompetisi',
            'wujud' => 'Juara Kategori Beregu',
            'kategori' => 'Provinsi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '2A1',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Bersertifikat',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2A2',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Tidak Bersertifikat',
            'kategori' => 'Internasional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2A3',
            'bidang' => 'Pengakuan',
            'wujud' => 'Narasumber/Pembicara',
            'kategori' => 'Internasional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2A4',
            'bidang' => 'Pengakuan',
            'wujud' => 'Moderator',
            'kategori' => 'Internasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2A5',
            'bidang' => 'Pengakuan',
            'wujud' => 'Lainnya',
            'kategori' => 'Internasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '2B1',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Bersertifikat',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2B2',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Tidak Bersertifikat',
            'kategori' => 'Regional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2B3',
            'bidang' => 'Pengakuan',
            'wujud' => 'Narasumber/Pembicara',
            'kategori' => 'Regional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2B4',
            'bidang' => 'Pengakuan',
            'wujud' => 'Moderator',
            'kategori' => 'Regional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2B5',
            'bidang' => 'Pengakuan',
            'wujud' => 'Lainnya',
            'kategori' => 'Regional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '2C1',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Bersertifikat',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2C2',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Tidak Bersertifikat',
            'kategori' => 'Nasional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2C3',
            'bidang' => 'Pengakuan',
            'wujud' => 'Narasumber/Pembicara',
            'kategori' => 'Nasional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2C4',
            'bidang' => 'Pengakuan',
            'wujud' => 'Moderator',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2C5',
            'bidang' => 'Pengakuan',
            'wujud' => 'Lainnya',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '2D1',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Bersertifikat',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2D2',
            'bidang' => 'Pengakuan',
            'wujud' => 'Pelatih/Wasit/Juri Tidak Bersertifikat',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2D3',
            'bidang' => 'Pengakuan',
            'wujud' => 'Narasumber/Pembicara',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2D4',
            'bidang' => 'Pengakuan',
            'wujud' => 'Moderator',
            'kategori' => 'Provinsi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '2D5',
            'bidang' => 'Pengakuan',
            'wujud' => 'Lainnya',
            'kategori' => 'Provinsi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '3A2',
            'bidang' => 'Penghargaan',
            'wujud' => 'Tanda Jasa',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3A3',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Emas Berdasar Nilai Batas)',
            'kategori' => 'Internasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3A4',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perak Berdasar Nilai Batas)',
            'kategori' => 'Internasional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3A5',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perunggu Berdasar Nilai Batas)',
            'kategori' => 'Internasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3A6',
            'bidang' => 'Penghargaan',
            'wujud' => 'Piagam Partisipasi',
            'kategori' => 'Internasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3A7',
            'bidang' => 'Penghargaan',
            'wujud' => 'Penerima Hibah Kompetisi',
            'kategori' => 'Internasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3A8',
            'bidang' => 'Penghargaan',
            'wujud' => 'Lainnya',
            'kategori' => 'Internasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '3B2',
            'bidang' => 'Penghargaan',
            'wujud' => 'Tanda Jasa',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3B3',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Emas Berdasar Nilai Batas)',
            'kategori' => 'Regional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3B4',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perak Berdasar Nilai Batas)',
            'kategori' => 'Regional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3B5',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perunggu Berdasar Nilai Batas)',
            'kategori' => 'Regional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3B6',
            'bidang' => 'Penghargaan',
            'wujud' => 'Piagam Partisipasi',
            'kategori' => 'Regional',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3B7',
            'bidang' => 'Penghargaan',
            'wujud' => 'Penerima Hibah Kompetisi',
            'kategori' => 'Regional',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3B8',
            'bidang' => 'Penghargaan',
            'wujud' => 'Lainnya',
            'kategori' => 'Regional',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '3C1',
            'bidang' => 'Penghargaan',
            'wujud' => 'HaKI',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C2',
            'bidang' => 'Penghargaan',
            'wujud' => 'Tanda Jasa',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C3',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Emas Berdasar Nilai Batas)',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C4',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perak Berdasar Nilai Batas)',
            'kategori' => 'Nasional',
            'skor' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C5',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perunggu Berdasar Nilai Batas)',
            'kategori' => 'Nasional',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C6',
            'bidang' => 'Penghargaan',
            'wujud' => 'Piagam Partisipasi',
            'kategori' => 'Nasional',
            'skor' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C7',
            'bidang' => 'Penghargaan',
            'wujud' => 'Penerima Hibah Kompetisi',
            'kategori' => 'Nasional',
            'skor' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3C8',
            'bidang' => 'Penghargaan',
            'wujud' => 'Lainnya',
            'kategori' => 'Nasional',
            'skor' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '3D2',
            'bidang' => 'Penghargaan',
            'wujud' => 'Tanda Jasa',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3D3',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Emas Berdasar Nilai Batas)',
            'kategori' => 'Provinsi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3D4',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perak Berdasar Nilai Batas)',
            'kategori' => 'Provinsi',
            'skor' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3D5',
            'bidang' => 'Penghargaan',
            'wujud' => '(Grand Final, Peraih Medali Perunggu Berdasar Nilai Batas)',
            'kategori' => 'Provinsi',
            'skor' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3D6',
            'bidang' => 'Penghargaan',
            'wujud' => 'Piagam Partisipasi',
            'kategori' => 'Provinsi',
            'skor' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3D7',
            'bidang' => 'Penghargaan',
            'wujud' => 'Penerima Hibah Kompetisi',
            'kategori' => 'Provinsi',
            'skor' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '3D8',
            'bidang' => 'Penghargaan',
            'wujud' => 'Lainnya',
            'kategori' => 'Provinsi',
            'skor' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '4A1',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Ketua',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4A2',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Wakil Ketua',
            'kategori' => 'Internasional',
            'skor' => '45',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4A3',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Sekretaris',
            'kategori' => 'Internasional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4A4',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Bendahara',
            'kategori' => 'Internasional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4A5',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Satu Tingkat Dibawah Pengurus Harian',
            'kategori' => 'Internasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '4B1',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Ketua',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4B2',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Wakil Ketua',
            'kategori' => 'Regional',
            'skor' => '35',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4B3',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Sekretaris',
            'kategori' => 'Regional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4B4',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Bendahara',
            'kategori' => 'Regional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4B5',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Satu Tingkat Dibawah Pengurus Harian',
            'kategori' => 'Regional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '4C1',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Ketua',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4C2',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Wakil Ketua',
            'kategori' => 'Nasional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4C3',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Sekretaris',
            'kategori' => 'Nasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4C4',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Bendahara',
            'kategori' => 'Nasional',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4C5',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Satu Tingkat Dibawah Pengurus Harian',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '4D1',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Ketua',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4D2',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Wakil Ketua',
            'kategori' => 'Provinsi',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4D3',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Sekretaris',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4D4',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Bendahara',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4D5',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Satu Tingkat Dibawah Pengurus Harian',
            'kategori' => 'Provinsi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '4E1',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Ketua',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4E2',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Wakil Ketua',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '8',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4E3',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Sekretaris',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '6',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4E4',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Bendahara',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '6',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '4E5',
            'bidang' => 'Karir Organisasi',
            'wujud' => 'Satu Tingkat Dibawah Pengurus Harian',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '5A1',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Buku ber-ISBN',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A2',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Ilmiah yang Sudah Diterbitkan',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A3',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Seni',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A4',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Design',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A5',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Temuan Model',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A6',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Aplikasi Komputer',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A7',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Film',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5A8',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Produk Inovatif Lainnya',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '5B1',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Buku ber-ISBN',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B2',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Ilmiah yang Sudah Diterbitkan',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B3',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Seni',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B4',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Design',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B5',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Temuan Model',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B6',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Aplikasi Komputer',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B7',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Film',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5B8',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Produk Inovatif Lainnya',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '5C1',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Buku ber-ISBN',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C2',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Ilmiah yang Sudah Diterbitkan',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C3',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Seni',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C4',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Design',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C5',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Temuan Model',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C6',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Aplikasi Komputer',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C7',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Film',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5C8',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Produk Inovatif Lainnya',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '5D1',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Buku ber-ISBN',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D2',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Ilmiah yang Sudah Diterbitkan',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D3',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Seni',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D4',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Design',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D5',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Temuan Model',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D6',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Aplikasi Komputer',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D7',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Film',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5D8',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Produk Inovatif Lainnya',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '5E1',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Buku ber-ISBN',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E2',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Ilmiah yang Sudah Diterbitkan',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E3',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Seni',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E4',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Design',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E5',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Temuan Model',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E6',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Aplikasi Komputer',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E7',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Karya Film',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '5E8',
            'bidang' => 'Hasil Karya',
            'wujud' => 'Produk Inovatif Lainnya',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '6A1',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Pemrakarsa/Pendiri',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6A2',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Koordinator Relawan',
            'kategori' => 'Internasional',
            'skor' => '35',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6A3',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Relawan',
            'kategori' => 'Internasional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '6B1',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Pemrakarsa/Pendiri',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6B2',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Koordinator Relawan',
            'kategori' => 'Regional',
            'skor' => '25',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6B3',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Relawan',
            'kategori' => 'Regional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '6C1',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Pemrakarsa/Pendiri',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6C2',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Koordinator Relawan',
            'kategori' => 'Nasional',
            'skor' => '15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6C3',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Relawan',
            'kategori' => 'Nasional',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '6D1',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Pemrakarsa/Pendiri',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6D2',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Koordinator Relawan',
            'kategori' => 'Provinsi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6D3',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Relawan',
            'kategori' => 'Provinsi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '6E1',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Pemrakarsa/Pendiri',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6E2',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Koordinator Relawan',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('capaian_unggulans')->insert([
            'kode' => '6E3',
            'bidang' => 'Pemberdayaan atau Aksi Kemanusiaan',
            'wujud' => 'Relawan',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '7A1',
            'bidang' => 'Kewirausahaan',
            'wujud' => 'Kewiarusahaan',
            'kategori' => 'Internasional',
            'skor' => '50',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '7B1',
            'bidang' => 'Kewirausahaan',
            'wujud' => 'Kewiarusahaan',
            'kategori' => 'Regional',
            'skor' => '40',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '7C1',
            'bidang' => 'Kewirausahaan',
            'wujud' => 'Kewiarusahaan',
            'kategori' => 'Nasional',
            'skor' => '30',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '7D1',
            'bidang' => 'Kewirausahaan',
            'wujud' => 'Kewiarusahaan',
            'kategori' => 'Provinsi',
            'skor' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('capaian_unggulans')->insert([
            'kode' => '7E1',
            'bidang' => 'Kewirausahaan',
            'wujud' => 'Kewiarusahaan',
            'kategori' => 'Lokal Perguruan Tinggi',
            'skor' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
