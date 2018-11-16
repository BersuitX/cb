<?php
$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

    if (($Veqekzxyjyqy==1)){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="En estos momentos no hay información de facturación disponible";
    }else{
        $Vpa2qbhtxuyd["error"]=0;

        
        $V432wts1rp4k=array();
        $V1q5xkbcnn5z=array();
        
        if(isset($V0rpt52tpg2d)){
            $V3iiokxda3xw=json_encode($V0rpt52tpg2d, true);
            $V3iiokxda3xw=json_decode($V3iiokxda3xw);

            if( is_array($V3iiokxda3xw)){
                $V432wts1rp4k=$V0rpt52tpg2d;
            }else{
                array_push($V432wts1rp4k,$V0rpt52tpg2d);
            }
        
            foreach($V432wts1rp4k as $Vutaiebycwbq){
                $Vm1av2iahduc["Reference"]=$Vutaiebycwbq["Reference"];
                $Vm1av2iahduc["BillNumber"]=((isset($Vutaiebycwbq["BillNumber"]))?$Vutaiebycwbq["BillNumber"]:"0");
                $Vm1av2iahduc["Amount"]=((array()===$Vutaiebycwbq["Amount"])?"$0":"$".number_format($Vutaiebycwbq["Amount"], 0, ",", "."));
                $Vm1av2iahduc["DescriptionType"]=$Vutaiebycwbq["DescriptionType"];
                array_push($V1q5xkbcnn5z,$Vm1av2iahduc);
            }
            
        }


                

        $V3iiokxda3xw=json_encode($Vnnp2p2lhc0v, true);
        $V3iiokxda3xw=json_decode($Vnnp2p2lhc0v);

        if( is_array($V3iiokxda3xw)){
            $Vnnp2p2lhc0v="No disponible";
        }else{
            $Vnnp2p2lhc0v=explode('T',$Vnnp2p2lhc0v);
            $Vnnp2p2lhc0v=((count($Vnnp2p2lhc0v))?$Vnnp2p2lhc0v[0]:"No disponible");
        }

        if(array() ===$Vvkjpcmxf0cp){
            $Vvkjpcmxf0cp="No disponible";
        }else{
            $Vvkjpcmxf0cp=explode('T',$Vvkjpcmxf0cp);
            $Vvkjpcmxf0cp=((count($Vvkjpcmxf0cp))?$Vvkjpcmxf0cp[0]:"No disponible");
        }

        if(array() ===$Vggpbnmy14sm){
            $Vggpbnmy14sm="No disponible";
        }else{
            $Vggpbnmy14sm=explode('T',$Vggpbnmy14sm);
            $Vggpbnmy14sm=((count($Vggpbnmy14sm))?$Vggpbnmy14sm[0]:"No disponible");
        }


        $Vpa2qbhtxuyd["response"]=array(
            "StatementDate"=>$Vvkjpcmxf0cp,
            "LastPaymentDate"=>$Vnnp2p2lhc0v,
            "LastPaymentAmount"=>"$".number_format($Vrjiivqfbfvg, 0, ",", "."),
            "DueDate"=>$Vggpbnmy14sm,
            "BillItems"=>$V1q5xkbcnn5z,
            );
            
    }

    echo json_encode($Vpa2qbhtxuyd);
?>