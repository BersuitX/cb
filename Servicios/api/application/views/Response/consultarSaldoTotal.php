<?php
   $Vpa2qbhtxuyd["error"]=1;
   $Vpa2qbhtxuyd["response"]= 0;
   if(isset($Vlxbwp2yb5o5["codigoResultado"]) && ($Vlxbwp2yb5o5["codigoResultado"] == "300" || $Vlxbwp2yb5o5["codigoResultado"] == "003")){
         if($Vlxbwp2yb5o5["codigoResultado"] == "300"){
            $Vlhrmwpd4ouu = explode(" ", $Vlxbwp2yb5o5["mensaje"])[4];   
         }else{
            $Vlhrmwpd4ouu = explode(" ", $Vlxbwp2yb5o5["mensaje"])[10];
         }
   		
   		$Vftmepfvsqvn = array("$", "-");
		$Voetc43kt2cr = str_replace($Vftmepfvsqvn, "", $Vlhrmwpd4ouu);
   		$Vpa2qbhtxuyd["response"]= floatval($Voetc43kt2cr);
   		$Vpa2qbhtxuyd["error"]= 0;
   }
   
   echo json_encode($Vpa2qbhtxuyd);
?>