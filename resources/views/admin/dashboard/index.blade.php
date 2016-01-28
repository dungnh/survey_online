@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Dashboard :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="active">
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- dashboard tiles -->
<section id="content">
	<!-- dashboard tiles -->
	<div class="row">
        Dashboard index
	</div>
</section>
<!-- End: .admin-panels -->
@endsection
