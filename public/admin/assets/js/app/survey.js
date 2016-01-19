var App = angular.module("App", ['ngCookies']);
App.constant('QUESTION', {
    question_text: 'Question text',
    type: 0,
    comment: false,
    comment_text: '',
    choice: {
        multiple: false,
        other_field: false,
        required: false,
        min: null,
        max: null,
        options: [],
        message: {
            required: '',
            min: '',
            max: ''
        }
    },
    rating: {
        value: 3,
        min: 'Bad',
        max: 'Good',
        not_applicable: false,
        not_applicable_value: '',
        required: false,
        message: {
            required: ''
        },
    },
    dropdown: {
        label: '',
        options: [],
        multiple: false,
        required: false,
        message: {
            required: ''
        }
    },
    fields: []
});
App.constant('FIELD', {
    label: '',
    type: 0, //text, multiline, number, email
    required: false,
    min: null,
    max: null,
    message: {
        required: '',
        min: '',
        max: ''
    }
});
App.filter('explode', function() {
    return function(input, delimiter) {
        var delimiter = delimiter || "\n";
        if (Object.prototype.toString.call(input) === '[object Array]') {
            return input;
        }
        if (input == "" || typeof input == 'undefined')
            return null;
        return input.split(delimiter);
    }
});
App.filter('ratingNumber', function() {
    return function(input, total) {
        total = parseInt(total);
        for (var i = 1; i <= total; i++) {
            input.push(i);
        }

        return input;
    }
});
App.directive("surField", function() {
    return {
        restrict: "A",
        link: function(scope, elem, attrs) {
            if (scope.field.type == 3) {
                elem[0].type = "number";
            } else if (scope.field.type == 2) {
                elem[0].type = "email";
            }
        }
    };
});
App.directive("surFields", function($compile) {
    return {
        link:  function(scope) {
            scope.$watch("survey.questions", function(newValue, oldValue) {
                var templateToUse="";
                switch (scope.field.type) {
                    case "0":
                        templateToUse = "/admin/templates/input-text.html";
                        break;
                    case "1":
                        templateToUse = "/admin/templates/textarea.html";
                        break;
                    case "2":
                        templateToUse = "/admin/templates/input-email.html";
                        break;
                    case "3":
                        templateToUse = "/admin/templates/input-number.html";
                        break;
                    default:
                        templateToUse = "/admin/templates/input-text.html";
                }
                scope.myTemplate = templateToUse;
            }, true);

        },
        template:"<div ng-include='myTemplate'></div>",
    };
});
App.directive('modalLogin', function () {
    return {
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {
        scope.title = attrs.title;
        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
    },
    //template:"<div ng-include='templateLogin' class='modal fade'></div>",
    template: '<div class="modal fade">' +
        '<div class="modal-dialog">' +
          '<div class="modal-content">' +
            '<div class="modal-header">' +
              '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
              '<h4 class="modal-title">Login</h4>' +
            '</div>' +
            '<div class="modal-body" ng-transclude></div>' +
          '</div>' +
        '</div>' +
      '</div>',
    };
  });
