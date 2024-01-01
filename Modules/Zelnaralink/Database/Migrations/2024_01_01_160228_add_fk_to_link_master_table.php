<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToLinkMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('link_master', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->after('id');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_master', function (Blueprint $table) {

        });
    }
}
