var route = angular.module('panaderia', ['ngRoute'])

route.config(['$routeProvider', function($routeProvider){
	$routeProvider
		.when('/' ,{
			templateUrl: 'inicio.html'
		})
		.when('/panaderia' ,{
			templateUrl: 'panaderia.html'
		})
		.when('/reposteria' ,{
			templateUrl: 'reposteria.html'
		})
		.when('/contacto' ,{
			templateUrl: 'contacto.html'
		})
		.when('/cuenta' ,{
			templateUrl: 'cuenta.html'
		})
		.otherwise({
			redirectTo: '/'
		});
}]);