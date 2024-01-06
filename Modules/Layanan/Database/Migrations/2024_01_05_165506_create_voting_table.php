<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('link');
            $table->string('gambar');
            $table->string('keterangan');
            $table->string('status',50);
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('sistem',100);
            $table->integer('view');
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
        Schema::dropIfExists('voting');
    }
}
