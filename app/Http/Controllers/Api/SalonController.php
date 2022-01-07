<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function getSalon()
    {
        $salons = Salon::orderBy('id','desc')->get();
        
        return response()->json([
            'success' => true,
            'salon' => $salons
        ]);
    }

    public function getSalonFeature()
    {
        $salons = Salon::where('noibat','1')->get();

        return response()->json([
            'success' => true,
            'salon' => $salons
        ]);
    }

    public function getSalonById(Request $request)
    {
        $salon = Salon::where('id', $request->id_salon)->get();
        return response()->json([
            'success' => true,
            'salon' => $salon
        ]);
    }

    
}
