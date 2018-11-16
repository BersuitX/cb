<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();


$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->LineOfBusiness=$Vcw3r1lhk5bx->LineOfBusiness;


        if(intval($Vqhzkfsafzrc->LineOfBusiness) == 1) {
            $Vfbt3who3l5d='{"TipoTrans":"FIJO","NumeroCelular": "","NumeroCuenta":"'.$Vqhzkfsafzrc->AccountId.'","Fecha":"'.$Vqhzkfsafzrc->fecha.'"}';
        }else{
            $Vfbt3who3l5d='{"TipoTrans":"MOVIL","NumeroCelular": "'.$Vqhzkfsafzrc->AccountId.'","NumeroCuenta":"","Fecha":"'.$Vqhzkfsafzrc->fecha.'"}';
        }

        $Vx5bl5ubgnhj = hash("sha256", "consultaclaro:".$Vqhzkfsafzrc->fecha."-ultimospagos");
        $Vevim1jijerc='https://portalpagos.claro.com.co/phrame.php?action=metodo_ajax&metodo=clienteAjax&clase=claro&metodo_ejec=getUltimosPagos&empresa=claro&Datos='.urlencode($Vfbt3who3l5d);

        $Vy5yyyefdntg = array(
            "Content-type: application/json;charset=\"utf-8\"",
            "Accept: application/json",
            "Token: ".$Vx5bl5ubgnhj,
        );

        $Vku2mlvdxbp2 = curl_init();
        curl_setopt($Vku2mlvdxbp2, CURLOPT_URL, $Vevim1jijerc);
        curl_setopt($Vku2mlvdxbp2, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($Vku2mlvdxbp2, CURLOPT_TIMEOUT,        30);
        curl_setopt($Vku2mlvdxbp2, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($Vku2mlvdxbp2, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($Vku2mlvdxbp2, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($Vku2mlvdxbp2, CURLOPT_HTTPHEADER,     $Vy5yyyefdntg);
        $Vtssepikoezf = curl_exec($Vku2mlvdxbp2);

        $Vtssepikoezfp=json_decode($Vtssepikoezf);
   
        if ($Vtssepikoezfp->codigo=="200") { 

            $VqhzkfsafzrcResponse=array();
            foreach ($Vtssepikoezfp->DatosRespuesta as $Virsew13xpli) {
                $Virsew13xpli = (array)$Virsew13xpli;
                if (isset($Virsew13xpli["UltimoPago"])) {
                    $VqhzkfsafzrcResponse["UltimoPago"]=$Virsew13xpli["UltimoPago"];
                }else if(isset($Virsew13xpli["UltimosPagos"])){
                    $VqhzkfsafzrcResponse["UltimosPagos"]=$Virsew13xpli["UltimosPagos"];
                }
            }
            $Vtssepikoezfpuesta["error"]=0;
            $Vtssepikoezfpuesta["response"]=$VqhzkfsafzrcResponse;

        }else{
            $Vtssepikoezfpuesta["error"]=1;
            $Vtssepikoezfpuesta["response"]=array('response'=>'No se encontró información.','respSERV'=>$Vtssepikoezfp,'url'=>$Vevim1jijerc);

        }
     
        
    return $Vvcjkdrakwx3->withJson($Vtssepikoezfpuesta)->withHeader('Content-type', 'application/json');


  }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
  
});


$V0ojkog2p2jp->run();