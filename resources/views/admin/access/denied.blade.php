@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Access denied :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-micro alert-border-left alert-danger alert-dismissable">
                <i class="fa fa-trophy pr10"></i>
                <strong>{{ trans('cpanel_alert.access_denied')}}</strong> {{ trans('cpanel_alert.not_have_permissions')}}
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->
@endsection
