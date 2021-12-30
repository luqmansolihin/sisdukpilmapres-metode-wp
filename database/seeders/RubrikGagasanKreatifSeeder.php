<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubrikGagasanKreatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '1',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Sebagian besar gagasan dituangkan dalam paragraf yang tidak padu, kalimat yang tidak bergagasan lengkap dan jelas, serta pilihan kata dan ejaan yang tidak tepat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '1',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Gagasan secara umum ditulis dengan menggunakan bahasa Indonesia yang tidak memenuhi kaidah kebahasaan, namun ditemukan kelemahan pada aspek kepaduan ide dalam paragraf dan kalimat sehingga logika bahasa dalam kalimat dan kesatuan gagasan dalam paragraf terlanggar.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '1',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Gagasan secara umum ditulis dengan menggunakan bahasa Indonesia yang memenuhi kaidah kebahasaan, namun ditemukan kelemahan pada aspek kalimat sehingga logika bahasa dalam kalimat terlanggar.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '1',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Gagasan secara umum ditulis dengan menggunakan bahasa Indonesia yang memenuhi kaidah kebahasaan, namun ditemukan kelemahan yang ditemukan pada pemakaian ejaan dan pilihan kata.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '1',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Gagasan secara umum ditulis dengan menggunakan bahasa Indonesia yang memenuhi kaidah kebahasaan pada semua aspek kebahasaan, yaitu kesatuan ide dalam paragraf, kalimat, pilihan kata, dan ejaan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '2',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Sumber-sumber yang dikutip diragukan merupakan sumber yang otoritatif dan relevan dengan Daftar Pustakan, meskipun tercantum lengkap dalam Daftar Pustaka sesuai dengan selingkung yang digunakan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '2',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif, tercantum lengkap dalam Daftar Pustaka sesuai dengan selingkung yang digunakan, namun kurang relevan dengan gagasan kreatif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '2',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif, relevan dengan gagasan kreatif, namun ditemukan cara mengutip yang meragukan apakah itu kutipan langsung atau tak langsung dan penulisan Daftar Pustaka yang tidak bersandar pada gaya selingkung (tidak alfabetis, tidak lengkap, atau memuat sumber-sumber acuan yang tidak dikutip).',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '2',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif, relevan dengan gagasan kreatif, namun ditemukan ketidak konsistenan dalam penulisan tanda baca pada penulisan sumber acuan pada kutipan dan/atau Daftar Pustaka atau adanya acuan pada Daftar Pustaka yang ditulis tidak konsisten dengan gaya selingkung penulisan Daftar Pustaka yang digunakan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '2',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Sumber-sumber yang dikutip merupakan sumber yang otoritatif,relevan dengan gagasan kreatif, dan tercantum lengkap dalam Daftar Pustaka sesuai dengan selingkung yang digunakan oleh peserta.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '3',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dipaparkan serba sedikit dan tidak signifikan sebagai isu yang patut dikaji di samping antar hal menunjukkan ketidakrelevanan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '3',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dipaparkan namun disajikan secara tidak detail dan ada hal yang tidak relevan diikutsertakan dalam fakta atau gejala yang dipaparkan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '3',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji lengkap dipaparkan namun disajikan secara tidak detail atau ada hal yang kurang relevan diikutsertakan dalam fakta atau gejala yang dipaparkan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '3',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dideskripsikan secara detail, namun ada satu atau sedikit hal yang kurang relevan atau signifikan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '3',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Fakta atau gejala yang terdapat dalam lingkungan yang dikaji dideskripsikan secara detail dan relevan satu dengan yang lain sehingga mengarah pada pentingnya pencarian solusi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '4',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Identifikasi permasalahan tidak dilakukan atau dilakukan namun sangat sedikit yang dipaparkan karena dari paparan fakta atau gejala di lingkungan langsung dirumuskan masalah tanpa adanya upaya mengidentifikasi masalah-masalah yang spesifik dalam data atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '4',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara kurang sistematis dan ditemukan beberapa hal yang menjadi masalah yang tidak relevan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '4',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara kurang sistematis atau ditemukan beberapa hal yang menjadi masalah yang tidak relevan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '4',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara sistematis namun ada sedikit masalah kekurang relevanan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '4',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Identifikasi permasalahan yang ditemukan pada fakta atau gejala dalam lingkungan dilakukan secara sistematis dan sepenuhnya relevan dengan fakta atau gejala.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '5',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Rumusan masalah langsung dipaparkan dalam bentuk pertanyaan-pertanyaan yang menjabarkan masalah yang tidak menunjukkan keterkaitan satu dengan yang lain dan/atau tidak signifikan untuk dicarikan solusinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '5',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Rumusan masalah langsung dipaparkan dalam bentuk pertanyaan-pertanyaan yang beberapa diantaranya tidak menunjukkan keterkaitan atau tidak signifikan untuk dicarikan solusinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '5',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Rumusan masalah dipaparkan secara lengkap, namun ditemukan beberapa hal dalam pertanyaan-pertanyaan yang menjabarkan masalah yang kurang relevan atau meragukan sebagai bagian dari pertanyaan yang signifikan untuk dicarikan solusinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '5',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Rumusan masalah dipaparkan secara lengkap dan relevan dengan masalah-masalah yang teridentifikasi, namun ditemukan sedikit hal dalam pertanyaan-pertanyaan yang menjabarkan masalah yang kurang relevan atau meragukan untuk dicarikan solusinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '5',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Rumusan masalah dipaparkan secara lengkap dan relevan dengan masalah-masalah yang teridentifikasi. Pertanyaan-pertanyaan yang menjabarkan rumusan masalah relevan satu dengan yang lain yang menunjukkan sistematika tahap-tahap pemecahan masalah.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '6',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Tidak ada uraian mengenai akibat pembiaran yang merugikan lingkungan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '6',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Sebagian uraian tentang akibat pembiaran yang merugikan lingkungan kurang logis dan kurang detail.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '6',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Sebagian uraian tentang akibat pembiaran yang merugikan lingkungan kurang logis meskipun detail.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '6',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Uraian tentang akibat pembiaran yang merugikan lingkungan cukup logis meskipun tidak detail.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '6',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Terdapat uraian detail dan logis tentang akibat pembiaran yang merugikan lingkungan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '7',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Kelima unsur SMART ditampilkan tidak lengkap disertai dengan penjelasan yang tidak detail dan tidak komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '7',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Kelima unsur SMART ditampilkan cukup lengkap disertai dengan penjelasan yang kurang detail dan kurang komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '7',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Kelima unsur SMART ditampilkan cukup lengkap disertai dengan penjelasan yang cukup detail dan cukup komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '7',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Kelima unsur SMART ditampilkan secara lengkap dengan penjelasan yang cukup detail dan cukup komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '7',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Kelima unsur SMART ditampilkan secara lengkap dengan penjelasan yang detail dan komprehensif.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '8',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Tidak ada uraian tentang dampak lanjutan dari pencapaian sasaran.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '8',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Tercapainya sasaran program dapat terus berlanjut bagi lingkungan penerima manfaat/keuntungan tanpa kemungkinan penyelenggaraan program pengembangan atau modifikasi untuk memperbesar manfaat/keuntungan dari solusi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '8',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Tercapainya sasaran program dapat terus berlanjut bagi lingkungan penerima manfaat/keuntungan dengan kemungkinan penyelenggaraan program pengembangan atau modifikasi untuk memperbesar manfaat/keuntungan dari solusi yang bergantung pada kinerja atau ketersediaan sumber daya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '8',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Tercapainya sasaran program dapat terus berlanjut bagi lingkungan penerima manfaat/keuntungan dengan kemungkinan penyelenggaraan program pengembangan di masa mendatang yang tanpa inovasi atau tanpa modifikasi untuk memperbesar manfaat/keuntungan dari solusi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '8',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Tercapainya sasaran program dapat berlanjut dengan munculnya peluang manfaat/keuntungan bagi pihak-pihak lain yang relevan dan/atau penyelenggaraan program pengembangan di masa depan dengan inovasi atau modifikasi untuk memperbesar manfaat/keuntungan dari solusi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '9',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi hanya berupa rangkuman tanpa detail dan penahapan yang jelas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '9',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi tidak detail dan sebagian memperlihatkan hubungan yang kurang jelas antarlangkah.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '9',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan kedetailan, namun ada hubungan yang kurang jelas antarlangkah.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '9',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang jelas antarlangkah meskipun tidak detail.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '9',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Uraian langkah-langkah pencapaian solusi memperlihatkan hubungan yang jelas antarlangkah dan detail.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '10',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Kendala implementasi hanya berupa rangkuman yang kurang menunjukkan relevansi dengan tindakan dan tanpa disertai antisipasi penanganannya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '10',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Kendala implementasi dipaparkan, namun tidak dipaparkan antisipasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '10',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Kendala impelementasi dipaparkan kurang detail dan disertai paparan antisipasinya yang juga kurang detail.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '10',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Kendala implementasi ditemukan secara detail namun tidak disertai paparan detail mengenai antisipasinya.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '10',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Kendala implementasi gagasan dijelaskan beserta detail antisipasinya yang relevan dan dapat diimplementasikan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '11',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Gagasan sekadar mencontoh gagasan lain (imitasi) tanpa adaptasi dan improvisasi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '11',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Gagasan menerapkan gagasan serupa terdahulu (adaptasi) yang telah banyak dikerjakan pihak lain dan sesuai dengan lingkungan penerima manfaat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '11',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Gagasan menerapkan gagasan serupa terdahulu (adaptasi) yang belum banyak dikerjakan pihak lain dan sesuai dengan lingkungan penerima manfaat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '11',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Gagasan merupakan improvisasi, terinspirasi oleh gagasan lain, tetapi disesuaikan dengan kondisi lingkungan penerima manfaat.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '11',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Gagasan inovatif dan merupakan terobosan mutakhir yang belum ditemukan dalam situasi atau lingkungan serupa.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '12',
            'nilai_min' => 5,
            'nilai_max' => 6,
            'rubrik' => 'Gagasan tidak mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa karena ada hal-hal yang meragukan dalam argumentasi dalam gagasan dan gagasan tidak dapat direalisasikan segera karena kondisi tertentu, seperti memerlukan tahap yang sangat panjang.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '12',
            'nilai_min' => 6,
            'nilai_max' => 7,
            'rubrik' => 'Gagasan tidak mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa karena ada hal-hal yang meragukan dalam argumentasi dalam gagasan meskipun gagasan dapat direalisasikan segera karena memiliki urgensi yang tinggi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '12',
            'nilai_min' => 7,
            'nilai_max' => 8,
            'rubrik' => 'Gagasan mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa namun diperlukan waktu yang panjang untuk merealisasikan gagasan karena kondisi tertentu, seperti memerlukan tahap yang sangat panjang.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '12',
            'nilai_min' => 8,
            'nilai_max' => 9,
            'rubrik' => 'Gagasan mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa sehingga mampu direalisasikan segera karena memiliki urgensi yang tinggi sepanjang sumber daya tersedia.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rubrik_gagasan_kreatifs')->insert([
            'gagasan_kreatif_id' => '12',
            'nilai_min' => 9,
            'nilai_max' => 10,
            'rubrik' => 'Gagasan mencerminkan kesesuaian dengan cara/alam berpikir mahasiswa sehingga mampu direalisasikan segera karena memiliki urgensi yang tinggi.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
