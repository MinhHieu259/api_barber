<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    public function dichvu()
    {
        return $this->hasMany(dichvu::class);
    }
    public function lichhen()
    {
        return $this->belongsTo(lichhen::class);
    }
}
