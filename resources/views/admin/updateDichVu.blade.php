@extends('layouts.admin')
@section('content')
<div class="x_content">
    <form class="dichvu-update" action="{{route('dichvu.update')}}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        <span class="section">Thêm dịch vụ</span>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Tên dịch vụ<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="tenDichvu"  required="required" value="{{$dichvu->tenDichvu}}"/>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Thời gian<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="tel" class='tel' name="thoiGian" required='required' data-validate-length-range="8,20" value="{{$dichvu->thoiGian}}"/></div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Chọn ảnh<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="file"  name="hinhanh"  required="required" value="{{URL::to($dichvu->hinhanh)}}"/>
            </div>
        </div>

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Giá tiền<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="giaTien" required="required" value="{{$dichvu->giaTien}}"/>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Nhân viên<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" id="id_NhanVien" name="id_NhanVien">
                    <option value="">Chọn nhân viên</option>
                    @foreach($nhanviens as $nhanvien)
                        <option value="{{$nhanvien->id}}" {{$nhanvien->id === $dichvu->id_NhanVien ? "selected" : ""}}>{{$nhanvien->hoTen}}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$dichvu->id}}"/>

  
        <div class="ln_solid">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection