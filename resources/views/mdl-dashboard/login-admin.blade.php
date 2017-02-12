<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nstu Online Notice Board</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
               
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('mdl-file/notice_files/nstu_logo.jpg') }}" witht="70" height="60">
                </a></li>
            </ul>
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/admin') }}">NSTU Online Notice Board</a></li>
                </ul>
            </div>
        </div>
    </nav>


<div class="container">
@if(isset($message1))
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            <strong>Opps!&nbsp; </strong>{{ $message1 }}
        </div>
  </div>
</div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login as Admin</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/loggedin') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
@if(Cookie::has('vc_username'))
<input type="text" class="form-control" name="username" 
    value="{{ Cookie::get('vc_username') }}" required>
@endif
<input type="text" class="form-control" name="username" 
    value="" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-7 col-md-offset-4">
                           <div class="checkbox">
                              <label>
                                <input type="radio" name="radio" value="1" required> Vice Chancellor
                                <br><input type="radio" name="radio" value="2" required> Chairman/Head of the Section
                                <br><input type="radio" name="radio" value="4" required> All Teacher
                                <br><input type="radio" name="radio" value="3" required> All Staffs
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
        var allRadios = document.getElementsByName('radio');
        var booRadio;
        var x = 0;
        for(x = 0; x < allRadios.length; x++){

            allRadios[x].onclick = function() {
                if(booRadio == this){
                    this.checked = false;
                    booRadio = null;
                }else{
                    booRadio = this;
                }
            };
        }
    </script>
</body>
</html>
