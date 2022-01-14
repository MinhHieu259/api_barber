<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    public function danhGia(Request $request)
    {
        $danhGia = new DanhGia();
        $danhGia->id_user = Auth::user()->id;
        $danhGia->id_salon = $request->id_salon;
        $danhGia->soSao = $request->soSao;
        $danhGia->save();

        return response()->json([
            'success' => true,
            'message' => 'Đánh giá thành công',
            'danhgia' => $danhGia
        ]);

    }

}
