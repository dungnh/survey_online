@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') New survey :: @parent @stop
@section('topbar')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/survey.css') }}">
<style type="text/css">
    .survey-create, .survey-view {
        max-height: 600px;
        overflow: scroll;
    }
</style>

<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="#">Management Survey </a>
            </li>
        </ul>
    </div>
     <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/survey/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> {{ trans('cpanel.survey.create')}}</a>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
Survey index
<!-- end: .tray-center -->
@endsection
@section('js')

@endsection
