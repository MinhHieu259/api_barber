@extends('layouts.admin')
@section('content')
<div class="">

  <a class="btn btn-primary float-right d-block" href="{{route('dichvu.showCreate')}}" role="button">Thêm dịch vụ cắt</a>

    <div class="title_left">
        <h3>Quản lý <small> dịch vụ</small></h3>
    </div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            
          <div class="x_title">
              
            <h2>Danh sách <small>Dịch vụ</small></h2>
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
                  <th>Tên nhân viên</th>
                  <th>Tên dịch vụ</th>
                  <th>Hình ảnh</th>
                  <th>Thời gian</th>
                  <th>Giá tiền</th>
                  <th>Sửa</th>
                  <th>Xoá</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                  <tr>
                    <th scope="row"> {{ $record->id }}</th>
                    <td>{{$record->tenNhanVien }}</td>
                    <td>{{$record->tenDichvu}}</td>
                    <td><img height="200px" width="200px" onerror="this.src='/image/no-service.png'" src="{{'/'. $record->hinhanh}}" object-fit="cover"; class="profile img-circle img-fluid" alt="avatar">  </td>
                    <td>{{$record->thoiGian}}</td>
                    <td>{{$record->giaTien}}</td>
                    <td><a href="{{route('dichvu.showUpdate',['id'=>$record->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Sửa</a></td>
                    <td><a href="{{route('dichvu.deleteDichvu', ['id' => $record->id])}}"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Xóa</a></td>
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