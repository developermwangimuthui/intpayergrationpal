@extends('admin.layoutLlogin')
@section('content')
    <style>
        .wrapper{
            display:  none !important;
        }
    </style>
    <div class="login-box">
        <div class="login-logo">

            @if(empty($web_setting[15]->value))
                @if($web_setting[66]->value=='1' and $web_setting[67]->value=='0')
                    <img src="{{asset('images/admin_logo/logo-android-blue-v1.png')}}" class="ionic-hide">
                    <img src="{{asset('images/admin_logo/logo-ionic-blue-v1.png')}}" class="android-hide">
                @elseif($web_setting[66]->value=='1' and $web_setting[67]->value=='1' or $web_setting[66]->value=='0' and $web_setting[67]->value=='1')
                    <img src="{{asset('images/admin_logo/logo-laravel-blue-v1.png')}}" class="website-hide">
                @endif
            @else
                <img style="width: 60%" src="{{asset('').$web_setting[15]->value}}">
            @endif

            <div style="
    font-size: 25px;
"><b> {{ trans('Forgot Password') }}</b></div>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('Enter your email to reset your password') }}</p>

            <!-- if email or password are not correct -->
            @if( count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">{{ trans('labels.Error') }}:</span>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if(Session::has('forgotPassError'))
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">{{ trans('labels.Error') }}:</span>
                    {!! session('forgotPassError') !!}
                </div>
            @endif

            {!! Form::open(array('url' =>'admin/processPassword', 'method'=>'post', 'class'=>'form-validate')) !!}

            <div class="form-group has-feedback">
                {!! Form::email('email', '', array('class'=>'form-control email-validate', 'id'=>'email')) !!}
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                     {{ trans('labels.AdminEmailText') }}</span>
                <span class="help-block hidden"> {{ trans('labels.AdminEmailText') }}</span>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <img src="">
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4">
                    {!! Form::submit(trans('Send'), array('id'=>'login', 'class'=>'btn btn-primary btn-block btn-flat' )) !!}
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}

        </div>

        <!-- /.login-box-body -->
    </div>
