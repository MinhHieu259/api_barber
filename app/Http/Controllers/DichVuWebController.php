<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\dichvu;
use App\Models\Nhanvien;
use Illuminate\Support\Facades\Storage;

class DichVuWebController extends Controller
{
    public function show()
    {

        $user = Auth::guard('admin')->user();
        $model = new dichvu;
        $records = $model::where('id_salon', $user->id)->get();
        foreach ($records as $record) {
            $record['tenNhanVien'] = $record->nhanvien->hoTen;
        }
        return view('admin.dichvu', [
            'user' => $user,
            'records' => $records
        ]);
    }

    public function showCreate()
    {
        $user = Auth::guard('admin')->user();
        $nhanvien = new Nhanvien;
        $nhanviens = $nhanvien::where('id_salon', $user->id)->get();

        return view('admin.addDichVu', [
            'user' => $user,
            'nhanviens' => $nhanviens
        ]);
    }
    public function createDichVu(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $dichvu = new dichvu;
        $dichvu->id_salon = $user->id;
        if ($request->hasFile('hinhanh')) {
            $type = $request->file('hinhanh')->extension();
            $name = time() . '.' . $type;
            $path = $request->file('hinhanh')->storeAs(
                'public/dichvu',
                $name
            );
            // $path = str_replace("public", "storage", $path);
            $dichvu->hinhanh = $name;
        }
        $dichvu->tenDichvu = $request->tenDichvu;
        $dichvu->thoiGian = $request->thoiGian;
        $dichvu->giaTien = $request->giaTien;
        $dichvu->id_NhanVien = $request->id_NhanVien;
        if ($dichvu->save()) {
            return redirect()->route('dichvu.show');
        }
        echo "Thêm bị lỗi";
    }

    public function delete($id)
    {
        $dichvu = dichvu::find($id);
        $image = $dichvu->hinhanh;
        if ($dichvu->delete()) {
            // $path = str_replace("storage", "public", $image);
            Storage::delete("public/dichvu/" . $image);
            return redirect()->route('dichvu.show');
        }
        echo "Xoá bị lỗi";
    }
    public function showUpdate($id)
    {
        $user = Auth::guard('admin')->user();
        $dichvu = dichvu::find($id);
        $nhanvien = new Nhanvien;
        $nhanviens = $nhanvien::where('id_salon', $user->id)->get();
        return view('admin.updateDichVu', [
            'user' => $user,
            'nhanviens' => $nhanviens,
            'dichvu' => $dichvu
        ]);
    }

    public function update(Request $request)
    {
        $dichvu = dichvu::find($request->id);
        if ($request->hasFile('hinhanh')) {
            // kiểm tra hình ảnh có tồn tại trong db
            if ($dichvu->hinhanh) {
                // kiểm$path = str_replace("storage", "public", $dichvu->hinhanh);
                Storage::delete('public/dichvu/' . $dichvu->hinhanh);
            }
            $type = $request->file('hinhanh')->extension();
            $name = time() . '.' . $type;
            $path = $request->file('hinhanh')->storeAs(
                'public/dichvu',
                $name
            );
            // $path = str_replace("public", "storage", $path);
            $dichvu->hinhanh = $name;
        }
        $dichvu->tenDichvu = $request->tenDichvu;
        $dichvu->thoiGian = $request->thoiGian;
        $dichvu->giaTien = $request->giaTien;
        $dichvu->id_NhanVien = $request->id_NhanVien;
        if ($dichvu->update()) {
            return redirect()->route('dichvu.show');
        }
        echo "Cập nhât bị lỗi";
    }
}
