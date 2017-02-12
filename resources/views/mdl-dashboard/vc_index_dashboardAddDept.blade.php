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

 @if(Session::has('successAdd'))
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Successfull!!&nbsp; </strong>{!! Session::get('successAdd') !!}
        </div>
  </div>
  </div>
@endif  
<div class="row">
      <div class="col-md-10 col-md-offset-1">
        <section class="panel">
       
          <header class="panel-heading" style="padding: 10px;
          background: rgb(227, 227, 227) none repeat scroll 0% 0%;color: rgb(54, 56, 54);font-size: 16px;">
            All Existing Departments / Sections
          </header>
                          
          <table class="table table-striped table-advance table-hover">
            <tbody>
             <tr>
               <th style="width: "><i class="icon_mail_alt"></i> Serial No.</th>
               <th style="width: "><i class="icon_profile"></i> Department / Section</th>
               <th style="width: "><i class="icon_mail_alt"></i> Private </th>
               <th style="width: "><i class="icon_calendar"></i> Public </th>
               <th style="width: "><i class="icon_cogs"></i> Action </th>
              </tr>
              <?php $i = 1; ?>
              @foreach($allDepts as $rows)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $rows->dept_name }}</td>
                <td>
                  <div class="btn-group">
                    
                    @if($rows->dept_type == '1')
                    <p class="btn btn-success"><i class="icon_check_alt2"></i></p>
                    @endif
                  </div>
                </td>
                <td>
                  <div class="btn-group">
                    
                    @if($rows->dept_type == '0')
                    <p class="btn btn-success"><i class="icon_check_alt2"></i></p>
                    @endif
                  </div>
                </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="{{ route('departmentWiseNotice',$rows->dept_id) }}" title="View all {{$rows->dept_name}} Notices"><i class="icon_plus_alt2"></i>
                    </a>
                    <a class="btn btn-success" href="#myModal{{ $rows->dept_id }}"  data-toggle="modal"title="Edit Department Name"><strong>Edit </strong></a>
                    <!-- Modal -->
                      <div class="modal fade" id="myModal{{ $rows->dept_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 844px;">
                         <div class="modal-content">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title"> Change Department/Section name or type</h4>
                          </div>
                         <form class="form-horizontal" role="form" method="POST" action="{{ route('departmentWiseNotice',$rows->dept_id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                           <div class="modal-body">
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"style="font-size: 16px;font-style: oblique;font-weight: bold;">Existing Department/Section name</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $rows->dept_name }}" required>
                                     @if ($errors->has('name'))
                                      <span class="help-block">
                                         <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                     @endif
                                  </div>
                             </div>
                             <div class="form-group{{ $errors->has('department_type') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label"style="font-size: 16px;font-style: oblique;font-weight: bold;">Existing Department/Section type</label>

                                <div class="col-md-6">
                                  <select class="form-control" name="department_type" value="{{ old('departmen_type')}}" required>
                                  @if($rows->dept_type == '1')
                                    <option value="1"selected>Private &nbsp;&nbsp;&nbsp;&nbsp;( Such as newly established Department )</option>
                                  @else
                                  <option value="1">Private &nbsp;&nbsp;&nbsp;&nbsp;( Such as newly established Department)</option>
                                  @endif
                                  @if($rows->dept_type == '0')
                                    <option value="0"selected>Public &nbsp;&nbsp;&nbsp;&nbsp;(Such as newly established Hall/section)</option>
                                  @else
                                  <option value="0">Public &nbsp;&nbsp;&nbsp;&nbsp;(Such as newly established Hall/section)</option>
                                  @endif
                                  </select>
                                  @if ($errors->has('department_type'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('department_type') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>
                                </div>

                                  <div class="modal-footer">
                                    <button class="btn btn-default" type="reset">Reset</button>
                                    <button class="btn btn-success" type="submit"><strong>Save changes</strong></button>
                                  </div>
                            </form>
                         </div>
                      </div>
                    </div>
                    <!-- modal -->
                  </div>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </section>
      </div>
    </div>

           
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #e3e3e3">
                <header style="margin-top: 0px;padding: 12px 10px 10px;color: rgb(54, 56, 54);font-size: 16px">Add a New Department/Section/Hall</header>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/loggedin/addDepartment') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 14px;font-style: oblique;font-weight: bold;">New Department/Section/Hall name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Notice Name *"required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department_type') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 14px;font-style: oblique;font-weight: bold;">New Department/Section/Hall type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="department_type" value="{{ old('department_type')}}">
                                <option></option>
                                  <option value="1">Private &nbsp;&nbsp;&nbsp;&nbsp;(Such as newly established Department)</option>
                                  <option value="0">Public &nbsp;&nbsp;&nbsp;&nbsp;(Such as newly established Hall/section)</option>
                                </select>
                                @if ($errors->has('department_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 14px;font-style: oblique;font-weight: bold;">Head of the Section/Chairman Username</label>

                            <div class="col-md-6">
                                <input type="text" name="username"value="{{ old('username') }}"  class="form-control" placeholder="New Chairman/Hall Provost Username *" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"style="font-size: 14px;font-style: oblique;font-weight: bold;">Head of the Section/Chairman Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="New Chairman/Hall Provost Password *" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--test-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success"
                                style="font-size: 14px;font-weight: bold">
                                    <i class="icon_add_alt"></i>Add Department
                                </button>
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

       