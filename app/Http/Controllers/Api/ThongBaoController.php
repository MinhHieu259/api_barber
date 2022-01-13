<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    public function getThongBao()
    {
        $thongBao = ThongBao::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'success' => true,
            'thongBao' => $thongBao
        ]);
    }
}
