<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function salon()
    {
        return $this->belongsTo(Salon::class,'salon_id');
    }
}
