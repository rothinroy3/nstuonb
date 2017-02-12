@if (Session::has('CRH_username'))


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
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            
                              <span class="username">{{ Session::get('CRH_username') }}</span>
                          
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="{{ url('/admin/loggedin/ChangePasswordCRH') }}"><i class="icon_profile"></i> Change password</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/loggedin/logoutCRH') }}"><i class="icon_key_alt"></i> Log Out</a>
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
                      <a class="" href="{{ url('/admin/loggedin') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{ url('/admin/loggedin/approveNotice') }}">
                          <i class="icon_document_alt"></i>
                          <span>All Notice</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{ url('/admin/loggedin/chAddNotice') }}">
                          <i class="icon_document_alt"></i>
                          <span>Add Notice</span>
                      </a>
                  </li>
                  @if(Session::get('CRH_dept_type')==1)
                    <li>
                        <a class="" href="{{ url('/admin/loggedin/createTeacher') }}">
                            <i class="icon_document_alt"></i>
                            <span>Create Teacher</span>
                        </a>
                    </li>
                  @endif
                  <li>
                      <a class="" href="{{ url('/admin/loggedin/createStuff') }}">
                          <i class="icon_document_alt"></i>
                          <span>Create Stuff</span>
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
            <h3 class="page-header">Department of
              <strong style="color: rgb(8, 118, 212);">{{ Session::get('CRH_deptname') }}</strong>
            </h3>
          </div>
        </div>
      </div>

      @if(Session::has('success'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Successfull!!&nbsp; </strong>{!! Session::get('success') !!}
        </div>
  </div>
  </div>
@endif
      
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a New Notice</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                    action="{{ url('/admin/loggedin/chAddNotice/chPostNotice') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                            <label for="comment">Notice Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Notice Name *" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="comment">Short Description</label>
                                <textarea class="form-control" rows="5" id="comment"name="description">
                              
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                            <label for="comment">Notice Content <strong>( .PDF&lt;2MB recommanded ): </strong></label>
                                <input style="padding: 0px 0px 34px;" type="file" class="form-control" name="file" value="{{ old('file') }}">

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                          <input type="hidden" name="dept_id" value="{{ Session::get('CRH_dept_id') }}">
                      
                        <!--test-->
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                                <button type="submit" class="btn btn-success" 
                                style="font-size: 15px;font-weight: bold">
                                    <i class=""></i>POST
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
      </div>
@if(Session::has('approveMessage'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Successfull!!&nbsp; </strong>{!! Session::get('approveMessage') !!}
        </div>
  </div>
  </div>
@endif
@if(Session::has('approveMessageDelete'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Successfull!!&nbsp; </strong>{!! Session::get('approveMessageDelete') !!}
        </div>
  </div>
  </div>
@endif
    
    
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

       