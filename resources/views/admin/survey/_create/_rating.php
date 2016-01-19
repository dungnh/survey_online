<div class="row form-group">
	<div class="col-md-4">
		<input type="text" value="Bad" ng-model="qs.rating.min" class="form-control"/>
	</div>
	<div class="col-md-4">
		<div class="col-md-5 form-horizontal">
			<label class="control-label">1 to</label>
		</div>
		<div class="col-md-7">
			<input type="number" min="1" value="1" ng-model="qs.rating.value" class="form-control"/>
		</div>
	</div>
	<div class="col-md-4">
		<input type="text" value="Good" ng-model="qs.rating.max" class="form-control" />
	</div>
</div>
<div class="form-group row">
	<div class="col-md-5 form-horizontal">
		<label  class="control-label">
			<input type="checkbox" name="name" ng-model="qs.rating.not_applicable">
			&numsp;Not Applicable&numsp;
		</label>
	</div>
	<div class="col-md-7">
		<input class="form-control" type="text" ng-show="qs.rating.not_applicable" ng-model="qs.rating.not_applicable_value" placeholder="Input Not applicable" />
	</div>
</div>
<div class="form-group row">
	<div class="col-md-4 form-horizontal">
		<label class="control-label">
			<input type="checkbox" ng-model="qs.rating.required" name=""/>
			&numsp;Required&numsp;
		</label>
	</div>
	<div class="col-md-8">
		<input type="text" class="form-control" ng-model="qs.rating.message.required" ng-show="qs.rating.required" value="" placeholder="Validation message ...">
	</div>
</div>
