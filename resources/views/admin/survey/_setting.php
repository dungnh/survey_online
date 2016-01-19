<div class="form-group">
    <div class="form-group">
        <label class="control-label" for="url">Survey URL:</label>
        <input type="text" id="url" placeholder="The survey URL is not available yet..." class="form-control" readonly onfocus="this.select();" ng-bind = "survey.url"/>
    </div>
    <div class="form-group">
        <div class="form-inline">
            <div class="form-group">
                <label for="start_date">Start date</label>
                <input id="start_date" type="date" ng-model="survey.setting.start_date" class="form-control"
                    placeholder="yyyy-MM-dd" ng-change="changeMindate()" />
            </div>
            <div class="form-group ml20">
                <label for="end_date">End date</label>
                <input id="end_date" type="date" ng-model="survey.setting.end_date" class="form-control"
                    min="{{survey.setting.start_date | date:'yyyy-MM-dd'}}" placeholder="yyyy-MM-dd" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="checkbox-custom">
            <input type="checkbox" checked="" id="mult_respone" ng-model="survey.setting.mult_respone">
            <label for="mult_respone">Allow multiple responses from the same user</label>
        </div>
    </div>
    <div class="form-group">
        <div class="checkbox-custom">
            <input type="checkbox" checked="" id="show_rp_submitted" ng-model="survey.setting.show_rp_submitted">
            <label for="show_rp_submitted">After submitting the response, show the report</label>
        </div>
    </div>
    <div class="form-group">
        <div class="checkbox-custom">
            <input type="checkbox" checked="" id="show_rp_end" ng-model="survey.setting.show_rp_end">
            <label for="show_rp_end">Show the report for ended surveys</label>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            Status
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="checkbox-custom">
                    <input type="checkbox" checked="" id="active" ng-model="survey.setting.active">
                    <label for="active">Active</label>
                </div>
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <div class="radio-custom">
                        <input type="radio" id="status_public" name="status" value="0" ng-model="survey.setting.status" />
                        <label for="status_public">Public</label>
                    </div>
                    <!-- <input type="radio" id="status_public" name="status" value="0" ng-model="survey.setting.status" />
                    <label for="status_public">Public</label> -->
                </div>
                <div class="form-group ml20">
                    <div class="radio-custom">
                        <input type="radio" id="status_static" name="status" value="1" ng-model="survey.setting.status" />
                        <label for="status_static">Private</label>
                    </div>
                    <!-- <input type="radio" id="status_static" name="status" value="1"  ng-model="survey.setting.status" />
                    <label for="status_static">Private</label> -->
                </div>
            </div>
            <div class="form-group" ng-if="survey.setting.status==1">
                <div class="form-group">
                    <label for="status-group">Group</label>
                    <input type="text" id="status-group" class="form-control" ng-model="survey.setting.private.group" />
                </div>
                <div class="form-group">
                    <label for="status-user">User</label>
                    <input type="text" id="status-user" class="form-control" ng-model="survey.setting.private.user" />
                </div>
                <div class="form-group">
                    <label for="status-email">Email (Google mail)</label>
                    <input type="text" id="status-email" class="form-control" ng-model="survey.setting.private.email" />
                </div>
            </div>
        </div>
    </div>
</div>
