<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('xml_convert'))
{
	
	function xml_convert($Vssdjb5oqaky, $V3fwv01m0xf5 = FALSE)
	{
		$V3iiokxda3xw = '__TEMP_AMPERSANDS__';

		
		
		$Vssdjb5oqaky = preg_replace('/&#(\d+);/', $V3iiokxda3xw.'\\1;', $Vssdjb5oqaky);

		if ($V3fwv01m0xf5 === TRUE)
		{
			$Vssdjb5oqaky = preg_replace('/&(\w+);/', $V3iiokxda3xw.'\\1;', $Vssdjb5oqaky);
		}

		$Vssdjb5oqaky = str_replace(
			array('&', '<', '>', '"', "'", '-'),
			array('&amp;', '&lt;', '&gt;', '&quot;', '&apos;', '&#45;'),
			$Vssdjb5oqaky
		);

		
		$Vssdjb5oqaky = preg_replace('/'.$V3iiokxda3xw.'(\d+);/', '&#\\1;', $Vssdjb5oqaky);

		if ($V3fwv01m0xf5 === TRUE)
		{
			return preg_replace('/'.$V3iiokxda3xw.'(\w+);/', '&\\1;', $Vssdjb5oqaky);
		}

		return $Vssdjb5oqaky;
	}
}
