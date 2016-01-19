<div class="form-group" ng-repeat="(index, item) in qs.choice.options | explode track by $index"
ng-class="{'has-error2':1==1}">
    <div class="form-group">
        <label class="control-label">
            <input class="checkbox" type="checkbox" value="{{index}}"
                name="choice{{key}}"
                ng-if="qs.choice.multiple"
                ng-model="response[key]['choiceMulti'][index]"
                ng-click="countChoice(response[key]['choiceMulti'], key)"
                ng-required="qs.choice.required"
            />
            <input class="radio" type="radio" value="{{index}}"
                ng-if="!qs.choice.multiple"
                name="choice{{key}}"
                ng-model="response[key]['choice']"
                ng-required="qs.choice.required"
            />
            {{item}}
        </label>
    </div>
</div>
<div class="form-group has-error">
    <strong class="control-label" ng-show="frmSurvey.choice{{key}}.$invalid && submitted">
        {{qs.choice.message.required}}
    </strong>
    <strong class="control-label" ng-show="choice[key]<qs.choice.min && submitted">
        {{qs.choice.message.min}}
    </strong>
    <strong class="control-label" ng-show="qs.choice.max>0 && choice[key]>qs.choice.max && submitted">
        {{qs.choice.message.max}}
    </strong>
</div>
<div class="control-label" ng-show="qs.choice.other_field">
    <label>Orther field
        <input type="text" class="form-control" ng-model="response[key]['orther_field']">
    </label>
</div>
