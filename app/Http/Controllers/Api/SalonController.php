<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function getSalonFeature()
    {
        $salons = Salon::orderBy('id','desc')->get();
        
        return response()->json([
            'success' => true,
            'salon' => $salons
        ]);
    }
}
