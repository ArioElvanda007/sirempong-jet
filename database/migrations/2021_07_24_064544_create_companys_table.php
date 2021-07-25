<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_companys', function (Blueprint $table) {
            $table->id();
            $table->string('nama_company',255);
            $table->text('alamat_company');
            $table->string('telp_company',25);
            $table->string('email_company',25);
            $table->text('map_company');
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
        Schema::dropIfExists('master_companys');
    }
}
