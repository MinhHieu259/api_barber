<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Salon extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nhanvien()
    {
        return $this->hasMany(Nhanvien::class);
    }
    public function dichvu()
    {
        return $this->hasMany(dichvu::class);
    }
    public function yeuthich()
    {
        return $this->hasMany(YeuThich::class, 'salon_id');
    }
}
