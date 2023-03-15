<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from themesbrand.com/lexa/html/vertical/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2019 13:43:07 GMT -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <title>The Mix Kings Admin Dashboard</title>
      <meta content="Admin Dashboard" name="description">
      <meta content="Themesbrand" name="author">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="shortcut icon" href="{{asset('assets/images/logo-big.png')}}">
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <!-- DataTables -->
    <link href="https://themesbrand.com/lexa/html/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="https://themesbrand.com/lexa/html/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Top Bar Start -->
         <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left"><a href="#" class="logo"><span><img src="{{asset('assets/images/logo-big.png')}}" alt="" height="60"><label style="font-size:small;margin-left:5px;color:white;">The Mix Kings</label> </span><i><img src="{{asset('assets/images/logo-big.png')}}" alt="" height="22"></i></a></div>
            <nav class="navbar-custom">
               <ul class="navbar-right d-flex list-inline float-right mb-0">
                  <li class="dropdown notification-list d-none d-sm-block">
                     
                  </li>
                  <li class="dropdown notification-list">
                     <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="{{asset('assets/images/logo-big.png')}}" alt="user" class="rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                           <!-- item--> 
                           <a class="dropdown-item text-danger" href="{{route('clear_chat')}}"><i class="mdi mdi-trash text-danger"></i> Clear Chat</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                        </div>
                     </div>
                  </li>
               </ul>
               <ul class="list-inline menu-left mb-0">
                  <li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li>
                  {{-- <li class="d-none d-sm-block">
                     <div class="dropdown pt-3 d-inline-block">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                  </li> --}}
               </ul>
            </nav>
         </div>
         <!-- Top Bar End --><!-- ========== Left Sidebar Start ========== -->
         <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                  <!-- Left Menu Start -->
                  <ul class="metismenu" id="side-menu">
                     <li class="menu-title">Main</li>
                  <li><a href="{{route('dashboard')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Dashboard</span></a></li>
                  <li><a href="{{route('promotion')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Home Page SLider</span></a></li>
                  <li><a href="{{route('slider_images')}}" class="waves-effect"><i class="dripicons-user-group"></i><span>Home Bottom Slider</span></a></li>
                  <li><a href="{{route('radio')}}" class="waves-effect"><i class="ti-user"></i><span> Radios</span></a></li>
                  <li><a href="{{route('radio_slider')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Radio Slider</span></a></li>
                  <li><a href="{{route('banner_images')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Banner Images</span></a></li>
                  <li><a href="{{route('biography')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> History</span></a></li>
                  <li><a href="{{route('dj')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> DJ's</span></a></li>
                  <li><a href="{{route('category')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Category</span></a></li>
                  <li><a href="{{route('song')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Songs</span></a></li>
                  <li><a href="{{route('player')}}" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Watch Live </span></a></li>
                  <li><a href="{{route('gallery')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Gallery</span></a></li>
                  
                  <li><a href="{{route('events')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Events</span></a></li>
                  <li><a href="{{route('video')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Podcast</span></a></li>
                  
                  <li><a href="{{route('social_media')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Social Links</span></a></li>
                  <li><a href="{{route('sponser')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Sponsors</span></a></li>
                  
                  
                  
                  <li><a href="{{route('contactus')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Contact Us</span></a></li>
                  
                  <li><a href="{{route('Notification')}}" class="waves-effect"><i class="dripicons-user-group"></i><span> Notification</span></a></li>
                  
                  </ul>
               </div>
               <!-- Sidebar -->
               <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
         </div>
         <!-- Left Sidebar End --><!-- ============================================================== --><!-- Start right Content here --><!-- ============================================================== -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container-fluid">
                  @include('message')
                @yield('content')
               </div>
               <!-- container-fluid -->
            </div>
            <!-- content -->
            <footer class="footer">© Copyright 2021 The Mix Kings.</footer>
         </div>
         <!-- ============================================================== --><!-- End Right content here --><!-- ============================================================== -->
      </div>
      <!-- END wrapper --><!-- jQuery  -->
      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
      <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
      <script src="{{asset('assets/js/waves.min.js')}}"></script>
      <script src="https://themesbrand.com/lexa/html/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
      <!-- Required datatable js -->
    <script src="https://themesbrand.com/lexa/html/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://themesbrand.com/lexa/html/plugins/datatables/dataTables.bootstrap4.min.js"></script>
     <!-- Responsive examples --><script src="https://themesbrand.com/lexa/html/plugins/datatables/dataTables.responsive.min.js"></script>
     <script src="https://themesbrand.com/lexa/html/plugins/datatables/responsive.bootstrap4.min.js"></script>
     <!-- Datatable init js --><script src="{{asset('assets/pages/datatables.init.js')}}"></script>
      <!-- App js --><script src="{{asset('assets/js/app.js')}}"></script>
   </body>
   <!-- Mirrored from themesbrand.com/lexa/html/vertical/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2019 13:43:07 GMT -->
</html>