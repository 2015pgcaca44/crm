@extends('layouts.app')

@section('content')
<div class="container w3-mobile" style="margin-top:70px;">
    <div class="row">
        <!--<div style="margin-left: 10px;"><font size="5" color="blue">Login User</font></div>-->
        @if(\Session::has('success'))
            <div class="alert alert-danger" style="width: 100%;">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2  w3-card-2">
            <div class="panel panel-default" style="margin-top: 10px;margin-bottom: 10px;margin-left: -5px;margin-right: -5px;">
                <!-- <div class="panel-heading skin-blue ">Login User</div> -->
                <div class="panel-body">
                   <center> <div class="col-md-2">
                        <img src="./images/800.png" height="160px" width="160px" />
                    </div></center>
                    <form class="form-horizontal col-md-10" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username<font color="red" size="3">*</font></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="enter your email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password<font color="red" size="3">*</font></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
