<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianGagasanKreatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_gagasan_kreatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestasi_id');
            $table->foreignId('dosen_id');
            $table->foreignId('gagasan_kreatif_id');
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
        Schema::dropIfExists('penilaian_gagasan_kreatifs');
    }
}
