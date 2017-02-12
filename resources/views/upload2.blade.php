@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Full Functional Photo Uploader!</div>
                <div class="panel-body">
                @if(Session::has('success'))
                	{!! Session::get('success') !!}
                @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/uplo') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <!--{!! Form::open(array('url'=> '/uplo','files'=>true)) !!}-->
                      {!! csrf_field() !!} 
                       <!-- <input type="hidden" value="{{ csrf_token() }}" name="_token">-->
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                  <option value="1">CSTE</option>
                                  <option value="2">Pharmacy</option>
                                  <option>ACCE</option>
                                  <option>FIMS</option>
                                  <option>MBG</option>
                                  <option>ICE</option>
                                  <option>AMATH</option>
                                  <option>ESHS</option>
                                  <option>ENGLISH</option>
                                </select>
                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input style="padding: 0px 0px 34px;" type="file" class="form-control" name="photo" value="{{ old('photo') }}">

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--test-->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
