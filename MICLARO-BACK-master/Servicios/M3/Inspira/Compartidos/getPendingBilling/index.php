<?php


require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/BillingManagement/v1.0/"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

   $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;

    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    

    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

    

    $Vlfwkhon2bz0 = array();
    $Vlfwkhon2bz0["data"] = $VqhzkfsafzrcRes;


     if($VqhzkfsafzrcRes["error"] == 0){
      $V4kfh5akqyzi = "tnsgetPendingBillingResponse";
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

            if($VqhzkfsafzrcRes->responseStatus->code=="FS_ESB_0"){

                $Vgnvp52vmbfj  = (array)$VqhzkfsafzrcRes->customer;
                $Vgu1yjtetqpu  = (array)$VqhzkfsafzrcRes->financialDocuments->financialDocument;
                $Vimaahrgsww4  = (array)$VqhzkfsafzrcRes->financialDocuments->financialDocument->totalReference;

                $V33pfx2czwer = (array)$VqhzkfsafzrcRes->customer->billCycle;;


                $Vfmmypt4k3jn=explode('T', $V33pfx2czwer["lastRunDate"]);
                $Vjav010uhv5a=$Vfmmypt4k3jn[0];

                $Vnrarg4kgk4q=explode('T',$V33pfx2czwer["bchRunDate"]);
                $Vjav010uhv5a2=$Vnrarg4kgk4q[0];


                $Vjav010uhv5aFinal = $Vjav010uhv5a." - ".$Vjav010uhv5a2;
                

                $Vd10ichsd3g5 = array("nombre"=>$Vgnvp52vmbfj["name"],"ciudad"=>"",
                    "direccion"=>$Vgnvp52vmbfj["addressBilling"],"CuentaMultiplay"=>"");

                $Vqhzkfsafzrc2=array("data" => array("numeroCuenta" => $Vqhzkfsafzrc->numeroCuenta));
                $Vnwlngxwnesf = "http://206.128.154.98/M3/Inspira/Compartidos/getPaymentReferences/";
                $Vtssepikoezf=$this->curlWigi->simple_post($Vnwlngxwnesf,$Vqhzkfsafzrc2);

                $Vtssepikoezf=json_decode($Vtssepikoezf);

           
                if($Vtssepikoezf->error==0){
                    $Vdqpzh10oary = (array)$Vtssepikoezf->response;
           
                    $Vdqpzh10oary = array("numeroFactura"=>isset($Vdqpzh10oary["numeroFactura"])?$Vdqpzh10oary["numeroFactura"]:"",
                    "valor"=>isset($Vdqpzh10oary["valor"])?$Vdqpzh10oary["valor"]:"",
                    "pagoOportuno"=>isset($Vdqpzh10oary["pagoOportuno"])?$Vdqpzh10oary["pagoOportuno"]:"",
                    "abonada"=>"",
                    "ReferenciaPagoTotal"=>isset($Vdqpzh10oary["ReferenciaPagoTotal"])?$Vdqpzh10oary["ReferenciaPagoTotal"]:"",
                    "PeriodoFacturacion"=>isset($Vjav010uhv5aFinal)?$Vjav010uhv5aFinal:"");
                   
                    
                    $Vlfwkhon2bz0["error"]=0;
                    $Vlfwkhon2bz0["response"]=array("usuario"=>$Vd10ichsd3g5,"facturaActual"=>$Vdqpzh10oary,"PagosMes"=>array("mes"=>"",
                        "fechaPago"=>"","valor"=>""));
                    $Vlfwkhon2bz0["data"]=$VqhzkfsafzrcRes;

            }else{
                $Vlfwkhon2bz0["error"]=0;
                $Vlfwkhon2bz0["response"]=array("usuario"=>$Vd10ichsd3g5,"facturaActual"=>array("numeroFactura"=>0,
                    "valor"=>0,"pagoOportuno"=>"","abonada"=>"","ReferenciaPagoTotal"=>"","PeriodoFacturacion"=>""),"PagosMes"=>array("mes"=>"",
                    "fechaPago"=>"","valor"=>0));
            }



        }else{
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="Error al obtener la información de tu cuenta. Intentalo nuevamente.";
        }
}
      
}else{
    $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
}
  
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();