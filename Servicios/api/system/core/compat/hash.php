<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if (is_php('5.6'))
{
	return;
}



if ( ! function_exists('hash_equals'))
{
	
	function hash_equals($V4ehyc3skikd, $Vtdqqvrwuol3)
	{
		if ( ! is_string($V4ehyc3skikd))
		{
			trigger_error('hash_equals(): Expected known_string to be a string, '.strtolower(gettype($V4ehyc3skikd)).' given', E_USER_WARNING);
			return FALSE;
		}
		elseif ( ! is_string($Vtdqqvrwuol3))
		{
			trigger_error('hash_equals(): Expected user_string to be a string, '.strtolower(gettype($Vtdqqvrwuol3)).' given', E_USER_WARNING);
			return FALSE;
		}
		elseif (($Vgdtiboyfq04 = strlen($V4ehyc3skikd)) !== strlen($Vtdqqvrwuol3))
		{
			return FALSE;
		}

		$V0wdm0aemnf1 = 0;
		for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vgdtiboyfq04; $Vep0df0xosaw++)
		{
			$V0wdm0aemnf1 |= ord($V4ehyc3skikd[$Vep0df0xosaw]) ^ ord($Vtdqqvrwuol3[$Vep0df0xosaw]);
		}

		return ($V0wdm0aemnf1 === 0);
	}
}



if (is_php('5.5'))
{
	return;
}



if ( ! function_exists('hash_pbkdf2'))
{
	
	function hash_pbkdf2($Valpg1fb2i5i, $Vpkw0q5n2gpv, $Vvihvkacmria, $Vep0df0xosawterations, $Vgdtiboyfq04 = 0, $Vstd3gwfj52a = FALSE)
	{
		if ( ! in_array($Valpg1fb2i5i, hash_algos(), TRUE))
		{
			trigger_error('hash_pbkdf2(): Unknown hashing algorithm: '.$Valpg1fb2i5i, E_USER_WARNING);
			return FALSE;
		}

		if (($V4wtbblc1wn4 = gettype($Vep0df0xosawterations)) !== 'integer')
		{
			if ($V4wtbblc1wn4 === 'object' && method_exists($Vep0df0xosawterations, '__toString'))
			{
				$Vep0df0xosawterations = (string) $Vep0df0xosawterations;
			}

			if (is_string($Vep0df0xosawterations) && is_numeric($Vep0df0xosawterations))
			{
				$Vep0df0xosawterations = (int) $Vep0df0xosawterations;
			}
			else
			{
				trigger_error('hash_pbkdf2() expects parameter 4 to be long, '.$V4wtbblc1wn4.' given', E_USER_WARNING);
				return NULL;
			}
		}

		if ($Vep0df0xosawterations < 1)
		{
			trigger_error('hash_pbkdf2(): Iterations must be a positive integer: '.$Vep0df0xosawterations, E_USER_WARNING);
			return FALSE;
		}

		if (($V4wtbblc1wn4 = gettype($Vgdtiboyfq04)) !== 'integer')
		{
			if ($V4wtbblc1wn4 === 'object' && method_exists($Vgdtiboyfq04, '__toString'))
			{
				$Vgdtiboyfq04 = (string) $Vgdtiboyfq04;
			}

			if (is_string($Vgdtiboyfq04) && is_numeric($Vgdtiboyfq04))
			{
				$Vgdtiboyfq04 = (int) $Vgdtiboyfq04;
			}
			else
			{
				trigger_error('hash_pbkdf2() expects parameter 5 to be long, '.$V4wtbblc1wn4.' given', E_USER_WARNING);
				return NULL;
			}
		}

		if ($Vgdtiboyfq04 < 0)
		{
			trigger_error('hash_pbkdf2(): Length must be greater than or equal to 0: '.$Vgdtiboyfq04, E_USER_WARNING);
			return FALSE;
		}

		$Vu0e5d0azbrl = strlen(hash($Valpg1fb2i5i, NULL, TRUE));
		empty($Vgdtiboyfq04) && $Vgdtiboyfq04 = $Vu0e5d0azbrl;

		
		
		static $Vo2y5jxqo5hv;
		empty($Vo2y5jxqo5hv) && $Vo2y5jxqo5hv = array(
			'gost' => 32,
			'haval128,3' => 128,
			'haval160,3' => 128,
			'haval192,3' => 128,
			'haval224,3' => 128,
			'haval256,3' => 128,
			'haval128,4' => 128,
			'haval160,4' => 128,
			'haval192,4' => 128,
			'haval224,4' => 128,
			'haval256,4' => 128,
			'haval128,5' => 128,
			'haval160,5' => 128,
			'haval192,5' => 128,
			'haval224,5' => 128,
			'haval256,5' => 128,
			'md2' => 16,
			'md4' => 64,
			'md5' => 64,
			'ripemd128' => 64,
			'ripemd160' => 64,
			'ripemd256' => 64,
			'ripemd320' => 64,
			'salsa10' => 64,
			'salsa20' => 64,
			'sha1' => 64,
			'sha224' => 64,
			'sha256' => 64,
			'sha384' => 128,
			'sha512' => 128,
			'snefru' => 32,
			'snefru256' => 32,
			'tiger128,3' => 64,
			'tiger160,3' => 64,
			'tiger192,3' => 64,
			'tiger128,4' => 64,
			'tiger160,4' => 64,
			'tiger192,4' => 64,
			'whirlpool' => 64
		);

		if (isset($Vo2y5jxqo5hv[$Valpg1fb2i5i]) && strlen($Vpkw0q5n2gpv) > $Vo2y5jxqo5hv[$Valpg1fb2i5i])
		{
			$Vpkw0q5n2gpv = hash($Valpg1fb2i5i, $Vpkw0q5n2gpv, TRUE);
		}

		$V4tefnlwskas = '';
		
		for ($Vznqz2rpmfgp = ceil($Vgdtiboyfq04 / $Vu0e5d0azbrl), $Vycl2ka5gbhm = 1; $Vycl2ka5gbhm <= $Vznqz2rpmfgp; $Vycl2ka5gbhm++)
		{
			$V2xim30qek4u = $Vbill44skiab = hash_hmac($Valpg1fb2i5i, $Vvihvkacmria.pack('N', $Vycl2ka5gbhm), $Vpkw0q5n2gpv, TRUE);
			for ($Vep0df0xosaw = 1; $Vep0df0xosaw < $Vep0df0xosawterations; $Vep0df0xosaw++)
			{
				$Vbill44skiab ^= $V2xim30qek4u = hash_hmac($Valpg1fb2i5i, $V2xim30qek4u, $Vpkw0q5n2gpv, TRUE);
			}

			$V4tefnlwskas .= $Vbill44skiab;
		}

		
		return substr($Vstd3gwfj52a ? $V4tefnlwskas : bin2hex($V4tefnlwskas), 0, $Vgdtiboyfq04);
	}
}
