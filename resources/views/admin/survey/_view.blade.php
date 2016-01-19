<div class="row">
    <div class="panel">
    <div class="panel-body" ng-form name="frmSurvey">
        <h2>@{{survey.name}}</h2>
        <h3>@{{survey.heading}}</h3>
        <h4>@{{survey.introduction}}</h4>
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
        <input type="submit" class="btn btn-success btn-sm" ng-value="survey.submit" ng-click="submitted=true" />
        <input type="button" name="name" value="xem" ng-click="view()" />
    </div>
    </div>
</div>
