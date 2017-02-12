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

@if($allDeptsVc->count())          
<div class="row">
      <div class="col-lg-10 col-md-offset-1">
        <section class="panel">
       
          <header class="panel-heading" style="padding: 10px;
          background: rgb(227, 227, 227) none repeat scroll 0% 0%;color: rgb(54, 56, 54);font-size: 16px;">
            Vice Chancellor Notices &nbsp;<strong style="color: rgb(8, 118, 212);"> 
            </strong>
          </header>
                          
          <table class="table table-striped table-advance table-hover" style="width: 100%">
            <tbody>
             <tr>
               <th style="width: 25%"><i class="icon_profile"></i> Notice Title </th>
               <th style="width: 30%"><i class="icon_mail_alt"></i> Short Description </th>
               <th style="width: 15%;background-color: #E6E6E6"><i class="icon_calendar"></i> Date </th>
               <th style="width: 30%"><i class="icon_cogs"></i> Action </th>
              </tr>
              @foreach($allDeptsVc as $rows)
              <tr>
                <td style="text-align: justify;">{{ $rows->vc_notice_name }}</td>
                <td style="text-align: justify;">{{ $rows->vc_notice_details}}</td>
                <td style="background-color: #E6E6E6">{{ $rows->date }}</td>
                <td>
                  <div class="btn-group">
                  @if($rows->vc_notice_content !='')
                    <a class="btn btn-primary" href="#myModalDDD{{ $rows->vc_notice_id }}" title="View Original Notices"data-toggle="modal">
                    <i class="icon_plus_alt2"></i>
                    </a>
                  @else
                  <button type="button" class="btn btn-primary disabled">No Attachment</button>
                  @endif
                    <!-- Modal -->
                      <div class="modal fade" id="myModalDDD{{ $rows->vc_notice_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 800px;min-height: 600px">
                         <div class="modal-content">
                           
                          <div class="modal-body" style="padding-bottom: 0px">
                          <iframe src="{{ url('uploads/test/vc/notice/'.$rows->vc_notice_content)}}"style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 100%; min-height: 500px;"></iframe>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                         </div>
                      </div>
                    </div>
                    <!-- modal -->

                    <a class="btn btn-success" href="#myModal{{ $rows->vc_notice_id }}"data-toggle="modal"title="Edit notice title/details"><strong> Edit </strong>
                    </a>
                    <!-- Modal -->
                      <div class="modal fade" id="myModal{{ $rows->vc_notice_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 800px;">
                         <div class="modal-content">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title"> Edit Notice </h4>
                          </div>
                         <form class="form-horizontal" role="form" method="POST" action="{{ route('vcNotices',$rows->vc_notice_id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                           <div class="modal-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                                <label for="comment">Existing Notice Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $rows->vc_notice_name }}" required>
                                     @if ($errors->has('name'))
                                      <span class="help-block">
                                         <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                     @endif
                                  </div>
                             </div>
                             <div class="form-group{{ $errors->has('department_type') ? ' has-error' : '' }}">
                                <div class="col-md-12">                
                                  <label for="comment">Existing Description:</label>
                                  <textarea class="form-control" rows="5" id="comment"name="tinyMCE">
                                    {{ $rows->vc_notice_details }}
                                  </textarea>
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
                   <a class="btn btn-danger"href="#myModalD{{ $rows->vc_notice_id }}"data-toggle="modal"title="Delete Notice">
                     <i class="icon_close_alt2"></i></a>
                     <!-- Modal -->
                      <div class="modal fade" id="myModalD{{ $rows->vc_notice_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 444px;">
                         <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Parmanently</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure about this ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-default" href="{{route('vcNotices',$rows->vc_notice_id) }}">Delete</a>
                          </div>
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
      <div class="col-lg-10 col-md-offset-1">
        {{ $allDeptsVc->render() }}
         @else
          <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                    </button>
                    <strong>Sorry!!&nbsp; </strong>No Available Notices
                </div>
          </div>
        @endif
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
    <!--<script type="text/javascript" src="{{ asset('mdl-file/mdl-dashboard/NiceAdmin/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
            $(function() {
               

                // TinyMCE Full
                tinymce.init({
                    selector: "#tinymce_full",
                    valid_elements : '+*[*]',
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table contextmenu directionality",
                        "emoticons template paste textcolor"
                    ],
                    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                    toolbar2: "print preview media | forecolor backcolor emoticons",
                    image_advtab: true,
                    templates: [
                        {title: 'Test template 1', content: 'Test 1'},
                        {title: 'Test template 2', content: 'Test 2'}
                    ]
                });
            });

    </script>-->
  </body>
</html>
@else
    <div style="max-width:400px;background: #e3e3e3;margin: 20px auto;">
      <p style="padding: 20px">Your session has expired <a href="{{ url('/admin') }}">Click here to login</a></p>      
    </div>
@endif

       