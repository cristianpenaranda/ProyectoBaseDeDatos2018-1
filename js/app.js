var app = angular.module('panaderia', []);

function iniciarSesion(user){
   $('#contenedor article').hide();
   $('#contenedor #' + user).show();
};

app.controller('cuentaControlador',['$scope','$http', function($scope,$http){
    this.authForm = function (){
        var cedula = this.inputData.cedula;
        var clave = this.inputData.clave;
        var encodedString = 'cedula=' + encodeURIComponent(cedula) +
                            '&clave=' + encodeURIComponent(clave);

            $http({
                method: 'POST',
                url: 'php/sesion.php',
                data: encodedString,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })

            .success(function(data) {
                    if ( data.trim() == 'admincorrect') {
                            swal("¡Bienvenido!", data.trim(), "success");
                            iniciarSesion("admin");
                    } else if ( data.trim() == 'clientecorrect') {
                            swal("¡Bienvenido!", data.trim(), "success");
                            iniciarSesion("cliente");
                    } else {
                        swal("¡ERROR!", "Por favor verifique los datos ó regístrese", "error");
                    }
            })
    }
}]);

app.controller('recuperarContraseña',['$scope','$http', function($scope,$http){
      this.recuperar = function (){
        var cedula = this.inputData.cedula;
        var correo = this.inputData.correo;
        var encodedString = 'cedula=' + encodeURIComponent(cedula) +
                            '&correo=' + encodeURIComponent(this.inputData.correo);

            $http({
                method: 'POST',
                url: 'php/recuperar.php',
                data: encodedString,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })

            .success(function(data) {
                    if ( data.trim() == 'admincorrect') {
                            swal("¡Bienvenido!", data.trim(), "success");
                            iniciarSesion("admin");
                    } else if ( data.trim() == 'clientecorrect') {
                            swal("¡Bienvenido!", data.trim(), "success");
                            iniciarSesion("cliente");
                    } else {
                        swal("¡ERROR!", "Por favor verifique los datos ó regístrese", "error");
                    }
            })
      };
    }]);