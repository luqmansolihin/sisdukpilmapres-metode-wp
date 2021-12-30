<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunSeleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_seleksis', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik')->unique();
            $table->dateTime('tanggal_buka');
            $table->dateTime('tanggal_tutup');
            $table->string('tema_gagasan_kreatif');
            $table->string('tema_produk_inovatif');
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
        Schema::dropIfExists('tahun_seleksis');
    }
}
