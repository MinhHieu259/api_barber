<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Salon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Web\CreateRegisterRequest;
use Illuminate\Support\Facades\Storage;

class SalonWebController extends Controller
{
    public function loginPost(Request $request)
    {

        $credentials = $request->only('username', 'password');
        if (!Auth::guard('admin')->attempt($credentials)) {
            echo "Đăng nhập thất bại";
            exit;
        }
        
        return redirect()->route('admin.dashboard');
    }
    public function registerPost(CreateRegisterRequest $request)
    {
        $salon = new Salon;
        $salon->username = $request->username;
        $salon->password = Hash::make($request->password);
        if ($salon->where('username', $salon->username)->first()) {
            echo "Đã tồn tại tài khoản người dùng";
            exit;
        }
        if ($salon->save()) {
            return redirect('admin/login');
        } else {
            echo "Đăng kí thất bại";
            exit;
        }
    }

    public function dashboard()
    {

        $adminUser = Auth::guard('admin')->user();
        return view('admin.dashboard', ['user' => $adminUser]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function showSalon(Request $request)
    {
        $adminUser = Auth::guard('admin')->user();
        return view('admin.salon', ['user' => $adminUser]);
    }
    public function updateSalon(Request $request)
    {
        $salon = Salon::find(Auth::guard('admin')->user()->id);
        if ($request->hasFile('hinhAnh')) {
            // kiểm tra hình ảnh có tồn tại trong db
            if ($salon->hinhAnh) {
                //$path = str_replace("storage", "public", $salon->hinhAnh);
                Storage::delete("public/salon/". $salon->hinhAnh);
            }

            // lấy tên file
            /* $name = $request->file('hinhAnh')->getClientOriginalName(); */
            // lấy type file
            $type = $request->file('hinhAnh')->extension();
            $name = time() . '.' . $type;
            $path = $request->file('hinhAnh')->storeAs(
                'public/salon',
                $name
            );
           // $path = str_replace("public", "storage", $path);
            $salon->hinhAnh = $name;
        }
        $salon->tenSalon = $request->tenSalon;
        $salon->chuTiem = $request->chuTiem;
        $salon->soChoNgoi = $request->soChoNgoi;
        $salon->soNamThanhLap = $request->soNamThanhLap;
        $salon->gioiThieu = $request->gioiThieu;
        $salon->diaChi = $request->diaChi;
        if ($salon->update()) {
            return redirect()->route('salon.showSalon');
        } else {
            echo "Cập nhật thất bại";
        }
        exit;
    }

    public function locationView(){
        $adminUser = Auth::guard('admin')->user();
        return view('admin.location', ['user' => $adminUser]);
    }
    public function locationUpdate(Request $request){
        $salon = Salon::find(Auth::guard('admin')->user()->id);

        $salon->latitude = $request->latitude;
        $salon->longitude = $request->longitude;
        if ($salon->update()) {
            return redirect()->route('salon.location');
        } else {
            echo "Cập nhật thất bại";
        }
        exit;
    }
}
