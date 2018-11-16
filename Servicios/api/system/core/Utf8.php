<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Utf8 {

	
	public function __construct()
	{
		if (
			defined('PREG_BAD_UTF8_ERROR')				
			&& (ICONV_ENABLED === TRUE OR MB_ENABLED === TRUE)	
			&& strtoupper(config_item('charset')) === 'UTF-8'	
			)
		{
			define('UTF8_ENABLED', TRUE);
			log_message('debug', 'UTF-8 Support Enabled');
		}
		else
		{
			define('UTF8_ENABLED', FALSE);
			log_message('debug', 'UTF-8 Support Disabled');
		}

		log_message('info', 'Utf8 Class Initialized');
	}

	

	
	public function clean_string($Vssdjb5oqaky)
	{
		if ($this->is_ascii($Vssdjb5oqaky) === FALSE)
		{
			if (MB_ENABLED)
			{
				$Vssdjb5oqaky = mb_convert_encoding($Vssdjb5oqaky, 'UTF-8', 'UTF-8');
			}
			elseif (ICONV_ENABLED)
			{
				$Vssdjb5oqaky = @iconv('UTF-8', 'UTF-8//IGNORE', $Vssdjb5oqaky);
			}
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function safe_ascii_for_xml($Vssdjb5oqaky)
	{
		return remove_invisible_characters($Vssdjb5oqaky, FALSE);
	}

	

	
	public function convert_to_utf8($Vssdjb5oqaky, $Vmvvc44ivjlm)
	{
		if (MB_ENABLED)
		{
			return mb_convert_encoding($Vssdjb5oqaky, 'UTF-8', $Vmvvc44ivjlm);
		}
		elseif (ICONV_ENABLED)
		{
			return @iconv($Vmvvc44ivjlm, 'UTF-8', $Vssdjb5oqaky);
		}

		return FALSE;
	}

	

	
	public function is_ascii($Vssdjb5oqaky)
	{
		return (preg_match('/[^\x00-\x7F]/S', $Vssdjb5oqaky) === 0);
	}

}
