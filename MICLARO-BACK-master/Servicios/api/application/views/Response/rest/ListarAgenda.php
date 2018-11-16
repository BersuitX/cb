<?php
    if($Vsurujypifek>0){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"] = $Vv3gvm3x3hvm;
		$Vpa2qbhtxuyd["errData"]= $Vfeinw1hsfej;
    }else{
		if( isset($Vfeinw1hsfej["Agendadas"]) && isset($Vfeinw1hsfej["Agendadas"]["msg"]) && $Vfeinw1hsfej["Agendadas"]["msg"] == "ERROR EN CONSULTA") {
			$Vpa2qbhtxuyd["error"]=1;
			$Vpa2qbhtxuyd["response"] = "No hemos encontrado historial de visitas para esta cuenta";
			$Vpa2qbhtxuyd["errData"]= $Vfeinw1hsfej;
		}else{
			$Vpa2qbhtxuyd["error"]=0;
			
			foreach ($Vfeinw1hsfej["Agendadas"] as &$Vp5pwfqarr2o) {
				$Vp5pwfqarr2o["FECHA_SERVICIO"] = getJustDate($Vp5pwfqarr2o["FECHA_SERVICIO"]);
				list($V4wm1yh1hmzr, $V5ozzo11urso) = explode(' ',$Vp5pwfqarr2o["FECHA_SOLICITUD"]);
				$Vp5pwfqarr2o["FECHA_SOLICITUD"] = getMonth($V4wm1yh1hmzr);
				foreach($Vp5pwfqarr2o as &$Vrj4fyettamh){
					$Vrj4fyettamh=isset($Vrj4fyettamh)?$Vrj4fyettamh:"";
					$Vrj4fyettamh = trim($Vrj4fyettamh);
				}
			}
			
			foreach ($Vfeinw1hsfej["Historial"] as &$Vbpshtq22edt) {
				$Vbpshtq22edt["FECHA_SERVICIO"] = getJustDate($Vbpshtq22edt["FECHA_SERVICIO"]);
				list($V4wm1yh1hmzr, $V5ozzo11urso) = explode(' ',$Vbpshtq22edt["FECHA_SOLICITUD"]);
				$Vbpshtq22edt["FECHA_SOLICITUD"] = getMonth($V4wm1yh1hmzr);
				foreach($Vbpshtq22edt as &$Vrj4fyettamh){
					$Vrj4fyettamh=isset($Vrj4fyettamh)?$Vrj4fyettamh:"";
					$Vrj4fyettamh = trim($Vrj4fyettamh);
				}
			}
			
			
			$Vpa2qbhtxuyd["response"] = $Vfeinw1hsfej;
		}
    }
    
    echo json_encode($Vpa2qbhtxuyd);
	
	function getMonth($V4wm1yh1hmzr){
		list($Vwpuub3vcm15, $Vytkf3v5vzla, $Vksfgjja3ipu) = explode('-', $V4wm1yh1hmzr);
		
		$Vosrev0dmm3y = "00";
		switch ($Vytkf3v5vzla) {
			case 'JAN':
				$Vosrev0dmm3y = "01";
				break;
			case 'FEB':
				$Vosrev0dmm3y = "02";
				break;
			case 'MAR':
				$Vosrev0dmm3y = "03";
				break;
			case 'APR':
				$Vosrev0dmm3y = "04";
				break;
			case 'MAY':
				$Vosrev0dmm3y = "05";
				break;
			case 'JUN':
				$Vosrev0dmm3y = "06";
				break;
			case 'JUL':
				$Vosrev0dmm3y = "07";
				break;
			case 'AUG':
				$Vosrev0dmm3y = "08";
				break;
			case 'SEP':
				$Vosrev0dmm3y = "09";
				break;
			case 'OCT':
				$Vosrev0dmm3y = "10";
				break;
			case 'NOV':
				$Vosrev0dmm3y = "11";
				break;
			case 'DEC':
				$Vosrev0dmm3y = "12";
				break;
		}
		
		
		
		return "20".$Vksfgjja3ipu."-".$Vosrev0dmm3y."-".$Vwpuub3vcm15;
		
	}

	function getJustDate($V4wm1yh1hmzr){
		list($Vwpuub3vcm15, $Vepgmqgpmrtx) = explode(' ', $V4wm1yh1hmzr);
		return $Vwpuub3vcm15;
	}
	
?>