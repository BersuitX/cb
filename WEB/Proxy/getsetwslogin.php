<?php
//request method.
$requestType = $_SERVER['REQUEST_METHOD'];
$URLGLOBAL = "https://www.miclaroapp.com.co/api/index.php/v1/";
//trae el origen de la peticion.
$origen = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'';
$origen = explode(":",$origen)[0];
//validacion metodo mi claro
if($origen == "servidorclaro-cristianfuentes.c9users.io" || $origen == "www.miclaroapp.com.co" || $origen == "miclaroapp.com.co"){
    //header
    header("Access-Control-Allow-Origin:".$origen);
    header('Access-Control-Allow-Headers: Content-Type');
    switch ($requestType) {
        case 'POST':
            //almacenamos parametros
            $request=file_get_contents('php://input');
            $params = json_decode(urldecode(base64_decode($request)), true);
            //iniciamos curl
            $ch = curl_init();
            //validamos metodo
            if (count(explode("/",$params["Metodo"])) == 1) {
             curl_setopt($ch, CURLOPT_URL,$URLGLOBAL."soap/".$params["Metodo"].".json");
            } else {
             curl_setopt($ch, CURLOPT_URL,$URLGLOBAL.$params["Metodo"].".json");
            }
            
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('data' => $params["Params"])));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            //addHeaders
            $params["Params"]["token"]=str_replace(" ","+",$params["Params"]["token"]);
            
            $x = $params["Params"]["header"];
            array_push($x,'X-MC-SO: web');
            array_push($x,'X-SESSION-ID: '.$params["Params"]["token"]);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $x);
            $server_output = curl_exec ($ch);
            curl_close ($ch);
            
            echo $server_output;
          break;
        case 'GET':
            $url = $_SERVER["REQUEST_URI"];
            $url = explode("?",$url); 
            $urlextra = base64_decode($url[1]);
            $urlextra = str_replace("?", "",$urlextra);
            // Get cURL resource
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
              CURLOPT_RETURNTRANSFER => 1,
              CURLOPT_URL => $URLGLOBAL.str_replace("--", "?",$urlextra),
              CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));
            // Send the request & save response to $resp
            $server_output = curl_exec($curl);
            // Close request to clear up some resources
            curl_close($curl);
            echo $server_output;
          break;
        default:
            echo json_encode(array("error"=>1,"response"=>"Metodo no existe")); 
          break;
    }
}else{
    echo json_encode(array("error"=>1,"response"=>"Verifica que tu conexión sea segura (https://)"));   
}
?>