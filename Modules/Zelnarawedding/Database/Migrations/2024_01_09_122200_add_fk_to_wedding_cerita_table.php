<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToWeddingCeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wedding_cerita', function (Blueprint $table) {
            $table->unsignedBigInteger('wedding_id')->after('id');
            $table->foreign('wedding_id')->references('id')->on('wedding')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wedding_cerita', function (Blueprint $table) {

        });
    }
}
