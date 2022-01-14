<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalonController extends Controller
{
    public function getSalon()
    {
        $salons = Salon::orderBy('id','desc')->get();
        
        foreach($salons as $salon){
            $totalRating = 0;
            $countRating = 0;
            $salon['totalRating'] = $totalRating;
            $salon['countRating'] = $countRating;
            $salon['rating'] = 0;
            foreach($salon->danhgia as $danhgia){
               
                $totalRating += $danhgia->soSao;
                $countRating++;
                $salon['totalRating'] = $totalRating;
                $salon['countRating'] = $countRating;
                $salon['rating'] = $totalRating/$countRating;
               
            }
            
        }
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
            $salon['selfLove'] = false;
            foreach ($salon->yeuthich as $yeuthichperson) {
                if($yeuthichperson->user_id == Auth::user()->id){
                    $salon['selfLove'] = true;
                }
            }
        }
        return response()->json([
            'success' => true,
            'salon' => $salons
        ]);
    }

    
}
