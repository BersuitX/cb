<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('directory_map'))
{
	
	function directory_map($Vxrpltend0fl, $Vmcih5irrabw = 0, $Vrwee4zvnllp = FALSE)
	{
		if ($Vzuexymrvrpz = @opendir($Vxrpltend0fl))
		{
			$Vui1xr3kw1ci	= array();
			$Vhqjnsl3p5ve	= $Vmcih5irrabw - 1;
			$Vxrpltend0fl	= rtrim($Vxrpltend0fl, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

			while (FALSE !== ($Vligofq0fb34 = readdir($Vzuexymrvrpz)))
			{
				
				if ($Vligofq0fb34 === '.' OR $Vligofq0fb34 === '..' OR ($Vrwee4zvnllp === FALSE && $Vligofq0fb34[0] === '.'))
				{
					continue;
				}

				is_dir($Vxrpltend0fl.$Vligofq0fb34) && $Vligofq0fb34 .= DIRECTORY_SEPARATOR;

				if (($Vmcih5irrabw < 1 OR $Vhqjnsl3p5ve > 0) && is_dir($Vxrpltend0fl.$Vligofq0fb34))
				{
					$Vui1xr3kw1ci[$Vligofq0fb34] = directory_map($Vxrpltend0fl.$Vligofq0fb34, $Vhqjnsl3p5ve, $Vrwee4zvnllp);
				}
				else
				{
					$Vui1xr3kw1ci[] = $Vligofq0fb34;
				}
			}

			closedir($Vzuexymrvrpz);
			return $Vui1xr3kw1ci;
		}

		return FALSE;
	}
}
