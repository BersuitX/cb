<?php

    $Vnipjcab4jn5=((isset($Vtqszebh5hyi["aaplicaPicoPlacaRecarga"]))? $Vtqszebh5hyi["aaplicaPicoPlacaRecarga"]:"");
    $Vnipjcab4jn5=(($Vnipjcab4jn5=="true")?1:0);

    $Vnipjcab4jn5Paquete=((isset($Vtqszebh5hyi["aaplicaPicoPlacaPaquete"]))? $Vtqszebh5hyi["aaplicaPicoPlacaPaquete"]:"");
    $Vnipjcab4jn5Paquete=(($Vnipjcab4jn5Paquete=="true")?1:0);

    if( isset($Vtqszebh5hyi["aInformacionPropuestaOferta"]) && isset($Vtqszebh5hyi["aInformacionPropuestaOferta"]["aaplicaBlindaje"])   ){
        $Vs5n4lbasdwa=$Vtqszebh5hyi["aInformacionPropuestaOferta"];
        $Vs5n4lbasdwaerta["tieneBlindaje"]=(($Vs5n4lbasdwa["aaplicaBlindaje"]=="true")?1:0);


        $Vn50kngbue2r=((isset($Vs5n4lbasdwa["avalorBlindajeAdicional"]))?intval($Vs5n4lbasdwa["avalorBlindajeAdicional"]):0);
        if ($Vn50kngbue2r>0) {

            $Vidseqjshhwa=number_format((float)($Vn50kngbue2r/1024), 1, '.', '');
            if ($Vidseqjshhwa==0.7) {
                $Vidseqjshhwa=0.8;
            }
            $Vn50kngbue2r=$Vidseqjshhwa." GB";
        }else{
            $Vn50kngbue2r="0 GB";
        }

        $Vs5n4lbasdwaerta["blindaje"]=array(
            "valorBlindajeAdiciona"=>$Vn50kngbue2r,
            "valorBlindajeTotal"=>((isset($Vs5n4lbasdwa["avalorBlindajeTotal"]))?$Vs5n4lbasdwa["avalorBlindajeTotal"]:"")
        );

        $Vjqxk330ay0o=array();
        if (isset($Vs5n4lbasdwa["aofertas"]) && isset($Vs5n4lbasdwa["aofertas"]["aOferta"])) {
            $V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($Vs5n4lbasdwa["aofertas"]["aOferta"]);

            $Vjqxk330ay0o=array();
            foreach ($V1q5xkbcnn5z as $Vutaiebycwbq) {

                $Vxlkmem33sgo=((isset($Vutaiebycwbq->atotalBeneficio))?intval($Vutaiebycwbq->atotalBeneficio):0);
                if ($Vxlkmem33sgo>0) {

                    $Vidseqjshhwa=number_format((float)($Vxlkmem33sgo/1024), 1, '.', '');
                    if ($Vidseqjshhwa==0.7) {
                        $Vidseqjshhwa=0.8;
                    }
                    $Vxlkmem33sgo=$Vidseqjshhwa." GB";
                    
                }else{
                    $Vxlkmem33sgo="0 GB";
                }

                $Vm1av2iahduc["propuestaOfertaID"]=((isset($Vs5n4lbasdwa["apropuestaOfertaID"]))?$Vs5n4lbasdwa["apropuestaOfertaID"]:"0");
                $Vm1av2iahduc["valorAumentoCargoFijo"]=$Vutaiebycwbq->avalorAumentoCargoFijo;
                $Vm1av2iahduc["ofertaID"]=$Vutaiebycwbq->aOfertaID;
                $Vm1av2iahduc["cargoFijoMensual"]=$Vutaiebycwbq->acargoFijoMensual;
                $Vm1av2iahduc["descripcion"]=$Vutaiebycwbq->adescripcion;
                $Vm1av2iahduc["nombre"]=$Vutaiebycwbq->anombre;
                $Vm1av2iahduc["totalBeneficio"]=$Vutaiebycwbq->atotalBeneficio;
                $Vm1av2iahduc["valorBeneficio"]=$Vxlkmem33sgo;
                array_push($Vjqxk330ay0o,$Vm1av2iahduc);
            }
        }
        
        $Vs5n4lbasdwaerta["beneficios"]=$Vjqxk330ay0o;

        $Vnb2hggtfonp["tieneBeneficios"]=1;
        $Vnb2hggtfonp["oferta"]=$Vs5n4lbasdwaerta;

    }else{
        $Vnb2hggtfonp["tieneBeneficios"]=0;
        $Vnb2hggtfonp["oferta"]=(Object) array();
    }


    $Vpi50pwckamo = "";
    if (  isset($Vtqszebh5hyi["acodigoContrato"]) ) {
        $Vpi50pwckamo=$Vhu2a2k1d152->arrayToString($Vtqszebh5hyi["acodigoContrato"]);
    }

    $Vnb2hggtfonp["codigoContrat"]=$Vpi50pwckamo;
    $Vnb2hggtfonp["custcode"]=((isset($Vtqszebh5hyi["acustcode"]))?$Vtqszebh5hyi["acustcode"]:"");
    $Vnb2hggtfonp["customerID"]=((isset($Vtqszebh5hyi["acustomerID"]))?$Vtqszebh5hyi["acustomerID"]:"");
    $Vnb2hggtfonp["esCuentaLegalizada"]=((isset($Vtqszebh5hyi["aesCuentaLegalizada"]))?$Vtqszebh5hyi["aesCuentaLegalizada"]:"");
    $Vnb2hggtfonp["estadoCuenta"]=((isset($Vtqszebh5hyi["aestadoCuenta"]))?$Vtqszebh5hyi["aestadoCuenta"]:"");
    $Vnb2hggtfonp["fechaActivacion"]=((isset($Vtqszebh5hyi["afechaActivacion"]))?$Vtqszebh5hyi["afechaActivacion"]:"");
    $Vnb2hggtfonp["imsi"]=((isset($Vtqszebh5hyi["aimsi"]))?$Vtqszebh5hyi["aimsi"]:"");
    $Vnb2hggtfonp["numeroCuenta"]=((isset($Vtqszebh5hyi["anumeroCuenta"]))?$Vtqszebh5hyi["anumeroCuenta"]:"");
    $Vnb2hggtfonp["tipoCuentaID"]=((isset($Vtqszebh5hyi["atipoCuentaID"]))?$Vtqszebh5hyi["atipoCuentaID"]:"");
    $Vnb2hggtfonp["nombrePlan"]=((isset($Vtqszebh5hyi["anombrePlan"]))?$Vtqszebh5hyi["anombrePlan"]:"");

    $Vnb2hggtfonp["picoyplaca"]=$Vnipjcab4jn5;
    $Vnb2hggtfonp["picoyplacaPaquete"]=0;

    $Vtuh20z4jgip="";
    if ( isset($Vtqszebh5hyi["afechaFinCorteCiclo"]) ) {
        $Vtuh20z4jgip=$Vhu2a2k1d152->arrayToString($Vtqszebh5hyi["afechaFinCorteCiclo"]);
    }
    $Vnb2hggtfonp["fechaFinCorte"]=$Vtuh20z4jgip;


    $Vb5sgzpgrxlb="";
    if ( isset($Vtqszebh5hyi["afechaInicioCorteCiclo"]) ) {
        $Vb5sgzpgrxlb=$Vhu2a2k1d152->arrayToString($Vtqszebh5hyi["afechaInicioCorteCiclo"]);
    }
    $Vnb2hggtfonp["fechaInicioCorte"]=$Vb5sgzpgrxlb;



    $Vnb2hggtfonpponse["error"]=0;
    $Vnb2hggtfonpponse["response"]=$Vnb2hggtfonp;
    echo json_encode($Vnb2hggtfonpponse);
?>