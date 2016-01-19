<div class="form-group" ng-class="{'has-error':frmSurvey.dropdown{{key}}.$invalid &&
(frmSurvey.dropdown{{key}}.$dirty || submitted)}">
    <select name="dropdown{{key}}"
        ng-if="qs.dropdown.multiple"
        multiple="multiple"
        class="select2-multiple form-control"
        ng-model="response[key]['dropdown']"
        ng-required="qs.dropdown.required"
    />
        <option ng-repeat="(index, item) in qs.dropdown.options | explode track by $index" value="{{index}}">{{item}}</option>
    </select>
    <select name="dropdown{{key}}"
        ng-if="!qs.dropdown.multiple"
        class="form-control"
        ng-model="response[key]['dropdown']"
        ng-required="qs.dropdown.required"
    />
        <option value="" ng-if="qs.dropdown.label!=''" selected="selected">{{qs.dropdown.label}}</option>
        <option  ng-repeat="(index, item) in qs.dropdown.options | explode track by $index" value="{{index}}">{{item}}</option>
    </select>
</div>
<div class="form-group has-error" ng-show="frmSurvey.dropdown{{key}}.$invalid &&
(frmSurvey.dropdown{{key}}.$dirty || submitted)">
    <strong class="control-label">
        {{qs.dropdown.message.required}}
    </strong>
</div>
