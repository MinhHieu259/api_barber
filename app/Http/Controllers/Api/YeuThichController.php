<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YeuThichController extends Controller
{
    public function yeuthich(Request $request)
    {
        $yeuthich = YeuThich::where('salon_id', $request->id)->where('user_id', Auth::user()->id)->get();
        if(count($yeuthich) > 0){
            // Hủy yêu thích
            $yeuthich[0]->delete();
            return response()->json([
                'success' => true,
                'message' => 'unloved'
            ]);
        }
        $yeuthich = new YeuThich();
        $yeuthich->user_id = Auth::user()->id;
        $yeuthich->salon_id = $request->id;
        $yeuthich->save();
        return response()->json([
            'success' => true,
            'message' => 'loved',
            'yeuthich' => $yeuthich
        ]);
    }

    public function getListYeuThich()
    {
        $yeuthichs = YeuThich::where("user_id", Auth::user()->id)->get();
        
        foreach ($yeuthichs as $yeuthich) {
            $yeuthich->salon;
        }
        return response()->json([
            'success' => true,
            'yeuthich' => $yeuthichs
        ]);
    }
}
