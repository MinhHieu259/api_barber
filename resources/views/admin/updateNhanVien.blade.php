@extends('layouts.admin')
@section('content')
<div class="x_content">
    <form class="nhanvien-update" action="{{route('nhanvien.updateNhanVien')}}" method="POST" novalidate>
        @csrf
        <span class="section">Sửa nhân viên</span>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Tên nhân viên<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="hoTen"  required="required" value="{{$record->hoTen}}"/>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="tel" class='tel' name="soDienThoai" required='required' data-validate-length-range="8,20" value="{{$record->soDienthoai}}"/></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Giờ bắt đầu làm<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='time' type="time" name="gioBatDauLam" required='required' value="{{$record->gioBatDauLam}}"></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Giờ nghỉ làm<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='time' type="time" name="gioNghiLam" required='required' value="{{$record->gioNghiLam}}"></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Địa chỉ<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="diaChi" required="required" value="{{$record->diaChi}}"/>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Chức vụ<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="chucvu" required="required" value="{{$record->chucvu}}"/>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$record->id}}"/>
        <div class="ln_solid">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
        
    </form>
</div>



@endsection