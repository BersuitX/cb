var app = angular.module('miclaro', ['ui.router','ngAnimate','ngSanitize','blockUI','oitozero.ngSweetAlert','chart.js','ui.bootstrap','ngMaterial','angularFileUpload','angular-momentjs','ngMap','ui.carousel']);


// Safely instantiate dataLayer
var dataLayer = window.dataLayer = window.dataLayer || [];
  
app.run(['$rootScope','$state','Carousel','$timeout','$filter', function($rootScope,$state,Carousel,$timeout,$filter){
  
  // Al realizar resize llama a "calculardimenciones"
  angular.element(window).on('resize', function () {
    calculardimenciones();
  });
   
  // Calcula el tamaño del contenedor padre y el navegador -> todo a fin de ubicar el footer
  function calculardimenciones (){
      $timeout(function(){
        if (window.innerHeight > ($("#contentmaster").height() + 100)) {
            $("#footer").css({"position":"fixed","bottom":"0"});
        }else{  
            $("#footer").css({"position":"relative","display":"block !important"});
        }
      },500);
  }
  
  $rootScope.$on('$stateChangeStart', function(event, toState, fromState, next, current,$window,$location) {
    
      dataLayer.push({
        event: 'pages',
        attributes: {
          route: window.location.href
        }
      });
      
    // Al cargar la pagina llama a "calculardimenciones"
    $("#footer").css({"position":"fixed","bottom":"0"});
    calculardimenciones(); 

  })
  
  // Cuando carga la pagina ejecuta la función
  calculardimenciones(); 
  
  // Si existe una cookie continua, de lo contrario, redirecciona al home
  if (sessionStorage.Cookie != null) {
    // Interna indica si se encuentra en una interna = 1 o en el dashboard = 0
    $rootScope.interna=0; 
    // Información del usuario logueado
    $rootScope.Us="";
    // Numero seleccionado por el usuario
    $rootScope.OpSelec = {postpago:"", prepago:"", hogar:""};
    //seccion = 3 postpago, 2 prepago, 1 hogar
    $rootScope.seccion=1;
    // Mostrar el dashboard
    $rootScope.ShowDash = 1
  
    $rootScope.Us = (sessionStorage.Cookie != null)?sessionStorage.Cookie:"";
    var decrypt = $rootScope.Us;
    decrypt = CryptoJS.AES.decrypt(decrypt, "claromiclaro");
    decrypt = decrypt.toString(CryptoJS.enc.Utf8);
    $rootScope.Us = JSON.parse(decrypt);
    
    // Tipos de documentos master segun tipo de cuenta (Hogar, Prepago, Postpago) y  tipo de documento 
    $rootScope.TiposDocumentos = [
        { id: "1", nombre: "Cédula de Ciudadanía", tipomovil: "1", tipofijo: "CC" },
        { id: "2", nombre: "Cédula de Extranjería", tipomovil: "4", tipofijo: "CE" },
        { id: "3", nombre: "Pasaporte", tipomovil: "3", tipofijo: "PP" },
        { id: "4", nombre: "Carné Diplomático", tipomovil: "-1", tipofijo: "CD" }
        //{ id:"5", nombre:"Nit", tipomovil:"2", tipofijo:"NI"}
    ]
    
    // Reemplaza las comas por puntos
    $rootScope.fnreplace = function(item){
      if (item != undefined) {
        var itemreplace = $filter('currency')(item, "$ ", 0);
        return itemreplace.replace(/,/g,".");
      }
    }
    
    console.log($rootScope.Us);
    
    // Se deja seleccionado el item al cual corresponde la primera linea y tambien se deja preseleccionado
    $rootScope.seccion = $rootScope.Us.cuentas[0].LineOfBusiness;
    if($rootScope.Us.cuentas[0].LineOfBusiness == 3){
        $rootScope.OpSelec.postpago = ""+$rootScope.Us.cuentas[0].AccountId;
        window.location.href="/Dashboard/#postpago"
    }else if($rootScope.Us.cuentas[0].LineOfBusiness == 2){
        $rootScope.OpSelec.prepago = ""+$rootScope.Us.cuentas[0].AccountId;
        window.location.href="/Dashboard/#prepago"
    }else{
        $rootScope.OpSelec.hogar = ""+$rootScope.Us.cuentas[0].AccountId;
        window.location.href="/Dashboard/#hogar"
    }
  }else{
    window.location.href="/";
  }
  
  //Tagging dashboard
  $rootScope.Tagging = function(categoria,evento){
      ga('send', 'event', categoria, evento, '')
  }
}])

app.config(['$stateProvider','$urlRouterProvider','$locationProvider','blockUIConfig','$mdThemingProvider', function ($stateProvider, $urlRouterProvider, $locationProvider, blockUIConfig, $mdThemingProvider) {
      
  blockUIConfig.autoBlock = false;
  $mdThemingProvider.theme('default').primaryPalette('pink').accentPalette('orange');
   
  $stateProvider
  
  .state('dashboard', {
    cache: false,
    url: "/",
    templateUrl: "../../vistas/postpago.html",
    controller: "postpago"
  })
  
  .state('postpago', {
    cache: false,
    url: "/postpago",
    templateUrl: "../../vistas/postpago.html",
    controller: "postpago"
  })
  
  .state('prepago', {
    cache: false,
    url: "/prepago",
    templateUrl: "../../vistas/prepago.html",
    controller: "prepago"
  })
  
  .state('DetalleDeConsumoSaldo', {
    cache: false,
    url: "/DetalleDeConsumoSaldo",
    templateUrl: "../../vistas/prepago/detalleconsumosaldo.html",
    controller: "detalleconsumosaldo"
  })
  
  .state('hogar', {
    cache: false,
    url: "/hogar",
    templateUrl: "../../vistas/hogar.html",
    controller: "hogar"
  })
  
  .state('DetallePlanPostpago', {
    cache: false,
    url: "/DetallePlanPostpago",
    templateUrl: "../../vistas/postpago/postdetalleplan.html",
    controller: "postdetalleplan"
  })
  
  .state('PagaTuFacturaPostpago', {
    cache: false,
    url: "/PagaTuFacturaPostpago",
    templateUrl: "../../vistas/postpago/postpagatufactura.html",
    controller: "postpagatufactura"
  })

  .state('ConvenioElectronicoPostpago', {
    cache: false,
    url: "/ConvenioElectronicoPostpago",
    templateUrl: "../../vistas/postpago/postconvenioelectronico.html",
    controller: "postconvenioelectronico"
  })
  
  .state('ConsumoDeDatosPostpago', {
    cache: false,
    url: "/ConsumoDeDatosPostpago",
    templateUrl: "../../vistas/postpago/postconsumodedatos.html",
    controller: "postconsumodedatos"
  })
  
  .state('ConsumoDeVozPostpago', {
    cache: false,
    url: "/ConsumoDeVozPostpago",
    templateUrl: "../../vistas/postpago/postconsumodevoz.html",
    controller: "postconsumodevoz"
  })
  
  .state('ElegidosTodoDestino', {
    cache: false,
    url: "/ElegidosTodoDestino",
    templateUrl: "../../vistas/postpago/postelegidostododestino.html",
    controller: "postelegidostododestino"
  })
  
  .state('CambioDeNumero', {
    cache: false,
    url: "/CambioDeNumeroPostpago",
    templateUrl: "../../vistas/postpago/postcambiodenumero.html",
    controller: "postcambiodenumero"
  })
  
  .state('RegistrarIMEI', {
    cache: false,
    url: "/RegistrarIMEI",
    templateUrl: "../../vistas/postpago/postregistrarimei.html",
    controller: "postregistrarimei"
  })
  
  .state('MovimientosDeLaCuentaPostpago', {
    cache: false,
    url: "/MovimientosDeLaCuentaPostpago",
    templateUrl: "../../vistas/postpago/movimientosdelacuentapostpago.html",
    controller: "movimientosdelacuentapostpago"
  })
  
  .state('CambiaTuPlanPostpago', {
    cache: false,
    url: "/CambiaTuPlanPostpago",
    templateUrl: "../../vistas/postpago/postcambiatuplan.html",
    controller: "cambiatuplanpostpago"
  })  
  
  .state('AsociarProductoClaroGeneral', {
    cache: false,
    url: "/AsociarProductoClaroGeneral",
    templateUrl: "/vistas/asociarproductoclarogeneral.html",
    controller: "asociarproductoclarogeneral"
  })
  
  .state('ElegidoTodoDestinoPrepago', {
    cache: false,
    url: "/ElegidoTodoDestinoPrepago",
    templateUrl: "/vistas/prepago/preelegidotododestino.html",
    controller: "preelegidotododestino"
  })
  
  .state('RegistroNumeroaAmigoPrepago', {
    cache: false,
    url: "/RegistroNumeroaAmigoPrepago",
    templateUrl: "/vistas/prepago/preregistronumeroamigo.html",
    controller: "preregistronumeroamigo"
  })
  
  .state('RegistrarImiPrepago', {
    cache: false,
    url: "/RegistrarImeiPrepago",
    templateUrl: "/vistas/prepago/preregistrarimei.html",
    controller: "preregistrarimei"
  })
  
  .state('CambiaTuPlanPrepago', {
    cache: false,
    url: "/CambiaTuPlanPrepago",
    templateUrl: "../../vistas/prepago/precambiatuplan.html",
    controller: "cambiatuplanprepago"
  })  
  
  .state('MovimientosDeLaCuentaPrepago', {
    cache: false,
    url: "/MovimientosDeLaCuentaPrepago",
    templateUrl: "../../vistas/prepago/premovimientosdelacuenta.html",
    controller: "movimientosdelacuentaprepago"
  })  
  
  .state('PagaTuFacturaHogar', {
    cache: false,
    url: "/PagaTuFacturaHogar",
    templateUrl: "../../vistas/hogar/hogarpagatufactura.html",
    controller: "hogarpagatufactura"
  })
  
  .state('ConvenioElectronicoHogar', {
    cache: false,
    url: "/ConvenioElectronicoHogar",
    templateUrl: "../../vistas/hogar/hogarconvenioelectronico.html",
    controller: "hogarconvenioelectronico"
  })
  
  .state('ZonasWifiHogar', {
    cache: false,
    url: "/ZonasWifiHogar",
    templateUrl: "../../vistas/hogar/hogarzonaswifi.html",
    controller: "hogarzonaswifi"
  })
  
  .state('CambioDeClaveWifi', {
    cache: false,
    url: "/CambioDeClaveWifi",
    templateUrl: "../../vistas/hogar/cambiodeclavewifi.html",
    controller: "cambiodeclavewifi"
  })
  
  .state('Gps', {
    cache: false,
    url: "/GpsTecnico",
    templateUrl: "../../vistas/hogar/gps.html",
    controller: "gps"
  })
  
  .state('DatosCompartidos', {
    cache: false,
    url: "/DatosCompartidos",
    templateUrl: "../../vistas/postpago/postdatoscompartidos.html",
    controller: "datoscompartidos"
  })
  
  $urlRouterProvider.otherwise('/');
  
}]);