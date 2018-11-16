<?php
   header('Access-Control-Allow-Origin: *'); 
   header('Access-Control-Allow-Headers: Content-Type'); 
   
   $secret = "6LfZhVsUAAAAACFB6d-R9LVWpVKXoVSAmb7RShml";
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
       $request=file_get_contents('php://input');
       $data = json_decode($request, true);
       
       $post_data['secret'] = $secret;
        $post_data['response'] = $data["token"];

       
       foreach ( $post_data as $key => $value){
        
            $post_items[] = $key . '=' . $value;
        
        }

        $post_string = implode ('&', $post_items);
       
       
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS,$post_string);
       curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
       $result = curl_exec($ch);
        curl_close($ch);
        
        header('Content-Type: application/json');
        echo $result;
   }
   
?>