<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubrikProdukInovatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubrik_produk_inovatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_inovatif_id');
            $table->float('nilai_min');
            $table->float('nilai_max');
            $table->text('rubrik');
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
        Schema::dropIfExists('rubrik_produk_inovatifs');
    }
}
