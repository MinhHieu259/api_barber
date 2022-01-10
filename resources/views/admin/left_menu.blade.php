<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img onerror="this.src='/image/no-avatar.png'" src="{{'/'. $user->hinhAnh}}" class="img-circle profile_img" style="height:50px; width:50px">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{$user->tenSalon}}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">  
                <li><a href="{{route('listing.index',['model'=>'Salon'])}}">Quản lý salon</a></li>
                <li><a href="{{route('listing.index',['model'=>'Calendar'])}}">Quản lý lịch hẹn</a></li>
                <li><a href="{{route('listing.index',['model'=>'Service'])}}">Quản lý dịch vụ cắt</a></li>
                <li><a href="{{route('listing.index',['model'=>'Staff'])}}">Quản lý nhân viên</a></li>         
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>