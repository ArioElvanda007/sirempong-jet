<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDeliverysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_deliverys', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_delivery', 14);
            $table->string('tanggal_delivery');
            $table->string('id_sewa', 11);
            $table->string('id_user', 5);
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
        Schema::dropIfExists('transaksi_deliverys');
    }
}
