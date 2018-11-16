<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if (MB_ENABLED === TRUE)
{
	return;
}



if ( ! function_exists('mb_strlen'))
{
	
	function mb_strlen($Vssdjb5oqaky, $Vmvvc44ivjlm = NULL)
	{
		if (ICONV_ENABLED === TRUE)
		{
			return iconv_strlen($Vssdjb5oqaky, isset($Vmvvc44ivjlm) ? $Vmvvc44ivjlm : config_item('charset'));
		}

		log_message('debug', 'Compatibility (mbstring): iconv_strlen() is not available, falling back to strlen().');
		return strlen($Vssdjb5oqaky);
	}
}



if ( ! function_exists('mb_strpos'))
{
	
	function mb_strpos($Vptxr2xp44ma, $Vbkdm30301sy, $Vzawlyjaf5xg = 0, $Vmvvc44ivjlm = NULL)
	{
		if (ICONV_ENABLED === TRUE)
		{
			return iconv_strpos($Vptxr2xp44ma, $Vbkdm30301sy, $Vzawlyjaf5xg, isset($Vmvvc44ivjlm) ? $Vmvvc44ivjlm : config_item('charset'));
		}

		log_message('debug', 'Compatibility (mbstring): iconv_strpos() is not available, falling back to strpos().');
		return strpos($Vptxr2xp44ma, $Vbkdm30301sy, $Vzawlyjaf5xg);
	}
}



if ( ! function_exists('mb_substr'))
{
	
	function mb_substr($Vssdjb5oqaky, $Vojpgbidgjzg, $Vgdtiboyfq04 = NULL, $Vmvvc44ivjlm = NULL)
	{
		if (ICONV_ENABLED === TRUE)
		{
			isset($Vmvvc44ivjlm) OR $Vmvvc44ivjlm = config_item('charset');
			return iconv_substr(
				$Vssdjb5oqaky,
				$Vojpgbidgjzg,
				isset($Vgdtiboyfq04) ? $Vgdtiboyfq04 : iconv_strlen($Vssdjb5oqaky, $Vmvvc44ivjlm), 
				$Vmvvc44ivjlm
			);
		}

		log_message('debug', 'Compatibility (mbstring): iconv_substr() is not available, falling back to substr().');
		return isset($Vgdtiboyfq04)
			? substr($Vssdjb5oqaky, $Vojpgbidgjzg, $Vgdtiboyfq04)
			: substr($Vssdjb5oqaky, $Vojpgbidgjzg);
	}
}
