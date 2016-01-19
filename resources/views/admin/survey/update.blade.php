<html>
<head>
   <title>Angular JS Custom Directives</title>
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.2/angular-material.min.css">
   <style type="text/css">
   md-grid-list {
  margin: 8px; }
.gray {
  background: red; }
.green {
  background: #b9f6ca; }
.yellow {
  background: #ffff8d; }
.blue {
  background: #84ffff; }
.purple {
  background: #b388ff; }
.red {
  background: #ff8a80; }
md-grid-tile {
  transition: all 400ms ease-out 50ms; }
   </style>
</head>
<body ng-app="ngTabExample" ng-controller="Controller">
    <md-tabs md-dynamic-height md-border-left>
      <md-tab label="one">
        <md-content class="md-padding">
          <h1 class="md-display-2">Tab One</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue. Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In sodales pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat ultricies mi.</p>
        </md-content>
      </md-tab>
      <md-tab label="two">
        <md-content class="md-padding">
          <h1 class="md-display-2">Tab Two</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue. Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In sodales pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat ultricies mi. Aliquam erat volutpat. Nam placerat, </p>
        </md-content>
      </md-tab>
      <md-tab label="three">
        <md-content class="md-padding">
          <h1 class="md-display-2">Tab Three</h1>
          <p>Integer turpis erat, porttitor vitae mi faucibus, laoreet interdum tellus. </p>
        </md-content>
      </md-tab>
    </md-tabs>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.11.2 used here -->
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.2/angular-material.min.js"></script>
<script>
  var ang=angular.module('ngTabExample', ['ngMaterial']);
  ang.controller('Controller', DemoCtrl);
  function DemoCtrl ($scope, $http) {
    $scope.items = [];
    var credentials = {
        email: 'admin@admin.io',
        password: 'admin'
    }
    $http({
      method : "get",
      url : "{{route('cpanel.list-modules')}}"
    }).then(function successCallback(respone){
      $scope.items = respone.data;
    }) 
  };
</script>
</body>
</html>