<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToWeddingTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wedding_template', function (Blueprint $table) {
            $table->unsignedBigInteger('layanan_id')->after('id');
            $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wedding_template', function (Blueprint $table) {

        });
    }
}
