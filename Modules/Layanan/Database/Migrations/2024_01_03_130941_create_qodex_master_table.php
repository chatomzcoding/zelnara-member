<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQodexMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qodex_master', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('ukuran');
            $table->string('isi');
            $table->string('kategori'); // qrcode || barcode
            $table->string('kode')->nullable(); // qrcode || barcode
            $table->string('gambar')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('qodex_master');
    }
}
