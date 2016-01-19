@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') New survey :: @parent @stop
@section('topbar')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/survey.css') }}">
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
<div ng-app="App"  ng-controller="SurveyCtrl">
    <div class="row">
        <div class="col-lg-7">
            <modal-login title="Login form" visible="showModal">
                <form role="form" name="form-login" ng-submit="login('/auth/login-ajax')">
                  <div class="form-group" ng-class="{ 'has-error': form.email.$dirty && form.email.$error.required }">
                    <label class="control-label" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" ng-model="user.email" placeholder="Enter email" />
                  </div>
                  <div class="form-group" ng-class="{ 'has-error': form.password.$dirty && form.password.$error.required }">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" class="form-control" ng-model="user.password" id="password" name="password" placeholder="Password" />
                  </div>
                  <button type="submit" class="btn btn-default btn-sm">Submit</button>
                </form>
            </modal-login>
            <div class="tab-block mb25">
                <ul class="nav nav-tabs tabs-border">
                    <li class="active">
                        <a href="#survey" data-toggle="tab">Survey</a>
                    </li>
                    <li>
                        <a href="#setting" data-toggle="tab"><i class="fa fa-gear text-primary"></i> Setting</a>
                    </li>
                    <li>
                        <!-- <a class="p0"> -->
                            <button class="btn btn-primary ph20 ml30 m5" type="button" ng-click="saveSurvey('{{route('cpanel.survey.store')}}', {{$info_user?'true':'false'}})">Save</button>
                        <!-- </a> -->
                    </li>
                </ul>
                <div class="tab-content survey-create">
                    <div id="survey" class="tab-pane">
                        <section class="panel">
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Survey name</span>
                                            <input class="form-control" ng-model="survey.name" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" ng-model="survey.heading" placeholder="Add a survey heading" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" ng-model="survey.introduction" placeholder="Add a survey introduction" />
                                    </div>
                                    <div class="form-group">
                                        <button type="button" ng-click="addQuestion()" class="btn btn-link">Insert question</button>
                                    </div>
                                    <div class="form-group" ng-repeat="(key, qs) in survey.questions">
                                        <section class="panel">
                                            <div class="panel-heading" style="padding: 0; border: none;">

                                                <div class="input-group">
                                                    <!-- <span class="input-group-addon">@{{questions.indexOf(qs) + 1}}</span> -->
                                                    <span class="input-group-addon">@{{key+1}}</span>
                                                    <input class="form-control" style="font-weight: normal" ng-model="qs.question_text" placeholder="" />
                                                    <span class="input-group-addon">
                                                        <a class="fa fa-trash-o" ng-click="removeQuestion(qs)"></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="panel-body well mb5 pb5">
                                                <section class="panel mb5">
                                                    <header class="custom-tab">
                                                        <ul class="nav nav-tabs">
                                                            <li ng-class="{'active':qs.type == 0}" ng-click = "qs.type==0?qs.type=-1:qs.type=0">
                                                                <a title="Choice">
                                                                    <i class="fa fa-list-ul"></i>
                                                                </a>
                                                            </li>
                                                            <li ng-click = "qs.type==1?qs.type=-1:qs.type=1" ng-class="{'active':qs.type == 1}">
                                                                <a title="Rating">
                                                                    <i class="fa fa-ellipsis-h"></i>
                                                                </a>
                                                            </li>
                                                            <li ng-click = "qs.type==2?qs.type=-1:qs.type=2" ng-class="{'active':qs.type == 2}">
                                                                <a title="Dropdown">
                                                                    <i class="fa fa-list-alt"></i>
                                                                </a>
                                                            </li>
                                                            <li ng-click = "qs.type==3?qs.type=-1:qs.type=3" ng-class="{'active':qs.type == 3}">
                                                                <a title="Fields">
                                                                    <i class="fa fa-align-justify"></i>
                                                                </a>
                                                            </li>
                                                            <li class="" ng-class="{'active':qs.comment}" ng-click = "qs.comment=!qs.comment">
                                                                <a title="Add text">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane" id="tab-1" ng-class="{'active':qs.type == 0}">
                                                                @include('admin.survey._create._check')
                                                            </div>
                                                            <div class="tab-pane" id="tab-2" ng-class="{'active':qs.type == 1}">
                                                                @include('admin.survey._create._rating')
                                                            </div>
                                                            <div class="tab-pane" id="tab-3" ng-class="{'active':qs.type == 2}">
                                                                @include('admin.survey._create._dropdown')
                                                            </div>
                                                            <div class="tab-pane" id="tab-4" ng-class="{'active':qs.type == 3}">
                                                                @include('admin.survey._create._field')
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control"  ng-show="qs.comment" ng-model="qs.comment_text" placeholder="Add label comment...">
                                                    </div>
                                                </section>
                                                <div class="form-group mb5">
                                                    <button type="button" ng-click="addQuestion(key+1)" class="btn btn-link">Insert question</button>
                                                    <button type="button" ng-click="copyQuestion(key+1, qs)" class="btn btn-link">Copy question</button>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Submit</span>
                                            <input class="form-control" ng-model="survey.submit" placeholder="Submit value" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div id="setting" class="tab-pane active">
                      @include('admin.survey._setting')
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-lg-5 survey-view">
            @include('admin.survey._view')
        </div>
    </div>
</div>

<!-- end: .tray-center -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-cookies.min.js"></script>
<script src="{{ asset('admin/assets/js/app/survey.js') }}"></script>
<script src="{{ asset('admin/assets/js/controllers/SurveyController.js') }}"></script>
<script type="text/javascript">
    App.constant("CSRF_TOKEN", '{!! csrf_token() !!}');
</script>
@endsection
