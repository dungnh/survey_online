<div class="form-group" ng-repeat="item in qs.choice.options | explode track by $index">
    <div class="form-group">
        <label>
            <input type="checkbox" ng-if="qs.choice.multiple" />
            <input type="radio" ng-if="!qs.choice.multiple" />
            {{item}}
        </label>
    </div>
</div>
<div class="form-group" ng-show="qs.choice.other_field">
    <label>Orther field
        <input type="text" class="form-control">
    </label>
</div>
