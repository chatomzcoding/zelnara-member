<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wedding', function (Blueprint $table) {
            $table->unsignedBigInteger('layanan_id')->after('id');
            $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
            $table->unsignedBigInteger('member_id')->after('layanan_id');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade');
            $table->unsignedBigInteger('weddingtemplate_id')->after('member_id');
            $table->foreign('weddingtemplate_id')->references('id')->on('wedding_template')->onDelete('cascade');
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
