/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App.controller("SurveyCtrl", function ($scope,$window, $rootScope, $http, $cookies, $filter, QUESTION, FIELD, CSRF_TOKEN) {
    //questions
    $scope.user = {
        email : '',
        password: ''
    };
    $scope.survey = {
        submit : 'Submit',
        name : 'Name survey',
        heading : 'Heading survey',
        introduction : 'Introduction survey',
        questions : []
    }
    $scope.response = {};
    $scope.choice =[];
    var data = $cookies.getObject('mySurvey');
    $cookies.remove("mySurvey");
    $scope.addQuestion = function (index) {
        var new_qs = angular.copy(QUESTION);
        var new_field = angular.copy(FIELD);
        new_qs.fields.push(new_field)
        if(typeof index === 'undefined') {
            $scope.survey.questions.push(new_qs);
        } else {
            $scope.survey.questions.splice(index, 0, new_qs);
        }
    };
    if(typeof data === 'undefined' || !data || data=='')
    {
        $scope.addQuestion();
    } else {
        $scope.survey = data
    }
    $scope.copyQuestion = function (index, question){
        var new_qs = angular.copy(question);
        $scope.survey.questions.splice(index, 0, new_qs);
    }
    $scope.removeQuestion = function (item) {
        var index = $scope.survey.questions.indexOf(item);
        $scope.survey.questions.splice(index, 1);
        return false;
    };

    $scope.addField = function (item) {
        var new_field = angular.copy(FIELD);
        item.push(new_field);
    };
    $scope.removeField = function (item, fields) {
        if(fields.length>1) {
            var index = fields.indexOf(item);
            fields.splice(index, 1);
        }
    };
    $scope.countChoice = function (data, key){

        var count =0;
        var value="";
        for(index in data) {
            if(data[index])
                count++;
        }
        $scope.choice[key] = count;
    };
    $scope.saveSurvey = function (url, isLogin) {
        if(!isLogin) {
            $scope.urlCreate = url;
            $scope.toggleModal();
        } else {
            $scope.urlCreate = "";
            var i=0;
            for(i=0; i<$scope.survey.questions.length; i++) {
                if($scope.survey.questions[i].type != 0){
                    delete $scope.survey.questions[i].choice;
                }
                if($scope.survey.questions[i].type != 1){
                    delete $scope.survey.questions[i].rating;
                }
                if($scope.survey.questions[i].type != 2){
                    delete $scope.survey.questions[i].dropdown;
                }
                if($scope.survey.questions[i].type != 3){
                    delete $scope.survey.questions[i].fields;
                }
                if($scope.survey.questions[i].type == 0){
                    $scope.survey.questions[i].choice.options= $filter("explode")($scope.survey.questions[i].choice.options);
                }
            }
            $http.post(url, $scope.survey)
            .then(function successCallback(response) {
                //alert(JSON.stringify(response.data))
            }, function errorCallback(response) {
                //alert(JSON.stringify(response.data))
            });
        }
    };
    $scope.showModal = false;
    $scope.toggleModal = function(){
        $scope.showModal = !$scope.showModal;
    };
    $scope.login = function(url) {
        $cookies.putObject('mySurvey', $scope.survey)
        $http.post(url, $scope.user)
        .then(function successCallback(response) {
            if($scope.urlCreate!="" && typeof $scope.urlCreate !=='undefined') {
                $scope.saveSurvey($scope.urlCreate, true);
            }
            $window.location.reload();
        }, function errorCallback(response) {
            $window.location.reload();
        });
    };
    $scope.changeMindate = function () {
        console.log($scope.survey.setting.start_date);
        if($scope.survey.setting.start_date > $scope.survey.setting.end_date) {
            $scope.survey.setting.end_date = $scope.survey.setting.start_date;
        }
    };
});
