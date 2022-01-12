<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class NhanvienController extends Controller
{
    public function getNhanVienBySalon($gio, $id_salon, $id_dichvu)
    {
        $nhanvien = DB::table('nhanviens')->join('dichvus','nhanviens.id', '=', 'dichvus.id_NhanVien')->where('gioBatDauLam','<=', $gio)->where('gioNghiLam','>=', $gio)->where('nhanviens.id_salon', $id_salon)->where('dichvus.id', $id_dichvu)->get();

        return response()->json([
            'success' => true,
            'nhanvien' => $nhanvien
        ]);
       
    }
}
