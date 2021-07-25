<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //status_sewa = 0 --> diorder
        //status_sewa = 1 --> dibayar
        //status_sewa = 2 --> disewa
        //status_sewa = 3 --> dikembalikan
        //status_sewa = 4 --> dicancel
        
        Schema::create('transaksi_sewas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_sewa',14);
            $table->datetime('tanggal_transaksi');
            $table->datetime('tanggal_sewa');
            $table->datetime('tanggal_kembali');
            $table->integer('jumlah_hari',5);
            $table->string('id_product',5);
            $table->integer('harga_product');
            $table->integer('harga_promo');
            $table->integer('jumlah_sewa');
            $table->string('id_user',5);
            $table->string('status_transaksi',1);
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
        Schema::dropIfExists('transaksi_sewas');
    }
}
