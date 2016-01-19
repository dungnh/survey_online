@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Configuration website :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/config">{{ trans('cpanel.configuration_website')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/config'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    @if (session('status'))
    <div class="alert alert-micro alert-border-left alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-check pr10"></i>
        <strong>{{ trans('cpanel.configuration_updated')}}</strong>
    </div>
    @endif
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> {{ trans('cpanel.configuration_website')}}</span>
            <ul class="nav panel-tabs-border panel-tabs">

                <li class="active">
                    <a href="#tab1" data-toggle="tab">{{ trans('cpanel.generate_config')}}</a>
                </li>
                <li>
                    <a href="#tab2" data-toggle="tab">{{ trans('cpanel.email_config')}}</a>
                </li>
            </ul>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div id="tab1" class="tab-pane active">
                    <div class="tab-block mb25">
                        <ul class="nav tabs-left tabs-border">
                            <li class="active">
                                <a href="#tab14_1 " data-toggle="tab">{{ trans('cpanel.website')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab14_1" class="tab-pane active">
                                <div class="col-md-12 mb20">
                                    <h4> 
                                        {{ trans('cpanel.config_website')}}
                                    </h4>
                                </div>      
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('title', 'Title', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        {!! Form::text('title', $array_properties ? $array_properties['title'] : '', ['class' => 'form-control', 'placeholder' => 'Title website']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('web_status', 'Website status', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            {!! Form::select('web_status', ['1' => 'ON', '2' => 'OFF'], $array_properties ? $array_properties['web_status'] : '') !!}
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane">
                    <div class="col-md-10 ph30">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('cpanel.config_smtp_server')}}</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-globe"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="SMTP Server" name="smtp_server" value="{{$array_properties ? $array_properties['smtp_server'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('cpanel.config_smtp_port')}}</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-export"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="SMTP Port" name="smtp_port" value="{{$array_properties ? $array_properties['smtp_port'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('cpanel.config_smtp_user_name')}}</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="SMTP Username" name="smtp_username" value="{{$array_properties ? $array_properties['smtp_username'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('cpanel.config_smtp_password')}}</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="SMTP Password" name="smtp_password" value="{{$array_properties ? $array_properties['smtp_password'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('cpanel.email_received')}}</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Email received" name="email_received" value="{{$array_properties ? $array_properties['email_received'] : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            {!! Form::hidden('config_id', $config_id) !!}
            <button class="button btn-primary btn btn-sm" type="submit"> {{ trans('cpanel.update')}} </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
