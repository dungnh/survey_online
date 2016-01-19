App.controller("SurveyViewCtrl", function ($scope, $rootScope, $http, CSRF_TOKEN) {
    $scope.survey = {};
    $scope.response = {};
    $scope.choice =[];
    $scope.ob = Object;
    $scope.getdata = function(url) {
        $http.get(url)
        .then(function successCallback(response) {
            $scope.survey = response.data;

        }, function errorCallback(response) {
            //alert(JSON.stringify(response.data))
        });
    }
    $scope.countChoice = function (data, key){

        var count =0;
        var value="";
        for(index in data) {
            if(data[index])
                count++;
        }
        $scope.choice[key] = count;
        console.log($scope.choice[key]);
    };
    $scope.addChoice = function (data, value) {
        // var index_item = data.indexOf(value);
        // if(index_item<0) {
        //     data.splice(index, 1);
        // } else {
            data.push({1:1});
        // }
        alert(JSON.stringify(data));

    };
    $scope.view = function() {
        alert(JSON.stringify($scope.response));
    };
    $scope.show = function() {
        alert($scope.key);
        // var count =0;
        // var value="";
        // for(value in data) {
        //     if(value)
        //         count++;
        // }
        // alert(count);
    };
});
