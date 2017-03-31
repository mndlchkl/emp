var app = angular.module('myApp', ['ngRoute']);

app.config(function($routeProvider) {
  $routeProvider
 

   .when('/blog', {
    templateUrl : 'pages/blog.html',
    controller  : 'BlogController'
  })
  .when('/admin', {
    templateUrl : 'pages/admin.html',
    controller  : 'AdminController'
  })

  .when('/about', {
    templateUrl : 'pages/about.html',
    controller  : 'AboutController'
  })


    .when('/', {
    templateUrl : 'pages/home.html',
    controller  : 'HomeController'
  })
  


  .otherwise({redirectTo: '/'});
});

app.controller('AdminController', function($scope) {
  $scope.message = 'Hello from Admin zone';
  
  
});

app.controller('HomeController', function($scope) {
  $scope.message = 'Hello from HomeController';

});

app.controller('BlogController', function($scope) {
  $scope.message = 'Hello from BlogController';
});

app.controller('AboutController', function($scope) {
  $scope.message = 'Hello from AboutController';
});
