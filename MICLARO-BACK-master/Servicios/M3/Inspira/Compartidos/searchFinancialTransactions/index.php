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
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->documentType=$Vd10ichsd3g5->DocumentType;
        $Vqhzkfsafzrc->documentNumber=$Vd10ichsd3g5->DocumentNumber;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


     if($VqhzkfsafzrcRes["error"] == 0){
      $V4kfh5akqyzi = "tnssearchFinancialTransactionsResponse";
        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

       
    $Vlfwkhon2bz0["error"]=0;

    if($VqhzkfsafzrcRes->responseStatus->code=="FS_ESB_0"){
        $Vautxf03llyt = array();
        $Vpfs1kkzy45w = (array)$VqhzkfsafzrcRes->transactions->transaction;

        $Vinlf1l0toqy = array("LINEA"=>"","VALOR"=>isset($Vpfs1kkzy45w["invoiceAmount"])?$Vpfs1kkzy45w["invoiceAmount"]:"",
            "FECHA"=>isset($Vpfs1kkzy45w["dueDate"])?$Vpfs1kkzy45w["dueDate"]:"","HORA"=>"","FACTURA"=>isset($Vpfs1kkzy45w["billingAccount"])?$Vpfs1kkzy45w["billingAccount"]:"");
        

            for ($Vxja1abp34yq=1; $Vxja1abp34yq < sizeof($VqhzkfsafzrcRes->transactions->transaction); $Vxja1abp34yq++) { 
                $Vxja1abp34yqtem = (array)$VqhzkfsafzrcRes->transactions->transaction[$Vxja1abp34yq];
                $Vinlf1l0toqys = array("VALOR"=>isset($Vxja1abp34yqtem["invoiceAmount"])?$Vxja1abp34yqtem["invoiceAmount"]:"",
                    "FECHA"=>isset($Vxja1abp34yqtem["dueDate"])?$Vxja1abp34yqtem["dueDate"]:"",
                    "HORA"=>"","FACTURA"=>isset($Vxja1abp34yqtem["billingAccount"])?$Vxja1abp34yqtem["billingAccount"]:"");
                array_push($Vautxf03llyt, $Vinlf1l0toqys);
             } 
    
    $Vlfwkhon2bz0["response"]=array("UltimoPago"=>$Vinlf1l0toqy,"UltimosPagos"=>$Vautxf03llyt);


}else{
    $Vlfwkhon2bz0["error"]=1; 
    $Vpsm42ro4mkq = (array)$VqhzkfsafzrcRes->responseStatus;
    $Vlfwkhon2bz0["response"]= $Vpsm42ro4mkq["message"];
}
    
    }else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vlfwkhon2bz0["response"] = "No ha sido posible, realizar la operación por el momento.";
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