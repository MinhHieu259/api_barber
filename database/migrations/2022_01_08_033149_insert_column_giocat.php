<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertColumnGiocat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lichhens', function (Blueprint $table) {
            $table->time("thoiGian")->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lichhens', function (Blueprint $table) {
            $table->dropColumn("thoiGian");
        });
    }
}
