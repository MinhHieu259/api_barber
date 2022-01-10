@extends('layouts.admin')
@section('content')
<div class="x_content">
    <form class="nhanvien-create" action="{{route('nhanvien.createNhanVien')}}" method="POST" novalidate>
        @csrf
        <span class="section">Thêm nhân viên</span>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Tên nhân viên<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="hoTen"  required="required" />
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="tel" class='tel' name="soDienThoai" required='required' data-validate-length-range="8,20" /></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Giờ bắt đầu làm<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='time' type="time" name="gioBatDauLam" required='required'></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Giờ nghỉ làm<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='time' type="time" name="gioNghiLam" required='required'></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Địa chỉ<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="diaChi" required="required" />
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Chức vụ<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="chucvu" required="required" />
            </div>
        </div>

        <div class="ln_solid">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Lưu</button>
                    <button type='reset' class="btn btn-success">Làm mới</button>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection