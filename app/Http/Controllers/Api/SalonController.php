<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getSalonById($id)
    {
        $salon = Salon::where('id', $id)->get();
        
//         $salon['selfLove'] = false;
        
//         if($salon->yeuthich->user_id == Auth::user()->id){
//             $salon['selfLove'] = true;
       
// }
        return response()->json([
            'success' => true,
            'salon' => $salon
        ]);
    }

    
}
