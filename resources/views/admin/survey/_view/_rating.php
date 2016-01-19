<div class="form-group">
    <div class="form-group">
        <label>{{qs.rating.min}}</label>
        <span>
            <label ng-repeat = "val in [] | ratingNumber:qs.rating.value" style="margin:5px;">{{val}}<br/><input type="radio" name="radio{{index}}" value="1"></label>
        </span>
        <label>{{qs.rating.max}}</label>
    </div>
    <div class="form-group" ng-show="qs.rating.not_applicable">
        <label>{{qs.rating.not_applicable_value}}
            <input type="text" >
        </label>
    </div>
</div>
