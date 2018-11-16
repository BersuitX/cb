app.controller('postasociarproductoclaro', function($scope, $http, $rootScope, servicios, $filter, SweetAlert, blockUI, textos, $uibModal, $log, $document, $window) {

    // Indicia al rootscope que esta en una interna
    $rootScope.interna = 1;

    // Block the user interface
    var block = blockUI.instances.get('block');

    // Valida si se muestra el mensaje de que se ha cambiado el número satisfactoriamente
    $scope.seccion = 1;

    $scope.Asociar = { numero: "", LineOfBusiness: "" }

    // Primera pantalla
    $scope.asociarproducto = function() {
        if ($scope.Asociar.numero == "" || ($scope.Asociar.numero + "").length < 10) {
            swal({ title: textos.Genericos.ErrorTitle, text: textos.PostAsociarproducto.PAP1, confirmButtonText: textos.Genericos.Ok });
        }
        else {
            // Validar el numero
            block.start(textos.Genericos.Validar);
            servicios.Post("validateNumber", { AccountId: $scope.Asociar.numero }, function(Data) {
                if (Data.error == 0) {
                    block.stop();
                    if (!Data.response.IsValidFlag) {
                        swal({ title: textos.Genericos.ErrorTitle, text: textos.Registro.R1, confirmButtonText: textos.Genericos.Ok });
                    }
                    else {
                        $scope.Asociar.LineOfBusiness = Data.response.LineOfBusiness;
                        block.start(textos.Genericos.Validar);
                        servicios.Post("retrieveCustomerData", { LineOfBusiness: $scope.Asociar.LineOfBusiness, AccountId: $scope.Asociar.numero }, function(Data) {
                            if (Data.error == 0) {
                                block.stop();
                                if ($scope.Us.usuario.DocumentNumber == Data.response.DocumentNumber) {
                                    block.start(textos.Genericos.Validar);
                                    servicios.Post("AsociarCuentaUsuario", {
                                        codigoTipoDocumento: $rootScope.Us.usuario.DocumentType,
                                        documento: $rootScope.Us.usuario.DocumentNumber,
                                        nombreUsuario: $rootScope.Us.usuario.UserProfileID,
                                        numeroCuenta: $scope.Asociar.numero,
                                        tipoCuentaID: $scope.Asociar.LineOfBusiness
                                    }, function(Data) {
                                        if (Data.error == 0) {
                                            block.stop();
                                            block.start(textos.Genericos.Validar);
                                            // logueamos al usuario para extraer las cuentas asociadas
                                            servicios.Post("LoginUsuario", {
                                                nombreUsuario: $rootScope.Us.usuario.UserProfileID,
                                                clave: $rootScope.Us.Cookie
                                            }, function(Data) {
                                                if (Data.error == 0) {
                                                    block.stop();
                                                    $rootScope.Us.cuentas = Data.response.cuentas;
                                                    var cripto = CryptoJS.AES.encrypt(JSON.stringify($rootScope.Us), "claromiclaro");
                                                    $window.localStorage.setItem("Cookie", cripto);
                                                    $scope.seccion = 2;
                                                }
                                                else if (Data.error == 2) {
                                                    block.stop();
                                                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                                                }
                                                else {
                                                    block.stop();
                                                    swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                                                }
                                            })
                                        }
                                        else if (Data.error == 2) {
                                            block.stop();
                                            swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                                        }
                                        else {
                                            block.stop();
                                            swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                                        }
                                    })

                                }
                                else {
                                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Registro.R2, confirmButtonText: textos.Genericos.Ok });
                                }
                            }
                            else if (Data.error == 2) {
                                block.stop();
                                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                            }
                            else {
                                block.stop();
                                swal({ title: textos.Genericos.ErrorTitle, text: textos.Registro.R3, confirmButtonText: textos.Genericos.Ok });
                            }
                        })
                    }
                }
                else if (Data.error == 2) {
                    block.stop();
                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                }
                else {
                    block.stop();
                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Registro.R3, confirmButtonText: textos.Genericos.Ok });
                }
            })
        }
    }
});
