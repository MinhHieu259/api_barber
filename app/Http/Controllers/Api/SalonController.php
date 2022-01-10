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
        $salons = Salon::where('id', $id)->get();
        
        foreach ($salons as $salon) {
            // get user of post
            $salon->user;
           
            // check if user like his post
            $salon['selfLike'] = false;
            foreach ($salon->yeuthich as $yeuthichn) {
                if($yeuthichn->user_id == Auth::user()->id){
                    $salon['selfLike'] = true;
                }
            }
        }
        return response()->json([
            'success' => true,
            'salon' => $salons
        ]);
    }

    
}
