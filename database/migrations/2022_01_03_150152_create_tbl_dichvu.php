<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dichvus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_salon');
            $table->unsignedBigInteger('id_NhanVien');
            $table->string('tenDichvu');
            $table->string('hinhanh');
            $table->integer('thoiGian');
            $table->string('giaTien');
            $table->timestamps();
            $table->foreign('id_salon')->references('id')->on('salons')->onDelete('cascade');
            $table->foreign('id_NhanVien')->references('id')->on('nhanviens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dichvus');
    }
}
