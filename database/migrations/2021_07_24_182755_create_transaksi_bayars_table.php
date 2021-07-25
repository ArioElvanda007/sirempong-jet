<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_bayars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_bayar', 14);
            $table->string('id_sewa',11);
            $table->datetime('tanggal_transaksi');
            $table->string('id_bank', 5);
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
        Schema::dropIfExists('transaksi_bayars');
    }
}
