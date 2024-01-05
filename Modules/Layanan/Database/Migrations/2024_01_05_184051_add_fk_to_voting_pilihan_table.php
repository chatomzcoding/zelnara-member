<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToVotingPilihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voting_pilihan', function (Blueprint $table) {
            $table->unsignedBigInteger('voting_id')->after('id');
            $table->foreign('voting_id')->references('id')->on('voting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voting_pilihan', function (Blueprint $table) {

        });
    }
}
