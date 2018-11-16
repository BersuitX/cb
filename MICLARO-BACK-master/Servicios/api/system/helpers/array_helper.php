<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('element'))
{
	
	function element($Vutaiebycwbq, array $V5adckfdzb1d, $Vexts11gu2nb = NULL)
	{
		return array_key_exists($Vutaiebycwbq, $V5adckfdzb1d) ? $V5adckfdzb1d[$Vutaiebycwbq] : $Vexts11gu2nb;
	}
}



if ( ! function_exists('random_element'))
{
	
	function random_element($V5adckfdzb1d)
	{
		return is_array($V5adckfdzb1d) ? $V5adckfdzb1d[array_rand($V5adckfdzb1d)] : $V5adckfdzb1d;
	}
}



if ( ! function_exists('elements'))
{
	
	function elements($Vutaiebycwbqs, array $V5adckfdzb1d, $Vexts11gu2nb = NULL)
	{
		$Vb5hjbk2mbwk = array();

		is_array($Vutaiebycwbqs) OR $Vutaiebycwbqs = array($Vutaiebycwbqs);

		foreach ($Vutaiebycwbqs as $Vutaiebycwbq)
		{
			$Vb5hjbk2mbwk[$Vutaiebycwbq] = array_key_exists($Vutaiebycwbq, $V5adckfdzb1d) ? $V5adckfdzb1d[$Vutaiebycwbq] : $Vexts11gu2nb;
		}

		return $Vb5hjbk2mbwk;
	}
}
