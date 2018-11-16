<?php
  if(isset($Vapnruugayyo) && $Vapnruugayyo){
      $Vosrev0dmm3y = intval(date('m'))-1;
      $Vfkita4q2q55 = 31;

      if($Vosrev0dmm3y == 0){
        $Vosrev0dmm3y = 12;
      }

      if($Vosrev0dmm3y == 2){
        $Vfkita4q2q55 = 28; 
      }else if($Vosrev0dmm3y == 4 || $Vosrev0dmm3y == 6 || $Vosrev0dmm3y == 9 || $Vosrev0dmm3y == 11){
        $Vfkita4q2q55 = 30; 
      }

      if($Vosrev0dmm3y < 10){
        $Vosrev0dmm3y = "0".$Vosrev0dmm3y;
      }


      $Vyndwztzuib5 = date("Y-$Vosrev0dmm3y-01");
      $Viglz2tv2bvy = date("Y-$Vosrev0dmm3y-$Vfkita4q2q55");
   }
?>
{
  "mapCollection": {
    "authentication": {
      "token": "VkdGMGFXTTZVMmxqWTI5dQ=="
    },
    "values": [
      {
        "arrayValue": "request",
        "mapArrayValue": [
          {
            "name": "MIN",
            "singleValue": "57<?=$V3hbf4so4iko?>"
          },
          {
            "name": "TipoConsulta",
            "singleValue": "Resumen"
          },
          {
            "name": "TipoAbonado",
            "singleValue": "Prepago"
          },
          {
            "name": "FechaInicial",
            "singleValue": "<?=$Vyndwztzuib5?>"
          },
          {
            "name": "FechaFinal",
            "singleValue": "<?=$Viglz2tv2bvy?>"
          }
        ]
      }
    ]
  }
}