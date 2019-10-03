<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicilans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kode_cicilan');
            $table->integer('kode_kredit');
            $table->date('tgl_cicilan');
            $table->string('jumlah_cicilan');
            $table->string('cicilan_ke');
            $table->string('cicilan_sisa_ke');
            $table->string('cicilan_harga_ke');
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
        Schema::dropIfExists('cicilans');
    }
}
