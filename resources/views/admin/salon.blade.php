@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Your Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="POST" action="{{route('salon.updateSalon')}}" enctype="multipart/form-data">
                          @csrf
                             <div class="text-center">
                                    <img height="200px" width="200px" onerror="this.src='/image/no-avatar.png'" src="{{'/'. $user->hinhAnh}}" object-fit="cover"; class="profile img-circle img-fluid" alt="avatar">
                                    <h6></h6>
                                    <input type="file" class="text-center center-block file-upload" name="hinhAnh">
                              </div></hr><br>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Tên Salon</label> 
                                <div class="col-8">
                                  <input id="tenSalon" name="tenSalon" placeholder="Tên salon" class="form-control here" required="required" type="text" value="{{$user->tenSalon}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Chủ tiệm</label> 
                                <div class="col-8">
                                  <input id="chuTiem" name="chuTiem" placeholder="Chủ tiệm" class="form-control here" type="text" value = "{{$user->chuTiem}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="soChoNgoi" class="col-4 col-form-label">Số chỗ ngồi</label> 
                                <div class="col-8">
                                  <input id="soChoNgoi" name="soChoNgoi" placeholder="Số chỗ ngồi" class="form-control here" type="text" value = "{{$user->soChoNgoi}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="soNamThanhLap" class="col-4 col-form-label">Số năm thành lập</label> 
                                <div class="col-8">
                                  <input id="soNamThanhLap" name="soNamThanhLap" placeholder="Nick Name" class="form-control here" required="required" type="text" value ="{{$user->soNamThanhLap}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="gioiThieu" class="col-4 col-form-label">Mô tả</label> 
                                <div class="col-8">
                                    <textarea id="gioiThieu" name="gioiThieu" cols="40" rows="4" class="form-control">{{$user->gioiThieu}}</textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="diaChi" class="col-4 col-form-label">Địa chỉ</label> 
                                <div class="col-8">
                                  <textarea id="diaChi" name="diaChi" cols="40" rows="4" class="form-control">{{$user->diaChi}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <input name="submit" type="submit" class="btn btn-primary" value="Cập nhật">
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
	</div>
</div>

@endsection