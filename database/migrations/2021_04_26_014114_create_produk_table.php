<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->string('nama_produk', 225);
            $table->string('kode_produk', 20);
            $table->string('id_jenis', 20);
            $table->string('jumlah_produk', 20);
            $table->string('berat_produk', 20);
            $table->text('deskripsi_produk');
            $table->string('harga_modal', 20);
            $table->string('harga_jual', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
