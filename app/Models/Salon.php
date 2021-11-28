<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    public function nhanvien()
    {
        return $this->hasMany(Nhanvien::class);
    }
    public function dichvu()
    {
        return $this->hasMany(dichvu::class);
    }
}
