<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nhanvien;

class NhanVienWebController extends Controller
{
    public function showNhanVien(){

        $user = Auth::guard('admin')->user();
        $model = new Nhanvien;
        $records = $model::where('id_salon',$user->id)->get();
        return view('admin.shownhanvien', [
            'user' => $user,
            'records' => $records
        ]);
    }

    public function createNhanVien(Request $request){
        $user = Auth::guard('admin')->user();
        $model = new Nhanvien;
        $model->id_salon = $user->id;
        $model->hoTen = $request->hoTen;
        $model->soDienThoai = $request->soDienThoai;
        $model->gioBatDauLam = $request->gioBatDauLam;
        $model->gioNghiLam = $request->gioNghiLam;
        $model->diaChi = $request->diaChi;
        $model->chucvu = $request->chucvu;
        if($model->save()){
            return redirect()->route('nhanvien.showNhanVien');
        }
        echo "Thêm thất bại";
    }
    public function showUpdateNhanVien($id){
        $user = Auth::guard('admin')->user();
        $record = Nhanvien::find($id);
        return view('admin.updateNhanVien', [
            'user' => $user,
            'record' => $record
        ]);
    }

    public function show(){
        $user = Auth::guard('admin')->user();
        return view('admin.addnhanvien',['user'=>$user]);
    }

    public function updateNhanVien(Request $request){
        $model = Nhanvien::find($request->id);
        $model->hoTen = $request->hoTen;
        $model->soDienThoai = $request->soDienThoai;
        $model->gioBatDauLam = $request->gioBatDauLam;
        $model->gioNghiLam = $request->gioNghiLam;
        $model->diaChi = $request->diaChi;
        $model->chucvu = $request->chucvu;
        if($model->update()){
            return redirect()->route('nhanvien.showNhanVien');
        }
        echo "Cập nhật thất bại";
    }

    public function deleteNhanVien($id){
        $nhanvien = Nhanvien::find($id);
        if($nhanvien->delete()){
            return redirect()->route('nhanvien.showNhanVien');
        }
        echo "Không thể xoá";
    }
}
