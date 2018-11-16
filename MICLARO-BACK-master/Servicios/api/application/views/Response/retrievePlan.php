<?php
$V15531mn250a="0";
$Vtml41njfdf4="0";
$Vpejekhis5it="0";
$V23xc4gxrp0w = "";
$Vtf0as0gqvsg = "";
$V41xhzwareke = "0";
$V325auzpbrbq = "0";
$Vvzpspca1cee = "0";

$Vxcnqqebtkry = file_get_contents("https://www.miclaroapp.com.co/archivos/planesprepago.json");
$Voccfaq4ckjm = json_decode($Vxcnqqebtkry, true);

$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]=isset($Vmbf2mvssbll)?$Vmbf2mvssbll:"Error al realizar la operación.";
}else{
    $Vpa2qbhtxuyd["error"]=0;

    if(isset($Vyejrpiwledb["PlanLines"])){

        setlocale(LC_MONETARY, 'es_CO');

        foreach($Vyejrpiwledb["PlanLines"] as $V41frh24rd1z){

            $Vcnpu22u3frv="0";
            if(isset($V41frh24rd1z["UsageLimit"]["Quantity"]) && is_numeric($V41frh24rd1z["UsageLimit"]["Quantity"]) ){
                $Vcnpu22u3frv=$V41frh24rd1z["UsageLimit"]["Quantity"];
            }
            

            if($V41frh24rd1z["FeatureName"]=="Datos"){
                $V15531mn250a=$Vcnpu22u3frv;
            }else if($V41frh24rd1z["FeatureName"]=="SMS"){
                $Vtml41njfdf4=$Vcnpu22u3frv;
            }else if($V41frh24rd1z["FeatureName"]=="Voz"){
                $Vpejekhis5it=$Vcnpu22u3frv;
            }
        }
    }


    $VyejrpiwledbAmount="$0";
    if (isset($Vyejrpiwledb["PlanAmount"])) {
        if ($Vyejrpiwledb["PlanAmount"]==-1) {
            $VyejrpiwledbAmount="ilimitado";
        }else{
            $VyejrpiwledbAmount="$".number_format($Vyejrpiwledb["PlanAmount"], 0, ",", ".");
        }
    }


    $Vcuums5zy42y = array(array("NAME"=>"Roam","TIPO"=>"Datos","TXT"=>"Roaming Internacional"),array("NAME"=>"LDI","TIPO"=>"Voz","TXT"=>"Larga distancia internacional"),array("NAME"=>"SMS","TIPO"=>"SMS","TXT"=>"SMS Recurrente"));
    $V4tzqrik0xmh = array();
    for ($Vep0df0xosaw=0; $Vep0df0xosaw < sizeof($Vcuums5zy42y) ; $Vep0df0xosaw++) { 
        $Vaclaigdbtoo = "PackageRecurrent".$Vcuums5zy42y[$Vep0df0xosaw]["NAME"];

        if(isset($Vyejrpiwledb[$Vaclaigdbtoo])){
            $Vyejrpiwledb[$Vaclaigdbtoo] = $Vhu2a2k1d152->getArray($Vyejrpiwledb[$Vaclaigdbtoo]);
            for ($Vv3o4gn4ugio=0; $Vv3o4gn4ugio < sizeof($Vyejrpiwledb[$Vaclaigdbtoo]) ; $Vv3o4gn4ugio++) { 
                $Vep0df0xosawtem = array();


                $Vep0df0xosawtem["tipo"] = $Vcuums5zy42y[$Vep0df0xosaw]["TIPO"];
                $Vep0df0xosawtem["txt"] = $Vcuums5zy42y[$Vep0df0xosaw]["TXT"];
                
                $Vep0df0xosawtem["Code"] = isset($Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Spcode)?$Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Spcode:$Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Code;
                $Vep0df0xosawtem["Name"] = isset($Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Name)?$Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Name:$Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->NamePackage;
                $Vep0df0xosawtem["Description"] = $Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Description;
                $Vep0df0xosawtem["Value"] = $Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Value;
                

                
                $V4wm1yh1hmzr = "";
                if(isset($Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Validity)){
                    $V4wm1yh1hmzr = explode("T", $Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->Validity)[0];
                }else{
                    if(isset($Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->State)){
                        $V4wm1yh1hmzr = substr($Vyejrpiwledb[$Vaclaigdbtoo][$Vv3o4gn4ugio]->State,0,-1);
                        $Vwpuub3vcm15 = substr($V4wm1yh1hmzr,0,2);
                        $Vytkf3v5vzla = substr($V4wm1yh1hmzr,2,2);
                        $Vksfgjja3ipu = substr($V4wm1yh1hmzr,4,2);

                        $V4wm1yh1hmzr = '20'.$Vksfgjja3ipu."-".$Vytkf3v5vzla."-".$Vwpuub3vcm15;
                    }
                }

                
                $Vep0df0xosawtem["Fecha"] = $V4wm1yh1hmzr;

                
                
                array_push($V4tzqrik0xmh, $Vep0df0xosawtem);
            }

                
        }
    }



    $Vqykpjaxfx2u=array("Text"=>"0","Call"=>"0","Free"=>"0");
    if ($Vyejrpiwledb["FrequentNumbersAllowed"]) {
        $Vqykpjaxfx2u["Text"]=(  $Vhu2a2k1d152->esArray($Vyejrpiwledb["FrequentNumbersAllowed"]["Text"]) )?0:$Vyejrpiwledb["FrequentNumbersAllowed"]["Text"];
        $Vqykpjaxfx2u["Call"]=(  $Vhu2a2k1d152->esArray($Vyejrpiwledb["FrequentNumbersAllowed"]["Call"]) )?0:$Vyejrpiwledb["FrequentNumbersAllowed"]["Call"];
        $Vqykpjaxfx2u["Free"]=(  $Vhu2a2k1d152->esArray($Vyejrpiwledb["FrequentNumbersAllowed"]["Free"]) )?0:$Vyejrpiwledb["FrequentNumbersAllowed"]["Free"];
    }

    $Vfeinw1hsfej["PlanName"]=isset($Vyejrpiwledb["PlanName"])?$Vyejrpiwledb["PlanName"]:"";


    $Vkhyo0iqpb5a = 0;
    $V23xc4gxrp0w = isset($Vyejrpiwledb["PlanDescription"])?$Vyejrpiwledb["PlanDescription"]:"";
    if($Vtpnxepmpisq["LineOfBusiness"] == "2"){
        $Vfeinw1hsfej["PlanName"] = "Prepago";
        
        $Vhu2a2k1d152->load->library('curl');
        $V15531mn250aSer =array("AccountId"=>$Vtpnxepmpisq["AccountId"]);
        $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/Info_Comercial_Plan.json', array("data" => $V15531mn250aSer));

        $Vtf0as0gqvsg = json_decode($Vnb2hggtfonp);
        if(isset($Vtf0as0gqvsg->error,$Vtf0as0gqvsg->response)){
            $V23xc4gxrp0w = $Vtf0as0gqvsg->response;
        }

        
        
    }

    if($Vkhyo0iqpb5a == 0){
        $Vyejrpiwledb["PlanID"] = "-1";
    }

    $Vfeinw1hsfej["planesRecurrentes"] = $V4tzqrik0xmh;

    $Vleqpxfoiv1i = 0;
    if(isset($Vyejrpiwledb["SocialNetworks"])){
        $Vyejrpiwledb["SocialNetworks"] = $Vhu2a2k1d152->getArray($Vyejrpiwledb["SocialNetworks"]);
        foreach( $Vyejrpiwledb["SocialNetworks"] as $Vep0df0xosawtem){
            if($Vep0df0xosawtem->SocialNetworkType == "Correo Corporativo"){
                $Vleqpxfoiv1i = 1;
            }
        }
    }

    

    $Vfeinw1hsfej["datos"]=(($V15531mn250a==-1)?"Ilimitado":$V15531mn250a);
    $Vfeinw1hsfej["sms"]=(($Vtml41njfdf4==-1)?"Ilimitado":$Vtml41njfdf4);
    $Vfeinw1hsfej["voz"]=(($Vpejekhis5it==-1)?"Ilimitado":$Vpejekhis5it);
    $Vfeinw1hsfej["PlanID"]=isset($Vyejrpiwledb["PlanID"])?$Vyejrpiwledb["PlanID"]:"";
    $Vfeinw1hsfej["PlanCode"]=isset($Vyejrpiwledb["PlanCode"])?$Vyejrpiwledb["PlanCode"]:"";
    $Vfeinw1hsfej["PlanDescription"] = $V23xc4gxrp0w;
    $Vfeinw1hsfej["PlanAmount"]=$VyejrpiwledbAmount;
    $Vfeinw1hsfej["SocialNetworks"]=isset($Vyejrpiwledb["SocialNetworks"])?1:0;
    $Vfeinw1hsfej["viewMail"]=$Vleqpxfoiv1i;
    $Vfeinw1hsfej["PlanVoiceUnit"]=isset($Vyejrpiwledb["PlanVoiceUnit"])?$Vyejrpiwledb["PlanVoiceUnit"]:"";
    $Vfeinw1hsfej["datosCompartidos"] = isset($Vyejrpiwledb["IsSharedDataPlan"])?$Vyejrpiwledb["IsSharedDataPlan"]:"false";
    $Vfeinw1hsfej["familiaYamigos"] = (isset($Vyejrpiwledb["FamilyFriendsDataShare"]) && intval($Vyejrpiwledb["FamilyFriendsDataShare"]) > 0)?'true':'false';
    $Vfeinw1hsfej["familiaYamigos2"] = isset($Vyejrpiwledb["FamilyFriendsDataShare"])?$Vyejrpiwledb["FamilyFriendsDataShare"]:0;

    $Vfeinw1hsfej["FrequentNumbersAllowed"]=$Vqykpjaxfx2u;



    
    
    
    $Vhu2a2k1d152->load->library('curl');
    $V15531mn250a=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"canal"=>"xdr_prepago");
    $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/rest/getSicconBlindaje.json', array("data"=>$V15531mn250a));
    $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);
    $Vnb2hggtfonp = isset($Vnb2hggtfonp->response,$Vnb2hggtfonp->error)&&$Vnb2hggtfonp->error==0?$Vnb2hggtfonp->response:0;
    if(sizeof($Vnb2hggtfonp)>0){
        $Vnb2hggtfonp = $Vnb2hggtfonp[0];
    }

    if($Vnb2hggtfonp){
        if(isset($Vnb2hggtfonp->Descripcion) && $Vnb2hggtfonp->Descripcion == "0"){
            $Vnb2hggtfonp->Descripcion = "";
        }
        $Vfeinw1hsfej["blindaje"] = $Vnb2hggtfonp;
    }

    $Vx0ure4qrds4 = array("total"=>0,"disponible"=>0,"consumido"=>0,"nombre"=>"","fechaInicio"=>"","fechaCorte"=>"","colorHexa"=>"#0097ab","colorRGB"=>array("r"=>"0","g"=>"151","b"=>"171"));

    if (isset($Vfeinw1hsfej["blindaje"]) && $Vfeinw1hsfej["blindaje"] != null) {
        $Vaqfth5cnh1b = floatval($Vfeinw1hsfej["blindaje"]->MBsIncluidos) - floatval($Vfeinw1hsfej["blindaje"]->MBsConsumidos);
        $Vx0ure4qrds4["total"]= toGB($Vfeinw1hsfej["blindaje"]->MBsIncluidos);
        $Vx0ure4qrds4["disponible"]= toGB($Vaqfth5cnh1b);
        $Vx0ure4qrds4["consumido"]= toGB($Vfeinw1hsfej["blindaje"]->MBsConsumidos);


        $Vx0ure4qrds4["nombre"]= $Vfeinw1hsfej["blindaje"]->Descripcion;
        $Vx0ure4qrds4["fechaInicio"]= formatDate($Vfeinw1hsfej["blindaje"]->fechaActivacion);
        $Vx0ure4qrds4["fechaCorte"]= formatDate($Vfeinw1hsfej["blindaje"]->fechaExpiracion);
    }

    $Vx0ure4qrds4["total"]=number_format($Vx0ure4qrds4["total"], 2, ',', ' ');
    $Vx0ure4qrds4["disponible"]=number_format($Vx0ure4qrds4["disponible"], 2, ',', ' ');
    $Vx0ure4qrds4["consumido"]=number_format($Vx0ure4qrds4["consumido"], 2, ',', ' ');

    $Vfeinw1hsfej["beneficio"] = $Vx0ure4qrds4;


    $Vfeinw1hsfej["textDatos"] = number_format(toGB($Vfeinw1hsfej["datos"]), 2, ',', ' ');
    $Vfeinw1hsfej["textBeneficios"] = $Vx0ure4qrds4["total"];
    $V325auzpbrbq = floatval(str_replace(",",".",$Vfeinw1hsfej["textBeneficios"]));
    $V41xhzwareke = floatval(str_replace(",",".",$Vfeinw1hsfej["textDatos"]));
    $Vfeinw1hsfej["textTotal"] = $V325auzpbrbq + $V41xhzwareke;
    $Vfeinw1hsfej["textTotal"] = str_replace(".",",",$Vfeinw1hsfej["textTotal"]);

    $Vfeinw1hsfej["textDatos"] = (floatval($Vfeinw1hsfej["textDatos"]) != 0)? $Vfeinw1hsfej["textDatos"]." GB": $Vfeinw1hsfej["textDatos"];
    $Vfeinw1hsfej["textBeneficios"] = (floatval($Vfeinw1hsfej["textBeneficios"]) != 0)? $Vfeinw1hsfej["textBeneficios"]." GB": $Vfeinw1hsfej["textBeneficios"];
    $Vfeinw1hsfej["textTotal"] = (floatval($Vfeinw1hsfej["textTotal"]) != 0)? $Vfeinw1hsfej["textTotal"]." GB": $Vfeinw1hsfej["textTotal"];

    $Vpa2qbhtxuyd["response"]=$Vfeinw1hsfej;
}


function toGB($Va4zo0rltynr){
    if (floatval($Va4zo0rltynr)>0){
        return (floatval($Va4zo0rltynr)/1024);
    }else{
        return 0;
    }
}

function totlaDatos(){

}

function formatDate($V3ti2nsbfgt2){
    if (isset($V3ti2nsbfgt2) && $V3ti2nsbfgt2 != null && $V3ti2nsbfgt2 != "" ){
        $V3ti2nsbfgt2 = explode("T", $V3ti2nsbfgt2);
        $V3ti2nsbfgt2 = $V3ti2nsbfgt2[0];
        return $V3ti2nsbfgt2;
    }else{
        return "";
    }
}

echo json_encode($Vpa2qbhtxuyd);

?>