<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('trim_slashes'))
{
	
	function trim_slashes($Vssdjb5oqaky)
	{
		return trim($Vssdjb5oqaky, '/');
	}
}



if ( ! function_exists('strip_slashes'))
{
	
	function strip_slashes($Vssdjb5oqaky)
	{
		if ( ! is_array($Vssdjb5oqaky))
		{
			return stripslashes($Vssdjb5oqaky);
		}

		foreach ($Vssdjb5oqaky as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vssdjb5oqaky[$V2xim30qek4u] = strip_slashes($Va4zo0rltynr);
		}

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('strip_quotes'))
{
	
	function strip_quotes($Vssdjb5oqaky)
	{
		return str_replace(array('"', "'"), '', $Vssdjb5oqaky);
	}
}



if ( ! function_exists('quotes_to_entities'))
{
	
	function quotes_to_entities($Vssdjb5oqaky)
	{
		return str_replace(array("\'","\"","'",'"'), array("&#39;","&quot;","&#39;","&quot;"), $Vssdjb5oqaky);
	}
}



if ( ! function_exists('reduce_double_slashes'))
{
	
	function reduce_double_slashes($Vssdjb5oqaky)
	{
		return preg_replace('#(^|[^:])//+#', '\\1/', $Vssdjb5oqaky);
	}
}



if ( ! function_exists('reduce_multiples'))
{
	
	function reduce_multiples($Vssdjb5oqaky, $V12hrez3hrui = ',', $Vdsabeo2y3dt = FALSE)
	{
		$Vssdjb5oqaky = preg_replace('#'.preg_quote($V12hrez3hrui, '#').'{2,}#', $V12hrez3hrui, $Vssdjb5oqaky);
		return ($Vdsabeo2y3dt === TRUE) ? trim($Vssdjb5oqaky, $V12hrez3hrui) : $Vssdjb5oqaky;
	}
}



if ( ! function_exists('random_string'))
{
	
	function random_string($V4wtbblc1wn4 = 'alnum', $Vmijszwfiejj = 8)
	{
		switch ($V4wtbblc1wn4)
		{
			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($V4wtbblc1wn4)
				{
					case 'alpha':
						$Vjellald43li = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$Vjellald43li = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$Vjellald43li = '0123456789';
						break;
					case 'nozero':
						$Vjellald43li = '123456789';
						break;
				}
				return substr(str_shuffle(str_repeat($Vjellald43li, ceil($Vmijszwfiejj / strlen($Vjellald43li)))), 0, $Vmijszwfiejj);
			case 'unique': 
			case 'md5':
				return md5(uniqid(mt_rand()));
			case 'encrypt': 
			case 'sha1':
				return sha1(uniqid(mt_rand(), TRUE));
		}
	}
}



if ( ! function_exists('increment_string'))
{
	
	function increment_string($Vssdjb5oqaky, $V424xxy2eh3t = '_', $Vypxmvo1dqlt = 1)
	{
		preg_match('/(.+)'.preg_quote($V424xxy2eh3t, '/').'([0-9]+)$/', $Vssdjb5oqaky, $V4uvjtwtgjvp);
		return isset($V4uvjtwtgjvp[2]) ? $V4uvjtwtgjvp[1].$V424xxy2eh3t.($V4uvjtwtgjvp[2] + 1) : $Vssdjb5oqaky.$V424xxy2eh3t.$Vypxmvo1dqlt;
	}
}



if ( ! function_exists('alternator'))
{
	
	function alternator()
	{
		static $Vep0df0xosaw;

		if (func_num_args() === 0)
		{
			$Vep0df0xosaw = 0;
			return '';
		}

		$Vz3ndrbat24t = func_get_args();
		return $Vz3ndrbat24t[($Vep0df0xosaw++ % count($Vz3ndrbat24t))];
	}
}



if ( ! function_exists('repeater'))
{
	
	function repeater($Vfeinw1hsfej, $Vkl41m51eom1 = 1)
	{
		return ($Vkl41m51eom1 > 0) ? str_repeat($Vfeinw1hsfej, $Vkl41m51eom1) : '';
	}
}
