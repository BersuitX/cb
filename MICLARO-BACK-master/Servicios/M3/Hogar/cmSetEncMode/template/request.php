<?php

   $Vapieojwku33=array(
      array("modelo"=>"SBG900","WEP"=>2,"WPA"=>3,"WPA2"=>0),
      array("modelo"=>"SBG940","WEP"=>2,"WPA"=>3,"WPA2"=>0),
      array("modelo"=>"SBG901","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"SVG1202","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DCW725","WEP"=>1,"WPA"=>3,"WPA2"=>5),
      array("modelo"=>"DWG849","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TC7110.02","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TC7300","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TC7300.B0M","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TC8305.E","WEP"=>1,"WPA"=>2,"WPA2"=>7),
      array("modelo"=>"DPC3928SL2","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"CGA0101","WEP"=>0,"WPA"=>0,"WPA2"=>3),
      array("modelo"=>"DDW2608","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DVW2100","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DVW2110","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DVW32E","WEP"=>1,"WPA"=>0,"WPA2"=>7),
      array("modelo"=>"DPC2420","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DPC2420R2","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DPC2425","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DPC2434","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DPC2434-X","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"DPC3925","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TG862A","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TG862G","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"TG862G/R","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"CVE-30360","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"CGNV2","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"F@ST3284","WEP"=>1,"WPA"=>2,"WPA2"=>3),
      array("modelo"=>"F@ST3686","WEP"=>1,"WPA"=>2,"WPA2"=>3)
   );


   $Vzgq0d4xas1o=3;
   foreach ($Vapieojwku33 as $Virsew13xpli) {
      if ($Virsew13xpli["modelo"]==$Vqhzkfsafzrc->model) {
         $Vzgq0d4xas1o=$Virsew13xpli[$Vqhzkfsafzrc->encMode];
         break;
      }
   }
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.wifi.sisges.claro.com.co">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:cmSetEncMode>
         <ws:ip><?=$Vqhzkfsafzrc->ip?></ws:ip>
         <ws:model><?=$Vqhzkfsafzrc->model?></ws:model>
         <ws:encMode><?=$Vzgq0d4xas1o?></ws:encMode>
      </ws:cmSetEncMode>
   </soapenv:Body>
</soapenv:Envelope>