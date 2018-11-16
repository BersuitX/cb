<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('read_file'))
{
	
	function read_file($Vligofq0fb34)
	{
		return @file_get_contents($Vligofq0fb34);
	}
}



if ( ! function_exists('write_file'))
{
	
	function write_file($Vcmaitbcbmmk, $Vfeinw1hsfej, $V4wgu3onvlab = 'wb')
	{
		if ( ! $Vzuexymrvrpz = @fopen($Vcmaitbcbmmk, $V4wgu3onvlab))
		{
			return FALSE;
		}

		flock($Vzuexymrvrpz, LOCK_EX);

		for ($Voetc43kt2cr = $Vte3mlfnkhto = 0, $Vgdtiboyfq04 = strlen($Vfeinw1hsfej); $Vte3mlfnkhto < $Vgdtiboyfq04; $Vte3mlfnkhto += $Voetc43kt2cr)
		{
			if (($Voetc43kt2cr = fwrite($Vzuexymrvrpz, substr($Vfeinw1hsfej, $Vte3mlfnkhto))) === FALSE)
			{
				break;
			}
		}

		flock($Vzuexymrvrpz, LOCK_UN);
		fclose($Vzuexymrvrpz);

		return is_int($Voetc43kt2cr);
	}
}



if ( ! function_exists('delete_files'))
{
	
	function delete_files($Vcmaitbcbmmk, $Voqrknocfzi2 = FALSE, $Vvljx0rdku20 = FALSE, $Vok101b45rc2 = 0)
	{
		
		$Vcmaitbcbmmk = rtrim($Vcmaitbcbmmk, '/\\');

		if ( ! $Vz3xqs2vapv0 = @opendir($Vcmaitbcbmmk))
		{
			return FALSE;
		}

		while (FALSE !== ($Vligofq0fb34name = @readdir($Vz3xqs2vapv0)))
		{
			if ($Vligofq0fb34name !== '.' && $Vligofq0fb34name !== '..')
			{
				if (is_dir($Vcmaitbcbmmk.DIRECTORY_SEPARATOR.$Vligofq0fb34name) && $Vligofq0fb34name[0] !== '.')
				{
					delete_files($Vcmaitbcbmmk.DIRECTORY_SEPARATOR.$Vligofq0fb34name, $Voqrknocfzi2, $Vvljx0rdku20, $Vok101b45rc2 + 1);
				}
				elseif ($Vvljx0rdku20 !== TRUE OR ! preg_match('/^(\.htaccess|index\.(html|htm|php)|web\.config)$/i', $Vligofq0fb34name))
				{
					@unlink($Vcmaitbcbmmk.DIRECTORY_SEPARATOR.$Vligofq0fb34name);
				}
			}
		}

		closedir($Vz3xqs2vapv0);

		return ($Voqrknocfzi2 === TRUE && $Vok101b45rc2 > 0)
			? @rmdir($Vcmaitbcbmmk)
			: TRUE;
	}
}



if ( ! function_exists('get_filenames'))
{
	
	function get_filenames($Vxrpltend0fl, $Verz0v2ktpt4 = FALSE, $Vzt4d25brnvh = FALSE)
	{
		static $Vft2ydfnyuhq = array();

		if ($Vzuexymrvrpz = @opendir($Vxrpltend0fl))
		{
			
			if ($Vzt4d25brnvh === FALSE)
			{
				$Vft2ydfnyuhq = array();
				$Vxrpltend0fl = rtrim(realpath($Vxrpltend0fl), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
			}

			while (FALSE !== ($Vligofq0fb34 = readdir($Vzuexymrvrpz)))
			{
				if (is_dir($Vxrpltend0fl.$Vligofq0fb34) && $Vligofq0fb34[0] !== '.')
				{
					get_filenames($Vxrpltend0fl.$Vligofq0fb34.DIRECTORY_SEPARATOR, $Verz0v2ktpt4, TRUE);
				}
				elseif ($Vligofq0fb34[0] !== '.')
				{
					$Vft2ydfnyuhq[] = ($Verz0v2ktpt4 === TRUE) ? $Vxrpltend0fl.$Vligofq0fb34 : $Vligofq0fb34;
				}
			}

			closedir($Vzuexymrvrpz);
			return $Vft2ydfnyuhq;
		}

		return FALSE;
	}
}



if ( ! function_exists('get_dir_file_info'))
{
	
	function get_dir_file_info($Vxrpltend0fl, $V1zekr55pr0w = TRUE, $Vzt4d25brnvh = FALSE)
	{
		static $Vft2ydfnyuhq = array();
		$Vn3twm0zgvuu = $Vxrpltend0fl;

		if ($Vzuexymrvrpz = @opendir($Vxrpltend0fl))
		{
			
			if ($Vzt4d25brnvh === FALSE)
			{
				$Vft2ydfnyuhq = array();
				$Vxrpltend0fl = rtrim(realpath($Vxrpltend0fl), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
			}

			
			while (FALSE !== ($Vligofq0fb34 = readdir($Vzuexymrvrpz)))
			{
				if (is_dir($Vxrpltend0fl.$Vligofq0fb34) && $Vligofq0fb34[0] !== '.' && $V1zekr55pr0w === FALSE)
				{
					get_dir_file_info($Vxrpltend0fl.$Vligofq0fb34.DIRECTORY_SEPARATOR, $V1zekr55pr0w, TRUE);
				}
				elseif ($Vligofq0fb34[0] !== '.')
				{
					$Vft2ydfnyuhq[$Vligofq0fb34] = get_file_info($Vxrpltend0fl.$Vligofq0fb34);
					$Vft2ydfnyuhq[$Vligofq0fb34]['relative_path'] = $Vn3twm0zgvuu;
				}
			}

			closedir($Vzuexymrvrpz);
			return $Vft2ydfnyuhq;
		}

		return FALSE;
	}
}



if ( ! function_exists('get_file_info'))
{
	
	function get_file_info($Vligofq0fb34, $Vls0dptuyxba = array('name', 'server_path', 'size', 'date'))
	{
		if ( ! file_exists($Vligofq0fb34))
		{
			return FALSE;
		}

		if (is_string($Vls0dptuyxba))
		{
			$Vls0dptuyxba = explode(',', $Vls0dptuyxba);
		}

		foreach ($Vls0dptuyxba as $V2xim30qek4u)
		{
			switch ($V2xim30qek4u)
			{
				case 'name':
					$Vligofq0fb34info['name'] = basename($Vligofq0fb34);
					break;
				case 'server_path':
					$Vligofq0fb34info['server_path'] = $Vligofq0fb34;
					break;
				case 'size':
					$Vligofq0fb34info['size'] = filesize($Vligofq0fb34);
					break;
				case 'date':
					$Vligofq0fb34info['date'] = filemtime($Vligofq0fb34);
					break;
				case 'readable':
					$Vligofq0fb34info['readable'] = is_readable($Vligofq0fb34);
					break;
				case 'writable':
					$Vligofq0fb34info['writable'] = is_really_writable($Vligofq0fb34);
					break;
				case 'executable':
					$Vligofq0fb34info['executable'] = is_executable($Vligofq0fb34);
					break;
				case 'fileperms':
					$Vligofq0fb34info['fileperms'] = fileperms($Vligofq0fb34);
					break;
			}
		}

		return $Vligofq0fb34info;
	}
}



if ( ! function_exists('get_mime_by_extension'))
{
	
	function get_mime_by_extension($Vligofq0fb34name)
	{
		static $Vsdvtzrs5faf;

		if ( ! is_array($Vsdvtzrs5faf))
		{
			$Vsdvtzrs5faf = get_mimes();

			if (empty($Vsdvtzrs5faf))
			{
				return FALSE;
			}
		}

		$V4ixvjm4swlr = strtolower(substr(strrchr($Vligofq0fb34name, '.'), 1));

		if (isset($Vsdvtzrs5faf[$V4ixvjm4swlr]))
		{
			return is_array($Vsdvtzrs5faf[$V4ixvjm4swlr])
				? current($Vsdvtzrs5faf[$V4ixvjm4swlr]) 
				: $Vsdvtzrs5faf[$V4ixvjm4swlr];
		}

		return FALSE;
	}
}



if ( ! function_exists('symbolic_permissions'))
{
	
	function symbolic_permissions($Vcbm2lv0flse)
	{
		if (($Vcbm2lv0flse & 0xC000) === 0xC000)
		{
			$Vhhl2ickswqt = 's'; 
		}
		elseif (($Vcbm2lv0flse & 0xA000) === 0xA000)
		{
			$Vhhl2ickswqt = 'l'; 
		}
		elseif (($Vcbm2lv0flse & 0x8000) === 0x8000)
		{
			$Vhhl2ickswqt = '-'; 
		}
		elseif (($Vcbm2lv0flse & 0x6000) === 0x6000)
		{
			$Vhhl2ickswqt = 'b'; 
		}
		elseif (($Vcbm2lv0flse & 0x4000) === 0x4000)
		{
			$Vhhl2ickswqt = 'd'; 
		}
		elseif (($Vcbm2lv0flse & 0x2000) === 0x2000)
		{
			$Vhhl2ickswqt = 'c'; 
		}
		elseif (($Vcbm2lv0flse & 0x1000) === 0x1000)
		{
			$Vhhl2ickswqt = 'p'; 
		}
		else
		{
			$Vhhl2ickswqt = 'u'; 
		}

		
		$Vhhl2ickswqt .= (($Vcbm2lv0flse & 0x0100) ? 'r' : '-')
			.(($Vcbm2lv0flse & 0x0080) ? 'w' : '-')
			.(($Vcbm2lv0flse & 0x0040) ? (($Vcbm2lv0flse & 0x0800) ? 's' : 'x' ) : (($Vcbm2lv0flse & 0x0800) ? 'S' : '-'));

		
		$Vhhl2ickswqt .= (($Vcbm2lv0flse & 0x0020) ? 'r' : '-')
			.(($Vcbm2lv0flse & 0x0010) ? 'w' : '-')
			.(($Vcbm2lv0flse & 0x0008) ? (($Vcbm2lv0flse & 0x0400) ? 's' : 'x' ) : (($Vcbm2lv0flse & 0x0400) ? 'S' : '-'));

		
		$Vhhl2ickswqt .= (($Vcbm2lv0flse & 0x0004) ? 'r' : '-')
			.(($Vcbm2lv0flse & 0x0002) ? 'w' : '-')
			.(($Vcbm2lv0flse & 0x0001) ? (($Vcbm2lv0flse & 0x0200) ? 't' : 'x' ) : (($Vcbm2lv0flse & 0x0200) ? 'T' : '-'));

		return $Vhhl2ickswqt;
	}
}



if ( ! function_exists('octal_permissions'))
{
	
	function octal_permissions($Vcbm2lv0flse)
	{
		return substr(sprintf('%o', $Vcbm2lv0flse), -3);
	}
}
