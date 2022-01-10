<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\lichhen;
use Illuminate\Support\Facades\DB;


class LichHenWebController extends Controller
{
    public function show($status){
        $user = Auth::guard('admin')->user();
        $conditions = [
            [
                'field' => 'id_salon',
                'where' => '=',
                'value' => $user->id
            ],
            [
                'field' => 'status',
                'where' => '=',
                'value' => $status
            ],
        ];
        $records = lichhen::where($conditions)->get();
        foreach ($records as $record){
            $record['tenKhachHang'] = $record->user->name;
            $record['tenNhanVien'] = $record->nhanvien->hoTen;
            $record['tenDichVu'] = $record->dichvu->tenDichvu;
        }
        return view('admin.showLichHen', [
            'user' => $user,
            'records' => $records,
            'status' => $status
        ]); 
    }

    public function update($id,$status){
        $lichhen = lichhen::find($id);

        $lichhen->status = $status;

        if($lichhen->update()){
            return redirect()->route('lichhen.show', [
                'status' => "chưa xác nhận"
            ]); 
        }
        echo "Lỗi";
    }
}
