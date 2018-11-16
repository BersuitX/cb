<?php
  
  $Vz1gkvk0n5xn =  strlen($Vlf03ndi04il);
  $V0ywbituamtv = 20;
  if($Vz1gkvk0n5xn < $V0ywbituamtv){
      $Vgr1dbpesnor = $V0ywbituamtv - $Vz1gkvk0n5xn;
      for ($Vxja1abp34yq=0; $Vxja1abp34yq < $Vgr1dbpesnor; $Vxja1abp34yq++) { 
          $Vlf03ndi04il = " ".$Vlf03ndi04il;
      }
  }

?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.telmex.net/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:adicionarServicios>
         <requestAdicionarServicios>
            <canal>1</canal>
            <cuenta><?=$Vqhzkfsafzrc->numeroCuenta?></cuenta>
            <itClass><?=$Vqhzkfsafzrc->itemClass?></itClass>
            <manClass><?=$Vqhzkfsafzrc->manufactureClass?></manClass>
            <serial><?=$Vqhzkfsafzrc->serial?></serial>
            <!--1 or more repetitions:-->
            <?php
            	foreach ($V00h2hmbvay3 as $Vxja1abp34yqtem) {
    		?>
            		<servicio><?=$Vqhzkfsafzrc->item?></servicio>	
    		<?php
            	}
            ?>
		</requestAdicionarServicios>
      </ser:adicionarServicios>
   </soapenv:Body>
</soapenv:Envelope>