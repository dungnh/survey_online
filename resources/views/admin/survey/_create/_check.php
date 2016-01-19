<div class="form-group">
	<textarea class="form-control" ng-model="qs.choice.options" placeholder="Add your choice options ..." /></textarea>
</div>
<div class="form-group">
	<div class="">
		<label class="control-label"><input type="checkbox" ng-model="qs.choice.multiple" name=""/>&numsp;Multiple choice&numsp;</label>
		<label class="control-label"><input type="checkbox" ng-model="qs.choice.other_field" name=""/>&numsp;Other field&numsp;</label>
	</div>
</div>
<div class="form-group row" ng-hide="qs.choice.multiple">
	<div class="col-md-4 form-horizontal">
		<label class="control-label"><input type="checkbox" ng-model="qs.choice.required" name=""/>&numsp;Required&numsp;</label>
	</div>
	<div class="col-md-8 row">
		<input class="form-control" type="text" ng-model="qs.choice.message.required" ng-show="qs.choice.required" value="" placeholder="Validation message ...">
	</div>
</div>
<div class="form-group" ng-show="qs.choice.multiple">
	<div class="form-group row">
		<div class="col-md-5 row">
			<div class="col-md-4 form-horizontal">
				<label class ="control-label">&numsp;Min&numsp;</label>
			</div>
			<div class="col-md-8">
				<input type="number" min="0" ng-model="qs.choice.min" class="form-control"/>
			</div>
		</div>
		<div class="col-md-7">
			<input class="form-control" type="text" ng-model="qs.choice.message.min" placeholder="Validation message ...">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-5 row">
			<div class="col-md-4 form-horizontal">
				<label class = "control-label">&numsp;Max&numsp;</label>
			</div>
			<div class="col-md-8">
				<input type="number" min="0" ng-model="qs.choice.max" class="form-control"/>
			</div>
		</div>
		<div class="form-group col-md-7">
			<input class="form-control" type="text" ng-model="qs.choice.message.max" placeholder="Validation message ...">
		</div>
	</div>
</div>
