@extends('layouts.admin')
@section('content')
<div class="x_content">
    <a class="btn btn-primary" href="https://www.gps-coordinates.net/" role="button">Lấy vị trí của mình</a>
    <form class="location-update" action="{{route('salon.location.update')}}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        <span class="section">Thiết lập vị trí</span>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Latitude<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="latitude"  required="required" value="{{$user->latitude}}"/>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Longitude<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="longitude"  required="required" value="{{$user->longitude}}"/>
            </div>
        </div>

        <input type="hidden" name="id" value="{{$user->id}}"/>

  
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