(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('AuthController', AuthController);


    function AuthController($auth, $state, $http) {

        var vm = this;

        vm.login = function() {

            var credentials = {
                email: vm.email,
                password: vm.password
            }

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function(data) {

                // If login is successful, redirect to the users state
                $state.go('users', {});
            });
        }

        vm.signup = function () {
            var req = {
                method: 'POST',
                url: 'http://localhost:8000/api/registration',
                data: {
                    name: vm.fullName,
                    email: vm.userEmail,
                    password: vm.userPassword
                }
            };
            $http(req).then(function (data) {
                vm.email = vm.userEmail;
                vm.password = vm.userPassword;
                vm.login();
            });
        }

    }

})();