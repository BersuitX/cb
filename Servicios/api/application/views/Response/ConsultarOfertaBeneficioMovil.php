<?php
$Vpa2qbhtxuyd["error"]= 1;
$Vpa2qbhtxuyd["response"] = 'No se encontraron datos intentalo mas tarde (Response)';
$V3lrmrzvssbq = array();
$V3lrmrzvssbq['retencion'] = array();
$V3lrmrzvssbq['ofertaBeneficio'] = array();
$V3lrmrzvssbq['beneficioCuenta'] = array();
$V3lrmrzvssbq['flujo'] = 0; 
$Vu0frzyni4ks = 0;
$Vcc5m3wxjkve = 0;
if(isset($Vjhfler40jip)){
	if($Vjhfler40jip["aaplicaBeneficioRetencion"] == "true" || $Vjhfler40jip["aaplicaBlindaje"] == "true" || $Vjhfler40jip["aaplicaUpSelling"] == "true"){
		$Vcc5m3wxjkve = 1;
	}

	$V3lrmrzvssbq['informacionCuenta'] = $Vjhfler40jip;

	if(sizeof($Voa1dzf3i5zm) > 0 || (sizeof($Vbzp5upqnewc) > 0 && $Vjhfler40jip["aaplicaBeneficioRetencion"] == "true")){
		$Vu0frzyni4ks = 1;
	}

	if(isset($Vbzp5upqnewc["aBeneficioCuenta"])){
		$V3lrmrzvssbq['retencion'] = $Vhu2a2k1d152->getArray($Vbzp5upqnewc["aBeneficioCuenta"]);
	}

	$Vwe3v2cztsth=array();

	if( $Vjhfler40jip["aaplicaBlindaje"] == "true" && isset($V4pvmf1rbf2u["aOfertaBeneficio"])){
		$V4mlotes5n5m = array(
			"codigoCampanaBlindaje"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["acodigoCampañaBlindaje"],
			"valorBlindajeAdicional"=> $V4pvmf1rbf2u["aOfertaBeneficio"]["avalorBlindajeAdicional"], 
			"valorBlindajeTotal"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["avalorBlindajeTotal"],
			"ofertaBeneficioMovilID"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["aofertaBeneficioMovilID"],
			"nombre"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["avalorBlindajeAdicional"]." GB sin costo.",
			"tipoBeneficioID"=>"2"
		);

		array_push($Vwe3v2cztsth, $V4mlotes5n5m);
	}


	if( $Vjhfler40jip["aaplicaUpSelling"] == "true" && isset($V4pvmf1rbf2u["aOfertaBeneficio"]) ){
		$Vo3j53ng2hn4 =  array(
			"cargoFijoMensual"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["acargoFijoMensual"],
			"codigoCampanaUpSelling"=> $V4pvmf1rbf2u["aOfertaBeneficio"]["acodigoCampañaUpSelling"], 
			"nombre"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["anombre"]." + ".$V4pvmf1rbf2u["aOfertaBeneficio"]["avalorBeneficio"]." GB de navegación adicional.",
			"descripcion"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["adescripcion"],
			"aspCodeOferta"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["aspCodeOferta"],
			"atmCodeOferta"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["atmCodeOferta"],
			"totalBeneficio"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["atotalBeneficio"],
			"valorAumentoCargoFijo"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["avalorAumentoCargoFijo"],
			"ofertaBeneficioMovilID"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["aofertaBeneficioMovilID"],
			"valorBeneficio"=>$V4pvmf1rbf2u["aOfertaBeneficio"]["atotalBeneficio"],
			"tipoBeneficioID"=>"1"
		);

		array_push($Vwe3v2cztsth, $Vo3j53ng2hn4);
	}

	$V3lrmrzvssbq["ofertaBeneficio"]=$Vwe3v2cztsth;

	if(isset($Voa1dzf3i5zm["aBeneficioCuenta"])){
		if(isset($Voa1dzf3i5zm["aBeneficioCuenta"]["afecha"])){
			$Voa1dzf3i5zm["aBeneficioCuenta"]["afecha"] = $Vhu2a2k1d152->arrayToString($Voa1dzf3i5zm["aBeneficioCuenta"]["afecha"]);
		}
		$Voa1dzf3i5zm["aBeneficioCuenta"]["afecha"] = explode(" ", $Voa1dzf3i5zm["aBeneficioCuenta"]["afecha"])[0];

		$V3lrmrzvssbq['beneficioCuenta'] = $Vhu2a2k1d152->getArray($Voa1dzf3i5zm["aBeneficioCuenta"]);
	}

	if($Vu0frzyni4ks == 1){
		if($Vcc5m3wxjkve == 1){
			$V3lrmrzvssbq['flujo'] = 4;
		}else{
			$V3lrmrzvssbq['flujo'] = 1;
		}
	}else{
		if($Vcc5m3wxjkve == 1){
			$V3lrmrzvssbq['flujo'] = 2;
		}else{
			$V3lrmrzvssbq['flujo'] = 3;
			$V3lrmrzvssbq['mensaje'] = "La cuenta no tiene beneficios";
		}
	}
}

if($V3lrmrzvssbq['flujo'] != 0){
	$Vpa2qbhtxuyd["error"]= 0;
}

$Vpa2qbhtxuyd["response"] = $V3lrmrzvssbq;

echo json_encode($Vpa2qbhtxuyd);
?>