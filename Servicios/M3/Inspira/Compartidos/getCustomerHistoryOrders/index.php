<?php


require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/CustomerOrderManagement/v1.0"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


     if($VqhzkfsafzrcRes["error"] == 0){
        $V4kfh5akqyzi = "tnsgetCustomerHistoryOrdersResponse";
        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

            if($VqhzkfsafzrcRes->responseStatus->code=="FS_ESB_0"){
                $Vautxf03llyt = array();
              
                  if(isset($VqhzkfsafzrcRes->ordersList,$VqhzkfsafzrcRes->ordersList->order) && sizeof($VqhzkfsafzrcRes->ordersList->order) > 0){            
                    foreach ($VqhzkfsafzrcRes->ordersList->order as $Virsew13xpli) {
                    
                        $Virsew13xpli = (array)$Virsew13xpli;
                        $Ved23wmtrtma=$Virsew13xpli["serviceOrder"];
                        $Virsew13xpli = (array)$Ved23wmtrtma;


                        if(isset($Virsew13xpli["createDate"],$Virsew13xpli["status"],$Virsew13xpli["type"])){
                            $V5u2mnsvufhu = $Virsew13xpli["createDate"];
                            $Vmtvkqxvklrv = $Virsew13xpli["status"];
                            $V31qrja1w0r2 = $Virsew13xpli["type"];
                        }else{
                            $V5u2mnsvufhu = "";
                            $Vmtvkqxvklrv = "";
                            $V31qrja1w0r2 = "";
                        }
                        $Vuz2tqweebiu=array(
                            "Date"=>$Virsew13xpli["createDate"],
                            "Channel"=>$Virsew13xpli["status"],
                            "Transaction"=>$Virsew13xpli["type"]);
                       
                        array_push($Vautxf03llyt,$Vuz2tqweebiu);
                    }
                   

                    $Vlfwkhon2bz0["error"]=0; 
                    $Vlfwkhon2bz0["response"]=$Vautxf03llyt;
                    $Vlfwkhon2bz0["data"]=$VqhzkfsafzrcRes;

                }
                
            }else{
                $Vlfwkhon2bz0["error"]=1; 
                $Vpsm42ro4mkq = (array)$VqhzkfsafzrcRes->responseStatus;
                $Vlfwkhon2bz0["response"] = $Vpsm42ro4mkq["message"];

            }
                
            
        }else{
                $Vlfwkhon2bz0["error"]=1; 
                $Vlfwkhon2bz0["response"] = "Ha ocurrido un error. Intenta de nuevo.";
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