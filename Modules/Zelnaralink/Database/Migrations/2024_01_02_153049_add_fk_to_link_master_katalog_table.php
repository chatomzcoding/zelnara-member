<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToLinkMasterKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('link_master_katalog', function (Blueprint $table) {
            $table->unsignedBigInteger('linkmaster_id')->after('id');
            $table->foreign('linkmaster_id')->references('id')->on('link_master')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_master_katalog', function (Blueprint $table) {

        });
    }
}
