<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://servicios.ofertadatos.claro.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:PersonalizacionOfertaUsuario>
            <RequestCrudPersonalizacion>
                <canal>MiCLARO</canal>
                <tipConsulta>M</tipConsulta>
                <datoConsulta><?=$V3hbf4so4iko?></datoConsulta>
                <accion>I</accion>
                <?php
                  if(sizeof($V4hxvqmckclx) == 0){
                ?>
                  <soluciones></soluciones>
                <?php
                  }else{
  		            foreach ($V4hxvqmckclx as $Vutaiebycwbq) {
  		            ?>
  	                <soluciones>
  	                    <nombreSolucion><?=$Vutaiebycwbq["solucion"]?></nombreSolucion>
  	                    <tipoSolucion>A</tipoSolucion>
  	                </soluciones>
                  <?php
  		            }
                }
		        ?>
            </RequestCrudPersonalizacion>
        </ser:PersonalizacionOfertaUsuario>
   </soapenv:Body>
</soapenv:Envelope>