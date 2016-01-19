<style media="screen">
.no-padding {
   padding: 0 !important;
   margin: 0 !important;
}
</style>
<div  class="row"  ng-repeat="field in qs.fields">
    <div class="form-group row col-md-12">
    	<div class="col-md-3">
    		<input type="text"  ng-model="field.label" class="form-control"/>
    	</div>
    	<div class="col-md-3">
            <select ng-model="field.type" class="form-control">
                <option value="0" selected="selected">Text</option>
                <option value="1">>1 line</option>
                <option value="2">Email</option>
                <option value="3">Number</option>
            </select>
    	</div>
        <div class="col-md-2"  ng-show="field.type==3">
            <input type="number" ng-model="field.min" class="form-control" placeholder="Min..."/></label>
        </div>
        <div class="col-md-2"  ng-show="field.type==3">
            <input type="number" ng-model="field.max" class="form-control" placeholder="Max..."/></label>
        </div>
    	<div class="col-md-2">
        	<input type="button" class="btn-primary" name="name" value="+" ng-click="addField(qs.fields)"/>
    		<input type="button" class="btn-danger" name="name" value="x" ng-click="removeField(field, qs.fields)"/>
    	</div>
    </div>
	<div class="form-group col-md-12 row">
        <div class="col-md-3 form-horizontal">
    		<label class="control-label"><input type="checkbox" ng-model="field.required" name=""/>&numsp;Required&numsp;</label>
    	</div>
    	<div class="col-md-9">
    		<input class="form-control" type="text" ng-model="field.message.required" value="" placeholder="Validation message ...">
    	</div>
	</div>
</div>
