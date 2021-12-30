<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianCapaianUnggulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_capaian_unggulans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestasi_id');
            $table->foreignId('capaian_unggulan_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('penerbit');
            $table->string('status');
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
        Schema::dropIfExists('penilaian_capaian_unggulans');
    }
}
