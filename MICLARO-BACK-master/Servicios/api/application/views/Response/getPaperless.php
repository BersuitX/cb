<?php

$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Error al realizar la operación.";
}else{
    $Vpa2qbhtxuyd["error"]=0;


    if(isset($Vhx2mxqtzdim)){
        $V3iiokxda3xw=json_encode($Vhx2mxqtzdim, true);

        if(json_last_error()==JSON_ERROR_NONE){
            $V3iiokxda3xw=json_decode($V3iiokxda3xw);
        
            if( is_array($V3iiokxda3xw)){
                $Vhx2mxqtzdim="";
            }
        }
    }
    
    if(isset($V3ryada15bph) && !is_numeric($V3ryada15bph) ){
        $V3iiokxda3xw=json_encode($V3ryada15bph, true);
        
            if(json_last_error()==JSON_ERROR_NONE){
                $V3iiokxda3xw=json_decode($V3iiokxda3xw);
            
                if( is_array($V3iiokxda3xw)){
                    $V3ryada15bph="";
                }
            }
    }
    
    if(isset($V1wzrd554qm2)){
        $V3iiokxda3xw=json_encode($V1wzrd554qm2, true);
        
        if(json_last_error()==JSON_ERROR_NONE){
            $V3iiokxda3xw=json_decode($V3iiokxda3xw);
    
            if( is_array($V3iiokxda3xw)){
                $V1wzrd554qm2="";
            }
        }
    }

    $Vpa2qbhtxuyd["response"]=array(
        "IsPaperless"=>(( isset($V4hndpzzngjn) && $V4hndpzzngjn=="true")?"1":"0"),
        "ActivationDate"=>$Vhx2mxqtzdim,
        "UserMobileNumberforPaperless"=>$V3ryada15bph,
        "UserEmailforPaperless"=>$V1wzrd554qm2
    );
}

echo json_encode($Vpa2qbhtxuyd);
?>