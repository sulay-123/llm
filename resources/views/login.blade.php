<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from themesbrand.com/lexa/html/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2019 13:43:05 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>The Mix Kings Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Begin page -->
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center m-0"><a href="#" class="logo logo-admin"><img src="assets/images/logo.png" height="100" alt="logo"></a></h3>
          <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
            <p class="text-muted text-center">Sign in to continue to The Mix Kings.</p>
            @include('message')
          <form class="form-horizontal m-t-30" action="{{route('login')}}" method="POST">
            {{csrf_field()}}
              <div class="form-group"><label for="username">Username</label> 
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="email"></div>
              <div class="form-group"><label for="userpassword">Password</label> 
                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password"></div>
              <div class="form-group row m-t-20">
                <div class="col-6">
                 
                <div class="col-6 text-center"><button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button></div>
              </div>
             
            </form>
          </div>
        </div>
      </div>
      <div class="m-t-40 text-center">
       
        <p>© Copyright 2021 The Mix Kings  <i class="mdi mdi-heart text-danger"></i> </p>
      </div>
    </div>
    <!-- jQuery  -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/js/waves.min.js')}}"></script>
    <script src="https://themesbrand.com/lexa/html/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>
  </body>
  <!-- Mirrored from themesbrand.com/lexa/html/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2019 13:43:06 GMT -->
</html>