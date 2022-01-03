<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLichhen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichhens', function (Blueprint $table) {
            $table->id();
            $table->string('ngayHen');
            $table->unsignedBigInteger('id_Khachhang');
            $table->unsignedBigInteger('id_Dichvu');
            $table->unsignedBigInteger('id_NhanVien');
            $table->string('thanhTien');
            $table->string('status')->default('0');
            $table->timestamps();
            $table->foreign('id_Khachhang')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_Dichvu')->references('id')->on('dichvus')->onDelete('cascade');
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
        Schema::dropIfExists('lichhens');
    }
}
