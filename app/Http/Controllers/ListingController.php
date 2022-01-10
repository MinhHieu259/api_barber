<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request, $modelName)
    {
        switch ($modelName) {
            case 'Salon':
                return redirect()->route('salon.showSalon');
            case 'Staff':
                return redirect()->route('nhanvien.showNhanVien');     
            case 'Service':
                return redirect()->route('dichvu.show');
        }
    }
}
