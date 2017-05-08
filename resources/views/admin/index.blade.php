<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miminium</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="/asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="/asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="/asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="/asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="/asset/css/plugins/fullcalendar.min.css"/>
	<link href="/asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="/asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="" class="navbar-brand"> 
                 <b>ADMIN</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Type anywhere to <b>Search</b> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Admin </span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="/asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="{{URL::to('admin_logout')}}"><span class="fa fa-user"></span> Log out</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>

                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Dashboard 
                        
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span> Table
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="{{URL::to('admin/home/table_users')}}">Users</a></li>
                        <li><a href="{{URL::to('admin/home/table_posts')}}">Posts</a></li>
                      </ul>
                    </li>
                    <li><a href="">Credits</a></li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Admin Dashboard</h3>
                    </div>

                  </div>                    
                </div>

                <div class="col-md-12" style="padding:20px;">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-9 padding-0">

                            <div class="col-md-8">
                                <div class="panel box-v4">
                                    <div class="panel-heading bg-white border-none">
                                      <h2><span class="fa-area-chart fa"></span>Statistics </h2>
                                    </div>
                                    <hr>
                              <div class="panel-body padding-0">
                              <div class="col-md-12 padding-0">
                              <div class="panel box-v3">
                                
                                <div class="panel-body">
                                    
                                  <div class="media">
                                    <div class="media-left">
                                        <span class="icon-user icons" style="font-size:4em;"></span>
                                    </div>
                                    <div class="media-body">
                                      <h5 class="media-heading">Total User</h5>
                                      <div class="progress progress-mini">
                                          <div class="progress-bar progress-bar-danger" role="progressbar"  style="width: 100%;">
                                            <span class="sr-only">60% Complete</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <h1>{{$totaluser}}</h1>
                                    </div>
                                  </div>
                                  <hr>
                                   <div class="media">
                                    <div class="media-left">
                                        <span class="icon-fire icons" style="font-size:4em;"></span>
                                    </div>
                                    <div class="media-body">
                                      <h5 class="media-heading">Total Post</h5>
                                      <div class="progress progress-mini">
                                          <div class="progress-bar progress-bar-warning" role="progressbar"  style="width: 100%;">
                                            <span class="sr-only">60% Complete</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <h1>{{$totalpost}}</h1>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>


                                    </div>
                                </div> 
                            </div>

                        <div class="col-md-4">
                            <div class="col-md-12 padding-0">
                              <div class="panel box-v2">
                                  <div class="panel-heading padding-0">
                                    <img src="/asset/img/bg2.jpg" class="box-v2-cover img-responsive"/>
                                    <div class="box-v2-detail">
                                      <img src="/asset/img/avatar.jpg" class="img-responsive"/>
                                      <h4>{{Auth::guard('admin')->user()->email}}</h4>
                                    </div>
                                  </div>
                                  <div class="panel-body">
                                    <div class="col-md-12 padding-0 text-center">
                                      
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>

                        </div>

                    </div>
                </div>
      		  </div>
          <!-- end: content -->

    
          
          
      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard 
                      </a>

                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="{{URL::to('admin/home/table_users')}}">Users</a></li>
                        <li><a href="{{URL::to('admin/home/table_posts')}}">Posts</a></li>
                      </ul>
                    </li>
                    
                    <li><a href="">Credits</a></li>
                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="/asset/js/jquery.min.js"></script>
    <script src="/asset/js/jquery.ui.min.js"></script>
    <script src="/asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="/asset/js/plugins/moment.min.js"></script>
    <script src="/asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="/asset/js/plugins/jquery.vmap.min.js"></script>


    <!-- custom -->
     <script src="/asset/js/main.js"></script>

  <!-- end: Javascript -->
  </body>
</html>