<?php
  
  $Vtmbx4ojexdr = isset($Vf1xct1mvoks)?true:false;

  if(!$Vtmbx4ojexdr){
    $Vgk4o3dwbfy2 =  strlen($Vnocyw0un3dc);
    $Vexe3ds1zqev = 20;
    if($Vgk4o3dwbfy2 < $Vexe3ds1zqev){
        $Vqh4z00g5xm4 = $Vexe3ds1zqev - $Vgk4o3dwbfy2;
        for ($Vep0df0xosaw=0; $Vep0df0xosaw < $Vqh4z00g5xm4; $Vep0df0xosaw++) { 
            $Vnocyw0un3dc = " ".$Vnocyw0un3dc;
        }
    }
  }
?>

<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.telmex.net/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:adicionarServicios>
         <requestAdicionarServicios>
            <canal>1</canal>
            <cuenta><?=$Vwidysczfeah?></cuenta>
            <?php
              if($Vtmbx4ojexdr){
            ?>
              <inventariosAdicionar>
              <?php
                foreach ($Vf1xct1mvoks as $Vep0df0xosawtem) {
              ?>
                  <inventario>
                    <itClass><?=$Vep0df0xosawtem["itemClass"]?></itClass>
                    <manClass><?=$Vep0df0xosawtem["manufactureClass"]?></manClass>
                    <serial><?=$Vep0df0xosawtem["serial"]?></serial>
                    <serviciosAdicionar>
                      <?php
                        foreach ($Vep0df0xosawtem["servicios"] as $Vep0df0xosawtem2) {
                      ?>
                          <servicio><?=$Vep0df0xosawtem2?></servicio> 
                      <?php
                        }
                      ?>
                    </serviciosAdicionar>
                 </inventario>
              <?php
                }
              ?>
              </inventariosAdicionar>

            <?php
              }else{
            ?>
              <itClass><?=$Vep0df0xosawtemClass?></itClass>
              <manClass><?=$Vflkvvsywuo2?></manClass>
              <serial><?=$Vnocyw0un3dc?></serial>
              <?php
                foreach ($Vn3vzzdr2m1a as $Vep0df0xosawtem) {
              ?>
                  <servicio><?=$Vep0df0xosawtem?></servicio> 
              <?php
                }
              ?>
            <?php
            }
            ?>
    </requestAdicionarServicios>
      </ser:adicionarServicios>
   </soapenv:Body>
</soapenv:Envelope>