@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') New module :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="#">{{ trans('cpanel.module_setting')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center">
    {!! Form::open(array('url' => URL::to('cpanel/module/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate2', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> {{ trans('cpanel.add_new_module')}}</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="name"> {{ trans('cpanel.name')}}</label>
                <div class="col-md-5">
                    {!! Form::text("name", '', array('class' => 'form-control pull-right', 'placeholder' => trans('cpanel.module_name'), 'id' => 'name')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">{{ trans('cpanel.route_key')}}</label>
                <div class="col-md-5">
                    {!! Form::text("route_key", '', array('class' => 'form-control pull-right', 'placeholder' => trans('cpanel.route_key'), 'id' => 'email')) !!}
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label">{{ trans('cpanel.module_action')}}</label>
                <div class="col-md-5">
                    @foreach($action_configs as $key => $action_config)
                    <div class="checkbox-custom mb5">
                        <input type="checkbox" id = "{{ $key }}" name="module_action[]" value="{{ $key }}">
                        <label for="{{ $key }}">{{ $action_config }}</label>
                    </div>
                    @endforeach
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
