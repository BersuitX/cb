<?php

    $Vugyhimtusdo=(($Voxep3jgmgpg=="ERROR")?((isset($Vmbf2mvssbll))?$Vmbf2mvssbll:"No se encontró información del usuario."):"");

    if($Voxep3jgmgpg=="SUCCESS"){
        $Vpa2qbhtxuyd["error"]=0;

          $Vcfrropha2x1=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["CustomerId"]);
          $V0vzw0fpvl1p=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Name"]);
          $Vymlg3fszicp=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["LastName"]);
          $Vcfzis3ca5nv=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["DocumentType"]);
          $Vbbhadzcf3q5=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["DocumentNumber"]);
          $Vj2eqdvvlipj=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["HomePhoneNumberIndicative"]);
          $Viudnwh041h3=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["HomePhoneNumber"]);
          $Vktnenraiv2y=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["OfficePhoneNumberIndicative"]);
          $Vs531vu3v34a=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["OfficePhoneNumber"]);
          $Va3r2k5goagw=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["MobileNumber"]);
          $Va1hf2qjcehx=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["EmailAddress"]);
          
          if(isset($Vzrq3ihj4arw["Address"])){
            $Vcrecadzrsec=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["Address"]);
            $Vbvro4fgir0k=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["DepartmentId"]);
            $Vclk3tc5jl44=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["Department"]);
            $V53hz21dezot=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["CityId"]);
            $Vgwbawnq513v=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["City"]);
            $Vgwbawnq513vDepartment=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["CityDepartment"]);
            $Vyvvmrxtxq5b=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["District"]);
          }else{
            $Vcrecadzrsec="";
            $Vbvro4fgir0k="";
            $Vclk3tc5jl44="";
            $V53hz21dezot="";
            $Vgwbawnq513v="";
            $Vgwbawnq513vDepartment="";
            $Vyvvmrxtxq5b="";
          }

          if(isset($Vzrq3ihj4arw["InstallationAddress"])){
            $Vb3kjvea5352=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["InstallationAddress"]["Address"]);
            $Vbvro4fgir0k1=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["InstallationAddress"]["DepartmentId"]);
            $Vclk3tc5jl441=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["InstallationAddress"]["Department"]);
            $V53hz21dezot1=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["InstallationAddress"]["CityId"]);
            $Vgwbawnq513v1=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["InstallationAddress"]["City"]);
            $Vgwbawnq513vDepartment1=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["InstallationAddress"]["CityDepartment"]);
            $Vyvvmrxtxq5b1=$Vhu2a2k1d152->arrayToString($Vzrq3ihj4arw["Address"]["District"]);
          }else{
            $Vb3kjvea5352="";
            $Vbvro4fgir0k1="";
            $Vclk3tc5jl441="";
            $V53hz21dezot1="";
            $Vgwbawnq513v1="";
            $Vgwbawnq513vDepartment1="";
            $Vyvvmrxtxq5b1="";
          }
          
          $Vala1hnrwvp3 = array("Address"=>$Vcrecadzrsec,"DepartmentId"=>$Vbvro4fgir0k,"Department"=>$Vclk3tc5jl44,"CityId"=>$V53hz21dezot,"City"=>$Vgwbawnq513v,"CityDepartment"=>$Vgwbawnq513vDepartment,"District"=>$Vyvvmrxtxq5b);
          $V1qb1hg1zq1x = array("Address"=>$Vb3kjvea5352,"DepartmentId"=>$Vbvro4fgir0k1,"Department"=>$Vclk3tc5jl441,"CityId"=>$V53hz21dezot1,"City"=>$Vgwbawnq513v1,"CityDepartment"=>$Vgwbawnq513vDepartment1,"District"=>$Vyvvmrxtxq5b1);

          $V5nmpaxj2ter = "CC";
          if(sizeof($Vcfrropha2x1) == 10){
            $Vvncjr3mb1h5=array(
            "tipo1"=>"CC",
            "tipo2"=>"CE",
            "tipo3"=>"PP",
            "tipo4"=>"CD",
            "tipo5"=>"NI"
            );
  
            return $Vvncjr3mb1h5["tipo".$Vcfzis3ca5nv];
          }

          
          $Vpa2qbhtxuyd["response"]=array(
            "CustomerId"=>$Vcfrropha2x1,
            "Name"=>$V0vzw0fpvl1p,
            "LastName"=>$Vymlg3fszicp,
            "DocumentType"=>$Vcfzis3ca5nv,
            "DocumentTypeText"=>$V5nmpaxj2ter,
            "DocumentNumber"=>$Vbbhadzcf3q5,
            "HomePhoneNumberIndicative"=>$Vj2eqdvvlipj,
            "HomePhoneNumber"=>$Viudnwh041h3,
            "OfficePhoneNumberIndicative"=>$Vktnenraiv2y,
            "OfficePhoneNumber"=>$Vs531vu3v34a,
            "MobileNumber"=>$Va3r2k5goagw,
            "EmailAddress"=>$Va1hf2qjcehx,
            "Address"=>$Vala1hnrwvp3,
            "InstallationAddress"=>$V1qb1hg1zq1x
          );
    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]=$Vugyhimtusdo;
    }
    echo json_encode($Vpa2qbhtxuyd);
?>