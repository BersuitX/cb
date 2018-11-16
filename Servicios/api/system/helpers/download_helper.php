<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('force_download'))
{
	
	function force_download($Vb13cwxhoi04 = '', $Vfeinw1hsfej = '', $Vxu1wnkq1ypq = FALSE)
	{
		if ($Vb13cwxhoi04 === '' OR $Vfeinw1hsfej === '')
		{
			return;
		}
		elseif ($Vfeinw1hsfej === NULL)
		{
			if ( ! @is_file($Vb13cwxhoi04) OR ($V0wlqhfv3rl0 = @filesize($Vb13cwxhoi04)) === FALSE)
			{
				return;
			}

			$Vohaqukrowkd = $Vb13cwxhoi04;
			$Vb13cwxhoi04 = explode('/', str_replace(DIRECTORY_SEPARATOR, '/', $Vb13cwxhoi04));
			$Vb13cwxhoi04 = end($Vb13cwxhoi04);
		}
		else
		{
			$V0wlqhfv3rl0 = strlen($Vfeinw1hsfej);
		}

		
		$Vf4dlektv1ba = 'application/octet-stream';

		$V5ozzo11urso = explode('.', $Vb13cwxhoi04);
		$V4ixvjm4swlr = end($V5ozzo11urso);

		if ($Vxu1wnkq1ypq === TRUE)
		{
			if (count($V5ozzo11urso) === 1 OR $V4ixvjm4swlr === '')
			{
				
				return;
			}

			
			$Vf4dlektv1bas =& get_mimes();

			
			if (isset($Vf4dlektv1bas[$V4ixvjm4swlr]))
			{
				$Vf4dlektv1ba = is_array($Vf4dlektv1bas[$V4ixvjm4swlr]) ? $Vf4dlektv1bas[$V4ixvjm4swlr][0] : $Vf4dlektv1bas[$V4ixvjm4swlr];
			}
		}

		
		if (count($V5ozzo11urso) !== 1 && isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Android\s(1|2\.[01])/', $_SERVER['HTTP_USER_AGENT']))
		{
			$V5ozzo11urso[count($V5ozzo11urso) - 1] = strtoupper($V4ixvjm4swlr);
			$Vb13cwxhoi04 = implode('.', $V5ozzo11urso);
		}

		if ($Vfeinw1hsfej === NULL && ($Vzuexymrvrpz = @fopen($Vohaqukrowkd, 'rb')) === FALSE)
		{
			return;
		}

		
		if (ob_get_level() !== 0 && @ob_end_clean() === FALSE)
		{
			@ob_clean();
		}

		
		header('Content-Type: '.$Vf4dlektv1ba);
		header('Content-Disposition: attachment; filename="'.$Vb13cwxhoi04.'"');
		header('Expires: 0');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.$V0wlqhfv3rl0);
		header('Cache-Control: private, no-transform, no-store, must-revalidate');

		
		if ($Vfeinw1hsfej !== NULL)
		{
			exit($Vfeinw1hsfej);
		}

		
		while ( ! feof($Vzuexymrvrpz) && ($Vfeinw1hsfej = fread($Vzuexymrvrpz, 1048576)) !== FALSE)
		{
			echo $Vfeinw1hsfej;
		}

		fclose($Vzuexymrvrpz);
		exit;
	}
}
