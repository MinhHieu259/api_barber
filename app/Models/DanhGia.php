<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    public function salon()
    {
        return $this->belongsTo(Salon::class, 'id_salon');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
