<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\dichvu;
use App\Models\lichhen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LichhenController extends Controller
{
    public function DatLich(Request $request)
    {
        $lichhen = new lichhen();
        $lichhen->ngayHen = $request->ngayHen;
        $lichhen->id_Khachhang = Auth::user()->id;
        $lichhen->id_Dichvu = $request->id_Dichvu;
        $lichhen->id_Nhanvien = $request->id_Nhanvien;
        $lichhen->id_salon = $request->id_salon;
        $lichhen->thoiGian = $request->thoiGian;
        $lichhen->thanhTien = $lichhen->dichvu->giaTien;
        $lichhen->save();
        $lichhen->user;
        return response()->json([
            'success' => true,
            'message' => 'Dat lich thanh cong',
            'lichhen' => $lichhen
        ]);

    }

    public function getLichHenSapToi()
    {
        $lichhens = lichhen::where('id_Khachhang', Auth::user()->id)->where('status','Chưa xác nhận')->get();
        foreach($lichhens as $lichhen){
            $lichhen->salon;
        }
        return response()->json([
            'success' => true,
            'lichhen' => $lichhens
        ]);
    }
}
