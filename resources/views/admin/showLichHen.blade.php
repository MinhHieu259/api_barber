@extends('layouts.admin')
@section('content')
<div class="">
  <a class="btn btn-danger float-right d-block" href="{{route('lichhen.show',['status'=> "huỷ" ])}}" role="button">Lịch hẹn đã huỷ</a>
  <a class="btn btn-primary float-right d-block" href="{{route('lichhen.show',['status'=> "đã hoàn thành" ])}}" role="button">Lịch hẹn đã hoàn thành</a>
  <a class="btn btn-success float-right d-block" href="{{route('lichhen.show',['status'=> "đã xác nhận" ])}}" role="button">Lịch hẹn đã xác nhận</a>
  <a class="btn btn-warning float-right d-block" href="{{route('lichhen.show',['status'=> "chưa xác nhận" ])}}" role="button">Lịch hẹn chưa xác nhận</a>
  
    <div class="title_left">
        <h3>Quản lý <small> lịch hẹn</small></h3>
    </div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            
          <div class="x_title">
              
            <h2>Danh sách <small>Lịch hẹn</small></h2>
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
                  <th>Tên khách hàng</th>
                  <th>Tên dịch vụ</th>
                  <th>Ngày hẹn</th>
                  <th>Nhân viên thực hiện</th>
                  <th>Thành tiền</th>
                  <th>Thời gian</th>
                  @switch($status)
                    @case("chưa xác nhận") 
                      <th>Xác nhận</th>
                      <th>Huỷ</th> 
                        @break   
                    @case("đã xác nhận")
                        <th>Xác nhận</th>
                          @break;   
                    @default
                  @endswitch
                
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                  <tr>
                    <th scope="row"> {{ $record->id }}</th>
                    <td>{{$record->tenKhachHang }}</td>             
                    <td>{{$record->tenDichVu}}</td>
                    <td>{{$record->ngayHen}}</td>
                    <td>{{$record->tenNhanVien }}</td>
                    <td>{{$record->thanhTien}}</td>
                    <td>{{$record->thoiGian}}</td>

                    @switch($status)
                        @case("chưa xác nhận")  
                          <td><a href="{{route('lichhen.update',['id'=> $record->id, 'status'=>"đã xác nhận"])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Xác nhận</a></td>
                          <td><a href="{{route('lichhen.update',['id'=> $record->id, 'status'=>"huỷ"])}}"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Huỷ lịch hẹn</a></td>
                        @break       
                        @case("đã xác nhận")   
                          <td><a href="{{route('lichhen.update',['id'=> $record->id, 'status'=>"đã hoàn thành"])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Hoàn thành</a></td>
                        @break
                    @default
       
                @endswitch

                  
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