<?php

/* http://miclaroapp.com.co/api/v1/ */
$URLGLOBAL = "https://www.miclaroapp.com.co/api2/index.php/v1/";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $url= $_SERVER["REQUEST_URI"];
   $url= explode("?",$url); 
   // Get cURL resource
   $curl = curl_init();
   // Set some options - we are passing in a useragent too here
   curl_setopt_array($curl, array(
       CURLOPT_RETURNTRANSFER => 1,
       CURLOPT_URL => $URLGLOBAL.str_replace("--", "?",$url[1]),
       CURLOPT_USERAGENT => 'Codular Sample cURL Request'
   ));
   // Send the request & save response to $resp
   $server_output = curl_exec($curl);
   // Close request to clear up some resources
   curl_close($curl);
   
   echo $server_output;
   
}else{
   
   $params=json_decode(file_get_contents('php://input'), true);
   
   $ch = curl_init();
   
   if (count(explode("/",$params["Metodo"])) == 1) {
      curl_setopt($ch, CURLOPT_URL,$URLGLOBAL."soap/".$params["Metodo"].".json");
   } else {
      curl_setopt($ch, CURLOPT_URL,$URLGLOBAL.$params["Metodo"].".json");
   }
   
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('data' => $params["Params"])));
   
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   
   $server_output = curl_exec ($ch);
   
   curl_close ($ch);
   
   echo $server_output;
   
}

?>