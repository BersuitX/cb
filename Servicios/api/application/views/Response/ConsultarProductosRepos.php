<?php
    $Veqekzxyjyqy=1;    
    $Vonnn0nfpbux = "Temporalmente este módulo no se encuentra disponible";


    
    if(isset($Vl0fxo0glkx5)){
    	

            if(!isset($V1qkdgemv3be,$V1qkdgemv3be["aProducto"])){$V1qkdgemv3be = array("aProducto"=>array());}

            $Vcmaitbcbmmk = '/var/www/miclaroapp.com.co/public_html/archivos/fotosRepos/';
            $Vt4hipms1i3k = "https://www.miclaroapp.com.co/archivos/fotosRepos";
            $V1qkdgemv3be["aProducto"] = $Vhu2a2k1d152->getArray($V1qkdgemv3be["aProducto"]);
            
            foreach($V1qkdgemv3be["aProducto"] as $Vep0df0xosaw => $V0ebkmfsmsis){
                foreach ($V0ebkmfsmsis as $Vwyse0flpyxh => $Vxxtccqydhzn){
                    if($Vwyse0flpyxh=="alistInventarioProducto"){
                        
                        $Vep0df0xosawdProd = $V1qkdgemv3be["aProducto"][$Vep0df0xosaw]->aproductoID;
                        $Vcm40vhd0uag = new FilesystemIterator($Vcmaitbcbmmk.$Vep0df0xosawdProd);
                        $Vgk4o3dwbfy2 = iterator_count($Vcm40vhd0uag);

                        $Vep0df0xosawmgs = array();
                        
                        for ($V5ozzo11urso=1; $V5ozzo11urso <= $Vgk4o3dwbfy2; $V5ozzo11urso++) {
                            $Vwasjn0sjacj =  $Vt4hipms1i3k."/".$Vep0df0xosawdProd."/".$V5ozzo11urso.".jpg";
                            array_push($Vep0df0xosawmgs,$Vwasjn0sjacj);
                        }

                        $V1qkdgemv3be["aProducto"][$Vep0df0xosaw]->$Vwyse0flpyxh = $Vhu2a2k1d152->getArray($Vxxtccqydhzn->aInventarioProducto);
                        
                        $V1qkdgemv3be["aProducto"][$Vep0df0xosaw]->envioGratis = "true";
                        $V1qkdgemv3be["aProducto"][$Vep0df0xosaw]->costoEnvio = "0";
                        $V1qkdgemv3be["aProducto"][$Vep0df0xosaw]->imagenes = $Vep0df0xosawmgs;

                        

                    }
                }
            }

            
            if(isset($Vyxp2dhcvnlx,$Vyxp2dhcvnlx["X-MC-MAIL"]) && $Vyxp2dhcvnlx["X-MC-MAIL"] == 'adripao36@hotmail.com'){
                $Vhwojvkfcrix = $V1qkdgemv3be["aProducto"][0];
                $Vhwojvkfcrix->aprecioPublico = 0;
                array_push($V1qkdgemv3be["aProducto"], $Vhwojvkfcrix);
            }
            


            $Vonnn0nfpbux = array("aplicaPagoFactura"=>$Vyywmsuch2mz,"productos"=>$V1qkdgemv3be["aProducto"]);
            $Veqekzxyjyqy=0;
        
    }

    
    
    
    
	
    $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
    $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;

	echo json_encode($Vonnn0nfpbuxonse);
?>