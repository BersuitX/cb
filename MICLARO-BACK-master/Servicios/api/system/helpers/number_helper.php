<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('byte_format'))
{
	
	function byte_format($Vkl41m51eom1, $V22toshkvf3o = 1)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->lang->load('number');

		if ($Vkl41m51eom1 >= 1000000000000)
		{
			$Vkl41m51eom1 = round($Vkl41m51eom1 / 1099511627776, $V22toshkvf3o);
			$Vdt31prvyjwp = $Vgw3d0qe3dgd->lang->line('terabyte_abbr');
		}
		elseif ($Vkl41m51eom1 >= 1000000000)
		{
			$Vkl41m51eom1 = round($Vkl41m51eom1 / 1073741824, $V22toshkvf3o);
			$Vdt31prvyjwp = $Vgw3d0qe3dgd->lang->line('gigabyte_abbr');
		}
		elseif ($Vkl41m51eom1 >= 1000000)
		{
			$Vkl41m51eom1 = round($Vkl41m51eom1 / 1048576, $V22toshkvf3o);
			$Vdt31prvyjwp = $Vgw3d0qe3dgd->lang->line('megabyte_abbr');
		}
		elseif ($Vkl41m51eom1 >= 1000)
		{
			$Vkl41m51eom1 = round($Vkl41m51eom1 / 1024, $V22toshkvf3o);
			$Vdt31prvyjwp = $Vgw3d0qe3dgd->lang->line('kilobyte_abbr');
		}
		else
		{
			$Vdt31prvyjwp = $Vgw3d0qe3dgd->lang->line('bytes');
			return number_format($Vkl41m51eom1).' '.$Vdt31prvyjwp;
		}

		return number_format($Vkl41m51eom1, $V22toshkvf3o).' '.$Vdt31prvyjwp;
	}
}
