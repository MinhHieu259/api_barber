<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('tenSalon')->default("Salon");
            $table->string('chuTiem')->default("Vui lòng điền tên chủ tiệm");
            $table->string('diaChi')->default("Vui lòng điền địa chỉ");
            $table->string('hinhAnh')->default("");
            $table->float('danhGia')->default(1);
            $table->integer('noiBat')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salons');
    }
}
