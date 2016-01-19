@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Management module :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/module">{{ trans('cpanel.management_module')}}</a>
            </li>
        </ul>
    </div>
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/module/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> {{ trans('cpanel.new_module')}}</a>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center">
    <div class="row">
        <div class="col-md-12">
            @if (session('status') == 'success')
            <div class="alert alert-micro alert-border-left alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>
                <strong>{{session('msg')}}</strong>
            </div>
            @endif
            @if (session('status') == 'fail')
            <div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-info pr10"></i>
                <strong>Error!</strong> {{session('msg')}}
            </div>
            @endif
            <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>{{ trans('cpanel.list_module')}}
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="2%">{{ trans('cpanel.no')}}</th>
                                <th>{{ trans('cpanel.name')}}</th>
                                <th>{{ trans('cpanel.route_key')}}</th>
                                <th width="13%">{{ trans('cpanel.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($list_module)
                                <?php
                                $i = 1;
                                ?>
                                @foreach($list_module as $module)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->route_key }}</td>
                                    <td>
                                        <a class="button btn-alert btn btn-xs" href="/cpanel/module/{{ $module->id }}/update"> {{trans('cpanel.update')}} </a>
                                        <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/module/{{ $module->id }}/delete')"> {{trans('cpanel.delete')}} </a>
                                    </td>
                                </tr>
                                <?php
                                ++$i;
                                ?>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5">{{ trans('cpanel.no_data')}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="text-right">
                        {!! $list_module->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->
@endsection
