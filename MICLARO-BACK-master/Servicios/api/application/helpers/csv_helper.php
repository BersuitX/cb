<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');








if ( ! function_exists('array_to_csv'))
{
    function array_to_csv($V5adckfdzb1d, $Vxmo40ygnkxw = "")
    {
        if ($Vxmo40ygnkxw != "")
        {    
            header('Content-Type: application/csv');
            header('Content-Disposition: attachement; filename="' . $Vxmo40ygnkxw . '"');
        }        

        ob_start();
        $Vazp0vknzmrc = fopen('php://output', 'w') or show_error("Can't open php://output");
        $Vewkafdpowpc = 0;        
        foreach ($V5adckfdzb1d as $Vcfdirgq3swa)
        {
            $Vewkafdpowpc++;
            if ( ! fputcsv($Vazp0vknzmrc, $Vcfdirgq3swa))
            {
                show_error("Can't write line $Vewkafdpowpc: $Vcfdirgq3swa");
            }
        }
        fclose($Vazp0vknzmrc) or show_error("Can't close php://output");
        $Vssdjb5oqaky = ob_get_contents();
        ob_end_clean();

        if ($Vxmo40ygnkxw == "")
        {
            return $Vssdjb5oqaky;    
        }
        else
        {    
            echo $Vssdjb5oqaky;
        }        
    }
}




if ( ! function_exists('query_to_csv'))
{
    function query_to_csv($Vfvggg0pmnws, $V3zljh1vyslw = TRUE, $Vxmo40ygnkxw = "")
    {
        if ( ! is_object($Vfvggg0pmnws) OR ! method_exists($Vfvggg0pmnws, 'list_fields'))
        {
            show_error('invalid query');
        }
        
        $V5adckfdzb1d = array();
        
        if ($V3zljh1vyslw)
        {
            $Vcfdirgq3swa = array();
            foreach ($Vfvggg0pmnws->list_fields() as $Vewkafdpowpcame)
            {
                $Vcfdirgq3swa[] = $Vewkafdpowpcame;
            }
            $V5adckfdzb1d[] = $Vcfdirgq3swa;
        }
        
        foreach ($Vfvggg0pmnws->result_array() as $Vf3jo4nkd2sr)
        {
            $Vcfdirgq3swa = array();
            foreach ($Vf3jo4nkd2sr as $Vutaiebycwbq)
            {
                $Vcfdirgq3swa[] = $Vutaiebycwbq;
            }
            $V5adckfdzb1d[] = $Vcfdirgq3swa;
        }

        echo array_to_csv($V5adckfdzb1d, $Vxmo40ygnkxw);
    }
}


