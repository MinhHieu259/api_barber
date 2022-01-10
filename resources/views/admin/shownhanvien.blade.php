@extends('layouts.admin')
@section('content')
<div class="">

  <a class="btn btn-primary float-right d-block" href="{{route('nhanvien.show')}}" role="button">Thêm nhân viên</a>

    <div class="title_left">
        <h3>Quản lý <small> nhân viên</small></h3>
    </div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            
          <div class="x_title">
              
            <h2>Danh sách <small>Nhân viên</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Họ Tên</th>
                  <th>Số điện thoại</th>
                  <th>Giờ băt đầu làm</th>
                  <th>Giờ nghỉ làm</th>
                  <th>Chức vụ</th>
                  <th>Địa chỉ</th>
                  <th>Sửa</th>
                  <th>Xoá</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                  <tr>
                    <th scope="row"> {{ $record->id }}</th>
                    <td>{{$record->hoTen}}</td>
                    <td>{{$record->soDienthoai}}</td>
                    <td>{{$record->gioBatDauLam}}</td>
                    <td>{{$record->gioNghiLam}}</td>
                    <td>{{$record->chucvu}}</td>
                    <td>{{$record->diaChi}}</td>
                    <td><a href="{{route('nhanvien.showUpdateNhanVien',['id'=>$record->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Sửa</a></td>
                    <td><a href="{{route('nhanvien.deleteNhanVien', ['id' => $record->id])}}"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Xóa</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
         
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
  </div>
@endsection