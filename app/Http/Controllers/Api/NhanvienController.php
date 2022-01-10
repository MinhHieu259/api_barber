<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class NhanvienController extends Controller
{
    public function getNhanVienBySalon($gio, $id_salon)
    {
        $nhanvien = DB::table('nhanviens')->where('gioBatDauLam','<', $gio)->where('gioNghiLam','>', $gio)->where('id_salon', $id_salon)->get();

        return response()->json([
            'success' => true,
            'nhanvien' => $nhanvien
        ]);
       
    }
}
