<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://servicios.ofertadatos.claro.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:consultaSoluciones>
         <RequestConsultaSoluciones>
            <canal>MiCLARO</canal>
            <tipoConsulta>M</tipoConsulta>
            <!--<datoConsulta>3232207898</datoConsulta>-->
            <datoConsulta><?=$V3hbf4so4iko?></datoConsulta>
            <tipoSolucion>A</tipoSolucion>
            <ofertaInstalada>S</ofertaInstalada>
         </RequestConsultaSoluciones>
      </ser:consultaSoluciones>
   </soapenv:Body>
</soapenv:Envelope>