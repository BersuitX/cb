<?php
$Vpa2qbhtxuyd["error"]= 1;
$Vpa2qbhtxuyd["response"] = 'No se encontraron datos';
if(isset($Vwk205rmgnd0,$Vwk205rmgnd0["descipcionResultado"])){
   $Vpa2qbhtxuyd["error"]= 0;
   $Vfh2utbqjg5e = explode(" Marca ", $Vwk205rmgnd0["descipcionResultado"]);
   $Vpa2qbhtxuyd["response"] = rtrim($Vfh2utbqjg5e[0]).".";

}

echo json_encode($Vpa2qbhtxuyd);
?>