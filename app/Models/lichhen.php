<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lichhen extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class);
    }
    public function dichvu()
    {
        return $this->belongsTo(dichvu::class,"id_Dichvu");
    }
}
