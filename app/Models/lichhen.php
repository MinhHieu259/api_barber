<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lichhen extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,"id_Khachhang");
    }
    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class,"id_NhanVien");
    }
    public function dichvu()
    {
        return $this->belongsTo(dichvu::class,"id_Dichvu");
    }
    public function salon()
    {
        return $this->belongsTo(Salon::class,"id_salon");
    }
}
