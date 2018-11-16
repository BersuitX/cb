<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if (is_php('5.5') OR ! is_php('5.3.7') OR ! defined('CRYPT_BLOWFISH') OR CRYPT_BLOWFISH !== 1 OR defined('HHVM_VERSION'))
{
	return;
}



defined('PASSWORD_BCRYPT') OR define('PASSWORD_BCRYPT', 1);
defined('PASSWORD_DEFAULT') OR define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);



if ( ! function_exists('password_get_info'))
{
	
	function password_get_info($V4tefnlwskas)
	{
		return (strlen($V4tefnlwskas) < 60 OR sscanf($V4tefnlwskas, '$2y$%d', $V4tefnlwskas) !== 1)
			? array('algo' => 0, 'algoName' => 'unknown', 'options' => array())
			: array('algo' => 1, 'algoName' => 'bcrypt', 'options' => array('cost' => $V4tefnlwskas));
	}
}



if ( ! function_exists('password_hash'))
{
	
	function password_hash($Vpkw0q5n2gpv, $Valpg1fb2i5i, array $V1flr55fnyyv = array())
	{
		static $Vcb0v3ffmryv;
		isset($Vcb0v3ffmryv) OR $Vcb0v3ffmryv = (extension_loaded('mbstring') && ini_get('mbstring.func_override'));

		if ($Valpg1fb2i5i !== 1)
		{
			trigger_error('password_hash(): Unknown hashing algorithm: '.(int) $Valpg1fb2i5i, E_USER_WARNING);
			return NULL;
		}

		if (isset($V1flr55fnyyv['cost']) && ($V1flr55fnyyv['cost'] < 4 OR $V1flr55fnyyv['cost'] > 31))
		{
			trigger_error('password_hash(): Invalid bcrypt cost parameter specified: '.(int) $V1flr55fnyyv['cost'], E_USER_WARNING);
			return NULL;
		}

		if (isset($V1flr55fnyyv['salt']) && ($V4rtm5rm1rbx = ($Vcb0v3ffmryv ? mb_strlen($V1flr55fnyyv['salt'], '8bit') : strlen($V1flr55fnyyv['salt']))) < 22)
		{
			trigger_error('password_hash(): Provided salt is too short: '.$V4rtm5rm1rbx.' expecting 22', E_USER_WARNING);
			return NULL;
		}
		elseif ( ! isset($V1flr55fnyyv['salt']))
		{
			if (defined('MCRYPT_DEV_URANDOM'))
			{
				$V1flr55fnyyv['salt'] = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
			}
			elseif (function_exists('openssl_random_pseudo_bytes'))
			{
				$V1flr55fnyyv['salt'] = openssl_random_pseudo_bytes(16);
			}
			elseif (DIRECTORY_SEPARATOR === '/' && (is_readable($Vf44nghjmyt2 = '/dev/arandom') OR is_readable($Vf44nghjmyt2 = '/dev/urandom')))
			{
				if (($Vzuexymrvrpz = fopen($Vf44nghjmyt2, 'rb')) === FALSE)
				{
					log_message('error', 'compat/password: Unable to open '.$Vf44nghjmyt2.' for reading.');
					return FALSE;
				}

				
				is_php('5.4') && stream_set_chunk_size($Vzuexymrvrpz, 16);

				$V1flr55fnyyv['salt'] = '';
				for ($Vg4dzkdbpvut = 0; $Vg4dzkdbpvut < 16; $Vg4dzkdbpvut = ($Vcb0v3ffmryv) ? mb_strlen($V1flr55fnyyv['salt'], '8bit') : strlen($V1flr55fnyyv['salt']))
				{
					if (($Vg4dzkdbpvut = fread($Vzuexymrvrpz, 16 - $Vg4dzkdbpvut)) === FALSE)
					{
						log_message('error', 'compat/password: Error while reading from '.$Vf44nghjmyt2.'.');
						return FALSE;
					}
					$V1flr55fnyyv['salt'] .= $Vg4dzkdbpvut;
				}

				fclose($Vzuexymrvrpz);
			}
			else
			{
				log_message('error', 'compat/password: No CSPRNG available.');
				return FALSE;
			}

			$V1flr55fnyyv['salt'] = str_replace('+', '.', rtrim(base64_encode($V1flr55fnyyv['salt']), '='));
		}
		elseif ( ! preg_match('#^[a-zA-Z0-9./]+$#D', $V1flr55fnyyv['salt']))
		{
			$V1flr55fnyyv['salt'] = str_replace('+', '.', rtrim(base64_encode($V1flr55fnyyv['salt']), '='));
		}

		isset($V1flr55fnyyv['cost']) OR $V1flr55fnyyv['cost'] = 10;

		return (strlen($Vpkw0q5n2gpv = crypt($Vpkw0q5n2gpv, sprintf('$2y$%02d$%s', $V1flr55fnyyv['cost'], $V1flr55fnyyv['salt']))) === 60)
			? $Vpkw0q5n2gpv
			: FALSE;
	}
}



if ( ! function_exists('password_needs_rehash'))
{
	
	function password_needs_rehash($V4tefnlwskas, $Valpg1fb2i5i, array $V1flr55fnyyv = array())
	{
		$V2fu10swij5z = password_get_info($V4tefnlwskas);

		if ($Valpg1fb2i5i !== $V2fu10swij5z['algo'])
		{
			return TRUE;
		}
		elseif ($Valpg1fb2i5i === 1)
		{
			$V1flr55fnyyv['cost'] = isset($V1flr55fnyyv['cost']) ? (int) $V1flr55fnyyv['cost'] : 10;
			return ($V2fu10swij5z['options']['cost'] !== $V1flr55fnyyv['cost']);
		}

		
		
		
		return FALSE;
	}
}



if ( ! function_exists('password_verify'))
{
	
	function password_verify($Vpkw0q5n2gpv, $V4tefnlwskas)
	{
		if (strlen($V4tefnlwskas) !== 60 OR strlen($Vpkw0q5n2gpv = crypt($Vpkw0q5n2gpv, $V4tefnlwskas)) !== 60)
		{
			return FALSE;
		}

		$Vroc4czumjyh = 0;
		for ($Vep0df0xosaw = 0; $Vep0df0xosaw < 60; $Vep0df0xosaw++)
		{
			$Vroc4czumjyh |= (ord($Vpkw0q5n2gpv[$Vep0df0xosaw]) ^ ord($V4tefnlwskas[$Vep0df0xosaw]));
		}

		return ($Vroc4czumjyh === 0);
	}
}
