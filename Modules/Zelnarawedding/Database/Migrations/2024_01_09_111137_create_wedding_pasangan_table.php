<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddingPasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_pasangan', function (Blueprint $table) {
            $table->id();
            $table->enum('jk',['l','p']);
            $table->string('nama',50);
            $table->string('nama_singkat',50);
            $table->string('nama_ayah',50);
            $table->string('nama_ibu',50);
            $table->string('photo');
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
        Schema::dropIfExists('wedding_pasangan');
    }
}
