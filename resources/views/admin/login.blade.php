<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/admin.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <!-- login -->
            <form id="admin-login" method="POST" action="{{route('admin.loginPost')}}">
              @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                  <input type="submit" class="btn btn-default" name = "Login">   
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <!-- register -->
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="admin-register" method="POST" action="{{route('admin.registerPost')}}">
              @csrf
              <h1>Create Account</h1>
              {{-- @include('admin.error.alert') --}}
              <div>
                <input type="text" class="form-control" placeholder="Username"  name="username" value="{{old('username')}}"/>
                  @error('username')
                    <p class="text-danger float-left">{{$message}}</p>
                  @enderror
              </div>
              
              <div>
                <input type="password" class="form-control" placeholder="Password"  name="password"/>
                  @error('password')
                    <p class="text-danger float-left">{{$message}}</p>
                  @enderror
              </div>
              <div>
                <input type="password" class="form-control" placeholder="ConfirmPassword"  name="confirmPassword"/>
                  @error('confirmPassword')
                    <p class="text-danger float-left">{{$message}}</p>
                  @enderror
              </div>
              <div>
                  <input type="submit"  name ="Register" value="Register">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="/js/admin.jsn"></script>
  </body>
</html>
