<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill', function (Blueprint $table) {
            $table->bigIncrements('id_refill');
            $table->string('id_produk', 20);
            $table->string('jumlah_refill', 225);
            $table->date('tanggal_refill', 20);
            $table->string('user', 20);
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
        Schema::dropIfExists('refill');
    }
}
