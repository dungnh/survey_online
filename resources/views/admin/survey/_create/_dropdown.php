<div class="form-group">
	<input class="form-control" ng-disabled="qs.dropdown.multiple" type="text" ng-model="qs.dropdown.label" value="" placeholder="Add a dropdown label ...">
</div>
<div class="form-group">
	<textarea class="form-control" ng-model="qs.dropdown.options" placeholder="Add your choice options ..." /></textarea>
</div>
<div class="form-group">
	<label><input type="checkbox" ng-model="qs.dropdown.multiple" name=""/>&numsp;Multiple select&numsp;</label>
</div>
<div class="form-group">
	<div class="form-inline">
		<div class="form-group">
			<label><input type="checkbox" ng-model="qs.dropdown.required" name=""/>&numsp;Required&numsp;</label>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" ng-model="qs.dropdown.message.required" ng-show="qs.dropdown.required" value="" placeholder="Validation message ...">
		</div>
	</div>
</div>
