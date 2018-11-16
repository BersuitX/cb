<?php

$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="No se encontraron facturas relacionadas a esta cuenta.";
}else{
    $Vpa2qbhtxuyd["error"]=0;
    $V1q5xkbcnn5z=array();

    if(isset($V0cngx12ulzf)){


        if(array_values($V0cngx12ulzf) ===$V0cngx12ulzf){
            $V1q5xkbcnn5z=$V0cngx12ulzf;
        }else{
            array_push($V1q5xkbcnn5z,$V0cngx12ulzf);
        }
        
        $Vqbumkzhgyxi=NULL;
        foreach($V1q5xkbcnn5z as $Vutaiebycwbq){

            $V3ti2nsbfgt2 = DateTime::createFromFormat('Y/m/d', $Vutaiebycwbq["BillingPeriod"]["EndDate"]);
            if($Vqbumkzhgyxi!=NULL){
                $V3ti2nsbfgt2UltimaFactura = DateTime::createFromFormat('Y/m/d', $Vqbumkzhgyxi["BillingPeriod"]["EndDate"]);
                if($V3ti2nsbfgt2 > $V3ti2nsbfgt2UltimaFactura){
                    $Vqbumkzhgyxi=$Vutaiebycwbq;
                }
            }else{
                $Vqbumkzhgyxi=$Vutaiebycwbq;
            }
        }

        if($Vqbumkzhgyxi!=NULL){
            $Vymjnp2u1no1["StartDate"]=str_replace("/","-",$Vqbumkzhgyxi["BillingPeriod"]["StartDate"])."T00:00:00.000-05:00";
            $Vymjnp2u1no1["EndDate"]=str_replace("/","-",$Vqbumkzhgyxi["BillingPeriod"]["EndDate"])."T00:00:00.000-05:00";
            $Vymjnp2u1no1["BillReference"]=$Vqbumkzhgyxi["BillReference"];
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vymjnp2u1no1="No se encontraron facturas relacionadas a esta cuenta";
        }

    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vymjnp2u1no1="No se encontraron facturas relacionadas a esta cuenta";
    }

    $Vpa2qbhtxuyd["response"]=$Vymjnp2u1no1;
}



echo json_encode($Vpa2qbhtxuyd);
?>