<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubrikProdukInovatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '1',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Sebagian besar naskah PI dituangkan dalam paragraf yang tidak padu, kalimat yang tidak bergagasan lengkap dan jelas, serta pilihan kata dan ejaan yang tidak tepat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '1',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Naskah PI secara umum ditulis dengan menggunakan bahasa Indonesia yang tidak memenuhi kaidah kebahasaan, namun ditemukan kelemahan pada aspek kepaduan ide dalam paragraf dan kalimat sehingga logika bahasa dalam kalimat dan kesatuan gagasan dalam paragraf terlanggar.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '1',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Naskah PI secara umum ditulis dengan menggunakan bahasa Indonesia yang memenuhi kaidah kebahasaan, namun ditemukan kelemahan pada aspek kalimat sehingga logika bahasa dalam kalimat terlanggar.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '1',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Naskah PI secara umum ditulis dengan menggunakan bahasa Indonesia yang memenuhi kaidah kebahasaan, namun ditemukan kelemahan pada pemakaian ejaan dan pilihan kata.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '1',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Naskah PI secara umum ditulis dengan menggunakan bahasa Indonesia yang memenuhi kaidah kebahasaan pada semua aspek kebahasaan, yaitu kesatuan ide dalam paragraf, kalimat, pilihan kata, dan ejaan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '2',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Sumber-sumber yang dikutip diragukan merupakan sumber yang otoritatif dan relevan dengan Daftar Pustaka, meskipun tercantum lengkap dalam Daftar Pustaka sesuai dengan gaya selingkung yang digunakan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '2',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif, tercantum lengkap dalam Daftar Pustaka sesuai dengan gaya selingkung yang digunakan, namun kurang relevan dengan produk inovatif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '2',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif, relevan dengan produk inovatif, namun ditemukan cara mengutip yang meragukan apakah itu kutipan langsung atau tak langsung dan penulisan Daftar Pustaka yang tidak bersandar pada gaya selingkung (tidak alfabetis, tidak lengkap, atau memuat sumber-sumber acuan yang tidak dikutip).',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '2',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif, relevan dengan produk inovatif, namun ditemukan ketidakkonsistenan dalam penulisan tanda baca pada penulisan sumber acuan pada kutipan dan/atau Daftar Pustaka.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '2',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif,relevan dengan produk inovatif, dan tercantum lengkap dalam Daftar Pustaka sesuai dengan gaya selingkung yang digunakan oleh peserta.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '3',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dipaparkan serba sedikit dan tidak signifikan sebagai isu yang patut dikaji di samping antar hal menunjukkan ketidakrelevanan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '3',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dipaparkan namun disajikan secara tidak detail dan ada hal yang tidak relevan diikutsertakan dalam fakta atau gejala yang dipaparkan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '3',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji lengkap dipaparkan namun disajikan secara tidak detail atau ada hal yang kurang relevan diikutsertakan dalam fakta atau gejala yang dipaparkan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '3',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dideskripsikan secara detail, namun ada satu atau sedikit hal yang kurang relevan atau signifikan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '3',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dideskripsikan secara detail dan relevan satu dengan yang lain sehingga mengarah pada pentingnya pencarian solusi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '4',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Identifikasi permasalahan tidak dilakukan atau dilakukan namun sangat sedikit yang dipaparkan karena dari paparan fakta atau gejala di lingkungan langsung dirumuskan masalah tanpa adanya upaya mengidentifikasi masalah-masalah yang spesifik dalam data atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '4',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara kurang sistematis dan ditemukan beberapa hal yang menjadi masalah yang tidak relevan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '4',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara kurang sistematis atau ditemukan beberapa hal yang menjadi masalah yang tidak relevan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '4',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara sistematis namun ada sedikit masalah kekurang relevanan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '4',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara sistematis dan sepenuhnya relevan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '5',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Uraian karakteristik pihak terdampak tidak jelas dan lengkap tentang karakteristik pihak terdampak dari masalah yang ditemukan dan tidak dilengkapi dengan penjelasan dampaknya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '5',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Uraian yang kurang jelas dan lengkap tentang karakteristik pihak terdampak dari masalah yang ditemukan serta kurang dilengkapi dengan penjelasan dampaknya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '5',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Uraian yang cukup jelas dan lengkap tetang karakteristik pihak terdampak dari masalah yang ditemukan namun kurang dilengkapi dengan penjelasan dampaknya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '5',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Uraian yang sangat jelas dan lengkap tentang karakteristik pihak terdampak dari masalah yang ditemukan namun kurang dilengkapi dengan penjelasan dampaknya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '5',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Uraian yang sangat jelas dan lengkap tentang karakteristik pihak terdampak dari masalah yang ditemukan dan dilengkapi dengan penjelasan dampaknya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '6',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Uraian tujuan yang hendak dicapai dinyatakan kurang jelas dan spesifik serta kurang terukur ketercapaiannya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '6',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Uraian tujuan yang hendak dicapai dinyatakan kurang jelas dan spesifik serta kurang terukur ketercapaiannya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '6',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Uraian tujuan yang hendak dicapai dinyatakan cukup jelas dan spesifik serta terukur ketercapaiannya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '6',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Uraian tujuan yang hendak dicapai dinyatakan jelas dan spesifik namun kurang terukur ketercapaiannya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '6',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Uraian tujuan yang hendak dicapai dinyatakan sangat jelas dan spesifik serta terukur ketercapaiannya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '7',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Kelima unsur SMART ditampilkan tidak lengkap disertai dengan penjelasan yang tidak detail dan tidak komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '7',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Kelima unsur SMART ditampilkan cukup lengkap disertai dengan penjelasan yang kurang detail dan kurang komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '7',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Kelima unsur SMART ditampilkan cukup lengkap disertai dengan penjelasan yang cukup detail dan cukup komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '7',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Kelima unsur SMART ditampilkan secara lengkap dengan penjelasan yang cukup detail dan cukup komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '7',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Kelima unsur SMART ditampilkan secara lengkap dengan penjelasan yang detail dan komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '8',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Uraian yang tidak jelas dan lengkap tentang karakteristik pihak penerima manfaat serta tidak dilengkapi dengan penjelasan manfaatnya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '8',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Uraian yang kurang jelas dan lengkap tentang karakteristik pihak penerima manfaat serta tidak dilengkapi dengan penjelasan manfaatnya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '8',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Uraian yang cukup jelas dan lengkap tentang karakteristik penerima manfaat namun kurang dilengkapi dengan penjelasan manfaatnya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '8',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Uraian yang sangat jelas dan lengkap tentang karakteristik pihak penerima manfaat namun kurang dilengkapi dengan penjelasan manfaatnya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '8',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Uraian yang sangat jelas dan lengkap tentang karakteristik pihak penerima manfaat dan dilengkapi dengan penjelasan manfaatnya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '9',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang tidak logis dan sistematis serta tidak sesuai antara rencana dan realisasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '9',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang kurang logis dan sistematis serta kurang sesuai antara rencana dan realisasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '9',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang cukup logis dan sistematis namun kurang sesuai antara rencana dan realisasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '9',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang logis dan sistematis namun kurang sesuai antara rencana dan realisasinya atau uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang kurang logis dan sistematis meskipun sesuai antara rencana dan realisasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '9',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang logis dan sistematis serta kesesuaian antara rencana dan realisasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '10',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Hanya sebagian kebutuhan sumber daya yang meliputi aspek manusia, keuangan, waktu, dan peralatan pendukung diuraikan kurang rinci, rasional serta tidak dilengkapi data dukung.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '10',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Hanya sebagian kebutuhan sumber daya yang meliputi aspek manusia, keuangan, waktu, dan peralatan pendukung diuraikan dengan rinci, rasional serta tidak dilengkapi data dukung.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '10',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Seluruh kebutuhan sumber daya yang meliputi aspek manusia, keuangan, waktu, dan peralatan pendukung diuraikan cukup rinci, rasional namun hanya sebagian yang dilengkapi data dukung.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '10',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Seluruh kebutuhan sumber daya yang meliputi aspek manusia, keuangan, waktu, dan peralatan pendukung diuraikan cukup rinci, rasional dengan disertai data dukung yang cukup lengkap.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '10',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Seluruh kebutuhan sumber daya yang meliputi aspek manusia, keuangan, waktu, dan peralatan pendukung diuraikan secara rinci, rasional dengan disertai data dukung yang lengkap.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '11',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Gagasan sekadar mencontoh gagasan lain (imitasi) tanpa adaptasi dan improvisasi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '11',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Gagasan menerapkan gagasan serupa terdahulu (adaptasi) yang telah banyak dikerjakan pihak lain dan sesuai dengan lingkungan penerima manfaat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '11',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Gagasan menerapkan gagasan serupa terdahulu (adaptasi) yang belum banyak dikerjakan pihak lain dan sesuai dengan lingkungan penerima manfaat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '11',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Gagasan merupakan improvisasi, terinspirasi oleh gagasan lain, tetapi disesuaikan dengan kondisi lingkungan penerima manfaat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '11',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Gagasan inovatif dan merupakan terobosan mutakhir yang belum ditemukan dalam situasi atau lingkungan serupa.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '12',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Gagasan tidak mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa karena ada hal-hal yang meragukan dalam argumentasi dalam gagasan dan gagasan tidak dapat direalisasikan segera karena kondisi tertentu, seperti memerlukan tahap yang sangat panjang.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '12',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Gagasan tidak mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa karena ada hal-hal yang meragukan dalam argumentasi dalam gagasan meskipun gagasan dapat direalisasikan segera karena memiliki urgensi yang tinggi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '12',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Gagasan mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa namun diperlukan waktu yang panjang untuk merealisasikan gagasan karena kondisi tertentu, seperti memerlukan tahap yang sangat panjang.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '12',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Gagasan mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa sehingga mampu direalisasikan segera karena memiliki urgensi yang tinggi sepanjang sumber daya tersedia.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '12',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Gagasan mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa sehingga mampu direalisasikan segera karena memiliki urgensi yang tinggi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '13',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Produk tidak dapat diimplementasikan karena uraian perancangan produk tidak detil serta aspek pengujian produk tidak dilakukan sesuai dengan parameter standar, teknik, dan teknologi pengujian.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '13',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Produk kurang dapat diimplementasikan meskipun uraian perancangan produk cukup detil dengan memperhatikan sebagian kebutuhan, aspek dan kaidah disain namun aspek pengujian produk tidak dilakukan sesuai dengan parameter standar, teknik, dan teknologi pengujian.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '13',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Produk cukup dapat diimplementasikan dengan uraian perancangan produk cukup detil dengan hanya memperhatikan sebagian kebutuhan, aspek, dan kaidah disain, namun aspek pengujian produk dilakukan kurang sesuai dengan parameter standar, teknik, dan teknologi pengujian.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '13',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Produk dapat diimplementasikan dengan uraian perancangan produk cukup detil dengan hanya memperhatikan sebagian kebutuhan, aspek, dan kaidah disain, serta aspek pengujian produk dilakukan sesuai dengan parameter standar, teknik, dan teknologi pengujian.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_produk_inovatifs')->insert([
            'produk_inovatif_id' => '13',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Produk dapat diimplementasikan dengan uraian perancangan produk sangat detil dengan memperhatikan kebutuhan, aspek, dan kaidah disain, serta aspek pengujian produk dilakukan sangat sesuai dengan parameter standar, teknik, dan teknologi pengujian.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
