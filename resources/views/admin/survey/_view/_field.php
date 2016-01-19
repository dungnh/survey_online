<div class="row form-group" ng-repeat="field in qs.fields">
    <div class="col-md-4 text-right form-horizontal">
        <label class="control-label">{{field.label}}</label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control" style="width:100%;" name="name" ng-if="field.type != 3">
        <input type="number" min="" style="width:100%;" class="form-control" ng-if="field.type == 3">
    </div>
</div>
