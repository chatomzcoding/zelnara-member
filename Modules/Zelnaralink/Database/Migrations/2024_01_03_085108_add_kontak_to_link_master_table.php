<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKontakToLinkMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('link_master', function (Blueprint $table) {
            $table->string('no_telp',20)->nullable();
            $table->string('no_wa',20)->nullable();
            $table->string('no_faks',20)->nullable();
            $table->string('email',100)->nullable();
            $table->text('alamat',)->nullable();
            $table->string('jam_kerja',)->nullable();
            $table->string('situs_web',)->nullable();
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
