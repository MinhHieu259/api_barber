<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertTblSalon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salons', function (Blueprint $table) {
            $table->string('username')->unique()->default("");
            $table->string('password')->default("");
            $table->unsignedBigInteger("soChoNgoi")->default(1);
            $table->unsignedBigInteger("soNamThanhLap")->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salons', function (Blueprint $table) {
            $table->dropColumn("soChoNgoi");
            $table->dropColumn("soNamThanhLap");
        });
    }
}
