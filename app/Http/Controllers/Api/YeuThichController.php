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
        // check if it return 0 then this post is not like and should be like else unlike
        if(count($yeuthich) > 0){
            // we can not like more one
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
            'message' => 'loved'
        ]);
    }
}
