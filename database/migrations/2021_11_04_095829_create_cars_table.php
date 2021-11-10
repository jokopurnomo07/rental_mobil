<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('merk_mobil')->nullable();
            $table->string('nama_mobil')->nullable();
            $table->string('no_polisi')->nullable();
            $table->string('gambar_mobil')->nullable();
            $table->string('harga_sewa')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status_mobil')->nullable()->default(0);
            $table->string('tahun_pembuatan')->nullable();
            $table->string('tenaga')->nullable();
            $table->string('warna_mobil')->nullable();
            $table->string('kapasitas_penumpang')->nullable();
            $table->text('fasilitas')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
