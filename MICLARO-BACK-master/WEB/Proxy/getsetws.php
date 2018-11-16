<?php

   $URLGLOBAL = "https://www.miclaroapp.com.co/api/index.php/v1/";
   
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
      
   }else{
      $origen = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'algo';
      $origen = explode(":",$origen)[0];
      //echo $origen;
      if($origen == "servidorclaro-cristianfuentes.c9users.io" || $origen == "www.miclaroapp.com.co" || $origen == "miclaroapp.com.co"){
      header("Access-Control-Allow-Origin:".$origen);
      header('Access-Control-Allow-Headers: Content-Type');
      /* http://miclaroapp.com.co/api/v1/ */ 
      $request=file_get_contents('php://input');
   
      $params = json_decode(urldecode(base64_decode($request)), true);
      
      $ch = curl_init();
      
      if (count(explode("/",$params["Metodo"])) == 1) {
         curl_setopt($ch, CURLOPT_URL,$URLGLOBAL."soap/".$params["Metodo"].".json");
      } else {
         curl_setopt($ch, CURLOPT_URL,$URLGLOBAL.$params["Metodo"].".json");
      }
      
      //echo json_encode($params["Params"]);
      
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('data' => $params["Params"])));
      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      
      $params["Params"] = isset($params["Params"])?$params["Params"]:array();
      $params["Params"]["token"] = isset($params["Params"]["token"])?$params["Params"]["token"]:"";
      
     $params["Params"]["token"]= str_replace(" ","+",$params["Params"]["token"]);
      
      
      $x = $params["Params"]["header"];
      array_push($x,'X-MC-SO: web');
      array_push($x,'X-SESSION-ID: '.$params["Params"]["token"]);   
      curl_setopt($ch, CURLOPT_HTTPHEADER, $x);
      
      $server_output = curl_exec ($ch);
      
      curl_close ($ch);
      
      echo $server_output;
   }else{
      echo json_encode(array("error"=>1,"response"=>"Verifica que tu conexión sea segura (https://)"));
   }
}

?>