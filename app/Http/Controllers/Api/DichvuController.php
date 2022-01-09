<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\dichvu;
use App\Models\Salon;
use Illuminate\Http\Request;

class DichvuController extends Controller
{
    public function getDichVu()
    {
        $dichvus = dichvu::all();

        foreach ($dichvus as $dichvu) {
            $dichvu['tensalon'] = $dichvu->salon->tenSalon;
        }

        return response()->json([
            'success' => true,
            'dichvu' => $dichvus
        ]);
    }

    public function getDichVuBySalon($id_salon)
    {
        $dichvu = dichvu::where('id_salon', $id_salon)->get();
        return response()->json([
            'success' => true,
            'dichvu' => $dichvu
        ]);
    }
}
