<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dichvu extends Model
{
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class);
    }
}
