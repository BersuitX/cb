<?php
    if($Voxep3jgmgpg=="ERROR"){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]=$Vmbf2mvssbll;
    }else{
        $Vpa2qbhtxuyd["error"]=0;
        $Vnb2hggtfonp=array(
            "CurrentBalance"=>((isset($Vqw2bktcai1a))?$Vqw2bktcai1a:0),
            "validTillDateCurrent"=>((isset($V55by4uy0lem))?$V55by4uy0lem:0),
            "AdditionalBalance"=>((isset($Vf1mhzpotv53))?$Vf1mhzpotv53:0),
            "ValidTillDateAdditional"=>((isset($Vga3ikh2pmu0))?$Vga3ikh2pmu0:0)
            );

        if ($Vnb2hggtfonp["validTillDateCurrent"] != "") {
            $Vnb2hggtfonp["validTillDateCurrent"] = explode(" ", $Vnb2hggtfonp["validTillDateCurrent"])[0];
        }

        if ($Vnb2hggtfonp["ValidTillDateAdditional"] != "") {
            $Vnb2hggtfonp["ValidTillDateAdditional"] = explode(" ", $Vnb2hggtfonp["ValidTillDateAdditional"])[0];
        }

        if ($Vnb2hggtfonp["AdditionalBalance"] == 0) {
            $Vnb2hggtfonp["ValidTillDateAdditional"] = "";
        }




        $Vpa2qbhtxuyd["response"]=$Vnb2hggtfonp;
    }
    echo json_encode($Vpa2qbhtxuyd);

?>