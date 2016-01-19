<div class="form-group">
    <select ng-if="qs.dropdown.multiple" multiple="multiple" class="form-control">
        <option value="-1" ng-if="qs.dropdown.label!=''" selected="selected">{{qs.dropdown.label}}</option>
        <option  ng-repeat="item in qs.dropdown.options | explode track by $index">{{item}}</option>
    </select>
    <select ng-if="!qs.dropdown.multiple" class="form-control">
        <option value="-1" ng-if="qs.dropdown.label!=''" selected="selected">{{qs.dropdown.label}}</option>
        <option  ng-repeat="item in qs.dropdown.options | explode track by $index">{{item}}</option>
    </select>
</div>
