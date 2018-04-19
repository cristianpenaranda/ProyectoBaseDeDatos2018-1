var route = angular.module('panaderia', ['ngRoute'])

route.config(['$routeProvider', function($routeProvider){
	$routeProvider
		.when('/vista/inicio' ,{
			templateUrl: 'vista/inicio.html'
		})
		.when('/vista/panaderia' ,{
			templateUrl: 'vista/panaderia.html'
		})
		.when('/vista/reposteria' ,{
			templateUrl: 'vista/reposteria.html'
		})
		.when('/vista/contacto' ,{
			templateUrl: 'vista/contacto.html'
		})
		.when('/vista/cuenta' ,{
			templateUrl: 'vista/cuenta.html'
		})
		.when('/recuperarClave' ,{
			templateUrl: 'vista/cuenta.html'
		})
		.otherwise({
			redirectTo: '/vista/inicio'
		});
}]);