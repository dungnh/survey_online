@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Services :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/groupuser">{{ trans('cpanel.group_user')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/groupuser/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-validate2 form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> {{ trans('cpanel.add_group')}} </span>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div>
                    <div class="section row mb5">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            {!! Form::label('role_title', trans('cpanel.group_name', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="role_title" class="field">
                                    {!! Form::text("role_title", '', array('class' => 'form-control', 'required')) !!}
                                    <label class="field-icon" for="name2">
                                    </label>
                                </label>                                
                            </div>
                        </div>
                        <div class="col-md-12 mb20">
                            <div class="col-md-12">
                            {!! Form::label('description', 'Description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12">
                                <label for="firstname" class="field">
                                    {!! Form::textarea('description', '', array('class' => 'gui-textarea br-light bg-light')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <table class="table table-responsive">
                <thead>
                    <tr class="alert">
                        <th width="4%">#</th>
                        <th>Module name</th>
                        <th width="100">{{ trans('cpanel.create')}}</th>
                        <th width="100">{{ trans('cpanel.update')}}</th>
                        <!-- <th width="100">Read</th> -->
                        <th width="100">{{ trans('cpanel.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if($modules)
                    @foreach($modules as $module)
                    <tr>
                        <td>{{ $module->id }}</td>
                        <td>{{ $module->name }}</td>
                        <td>
                            <div class="switch switch-primary switch-xs round switch-inline">
                                <input id="create_{{ $module->id }}" name="permission[]" value="{{ $module->route_key }}_create" type="checkbox">
                            <label for="create_{{ $module->id }}"></label>
                        </div>
                        </td>
                        <td>
                            <div class="switch switch-warning switch-xs round switch-inline">
                                <input id="update_{{ $module->id }}" name="permission[]" value="{{ $module->route_key }}_update" type="checkbox">
                            <label for="update_{{ $module->id }}"></label>
                        </td>
                        <!-- <td>
                            <div class="switch switch-alert switch-xs round switch-inline">
                                <input id="read_{{ $module->id }}" name="permission[]" value="{{ $module->route_key }}_read" type="checkbox">
                            <label for="read_{{ $module->id }}"></label>
                        </td> -->
                        <td>
                            <div class="switch switch-danger switch-xs round switch-inline">
                                <input id="delete_{{ $module->id }}" name="permission[]" value="{{ $module->route_key }}_delete" type="checkbox">
                            <label for="delete_{{ $module->id }}"></label>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>


        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> {{ trans('cpanel.save')}} </button>
            <button class="button btn-danger btn btn-sm" type="reset"> {{ trans('cpanel.cancel')}} </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection

