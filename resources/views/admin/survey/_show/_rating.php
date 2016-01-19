<div class="form-group">
    <div class="form-group">
        <label class="control-label mr20">{{qs.rating.min}}</label>
        <span>
            <label ng-repeat = "(index, item) in [] | ratingNumber:qs.rating.value" class="mr20">{{item}}<br/>
                <input type="radio"
                    name="rating{{key}}"
                    ng-model="response[key]['rating']"
                    value="{{index}}"
                    ng-required="qs.rating.required"
                />
            </label>
        </span>
        <label class="control-label mr20">{{qs.rating.max}}</label>
        <label ng-if="qs.rating.not_applicable" class="ml20">
            <input type="radio"
                name="rating{{key}}"
                ng-model="response[key]['rating']"
                value="-1"
                ng-required="qs.rating.required"
            />
            {{qs.rating.not_applicable_value}}
        </label>
    </div>
    <div class="form-group has-error" ng-show="frmSurvey.rating{{key}}.$invalid && submitted">
        <strong class="control-label">
            {{qs.rating.message.required}}
        </strong>
    </div>
    <!-- <div class="form-group" ng-show="qs.rating.not_applicable">
        <div class="form-group">
            <label class="control-label">{{qs.rating.not_applicable_value}}</label>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" ng-model="response[key]['not_applicable']">
        </div>
    </div> -->
</div>
