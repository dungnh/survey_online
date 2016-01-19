@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') New user :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="#">{{ trans('cpanel.user_setting')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center">
    {!! Form::open(array('url' => URL::to('cpanel/user/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate2', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> {{ trans('cpanel.add_new_user')}}</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="name"> {{ trans('cpanel.fullname')}}</label>
                <div class="col-md-5">
                    {!! Form::text("name", '', array('class' => 'form-control pull-right', 'placeholder' => 'Fullname', 'id' => 'name')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">{{ trans('cpanel.email')}}</label>
                <div class="col-md-5">
                    {!! Form::text("email", '', array('class' => 'form-control pull-right', 'placeholder' => 'Email', 'id' => 'email')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="password">{{ trans('cpanel.password')}}</label>
                <div class="col-md-5">
                    {!! Form::password("password", array('class' => 'form-control pull-right', 'placeholder' => 'Password', 'id' => 'password')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="confirm_password">{{ trans('cpanel.confirm_password')}}</label>
                <div class="col-md-5">
                    {!! Form::password("confirm_password", array('class' => 'form-control pull-right', 'placeholder' => 'Confirm password', 'id' => 'confirm_password', 'equalTo' => '#password')) !!}
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label">{{ trans('cpanel.group_user')}}</label>
                <div class="col-md-5">
                    <select class="select2-multiple form-control select-primary" multiple="multiple" name="role_id[]">
                        <!-- <option value="">Select group user</option>  -->
                        {!! $list_role !!}
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> {{ trans('cpanel.submit')}} </button>
            <button class="button btn-danger btn btn-sm" type="reset"> {{ trans('cpanel.cancel')}} </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection

