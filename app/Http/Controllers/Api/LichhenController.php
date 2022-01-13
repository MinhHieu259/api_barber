<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\lichhen;
use App\Models\ThongBao;
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
        $lichhen->salon;
        $lichhen->nhanvien;

        $thongBao = new ThongBao();
        $thongBao->user_id = Auth::user()->id;
        $thongBao->salon_id = $request->id_salon;
        $thongBao->noiDung = "Đặt lịch thành công";
        $thongBao->chiTietNoiDung = "Lịch cắt ngày ".$request->ngayHen." thành công tại ".$thongBao->salon->tenSalon;
        $thongBao->save();
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
            $lichhen->nhanvien;
        }
        return response()->json([
            'success' => true,
            'lichhen' => $lichhens
        ]);
    }

    public function getLichDaDuyet()
    {
        $lichhens = lichhen::where('id_Khachhang', Auth::user()->id)->where('status','đã xác nhận')->get();
        foreach($lichhens as $lichhen){
            $lichhen->salon;
            $lichhen->nhanvien;
        }
        return response()->json([
            'success' => true,
            'lichhen' => $lichhens
        ]);
    }

    public function getLichDaDat()
    {
        $lichhens = lichhen::where('id_Khachhang', Auth::user()->id)->where('status','đã hoàn thành')->get();
        foreach($lichhens as $lichhen){
            $lichhen->salon;
            $lichhen->nhanvien;
        }
        return response()->json([
            'success' => true,
            'lichhen' => $lichhens
        ]);
    }

    public function chiTietLichHen($id_lichhen)
    {
        $lichhens = lichhen::where('id', $id_lichhen)->get();
        foreach($lichhens as $lichhen){
            $lichhen->salon;
            $lichhen->dichvu;
        }
        return response()->json([
            'success' => true,
            'lichhen' => $lichhens
        ]);
    }
}
