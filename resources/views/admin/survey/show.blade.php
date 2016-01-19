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
                <a href="#">Survey setting</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div ng-app="App"  ng-controller="SurveyViewCtrl" data-ng-init="getdata('{{route('cpanel.survey.data', $id)}}')">
    <div class="row">
        <div class="panel">
        <div class="panel-body" ng-form name="frmSurvey">
            <h2>@{{survey.name}}</h2>
            <h3>@{{survey.heading}}</h3>
            <h4>@{{survey.introduction}}</h4>
            <button type="button" class="btn-submit" name="button" ng-click="submitted=true">button</button>
            <span class="glyphicon glyphicon-user"></span>
            <div class="panel panel-widget draft-widget" ng-repeat="(key, qs) in survey.questions ">
                <div class="panel-heading">
                    <span class="panel-icon">
                        <i class="">@{{key+1}}.</i>
                    </span>
                    <span class="panel-title"> @{{qs.question_text}}<i class="ml10 glyphicon glyphicon-star glyphicon-color-red"
                        ng-show="qs.choice.required || qs.rating.required || qs.dropdown.required"></i></span>
                </div>
                <div class="panel-body p10">

                    <div class="admin-form theme-primary form-group" ng-switch = "qs.type">
                        <div ng-switch-when="0" ng-init="countChoice(response[key]['choiceMulti'], key)">
                            @include('admin.survey._show._check')
                        </div>
                        <div ng-switch-when="1">
                            @include('admin.survey._show._rating')
                        </div>
                        <div ng-switch-when="2">
                            @include('admin.survey._show._dropdown')
                        </div>
                        <div ng-switch-when="3">
                            @include('admin.survey._show._field')
                        </div>
                    </div>
                    <div class="form-group" ng-show="qs.comment">
                        <div class="form-group" >
                            <label class="control-label">@{{qs.comment_text}}</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="response[key]['comment']">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" ng-value="survey.submit" class="btn btn-sm btn-success" ng-click="submitted=true" />
            <input type="button" name="name" value="xem" ng-click="view()" />
        </div>
    </div>
</div>
</div>
<script src="{{ asset('admin/assets/js/app/angular.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app/survey.js') }}"></script>
<script src="{{ asset('admin/assets/js/controllers/SurveyViewController.js') }}"></script>
<script type="text/javascript">
    App.constant("CSRF_TOKEN", '{!! csrf_token() !!}');
</script>
<!-- end: .tray-center -->
@endsection
@section('js')

@endsection
