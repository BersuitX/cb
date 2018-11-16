<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if (is_php('5.5'))
{
	return;
}



if ( ! function_exists('array_column'))
{
	
	function array_column(array $V5adckfdzb1d, $Vo4szz5nmord, $Vbw5wgiry522 = NULL)
	{
		if ( ! in_array($V4wtbblc1wn4 = gettype($Vo4szz5nmord), array('integer', 'string', 'NULL'), TRUE))
		{
			if ($V4wtbblc1wn4 === 'double')
			{
				$Vo4szz5nmord = (int) $Vo4szz5nmord;
			}
			elseif ($V4wtbblc1wn4 === 'object' && method_exists($Vo4szz5nmord, '__toString'))
			{
				$Vo4szz5nmord = (string) $Vo4szz5nmord;
			}
			else
			{
				trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
				return FALSE;
			}
		}

		if ( ! in_array($V4wtbblc1wn4 = gettype($Vbw5wgiry522), array('integer', 'string', 'NULL'), TRUE))
		{
			if ($V4wtbblc1wn4 === 'double')
			{
				$Vbw5wgiry522 = (int) $Vbw5wgiry522;
			}
			elseif ($V4wtbblc1wn4 === 'object' && method_exists($Vbw5wgiry522, '__toString'))
			{
				$Vbw5wgiry522 = (string) $Vbw5wgiry522;
			}
			else
			{
				trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
				return FALSE;
			}
		}

		$Voetc43kt2cr = array();
		foreach ($V5adckfdzb1d as &$Vqtrwdgbny00)
		{
			if ($Vo4szz5nmord === NULL)
			{
				$Vcnwqsowvhom = $Vqtrwdgbny00;
			}
			elseif (is_array($Vqtrwdgbny00) && array_key_exists($Vo4szz5nmord, $Vqtrwdgbny00))
			{
				$Vcnwqsowvhom = $Vqtrwdgbny00[$Vo4szz5nmord];
			}
			else
			{
				continue;
			}

			if ($Vbw5wgiry522 === NULL OR ! array_key_exists($Vbw5wgiry522, $Vqtrwdgbny00))
			{
				$Voetc43kt2cr[] = $Vcnwqsowvhom;
			}
			else
			{
				$Voetc43kt2cr[$Vqtrwdgbny00[$Vbw5wgiry522]] = $Vcnwqsowvhom;
			}
		}

		return $Voetc43kt2cr;
	}
}



if (is_php('5.4'))
{
	return;
}



if ( ! function_exists('hex2bin'))
{
	
	function hex2bin($Vfeinw1hsfej)
	{
		if (in_array($V4wtbblc1wn4 = gettype($Vfeinw1hsfej), array('array', 'double', 'object'), TRUE))
		{
			if ($V4wtbblc1wn4 === 'object' && method_exists($Vfeinw1hsfej, '__toString'))
			{
				$Vfeinw1hsfej = (string) $Vfeinw1hsfej;
			}
			else
			{
				trigger_error('hex2bin() expects parameter 1 to be string, '.$V4wtbblc1wn4.' given', E_USER_WARNING);
				return NULL;
			}
		}

		if (strlen($Vfeinw1hsfej) % 2 !== 0)
		{
			trigger_error('Hexadecimal input string must have an even length', E_USER_WARNING);
			return FALSE;
		}
		elseif ( ! preg_match('/^[0-9a-f]*$/i', $Vfeinw1hsfej))
		{
			trigger_error('Input string must be hexadecimal string', E_USER_WARNING);
			return FALSE;
		}

		return pack('H*', $Vfeinw1hsfej);
	}
}



if (is_php('5.3'))
{
	return;
}



if ( ! function_exists('array_replace'))
{
	
	function array_replace()
	{
		$V5adckfdzb1ds = func_get_args();

		if (($Vn2ycfau434s = count($V5adckfdzb1ds)) === 0)
		{
			trigger_error('array_replace() expects at least 1 parameter, 0 given', E_USER_WARNING);
			return NULL;
		}
		elseif ($Vn2ycfau434s === 1)
		{
			if ( ! is_array($V5adckfdzb1ds[0]))
			{
				trigger_error('array_replace(): Argument #1 is not an array', E_USER_WARNING);
				return NULL;
			}

			return $V5adckfdzb1ds[0];
		}

		$V5adckfdzb1d = array_shift($V5adckfdzb1ds);
		$Vn2ycfau434s--;

		for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ( ! is_array($V5adckfdzb1ds[$Vep0df0xosaw]))
			{
				trigger_error('array_replace(): Argument #'.($Vep0df0xosaw + 2).' is not an array', E_USER_WARNING);
				return NULL;
			}
			elseif (empty($V5adckfdzb1ds[$Vep0df0xosaw]))
			{
				continue;
			}

			foreach (array_keys($V5adckfdzb1ds[$Vep0df0xosaw]) as $V2xim30qek4u)
			{
				$V5adckfdzb1d[$V2xim30qek4u] = $V5adckfdzb1ds[$Vep0df0xosaw][$V2xim30qek4u];
			}
		}

		return $V5adckfdzb1d;
	}
}



if ( ! function_exists('array_replace_recursive'))
{
	
	function array_replace_recursive()
	{
		$V5adckfdzb1ds = func_get_args();

		if (($Vn2ycfau434s = count($V5adckfdzb1ds)) === 0)
		{
			trigger_error('array_replace_recursive() expects at least 1 parameter, 0 given', E_USER_WARNING);
			return NULL;
		}
		elseif ($Vn2ycfau434s === 1)
		{
			if ( ! is_array($V5adckfdzb1ds[0]))
			{
				trigger_error('array_replace_recursive(): Argument #1 is not an array', E_USER_WARNING);
				return NULL;
			}

			return $V5adckfdzb1ds[0];
		}

		$V5adckfdzb1d = array_shift($V5adckfdzb1ds);
		$Vn2ycfau434s--;

		for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ( ! is_array($V5adckfdzb1ds[$Vep0df0xosaw]))
			{
				trigger_error('array_replace_recursive(): Argument #'.($Vep0df0xosaw + 2).' is not an array', E_USER_WARNING);
				return NULL;
			}
			elseif (empty($V5adckfdzb1ds[$Vep0df0xosaw]))
			{
				continue;
			}

			foreach (array_keys($V5adckfdzb1ds[$Vep0df0xosaw]) as $V2xim30qek4u)
			{
				$V5adckfdzb1d[$V2xim30qek4u] = (is_array($V5adckfdzb1ds[$Vep0df0xosaw][$V2xim30qek4u]) && isset($V5adckfdzb1d[$V2xim30qek4u]) && is_array($V5adckfdzb1d[$V2xim30qek4u]))
					? array_replace_recursive($V5adckfdzb1d[$V2xim30qek4u], $V5adckfdzb1ds[$Vep0df0xosaw][$V2xim30qek4u])
					: $V5adckfdzb1ds[$Vep0df0xosaw][$V2xim30qek4u];
			}
		}

		return $V5adckfdzb1d;
	}
}



if ( ! function_exists('quoted_printable_encode'))
{
	
	function quoted_printable_encode($Vssdjb5oqaky)
	{
		if (strlen($Vssdjb5oqaky) === 0)
		{
			return '';
		}
		elseif (in_array($V4wtbblc1wn4 = gettype($Vssdjb5oqaky), array('array', 'object'), TRUE))
		{
			if ($V4wtbblc1wn4 === 'object' && method_exists($Vssdjb5oqaky, '__toString'))
			{
				$Vssdjb5oqaky = (string) $Vssdjb5oqaky;
			}
			else
			{
				trigger_error('quoted_printable_encode() expects parameter 1 to be string, '.$V4wtbblc1wn4.' given', E_USER_WARNING);
				return NULL;
			}
		}

		if (function_exists('imap_8bit'))
		{
			return imap_8bit($Vssdjb5oqaky);
		}

		$Vep0df0xosaw = $Vk4cs3qcfedr = 0;
		$Vzxix2pqoztx = '';
		$Vu0dwii31352 = '0123456789ABCDEF';
		$Vgdtiboyfq04 = (extension_loaded('mbstring') && ini_get('mbstring.func_overload'))
			? mb_strlen($Vssdjb5oqaky, '8bit')
			: strlen($Vssdjb5oqaky);

		while ($Vgdtiboyfq04--)
		{
			if ((($Vn2ycfau434s = $Vssdjb5oqaky[$Vep0df0xosaw++]) === "\015") && isset($Vssdjb5oqaky[$Vep0df0xosaw]) && ($Vssdjb5oqaky[$Vep0df0xosaw] === "\012") && $Vgdtiboyfq04 > 0)
			{
				$Vzxix2pqoztx .= "\015".$Vssdjb5oqaky[$Vep0df0xosaw++];
				$Vgdtiboyfq04--;
				$Vk4cs3qcfedr = 0;
				continue;
			}

			if (
				ctype_cntrl($Vn2ycfau434s)
				OR (ord($Vn2ycfau434s) === 0x7f)
				OR (ord($Vn2ycfau434s) & 0x80)
				OR ($Vn2ycfau434s === '=')
				OR ($Vn2ycfau434s === ' ' && isset($Vssdjb5oqaky[$Vep0df0xosaw]) && $Vssdjb5oqaky[$Vep0df0xosaw] === "\015")
			)
			{
				if (
					(($Vk4cs3qcfedr += 3) > 75 && ord($Vn2ycfau434s) <= 0x7f)
					OR (ord($Vn2ycfau434s) > 0x7f && ord($Vn2ycfau434s) <= 0xdf && ($Vk4cs3qcfedr + 3) > 75)
					OR (ord($Vn2ycfau434s) > 0xdf && ord($Vn2ycfau434s) <= 0xef && ($Vk4cs3qcfedr + 6) > 75)
					OR (ord($Vn2ycfau434s) > 0xef && ord($Vn2ycfau434s) <= 0xf4 && ($Vk4cs3qcfedr + 9) > 75)
				)
				{
					$Vzxix2pqoztx .= "=\015\012";
					$Vk4cs3qcfedr = 3;
				}

				$Vzxix2pqoztx .= '='.$Vu0dwii31352[ord($Vn2ycfau434s) >> 4].$Vu0dwii31352[ord($Vn2ycfau434s) & 0xf];
				continue;
			}

			if ((++$Vk4cs3qcfedr) > 75)
			{
				$Vzxix2pqoztx .= "=\015\012";
				$Vk4cs3qcfedr = 1;
			}

			$Vzxix2pqoztx .= $Vn2ycfau434s;
		}

		return $Vzxix2pqoztx;
	}
}
