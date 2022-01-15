<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertColumnIdlhDg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danh_gias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lichhen')->default(0);
            $table->foreign('id_lichhen')->references('id')->on('lichhens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danh_gias', function (Blueprint $table) {
            $table->dropColumn('id_lichhen');
        });
    }
}
