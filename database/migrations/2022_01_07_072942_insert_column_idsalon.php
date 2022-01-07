<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertColumnIdsalon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lichhens', function (Blueprint $table) {
            $table->unsignedBigInteger("id_salon");
            $table->foreign('id_salon')->references('id')->on('lichhens')->onDelete('cascade');
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
            $table->dropColumn("id_salon");
        });
    }
}
