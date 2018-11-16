<?php
$Vpa2qbhtxuyd["error"]= 1;
$Vpa2qbhtxuyd["response"] = 'Tu cuenta no tiene beneficios adicionales.';
$V3lrmrzvssbq = array();

if(isset($Vorejtcggt02)){
   if(isset($Vorejtcggt02["aOfertaBeneficioFija"]) && $Vorejtcggt02["aOfertaBeneficioFija"]["atipoEscenarioID"] != ""){
      $Vpa2qbhtxuyd["error"]= 0;
      $V3lrmrzvssbq["beneficioActual"] = $Vhu2a2k1d152->arrayToString($Vorejtcggt02["aOfertaBeneficioFija"]["abeneficioActual"]);
      $V3lrmrzvssbq["beneficioAdicional"] = $Vhu2a2k1d152->arrayToString($Vorejtcggt02["aOfertaBeneficioFija"]["abeneficioAdicional"]);
      $V3lrmrzvssbq["fechaBeneficioActual"] = $Vhu2a2k1d152->arrayToString($Vorejtcggt02["aOfertaBeneficioFija"]["afechaBeneficioActual"]);
      $V3lrmrzvssbq["ofertaBeneficioFijaID"] = $Vhu2a2k1d152->arrayToString($Vorejtcggt02["aOfertaBeneficioFija"]["aofertaBeneficioFijaID"]);
      $V3lrmrzvssbq["tipoEscenarioID"] = $Vhu2a2k1d152->arrayToString($Vorejtcggt02["aOfertaBeneficioFija"]["atipoEscenarioID"]);
      $V3lrmrzvssbq["diaBeneficio"] = "10";
      $V3lrmrzvssbq["mesBeneficio"] = "julio";
      $V3lrmrzvssbq["anioBeneficio"] = "2018";

      $Vpa2qbhtxuyd["response"] = $V3lrmrzvssbq;
   }
}

echo json_encode($Vpa2qbhtxuyd);
?>