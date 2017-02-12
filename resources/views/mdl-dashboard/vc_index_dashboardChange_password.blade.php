@if (Session::has('vc_username'))
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/img/favicon.png') }}">

    <title>Admin | NSTU Online Notice Board</title>

    <!-- Bootstrap CSS -->    
    <link href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/css/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/css/style-responsive.css') }}" rel="stylesheet" />
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="{{ url('/admin/loggedin') }}" class="logo"><strong class="lite"> NSTU</strong> Online <span class="lite"> Notice </span> Board</a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">{{ Session::get('vc_username') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="{{ url('/admin/loggedin/vcChangePassword') }}"><i class="icon_profile"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/loggedin/logoutVC') }}"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="{{ url('/admin/loggedin/') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{ url('/admin/loggedin/VcAddNotice') }}">
                          <i class="icon_document_alt"></i>
                          <span>Add Notice</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{ url('/admin/loggedin/VcViewNotice') }}">
                          <i class="icon_document_alt"></i>
                          <span>View My Notices</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="{{ url('/admin/loggedin/addDepartment') }}">
                          <i class="icon_plus_alt"></i>
                          <span>Add Department</span>
                          
                      </a>                       
                  </li> 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i></li>
          </ol>
        </div>
      </div>
      <!-- page start--> 
      <div class="row">
        <div class="col-md-8 col-md-offset-4">
          <div>
            <h3 class="page-header">Vice Chancellor of
              <strong style="color: rgb(8, 118, 212);"> &nbsp;NSTU</strong>
            </h3>
          </div>
        </div>
      </div>
    <!-- page start-->
 @if(Session::has('approveMessagePassVC'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Successfull!!&nbsp; </strong>{!! Session::get('approveMessagePassVC') !!}
        </div>
  </div>
  </div>
@endif
@if(Session::has('OldNotmatchVC'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Whopps!!&nbsp; </strong>{!! Session::get('OldNotmatchVC') !!}
        </div>
  </div>
  </div>
@endif
@if(Session::has('NewNotmatchVC'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Whoppsl!!&nbsp; </strong>{!! Session::get('NewNotmatchVC') !!}
        </div>
  </div>
  </div>
@endif

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Username Password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                     action="{{ url('/admin/loggedin/vcChangePassword') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 16px;font-style: oblique;font-weight: bold;">Existing Username</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" 
                                value="{{ Session::get('vc_username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 16px;font-style: oblique;font-weight: bold;"> Old Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 16px;font-style: oblique;font-weight: bold;"> New Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="new_password" required>

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><div class="form-group{{ $errors->has('conf_password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 16px;font-style: oblique;font-weight: bold;"> Confirm New Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="conf_password" required>

                                @if ($errors->has('conf_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('conf_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success" 
                                style="font-size: 15px;font-weight: bold">
                                    <i class=""></i>Update
                                </button>
                                <!--<button type="reset" class="btn btn-success" 
                                style="font-size: 15px;font-weight: bold;">
                                    <i class=""></i>Reset
                                </button>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   

            

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/js/jquery.js') }}"></script>
    <script src="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/js/bootstrap.min.js') }}"></script>
    <!-- nice scroll -->
    <script src="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/js/jquery.nicescroll.js') }}" type="text/javascript"></script><!--custome script for all page-->
    <script src="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/js/scripts.js') }}"></script>


  </body>
</html>
@else
    <div style="max-width:400px;background: #e3e3e3;margin: 20px auto;">
      <p style="padding: 20px">Your session has expired <a href="{{ url('/admin') }}">Click here to login</a></p>      
    </div>
@endif

       