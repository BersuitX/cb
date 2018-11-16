app.controller('postconsumodedatos', function ($scope, $http, $rootScope, sha256, $window, servicios, Serviciosdesarrollo, $filter, SweetAlert, blockUI, textos, $uibModal, $log, $document, $moment) {
    $rootScope.Tagging('Postpago','pt_pos_ini_consumodedatosvozysms');
    
    // Indicia al rootscope que esta en una interna
    $rootScope.interna=1;
    
    $scope.modulo=1;
    
    $scope.labelsdata = ["Mi claro"];
    $scope.datadata = [100];
    
    $scope.labelsroaming = ["Mi claro"];
    $scope.dataroaming = [100];
    
    $scope.labelsBono = ["Mi claro"];
    $scope.datarBono = [100];
    
    
    $scope.options = {};
    
    // Colores del charts
    $scope.colorcharts = ['#f53402','#eaeaea'];
    
    // Encargadas de manejar el consumo de datos  -  no estadisticas
    $scope.DatagetXdrConsumo = {}
    $scope.DataConsumo = [];
    
    //Indica si muestra la estadistica de 1 -> Consumo de Datos, 2 -> Consumo Bono Regalo
    $scope.estadistica = 1;
    
    
    // Encargadas de recoger la data de "Consumo de datos" - "Consumo de roaming"
    $scope.DatosTorta = {activeProductName : "Información"};    
    $scope.RoamingTorta = {activeProductName : "Información"};
    
    // Flag encargada de mostrar o no el consumo de roaming
    $scope.showroaming = {show:0};
    
    // Block the user interface
    var block = blockUI.instances.get('block');
    var blockdatos = blockUI.instances.get('blockdatos');
    var blockroaming = blockUI.instances.get('blockroaming');
    
    //cargando de paquetes
    var blockPaquetesRecargas = blockUI.instances.get('blockPaquetesRecargas');
    
    //guarda el numero de linea para los paquetes
    $scope.accountId = {
        valor: $rootScope.OpSelec.postpago
    }
    
    //valor defecto de recargas
    $scope.parametros ={
        valrecargas: "0"
    }
    
    //slider
    $scope.multiple = { 
        detallePaquetesactarray: [],
        slides: [{}, {}, {}, {}]
    }
    
    $scope.paquetes = [];
    
    $scope.arrayfiltro = [
        {nombre: 'Todos los paquetes', categoria: "0"},
        {nombre: 'Paquetes Voz Ilimitada más Datos', categoria: "3"},
        {nombre: 'Paquetes Todo Incluido', categoria: "2"},
        {nombre: 'Paquete de datos', categoria: "1"}
    ]
    
    $scope.Objfiltroselec = {
        data: "3"
    }
    
    $scope.fechaactualconsumos = $moment().format('MMMM') + " " + $moment().format('YYYY');
    
    // Solicita la informacion de datos torta
    $scope.getDatos = function(){
        blockdatos.start(textos.Genericos.Cargando);
        servicios.Get("?rest/getCitiConsumo.json--data={'AccountId':'"+$rootScope.OpSelec.postpago+"','canal':'citi','platform':'web','tipo':'local'}",null, function(Data) {
            blockdatos.stop();
            if (Data.error == 0) {
                $scope.DatosTorta = Data.response;
                $scope.labelsdata = ["Consumidos ("+ $scope.DatosTorta.usedMB +" MB)","Disponibles ("+ $scope.DatosTorta.availableMB +" MB)"];
                $scope.datadata = [$scope.DatosTorta.usedMB,$scope.DatosTorta.availableMB];
                if($scope.datadata[0]==0 && $scope.datadata[1]==0){
                    $scope.datadata=[0,100];
                }
                labels: ['Red','Yellow','Blue']
                $scope.DatosTorta.activationDate = $scope.DatosTorta.activationDate.split(" ")[0];
                $scope.DatosTorta.expirationDate = $scope.DatosTorta.expirationDate.split(" ")[0];
                $scope.DatosTorta.history = [/*
                                                {productName:"Internet 800 MB",startDate:"2015-09-08T12:34:23z",endDate:"2015-10-08T12:34:23z", endReason:"Expirado"},
                                                {productName:"Internet 800 MB",startDate:"2015-09-08T12:34:23z",endDate:"2015-10-08T12:34:23z", endReason:"Expirado"},
                                                {productName:"Internet 800 MB",startDate:"2015-09-08T12:34:23z",endDate:"2015-10-08T12:34:23z", endReason:"Expirado"}
                                            */]
                                            
                $scope.options = {
                    tooltips: {enabled:false},
                    legend: {
                      display: true,
                      position: 'bottom'
                    }
                 };
            }else if (Data.error == 2) {
                //swal({title: textos.Genericos.ErrorTitle,text: textos.Genericos.Error,confirmButtonText: textos.Genericos.Ok});
            }else {
                swal({title: textos.Genericos.ErrorTitle,text: Data.response, confirmButtonText: textos.Genericos.Ok},function(){
                    window.location.href = "/Dashboard/#postpago";
                 });
            }
        })
    }
    
    // Compra de paquetes ---------- Eliminar ----------
    /*$scope.compradepaquetes = function(){
        
        block.start(textos.Genericos.Cargando);
        servicios.Post("SolicitarTokenAutenticacionSSO", {
                nombreUsuario: $rootScope.Us.usuario.UserProfileID,
                clave: $rootScope.Us.Cookie,
                tipoCanalOrigenID: 2,
                tipoCanalID:2
            },
            function(Data) {
                block.stop();
                if (Data.error == 0) {
                    $scope.tokensso = Data.response;
                    var f = document.createElement("form");
                    f.setAttribute('method',"post");
                    f.setAttribute('action',"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&empresa=claro&id_objeto=10000&OrigenPago=3");
                    f.setAttribute("target", "_blank");
                    
                    var a = document.createElement("input"); //input element, text
                    a.setAttribute('type',"text");
                    a.setAttribute('name',"NumeroCelular");
                    a.setAttribute('value',$rootScope.OpSelec.postpago);
                    
                    var b = document.createElement("input"); //input element, text
                    b.setAttribute('type', "text");
                    b.setAttribute('name', "fecha");
                    b.setAttribute('value', $scope.tokensso.fecha);

                    var c = document.createElement("input"); //input element, text
                    c.setAttribute('type', "text");
                    c.setAttribute('name', "nombreUsuario");
                    c.setAttribute('value', $rootScope.Us.usuario.UserProfileID);

                    var d = document.createElement("input"); //input element, text
                    d.setAttribute('type', "text");
                    d.setAttribute('name', "tipoCanalOrigenID");
                    d.setAttribute('value', "2");

                    var e = document.createElement("input"); //input element, text
                    e.setAttribute('type', "text");
                    e.setAttribute('name', "tokenAutenticacion");
                    e.setAttribute('value', $scope.tokensso.autenticacion);

                    var g = document.createElement("input"); //input element, text
                    g.setAttribute('type', "text");
                    g.setAttribute('name', "tokenValidacion");
                    g.setAttribute('value', $scope.tokensso.validacion);
                    
                    var s = document.createElement("input"); //input element, Submit button
                    s.setAttribute('type',"submit");
                    s.setAttribute('value',"Submit");
                    
                    f.appendChild(a);
                    f.appendChild(b);
                    f.appendChild(c);
                    f.appendChild(d);
                    f.appendChild(e);
                    f.appendChild(g);
                    f.appendChild(s);
                    
                    document.getElementById("mainContent").appendChild(f);
                            
                    f.submit(); 
                }
                else if (Data.error == 2) {
                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                }
                else {
                    swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                }
            })
    } */
    
    //paquetes para comprar con el saldo ---------- Eliminar ----------
    /*$scope.preplanActualGranelpost = function() {
        block.start(textos.Genericos.Cargando);
        servicios.Post("ConsultarPaquetes", {
        }, function(Data) {
            block.stop();
            if (Data.error == 0) {
                $scope.paqueteActivo = Data.response;
                $scope.hayPaquetes = 1;
                for(var a in Data.response){
                    Data.response[a].fcn = $scope.masInfoPaquete;
                }
                $scope.paquetes = Data.response;
                $scope.filtroPaquetesPsot();
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
            }
            else {
                $scope.paqueteActivo = Data.response;
                $scope.hayPaquetes = 0;
            }
            $scope.modulo = 3;
            $rootScope.Tagging('Prepago','pt_pre_ini_resumcta_pqdatorecur');
        });
        
    }*/
    
   // ---------- Eliminar ----------
    /*$scope.filtroPaquetesPsot = function(){
        var newobj = [];
        if($scope.Objfiltroselec.data != "0"){
          $scope.paquetes.filter(function(x){
                if(x.categoria == $scope.Objfiltroselec.data){
                    newobj.push(x);
                }
            })  
        }else{
            newobj = $scope.paquetes
        }
        
        setTimeout(function () {
            $scope.$apply(function () {
                $scope.multiple.slides = newobj;
            });
        });
    }*/
    
    $scope.onAfterChange = function(currentSlide){
        $scope.currentSlide = currentSlide;
    }
    
    $scope.masInfoPaquete = function(text){
        swal({ title: textos.Genericos.ErrorTitle, text: text, confirmButtonText: textos.Genericos.Cerrar });
    }
    
   /* $scope.volverconsumoRacrgas = function(){
        $scope.modulo = 2;
        $scope.postdetallePaquetesactpre();
    }*/
    
    //compre el paquete alegido
    /*$scope.postincripcionPaqueteRecurrentepre = function() {
        swal({
            title: textos.Genericos.TitleMessage,
            text: textos.PreDetalleConsumoSaldo.PDCS1+$scope.multiple.slides[$scope.currentSlide].nombre,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: textos.PreDetalleConsumoSaldo.PADP4,
            cancelButtonText: textos.Genericos.Cancelar,
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var destino = "";
                if($scope.multiple.slides[$scope.currentSlide].tipo == "2"){
                    destino = 'itel414TodoDestino'
                }else{
                    destino = 'itel415CompraDatos'
                }
                block.start(textos.Genericos.Cargando);
                servicios.Post(destino, {
                    AccountId: $rootScope.OpSelec.prepago,
                    CodigoPaquete : $scope.multiple.slides[$scope.currentSlide].codigo
                }, function(Data) {
                    block.stop();
                    if (Data.error == 0) {
                        //$scope.planActualGranel();
                        swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                        $scope.getini();
                        $scope.modulo=1;
                    }
                    else if (Data.error == 2) {
                        swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                    }
                    else {
                        swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                    }
                    $scope.modulo = 2;
                });  
            }
        });
    }*/
    
    
    
    // Solicita la informacion de roaming torta
    $scope.getRoaming = function(){
        blockroaming.start(textos.Genericos.Cargando);
        servicios.Get("?rest/getCitiConsumo.json--data={'AccountId':'"+$rootScope.OpSelec.postpago+"','canal':'citi','platform':'web','tipo':'roaming'}",null, function(Data) {
            blockroaming.stop();
            if (Data.error == 0) {
                $scope.RoamingTorta = Data.response;
                $scope.labelsroaming = ["Consumo","Gasto"];
                $scope.dataroaming = [$scope.RoamingTorta.usedMB,$scope.RoamingTorta.availableMB];      
                $scope.RoamingTorta.activationDate = $scope.RoamingTorta.activationDate.split(" ")[0];
                $scope.RoamingTorta.expirationDate = $scope.RoamingTorta.expirationDate.split(" ")[0];
            }else if (Data.error == 2) {
                //swal({title: textos.Genericos.ErrorTitle,text: textos.Genericos.Error,confirmButtonText: textos.Genericos.Ok});
            }else {
                //swal({title: textos.Genericos.ErrorTitle,text: Data.response, confirmButtonText: textos.Genericos.Ok});
            }
        })
    } 
    
    //muestra la pantalla mis recargas prepago
    $moment.locale('es'); 
    $scope.date = $moment().format('YYYY-MM-');
    $scope.monthname = $moment().format('MMMM');
    var ahora = new Date();
    $scope.mesAnterior = ahora.setMonth(ahora.getMonth()-1);
    $scope.mesAnterior = new Date($scope.mesAnterior);
    $scope.fechas = { 
        fechainicial: "",
        fechafinal: ""
    }
    
    $scope.fechasElegida = { 
        fechainicial: $scope.date + "01",
        fechafinal: $moment().format('YYYY-MM-DD'),
        anteriorFechaI: $moment(new Date($scope.mesAnterior.getFullYear(), $scope.mesAnterior.getMonth(), 1)).format('YYYY-MM-DD'),
        anteriorFechaF: $moment(new Date($scope.mesAnterior.getFullYear(), $scope.mesAnterior.getMonth()+1, 0)).format('YYYY-MM-DD')
    }
    $scope.InfoConsumo = {}
    $scope.InfoConsumoheader = {}
    //Obtener el mes anterior
    $scope.meanterior = function(anterior){
        var d = new Date(); // Por ejemplo 1
        var m = "";
        if(anterior == 1){
            m = d.getMonth()-1;
        }else{
            m = d.getMonth()-2;
        }
         
        var a = d.getFullYear()
        var mes = new Array(12);
        mes[0] = "Enero";
        mes[1] = "Febrero";
        mes[2] = "Marzo";
        mes[3] = "Abril";
        mes[4] = "Mayo";
        mes[5] = "Junio";
        mes[6] = "Julio";
        mes[7] = "Agosto";
        mes[8] = "Septiembre";
        mes[9] = "Octubre";
        mes[10] = "Noviembre";
        mes[11] = "Diciembre";
        return mes[m]+" "+a;
    }
    // Block the user interface
    var blockposrecarpre = blockUI.instances.get('blockposrecargaspre');
    $scope.getinforecargasPrepago = function() {
        blockposrecarpre.start(textos.Genericos.Cargando);
        servicios.Post("rest/getXdrResumenPrepago", {
            AccountId: $rootScope.OpSelec.postpago,
            FechaInicial: $scope.fechas.fechainicial,
            FechaFinal: $scope.fechas.fechafinal,
            canal: "xdr_prepago"
        }, function(Data) {
            blockposrecarpre.stop();
            if (Data.error == 0) {
                $scope.InfoConsumo = Data.response[0]
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                $scope.modulo=1;
            }
            else {
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                $scope.modulo=1;
            }
        })
    }
    
    var blockposrecarpre = blockUI.instances.get('blockposrecargaspre');
    $scope.consumoBonoRegalo = function() {
        blockposrecarpre.start(textos.Genericos.Cargando);
        servicios.Post("rest/getXdrResumenPrepago", {
            AccountId: $rootScope.OpSelec.postpago,
            FechaInicial: $scope.fechas.fechainicial,
            FechaFinal: $scope.fechas.fechafinal,
            canal: "xdr_prepago"
        }, function(Data) {
            blockposrecarpre.stop();
            if (Data.error == 0) {
                $scope.InfoConsumo = Data.response[0]
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                $scope.modulo=1;
            }
            else {
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                $scope.modulo=1;
            }
        })
    }
    
       //trae los paquetes actes avtivos con su respectivo consumo
    $scope.postdetallePaquetesactpre = function(){
        blockposrecarpre.start(textos.Genericos.Cargando);
        servicios.Post("itel212PaquetesActivos", {
            AccountId: $rootScope.OpSelec.postpago
        }, function(Data) {
            blockposrecarpre.stop();
            if (Data.error == 0) {
                 Data.response.filter(function(x){
                       var objpaAc = angular.copy(x)
                       var tol = (100 * parseFloat(x.CONSUMO)) / parseFloat(x.CAPACIDAD);
                       tol = Math.round(tol);
                       objpaAc['paAc'] = tol;
                        var tipo = '';
                        var img = '/Images/Extractosprepago_SMS.png';
                        var destex = 'SMS';
                        if(objpaAc.TIPO == "DATOS"){
                            tipo = "MB";
                            img = '/Images/Extractosprepago_datos.png';
                            destex = 'Datos';
                        }else if(objpaAc.TIPO == "MIN"){
                            tipo = "seg";
                            img = '/Images/Extractosprepago_voz.png';
                            destex = 'Segundos';
                        }
                       objpaAc.tipotext = tipo;
                       objpaAc.imagen = img;
                       objpaAc.des = destex;
                    $scope.multiple.detallePaquetesactarray.push(objpaAc);
                });
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
            }
            else {
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
            }
        })
    }
    
    $scope.datalleMesAnterior = function(item){
        var modulo = 2;
        if(item == 0){
            $scope.fechas.fechainicial = $scope.fechasElegida.fechainicial;
            $scope.fechas.fechafinal = $scope.fechasElegida.fechafinal;
            $scope.postdetallePaquetesactpre();
        }else{
            $scope.fechas.fechainicial = $scope.fechasElegida.anteriorFechaI;
            $scope.fechas.fechafinal = $scope.fechasElegida.anteriorFechaF;
            modulo = 4;
        }
        $scope.modulo = modulo;
        $scope.getinforecargasPrepago();
        
    }
    
    //detalle bono regalo
    $scope.detalleBonoregalo = function(){
        $rootScope.Tagging('Postpago','pt_pos_ini_detaconsu_bonregal');
        blockdatos.start(textos.Genericos.Cargando);
        servicios.Post("rest/getSicconBlindaje", {
            AccountId: $rootScope.OpSelec.postpago,
            canal:"xdr_prepago"
        }, function(Data) {
            blockdatos.stop()
            if (Data.error == 0) {
                $scope.estadistica = 2;
                $scope.bonoRegaloData = Data.response[0];
                $scope.bonoRegaloData.MBsIndisponibles = parseFloat($scope.bonoRegaloData.MBsIncluidos) - parseFloat($scope.bonoRegaloData.MBsConsumidos);
                $scope.bonoRegaloData.MBsIndisponibles = $scope.bonoRegaloData.MBsIndisponibles+"";
                $scope.bonoRegaloData.fechaAc = $scope.bonoRegaloData.fechaActivacion.split("T")[0];
                $scope.datarBono = [$scope.bonoRegaloData.MBsConsumidos,$scope.bonoRegaloData.MBsIndisponibles];
                $scope.labelsBono = ["Consumidos ("+ $scope.bonoRegaloData.MBsConsumidos +" MB)","Disponibles ("+ $scope.bonoRegaloData.MBsIndisponibles +" MB)"];
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
            }
            else {
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
            }
        })
    }
    
    //interna conpra de paquetes y recargas
    $scope.moduloCompraPaquetesRecargas = function(){
        $scope.modulo = 3;
        blockPaquetesRecargas.start(textos.Genericos.Cargando);
        // Extrae el plan Actual
        servicios.Post("ConsultarCatalogoPaqueteRecarga", {
            AccountId: $rootScope.OpSelec.postpago,
            UserProfileID: $rootScope.Us.usuario.UserProfileID
        }, function(Data) {
            blockPaquetesRecargas.stop();
            if (Data.error == 0) {
               $scope.numeroCuenta = Data.response.numeroCuenta;
               $scope.tienePicoyPlaca = Data.response.picoPlaca;
               $scope.paquetes = Data.response.listaCatalogo.paquetes;
               $scope.recagas = Data.response.listaCatalogo.recargas;
               $scope.categorias = Data.response.listaCatalogo.categorias;
               $scope.vistaCategoria = $scope.categorias[0];
               $scope.categorias.filter(function(cat){
                   if (cat.idCategoria == "-1") {
                        cat.titulo = "Recargas"
                        cat.sub = "En línea"
                        cat.icono = "/Images/icon_Recargas.png"
                    }else if(cat.idCategoria == "1" || cat.idCategoria == "6"){
                        cat.titulo = "Paquetes de Datos"
                        cat.sub = "Navega en tus sitios favoritos"
                        cat.icono = "/Images/paquetesdatos.png"
                        
                    }else if (cat.idCategoria == "2") {
                        cat.titulo = "Paquetes todo incluido"
                        cat.sub = "Voz, Datos y SMS"
                        cat.icono = "/Images/Paquetestodoincluido.png"
                        
                    }else if (cat.idCategoria == "3") {
                        cat.titulo = "Paquetes Voz Ilimitada más Datos"
                        cat.sub = "Voz, Datos y SMS"
                        cat.icono = "/Images/icon-group.png"
                        
                    }else if (cat.idCategoria == "4") {
                        cat.titulo = "Paquetes de Voz"
                        cat.sub = "Llama a quien quieras y habla más con esa persona"
                        cat.icono = "/Images/paquetesvoz.png"
                        
                    }else if (cat.idCategoria == "5") {
                        cat.titulo = "Televisón"
                        cat.sub = "Satelital"
                        cat.icono = "/Images/paquetesTV.png"
                        
                    }else if (cat.idCategoria == "7") {
                        cat.titulo = "Paquetes Apps"
                        cat.sub = "Whatsapp, Instagram, Waze, Snapchat y Youtube"
                        cat.icono = "/Images/icon_redessociales.png"
                    }
               });
               
               
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
            }
            else {
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
            }
        })
    }
    
    //link compra de paquetes con tu saldo
    $scope.urlCampraPaquetesRecarga = function(paq,tipo){
        var datapaq = "";
        if(paq == ""){
            datapaq = angular.copy($scope.recagas[$scope.parametros.valrecargas]);
        }else{
            datapaq = paq;
        }
        var tokenConfic = "";
        var fechaEnvio = $moment().format('DDMMYYYYHHmmss');
        if(tipo == 1){
            tokenConfic = sha256.convertToSHA256(datapaq.codigoPaqueteGW+fechaEnvio+datapaq.precio);    
        }else{
            tokenConfic = sha256.convertToSHA256(fechaEnvio+datapaq.precio);    
        }
        
        $scope.datospagaconsaldo ={
            tipoTransaccion: tipo.toString(),
            tipoPaquete:(datapaq.tipoPaqueteID == undefined)?"":datapaq.tipoPaqueteID,
            tipoProducto:(datapaq.tipoProductoID == undefined)?"":datapaq.tipoProductoID,
            valorCompra:(datapaq.precio == undefined)?"":datapaq.precio,
            tipoOrigen: "2",
            nombreUsuario: $rootScope.Us.usuario.UserProfileID,
            codigoPaquete:(datapaq.codigoPaqueteGW == undefined)?"":datapaq.codigoPaqueteGW,
            numeroLinea: $scope.numeroCuenta,
            numeroCuenta: $scope.accountId.valor,
            fecha: fechaEnvio, 
            Token: tokenConfic
        }
        
        var z = document.createElement("form");
        z.setAttribute('method', "post");
        z.setAttribute('action', "https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoPaqueteRecarga&id_objeto=10029&operacion=Adicionar&empresa=claro");
        z.setAttribute("target", "_blank");

        var a = document.createElement("input"); //input element, text
        a.setAttribute('type', "text");
        a.setAttribute('name', "tipoTransaccion");
        a.setAttribute('value', $scope.datospagaconsaldo.tipoTransaccion);

        var b = document.createElement("input"); //input element, text
        b.setAttribute('type', "text");
        b.setAttribute('name', "tipoPaquete");
        b.setAttribute('value', $scope.datospagaconsaldo.tipoPaquete);

        var c = document.createElement("input"); //input element, text
        c.setAttribute('type', "text");
        c.setAttribute('name', "tipoProducto");
        c.setAttribute('value', $scope.datospagaconsaldo.tipoProducto);

        var e = document.createElement("input"); //input element, text
        e.setAttribute('type', "text");
        e.setAttribute('name', "valorCompra");
        e.setAttribute('value', $scope.datospagaconsaldo.valorCompra);

        var f = document.createElement("input"); //input element, text
        f.setAttribute('type', "text");
        f.setAttribute('name', "tipoOrigen");
        f.setAttribute('value', $scope.datospagaconsaldo.tipoOrigen);


        var g = document.createElement("input"); //input element, text
        g.setAttribute('type', "text");
        g.setAttribute('name', "nombreUsuario");
        g.setAttribute('value', $scope.datospagaconsaldo.nombreUsuario);

        var h = document.createElement("input"); //input element, text
        h.setAttribute('type', "text");
        h.setAttribute('name', "codigoPaquete");
        h.setAttribute('value', $scope.datospagaconsaldo.codigoPaquete);

        var i = document.createElement("input"); //input element, text
        i.setAttribute('type', "text");
        i.setAttribute('name', "numeroLinea");
        i.setAttribute('value', $scope.datospagaconsaldo.numeroLinea);

        var j = document.createElement("input"); //input element, text
        j.setAttribute('type', "text");
        j.setAttribute('name', "numeroCuenta");
        j.setAttribute('value', $scope.datospagaconsaldo.numeroCuenta);

        var k = document.createElement("input"); //input element, text
        k.setAttribute('type', "text");
        k.setAttribute('name', "fecha");
        k.setAttribute('value', $scope.datospagaconsaldo.fecha);

        var l = document.createElement("input"); //input element, text
        l.setAttribute('type', "text");
        l.setAttribute('name', "Token");
        l.setAttribute('value', $scope.datospagaconsaldo.Token);

        z.appendChild(a);
        z.appendChild(b);
        z.appendChild(c);
        z.appendChild(e);
        z.appendChild(f);
        z.appendChild(g);
        z.appendChild(h);
        z.appendChild(i);
        z.appendChild(j);
        z.appendChild(k);
        z.appendChild(l);

        document.getElementById("mainContent").appendChild(z);

        z.submit();
        
        $scope.moduloCompraPaquetesRecargas();
    }
    
    /*Función Editar número en compra de paquetes y recargas*/
    
    $scope.editNum = function(){
        var name = $window.document.getElementById('preinterPaquetesRecargas');
        name.focus();
    }
    
      /* Función terminos y condiciones*/
    
    $scope.posdetailterminosPaquetesRecargas = function(text, size, parentSelector){
        var parentElem = parentSelector ? 
          angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
          animation: $scope.animationsEnabled,
          ariaLabelledBy: 'modal-title',
          ariaDescribedBy: 'modal-body',
          templateUrl: 'posdetailterminosPaquetesRecargas.html',
          controller: 'posdetailterminosPaquetesRecargasctl',
          controllerAs: '$ctrl',
          size: size,
          appendTo: parentElem,
          resolve: {
            Data: function () {
              return text;
            }
          }
    });
    
    modalInstance.result.then(function (selectedItem) {
        }, function () {
        });
    }
    
    
    //compara de paquetes con tu saldo
    $scope.compraSaldo = function(paq){
        blockPaquetesRecargas.start(textos.Genericos.Cargando);
        var destino = 'itel414TodoDestino';
        if(paq.tipoPaqueteID == "1"){
            destino = destino = 'itel415CompraDatos'
        }
        servicios.Post(destino, {
            AccountId: $scope.accountId.valor,
            CodigoPaquete : paq.codigoPaqueteSaldo
        }, function(Data) {
            blockPaquetesRecargas.stop();
            if (Data.error == 0) {
                //$scope.planActualGranel();
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                $scope.volverPaquetes();
            }
            else if (Data.error == 2) {
                swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
            }
            else {
                swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
            }
        })
    }
    
    /*---- acordion compra de pauqtes y racargas movile ----*/
    $scope.collapseAll = function(data) {
	   for(var i in $scope.categorias) {
		   if($scope.categorias[i] != data) {
			   $scope.categorias[i].expanded = false;   
		   }
	   }
	   data.expanded = !data.expanded;
	};
	
	$scope.detallePaquetesRecargas = function (text, size, parentSelector) {
        var parentElem = parentSelector ? 
          angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
          animation: $scope.animationsEnabled,
          ariaLabelledBy: 'modal-title',
          ariaDescribedBy: 'modal-body',
          templateUrl: 'detallePaquetesRecargas.html',
          controller: 'detallePaquetesRecargas',
          controllerAs: '$ctrl',
          size: size,
          appendTo: parentElem,
          resolve: {
            Data: function () {
              return text;
            }
          }
    });
    
    modalInstance.result.then(function (selectedItem) {
        }, function () {
        });
    };
	
	//cambia la categoria de los paquetes
    $scope.cambiovistacategoria = function(item){
        $scope.vistaCategoria = "";
        var data = angular.copy(item);
        $scope.vistaCategoria = data;
    }
    
    // detalle paquete -> compar de paquetes y recargas
    $scope.verCompraPaquete = function(item,categoria,tipoPago) {
        var detallecat = angular.copy(categoria);
        $scope.datosPaquete = angular.copy(item);
        $scope.datosPaquete.detallecategoria = detallecat;
        $scope.datosPaquete.metodoPago = tipoPago;
        $scope.modulo = 5;
    }
    
    // Redireccion url recargas desde pospago --------- Eliminar ---------
    /*$scope.postredireccionrecargaspre = function() {
        
        block.start(textos.Genericos.Cargando);
        servicios.Post("SolicitarTokenAutenticacionSSO", {
                nombreUsuario: $rootScope.Us.usuario.UserProfileID,
                clave: $rootScope.Us.Cookie,
                tipoCanalOrigenID: 2,
                tipoCanalID:2
            },
            function(Data) {
                block.stop();
                if (Data.error == 0 || Data.error == 1) {

                    var f = document.createElement("form");
                    f.setAttribute('method', "post");
                    f.setAttribute('action', "https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=3&empresa=claro&id_objeto=10000");
                    f.setAttribute("target", "_blank");
            
                    var a = document.createElement("input"); //input element, text
                    a.setAttribute('type', "text");
                    a.setAttribute('name', "NumeroCelular");
                    a.setAttribute('value', $rootScope.OpSelec.postpago);
            
                     var b = document.createElement("input"); //input element, text
                    b.setAttribute('type', "text");
                    b.setAttribute('name', "fecha");
                    b.setAttribute('value', (Data.response.fecha == undefined)?"":Data.response.fecha);

                    var c = document.createElement("input"); //input element, text
                    c.setAttribute('type', "text");
                    c.setAttribute('name', "nombreUsuario");
                    c.setAttribute('value', $rootScope.Us.usuario.UserProfileID);

                    var d = document.createElement("input"); //input element, text
                    d.setAttribute('type', "text");
                    d.setAttribute('name', "tipoCanalOrigenID");
                    d.setAttribute('value', "2");

                    var e = document.createElement("input"); //input element, text
                    e.setAttribute('type', "text");
                    e.setAttribute('name', "tokenAutenticacion");
                    e.setAttribute('value', (Data.response.autenticacion == undefined)?"":Data.response.autenticacion);

                    var g = document.createElement("input"); //input element, text
                    g.setAttribute('type', "text");
                    g.setAttribute('name', "tokenValidacion");
                    g.setAttribute('value', (Data.response.validacion == undefined)?"":Data.response.validacion);
                    
                    var s = document.createElement("input"); //input element, Submit button
                    s.setAttribute('type', "submit");
                    s.setAttribute('value', "Submit");
            
                    f.appendChild(a);
                    f.appendChild(b);
                    f.appendChild(c);
                    f.appendChild(d);
                    f.appendChild(e);
                    f.appendChild(g);
                    f.appendChild(s);
            
                    document.getElementById("mainContent").appendChild(f);
            
                    f.submit();
                    
                }
                else if (Data.error == 2) {
                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                }
                else {
                    swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                }
            })
    }*/
    
    $scope.postopenhistorialrecargaspre = function(size, parentSelector) {
        var parentElem = parentSelector ?
            angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'postopenhistorialrecargaspre.html',
            controller: 'postdetalleconsumorecargaspre',
            controllerAs: '$ctrl',
            size: size,
            appendTo: parentElem,
            resolve: {
                fechas: function() {
                    return $scope.fechas;
                }
            }
        });

        modalInstance.result.then(function(Data) {},
            function() {

            });
    }
    
    $scope.postopenhistorialcosnumospre = function(size, parentSelector) {
        var parentElem = parentSelector ?
            angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'postopenhistorialconsumospre.html',
            controller: 'postopenhistorialconsumospre',
            controllerAs: '$ctrl',
            size: "lg",
            appendTo: parentElem,
            resolve: {
                fechas: function() {
                    return $scope.fechas;
                }
            }
        });

        modalInstance.result.then(function(Data) {},
            function() {

            });
    }
    
    $scope.items = ['item1', 'item2', 'item3'];

    $scope.animationsEnabled = true;
    
    $scope.opendetalle = function (size, parentSelector) {
        var parentElem = parentSelector ? 
        angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
          animation: $scope.animationsEnabled,
          ariaLabelledBy: 'modal-title',
          ariaDescribedBy: 'modal-body',
          templateUrl: 'detalledelpanpostpago.html',
          controller: 'detalledelpanpostpago',
          controllerAs: '$ctrl',
          size: size,
          appendTo: parentElem,
          resolve: {
            items: function () {
              return $scope.items;
            }
          }
        });
        
        modalInstance.result.then(function (Data) {},
        function () {
          
        });
    }
    
    $scope.historialdatos = function (size, parentSelector) {
        
      if ($scope.DatosTorta.history.length > 0) {
        var parentElem = parentSelector ? 
        angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstancehistorialdatos = $uibModal.open({
          animation: $scope.animationsEnabled,
          ariaLabelledBy: 'modal-title',
          ariaDescribedBy: 'modal-body',
          templateUrl: 'historialdelplanpostpago.html',
          controller: 'historialdelplanpostpago',
          controllerAs: '$ctrl',
          size: size,
          appendTo: parentElem,
          resolve: {
            items: function () {
              return $scope.DatosTorta.history;
            }
          }
        })
        
        modalInstancehistorialdatos.result.then(function (Data) {},
        function () {
          
        });
      }else{
        swal({title: textos.Genericos.ErrorTitle,text: textos.PostConsumoDeDatos.PCD1, confirmButtonText: textos.Genericos.Ok});
      }
      
    }
    
    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };
    
    $scope.getini = function() {
        // Init
        $scope.modulo=1;
        $scope.estadistica = 1;
        $scope.getDatos(); // Información del consumo de datos "Torta"
        $scope.getRoaming(); // Información del consumo de roaming "Torta"
    }
    
    $scope.getini();
    
}).controller('historialdelplanpostpago', function ($rootScope, $uibModalInstance, items, $scope, textos, SweetAlert, servicios, blockUI, $moment) {
  
  $scope.DatosTorta = {history : items}
  for (var i = 0; i < $scope.DatosTorta.history.length; i++) {
      $scope.DatosTorta.history[i].startDate = $moment($scope.DatosTorta.history[i].startDate).format("YY MMM DD"); 
      $scope.DatosTorta.history[i].endDate = $moment($scope.DatosTorta.history[i].endDate).format("YY MMM DD"); 
  }
  
  $scope.ok = function () {
    $uibModalInstance.close('cancel');
  }
  
  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  }
  
}).controller('detalledelpanpostpago', function ($rootScope, $uibModalInstance, items, $scope, textos, SweetAlert, servicios, blockUI, $moment, $filter) {
    
    $scope.Data = {}
    
    // Fecha inicial, Fecha final
    $moment.locale('es');
    $scope.date = $moment().format('YYYY-MM-');
    $scope.monthname = $moment().format('MMMM')
    $scope.fechas = { fechainicial: ($scope.date + "01").replace(/-/g,"")+"000000000", fechafinal: $moment().format('YYYY-MM-DD').replace(/-/g,"")+"000000000" }    
  
    // Block the user interface
    var block = blockUI.instances.get('block');
  
      // Solicita la información del consumo de datos "Tabla"
    $scope.getinfo = function(){
        block.start(textos.Genericos.Cargando);
        servicios.Post("rest/getXdrConsumo", {    
            AccountId: $rootScope.OpSelec.postpago,
            FechaInicial: $scope.fechas.fechainicial,
            FechaFinal: $scope.fechas.fechafinal,
            canal:"xdr"    
        }, function(Data){
            block.stop();
            if (Data.error == 0) {
                $scope.DataConsumo = $filter('filter')(Data.response, { COBRO: "!" + "Incluido Plan" });
            }else if (Data.error == 2) {
                swal({title: textos.Genericos.ErrorTitle,text: textos.Genericos.Error,confirmButtonText: textos.Genericos.Ok});
                $scope.cancel();
            }else {
                swal({title: textos.Genericos.ErrorTitle,text: Data.response, confirmButtonText: textos.Genericos.Ok});
                $scope.cancel();
            }
        })
    }
   
   $scope.ok = function () {
    $uibModalInstance.close('cancel');
   }
  
   $scope.cancel = function () {
     $uibModalInstance.dismiss('cancel');
   }
  
   // Init
   $scope.getinfo();
}).controller('postdetalleconsumorecargaspre', function($rootScope, $uibModalInstance, fechas, $scope, textos, SweetAlert, servicios, blockUI) {
    $rootScope.Tagging('Prepago','pt_pre_ini_resumencta_histrecargas')
    $scope.fechas = fechas;
    $scope.Recargas = [];
    // Block the user interface
    var block = blockUI.instances.get('blockrecargas');

    // Solicita la información del historial de recargas
    $scope.getinfo = function() {
        if ($rootScope.OpSelec.prepago != "") {
            block.start(textos.Genericos.Cargando);
            servicios.Post("rest/getXdrRecargasPrepago", {
                AccountId: $rootScope.OpSelec.pospago,
                FechaInicial: $scope.fechas.fechainicial,
                FechaFinal: $scope.fechas.fechafinal,
                canal: "xdr_prepago"
            }, function(Data) {
                block.stop();
                if (Data.error == 0) {
                    $scope.Recargas = Data.response;
                    if($scope.Recargas.length == 0){
                        swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.nocuentas, confirmButtonText: textos.Genericos.Ok });
                        $scope.cancel();
                    }
                    
                }
                else if (Data.error == 2) {
                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                    $scope.cancel();
                }
                else {
                    swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                    $scope.cancel();
                }
            })
        }
    }

    $scope.ok = function() {
        $uibModalInstance.close('cancel');
    }

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    }

    // Init
    $scope.getinfo();
}).controller('postopenhistorialconsumospre', function($rootScope, $uibModalInstance, fechas, $scope, textos, SweetAlert, servicios, blockUI, $filter) {
    $rootScope.Tagging('Prepago','pt_pre_ini_resumencta_consumomes');

    $scope.fechas = fechas;
    $scope.Consumos = [];
    // Selectd tipo de consumos
    $scope.SelectdTipoConsumo = 5;
    // Tipos de consumos
    $scope.ListTipoConsumo = [
        { ident: 0, nombre: "-- Tipo de consumo --" },
        { ident: 1, nombre: "Datos", Listfix: "TotalConsumoRatingGroup", ListScroll: "TotalConsumoRatingGroupDia" },
        { ident: 2, nombre: "Llamadas", Listfix: "ResumenLlamadas", ListScroll: "DetalleLlamadas" },
        { ident: 3, nombre: "Mensajes", Listfix: "ResumenMensajes", ListScroll: "DetalleMensajes" },
        { ident: 4, nombre: "Varios", Listfix: "ResumenVarios", ListScroll: "DetalleVarios" }
    ]
    // List selectd tipo de consumos
    $scope.ListSelectdTipoConsumoFix = [];
    $scope.ListSelectdTipoConsumoScroll = [];

    // Block the user interface
    var block = blockUI.instances.get('blockconsumos');

    // Solicita la información del consumo
    $scope.getinfo = function() {
        if ($rootScope.OpSelec.postpago != "") {
            block.start(textos.Genericos.Cargando);
            servicios.Post("rest/getXdrConsumosPrepago", {
                AccountId: $rootScope.OpSelec.postpago,
                FechaInicial: $scope.fechas.fechainicial,
                FechaFinal: $scope.fechas.fechafinal,
                canal: "xdr_prepago"
            }, function(Data) {
                block.stop();
                if (Data.error == 0) {
                    $scope.Consumos = Data.response;
                    $scope.validar($scope.SelectdTipoConsumo);
                }
                else if (Data.error == 2) {
                    swal({ title: textos.Genericos.ErrorTitle, text: textos.Genericos.Error, confirmButtonText: textos.Genericos.Ok });
                    $scope.cancel();
                }
                else {
                    swal({ title: textos.Genericos.ErrorTitle, text: Data.response, confirmButtonText: textos.Genericos.Ok });
                    $scope.cancel();
                }
            })
        }
    }

    // Filtra del array, los correspondientes al item seleccionado
    $scope.validar = function(SelectdTipoConsumo) {
        $scope.SelectdTipoConsumo = SelectdTipoConsumo;
        // 0 -> Tipo de consumo, 1 -> Datos, 2 -> Llamadas, 3 -> Mensajes, 4 -> Varios 
        if (SelectdTipoConsumo == 1) {
            $scope.ListSelectdTipoConsumoFix = $filter('filter')($scope.Consumos, { tipo: "TotalConsumoRatingGroup" }, true);
            $scope.ListSelectdTipoConsumoScroll = $filter('filter')($scope.Consumos, { tipo: "TotalConsumoRatingGroupDia" }, true);

            for (var i = 0; i < $scope.ListSelectdTipoConsumoFix.length; i++) {
                $scope.ListSelectdTipoConsumoFix[i].CONSUMO_TOTAL_RATING_GROUP = $scope.cut($scope.ListSelectdTipoConsumoFix[i].CONSUMO_TOTAL_RATING_GROUP, ".")
            }

            for (var i = 0; i < $scope.ListSelectdTipoConsumoScroll.length; i++) {
                $scope.ListSelectdTipoConsumoScroll[i].CONSUMO_TOTAL_RATING_GROUP = $scope.cut($scope.ListSelectdTipoConsumoScroll[i].CONSUMO_TOTAL_RATING_GROUP, ".")
            }
        }
        else if (SelectdTipoConsumo == 2) {
            $scope.ListSelectdTipoConsumoFix = $filter('filter')($scope.Consumos, { tipo: "ResumenLlamadas" }, true);
            $scope.ListSelectdTipoConsumoScroll = $filter('filter')($scope.Consumos, { tipo: "DetalleLlamadas" }, true);
        }
        else if (SelectdTipoConsumo == 3) {
            $scope.ListSelectdTipoConsumoFix = $filter('filter')($scope.Consumos, { tipo: "ResumenMensajes" }, true);
            $scope.ListSelectdTipoConsumoScroll = $filter('filter')($scope.Consumos, { tipo: "DetalleMensajes" }, true);
        }
        else if (SelectdTipoConsumo == 4) {
            $scope.ListSelectdTipoConsumoFix = $filter('filter')($scope.Consumos, { tipo: "ResumenVarios" }, true);
            $scope.ListSelectdTipoConsumoScroll = $filter('filter')($scope.Consumos, { tipo: "DetalleVarios" }, true);
            for (var i = 0; i < $scope.ListSelectdTipoConsumoScroll.length; i++) {
                $scope.ListSelectdTipoConsumoScroll[i].DESCRIPCION = $scope.ListSelectdTipoConsumoScroll[i]["DESCRIPCIÓN"];
            }
        }
        else if (SelectdTipoConsumo == 5) {
            // 1 -> Datos
            $scope.ListSelectdTipoConsumoFix.Datos = $filter('filter')($scope.Consumos, { tipo: "TotalConsumoRatingGroup" }, true);

            for (var i = 0; i < $scope.ListSelectdTipoConsumoFix.length; i++) {
                $scope.ListSelectdTipoConsumoFix[i].CONSUMO_TOTAL_RATING_GROUP = $scope.cut($scope.ListSelectdTipoConsumoFix.Datos[i].CONSUMO_TOTAL_RATING_GROUP, ".")
            }

            // 2 -> Llamadas
            $scope.ListSelectdTipoConsumoFix.Llamadas = $filter('filter')($scope.Consumos, { tipo: "ResumenLlamadas" }, true);

            // 3 -> Mensajes
            $scope.ListSelectdTipoConsumoFix.Mensajes = $filter('filter')($scope.Consumos, { tipo: "ResumenMensajes" }, true);

            // 4 -> Varios
            $scope.ListSelectdTipoConsumoFix.Varios = $filter('filter')($scope.Consumos, { tipo: "ResumenVarios" }, true);

        }
        else {
            $scope.ListSelectdTipoConsumoFix = [];
            $scope.ListSelectdTipoConsumoScroll = [];
        }
    }

    $scope.cut = function(valor, referencia) {
        valor = "" + valor;
        var y = valor.split(referencia)[0];
        var x = valor.split(referencia)[1].substring(0, 1);
        return y + referencia + x;
    }

    $scope.ok = function() {
        $uibModalInstance.close('cancel');
    }

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    }

    
    // Init
    $scope.getinfo();
}).controller('detallePaquetesRecargas', function ($uibModalInstance, Data, $scope) {
  $scope.Data = Data;
  
  $scope.ok = function () {
    $uibModalInstance.close('cancel');
  }

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  }
}).controller('posdetailterminosPaquetesRecargasctl', function ($uibModalInstance, Data, $scope) {
  $scope.Data = Data;
  
  $scope.ok = function () {
    $uibModalInstance.close('cancel');
  }

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  }
}); 

