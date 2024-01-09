<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKirimHadiahToWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wedding', function (Blueprint $table) {
            $table->string('hadiah_nama1')->nullable();
            $table->string('hadiah_no1')->nullable();
            $table->string('hadiah_an1')->nullable();
            $table->string('hadiah_nama2')->nullable();
            $table->string('hadiah_no2')->nullable();
            $table->string('hadiah_an2')->nullable();
            $table->string('jam_akad')->nullable();
            $table->string('jam_resepsi')->nullable();
            $table->text('maps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wedding', function (Blueprint $table) {

        });
    }
}
