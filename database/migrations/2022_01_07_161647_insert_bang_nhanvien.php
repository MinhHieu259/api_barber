<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertBangNhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhanviens', function (Blueprint $table) {
            $table->float("gioBatDauLam")->default(null);
            $table->float("gioNghiLam")->default(null);
            $table->unsignedBigInteger("trangThai")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nhanviens', function (Blueprint $table) {
            $table->dropColumn("gioBatDauLam");
            $table->dropColumn("gioNghiLam");
            $table->dropColumn("trangThai");
        });
    }
}
