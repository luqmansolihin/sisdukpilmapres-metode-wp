<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianProdukInovatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_produk_inovatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestasi_id');
            $table->foreignId('dosen_id');
            $table->foreignId('produk_inovatif_id');
            $table->float('skor');
            $table->float('skor_terbobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_produk_inovatifs');
    }
}
