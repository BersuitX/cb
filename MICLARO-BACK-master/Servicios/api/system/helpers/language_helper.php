<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('lang'))
{
	
	function lang($Vcfdirgq3swa, $Vl43c0nnn4y4 = '', $Vpkjdumwo4xn = array())
	{
		$Vcfdirgq3swa = get_instance()->lang->line($Vcfdirgq3swa);

		if ($Vl43c0nnn4y4 !== '')
		{
			$Vcfdirgq3swa = '<label for="'.$Vl43c0nnn4y4.'"'._stringify_attributes($Vpkjdumwo4xn).'>'.$Vcfdirgq3swa.'</label>';
		}

		return $Vcfdirgq3swa;
	}
}
