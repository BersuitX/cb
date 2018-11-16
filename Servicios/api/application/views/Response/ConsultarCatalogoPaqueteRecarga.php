<?php
    $Veqekzxyjyqy= 1;
    $Vonnn0nfpbux = "Temporalmente este módulo no se encuentra disponible";
    
    if(isset($Valmu0u5r5mn, $V1qmpya34ncx, $Vznzf4tkrev0)){
        $Vonnn0nfpbux = array();
        $Vonnn0nfpbux["picoPlaca"] = $V1qmpya34ncx;
        $Vonnn0nfpbux["numeroCuenta"] = $Vznzf4tkrev0;

        if(isset($Valmu0u5r5mn["acatalogoRecargas"],$Valmu0u5r5mn["acatalogoRecargas"]["aCatalogoRecarga"])){
            $Vstg3alqlcm4 = $Vhu2a2k1d152->getArray($Valmu0u5r5mn["acatalogoRecargas"]["aCatalogoRecarga"]);
            foreach ($Vstg3alqlcm4 as $Vuglyh4gwddb => $Vxc3fkadiyly) {
                foreach ($Vxc3fkadiyly as $V2xim30qek4u => $Vcnwqsowvhom){
                    
                    if($V2xim30qek4u == "acatalogoRecargaID"){
                        $Vstg3alqlcm4[$Vuglyh4gwddb]->idRecarga = $Vcnwqsowvhom;
                        unset($Vstg3alqlcm4[$Vuglyh4gwddb]->$V2xim30qek4u);
                    }

                    if($V2xim30qek4u == "avalor"){
                        $Vstg3alqlcm4[$Vuglyh4gwddb]->valor = $Vcnwqsowvhom;
                        unset($Vstg3alqlcm4[$Vuglyh4gwddb]->$V2xim30qek4u);
                    }
                }
            }
            $Vonnn0nfpbux["listaCatalogo"]["recargas"] = $Vstg3alqlcm4;
        }
        
        if(isset($Valmu0u5r5mn["acatalogoCategoriasPaquete"],$Valmu0u5r5mn["acatalogoCategoriasPaquete"]["aCatalogoCategoriaPaquete"])){
            $V3jwz15wtewy = $Vhu2a2k1d152->getArray($Valmu0u5r5mn["acatalogoCategoriasPaquete"]["aCatalogoCategoriaPaquete"]);
            
            
            foreach ($V3jwz15wtewy as $Vuglyh4gwddb => $Vxc3fkadiyly) {
                foreach ($Vxc3fkadiyly as $V2xim30qek4u => $Vcnwqsowvhom){
                    if($V2xim30qek4u == "anombre"){
                        $V3jwz15wtewy[$Vuglyh4gwddb]->nombre = $Vcnwqsowvhom;
                        unset($V3jwz15wtewy[$Vuglyh4gwddb]->$V2xim30qek4u);
                    }

                    if($V2xim30qek4u == "acategoriaPaqueteID"){
                        $V3jwz15wtewy[$Vuglyh4gwddb]->idCategoria = $Vcnwqsowvhom;
                        unset($V3jwz15wtewy[$Vuglyh4gwddb]->$V2xim30qek4u);
                    }
                }
            }



            $Vonnn0nfpbux["listaCatalogo"]["categorias"] = $V3jwz15wtewy;



            if( ($Vyxp2dhcvnlx["X-MC-SO"]=="ios" && ($Vyxp2dhcvnlx["X-MC-APP-V"]=="4.1.5" || $Vyxp2dhcvnlx["X-MC-APP-V"]=="4.2.0" || $Vyxp2dhcvnlx["X-MC-APP-V"]=="4.3.5") ) || $Vyxp2dhcvnlx["X-MC-SO"]=="android"){
                array_unshift($Vonnn0nfpbux["listaCatalogo"]["categorias"],array("idCategoria"=>"-1","nombre"=>"Recargas"));
            }else{
                array_push($Vonnn0nfpbux["listaCatalogo"]["categorias"],array("idCategoria"=>"-1","nombre"=>"Recargas"));    
            }
            
        }

        

        
        if($Vonnn0nfpbux["listaCatalogo"]["recargas"] > 0 && $Vonnn0nfpbux["listaCatalogo"]["categorias"] == 0){
            $Vonnn0nfpbux["listaCatalogo"]["categorias"] = array();
            array_push($Vonnn0nfpbux["listaCatalogo"]["categorias"],array("idCategoria"=>"-1","nombre"=>"Recargas"));
        }

        if(isset($Valmu0u5r5mn["acatalogoPaquetes"],$Valmu0u5r5mn["acatalogoPaquetes"]["aCatalogoPaquete"])){
            $Vt1t1uort0kv = $Valmu0u5r5mn["acatalogoPaquetes"]["aCatalogoPaquete"];
            foreach ($Vt1t1uort0kv as $Vuglyh4gwddb => $Vxc3fkadiyly) {
                foreach ($Vxc3fkadiyly as $V2xim30qek4u => $Vcnwqsowvhom){
                        $Vd4cr4z5n5h5 = substr($V2xim30qek4u,1);
                        $Vt1t1uort0kv[$Vuglyh4gwddb][$Vd4cr4z5n5h5] = $Vcnwqsowvhom;
                        unset($Vt1t1uort0kv[$Vuglyh4gwddb][$V2xim30qek4u]);
                }
            }
            $Vonnn0nfpbux["listaCatalogo"]["paquetes"] = $Vt1t1uort0kv;
        }



        $Veqekzxyjyqy = 0;
    }
    



    $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
    $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;

    echo json_encode($Vonnn0nfpbuxonse);
?>