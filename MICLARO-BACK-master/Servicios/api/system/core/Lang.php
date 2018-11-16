<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Lang {

	
	public $V2rlwdemuhq5 =	array();

	
	public $Vovatdfmsqln =	array();

	
	public function __construct()
	{
		log_message('info', 'Language Class Initialized');
	}

	

	
	public function load($Vel2htarmt2y, $Vne10o1pdhda = '', $Vb5hjbk2mbwk = FALSE, $V1fpez23dwvk = TRUE, $V5fa3x32m5y2 = '')
	{
		if (is_array($Vel2htarmt2y))
		{
			foreach ($Vel2htarmt2y as $Vcnwqsowvhom)
			{
				$this->load($Vcnwqsowvhom, $Vne10o1pdhda, $Vb5hjbk2mbwk, $V1fpez23dwvk, $V5fa3x32m5y2);
			}

			return;
		}

		$Vel2htarmt2y = str_replace('.php', '', $Vel2htarmt2y);

		if ($V1fpez23dwvk === TRUE)
		{
			$Vel2htarmt2y = preg_replace('/_lang$/', '', $Vel2htarmt2y).'_lang';
		}

		$Vel2htarmt2y .= '.php';

		if (empty($Vne10o1pdhda) OR ! preg_match('/^[a-z_-]+$/i', $Vne10o1pdhda))
		{
			$Vnmcm15juye5 =& get_config();
			$Vne10o1pdhda = empty($Vnmcm15juye5['language']) ? 'english' : $Vnmcm15juye5['language'];
		}

		if ($Vb5hjbk2mbwk === FALSE && isset($this->is_loaded[$Vel2htarmt2y]) && $this->is_loaded[$Vel2htarmt2y] === $Vne10o1pdhda)
		{
			return;
		}

		
		$Vunqhxwf4ryy = BASEPATH.'language/'.$Vne10o1pdhda.'/'.$Vel2htarmt2y;
		if (($Vxk5dnosyklz = file_exists($Vunqhxwf4ryy)) === TRUE)
		{
			include($Vunqhxwf4ryy);
		}

		
		if ($V5fa3x32m5y2 !== '')
		{
			$V5fa3x32m5y2 .= 'language/'.$Vne10o1pdhda.'/'.$Vel2htarmt2y;
			if (file_exists($V5fa3x32m5y2))
			{
				include($V5fa3x32m5y2);
				$Vxk5dnosyklz = TRUE;
			}
		}
		else
		{
			foreach (get_instance()->load->get_package_paths(TRUE) as $Vtrusxprkqvs)
			{
				$Vtrusxprkqvs .= 'language/'.$Vne10o1pdhda.'/'.$Vel2htarmt2y;
				if ($Vunqhxwf4ryy !== $Vtrusxprkqvs && file_exists($Vtrusxprkqvs))
				{
					include($Vtrusxprkqvs);
					$Vxk5dnosyklz = TRUE;
					break;
				}
			}
		}

		if ($Vxk5dnosyklz !== TRUE)
		{
			show_error('Unable to load the requested language file: language/'.$Vne10o1pdhda.'/'.$Vel2htarmt2y);
		}

		if ( ! isset($V0epxtzjncyc) OR ! is_array($V0epxtzjncyc))
		{
			log_message('error', 'Language file contains no data: language/'.$Vne10o1pdhda.'/'.$Vel2htarmt2y);

			if ($Vb5hjbk2mbwk === TRUE)
			{
				return array();
			}
			return;
		}

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return $V0epxtzjncyc;
		}

		$this->is_loaded[$Vel2htarmt2y] = $Vne10o1pdhda;
		$this->language = array_merge($this->language, $V0epxtzjncyc);

		log_message('info', 'Language file loaded: language/'.$Vne10o1pdhda.'/'.$Vel2htarmt2y);
		return TRUE;
	}

	

	
	public function line($Vcfdirgq3swa, $Vch5dw2zx02v = TRUE)
	{
		$Vcnwqsowvhom = isset($this->language[$Vcfdirgq3swa]) ? $this->language[$Vcfdirgq3swa] : FALSE;

		
		if ($Vcnwqsowvhom === FALSE && $Vch5dw2zx02v === TRUE)
		{
			log_message('error', 'Could not find the language line "'.$Vcfdirgq3swa.'"');
		}

		return $Vcnwqsowvhom;
	}

}
