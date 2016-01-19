<!-- <div class="row form-group" ng-repeat="(index, field) in qs.fields">
    <div class="col-md-4 text-right form-horizontal">
        <label class="control-label">{{field.label}}
            <i class="glyphicon glyphicon-star glyphicon-color-red"
                ng-show="field.required"></i>
        </label>
    </div>
    <div class="col-md-8">
       <sur-fields types="{{field.type}}"></sur-fields>
    </div>
</div> -->
<div class="col-md-8 col-xs-12" style="border: 1px solid red;">
    <table style="width:100%;">
        <tr ng-repeat="(index, field) in qs.fields">
            <td class="text-left">
                <label class="control-label pr20">{{field.label}}
                    <i class="glyphicon glyphicon-star glyphicon-color-red"
                        ng-show="field.required"></i>
                </label>
            </td>
            <td>
                <sur-fields types="{{field.type}}"></sur-fields>
            </td>
        </tr>
    </table>
</div>
