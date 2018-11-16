<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('is_php'))
{
	
	function is_php($Vfrz01we23rs)
	{
		static $V4li3k14cu30;
		$Vfrz01we23rs = (string) $Vfrz01we23rs;

		if ( ! isset($V4li3k14cu30[$Vfrz01we23rs]))
		{
			$V4li3k14cu30[$Vfrz01we23rs] = version_compare(PHP_VERSION, $Vfrz01we23rs, '>=');
		}

		return $V4li3k14cu30[$Vfrz01we23rs];
	}
}



if ( ! function_exists('is_really_writable'))
{
	
	function is_really_writable($Vligofq0fb34)
	{
		
		if (DIRECTORY_SEPARATOR === '/' && (is_php('5.4') OR ! ini_get('safe_mode')))
		{
			return is_writable($Vligofq0fb34);
		}

		
		if (is_dir($Vligofq0fb34))
		{
			$Vligofq0fb34 = rtrim($Vligofq0fb34, '/').'/'.md5(mt_rand());
			if (($Vzuexymrvrpz = @fopen($Vligofq0fb34, 'ab')) === FALSE)
			{
				return FALSE;
			}

			fclose($Vzuexymrvrpz);
			@chmod($Vligofq0fb34, 0777);
			@unlink($Vligofq0fb34);
			return TRUE;
		}
		elseif ( ! is_file($Vligofq0fb34) OR ($Vzuexymrvrpz = @fopen($Vligofq0fb34, 'ab')) === FALSE)
		{
			return FALSE;
		}

		fclose($Vzuexymrvrpz);
		return TRUE;
	}
}



if ( ! function_exists('load_class'))
{
	
	function &load_class($Va3nq5n3hqmx, $V1zlhujai52g = 'libraries', $Vtij4wo4sgso = NULL)
	{
		static $V5fuznwp5fjj = array();

		
		if (isset($V5fuznwp5fjj[$Va3nq5n3hqmx]))
		{
			return $V5fuznwp5fjj[$Va3nq5n3hqmx];
		}

		$Vaclaigdbtoo = FALSE;

		
		
		foreach (array(APPPATH, BASEPATH) as $Vcmaitbcbmmk)
		{
			if (file_exists($Vcmaitbcbmmk.$V1zlhujai52g.'/'.$Va3nq5n3hqmx.'.php'))
			{
				$Vaclaigdbtoo = 'CI_'.$Va3nq5n3hqmx;

				if (class_exists($Vaclaigdbtoo, FALSE) === FALSE)
				{
					require_once($Vcmaitbcbmmk.$V1zlhujai52g.'/'.$Va3nq5n3hqmx.'.php');
				}

				break;
			}
		}

		
		if (file_exists(APPPATH.$V1zlhujai52g.'/'.config_item('subclass_prefix').$Va3nq5n3hqmx.'.php'))
		{
			$Vaclaigdbtoo = config_item('subclass_prefix').$Va3nq5n3hqmx;

			if (class_exists($Vaclaigdbtoo, FALSE) === FALSE)
			{
				require_once(APPPATH.$V1zlhujai52g.'/'.$Vaclaigdbtoo.'.php');
			}
		}

		
		if ($Vaclaigdbtoo === FALSE)
		{
			
			
			set_status_header(503);
			echo 'Unable to locate the specified class: '.$Va3nq5n3hqmx.'.php';
			exit(5); 
		}

		
		is_loaded($Va3nq5n3hqmx);

		$V5fuznwp5fjj[$Va3nq5n3hqmx] = isset($Vtij4wo4sgso)
			? new $Vaclaigdbtoo($Vtij4wo4sgso)
			: new $Vaclaigdbtoo();
		return $V5fuznwp5fjj[$Va3nq5n3hqmx];
	}
}



if ( ! function_exists('is_loaded'))
{
	
	function &is_loaded($Va3nq5n3hqmx = '')
	{
		static $Vpgbrylhy2tu = array();

		if ($Va3nq5n3hqmx !== '')
		{
			$Vpgbrylhy2tu[strtolower($Va3nq5n3hqmx)] = $Va3nq5n3hqmx;
		}

		return $Vpgbrylhy2tu;
	}
}



if ( ! function_exists('get_config'))
{
	
	function &get_config(Array $Vfx40ovsdrwf = array())
	{
		static $Vnmcm15juye5;

		if (empty($Vnmcm15juye5))
		{
			$Vligofq0fb34_path = APPPATH.'config/config.php';
			$Vxk5dnosyklz = FALSE;
			if (file_exists($Vligofq0fb34_path))
			{
				$Vxk5dnosyklz = TRUE;
				require($Vligofq0fb34_path);
			}

			
			if (file_exists($Vligofq0fb34_path = APPPATH.'config/'.ENVIRONMENT.'/config.php'))
			{
				require($Vligofq0fb34_path);
			}
			elseif ( ! $Vxk5dnosyklz)
			{
				set_status_header(503);
				echo 'The configuration file does not exist.';
				exit(3); 
			}

			
			if ( ! isset($Vnmcm15juye5) OR ! is_array($Vnmcm15juye5))
			{
				set_status_header(503);
				echo 'Your config file does not appear to be formatted correctly.';
				exit(3); 
			}
		}

		
		foreach ($Vfx40ovsdrwf as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vnmcm15juye5[$V2xim30qek4u] = $Va4zo0rltynr;
		}

		return $Vnmcm15juye5;
	}
}



if ( ! function_exists('config_item'))
{
	
	function config_item($Vutaiebycwbq)
	{
		static $Vxqclttgjl02;

		if (empty($Vxqclttgjl02))
		{
			
			$Vxqclttgjl02[0] =& get_config();
		}

		return isset($Vxqclttgjl02[0][$Vutaiebycwbq]) ? $Vxqclttgjl02[0][$Vutaiebycwbq] : NULL;
	}
}



if ( ! function_exists('get_mimes'))
{
	
	function &get_mimes()
	{
		static $Vylhpfeahhws;

		if (empty($Vylhpfeahhws))
		{
			if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/mimes.php'))
			{
				$Vylhpfeahhws = include(APPPATH.'config/'.ENVIRONMENT.'/mimes.php');
			}
			elseif (file_exists(APPPATH.'config/mimes.php'))
			{
				$Vylhpfeahhws = include(APPPATH.'config/mimes.php');
			}
			else
			{
				$Vylhpfeahhws = array();
			}
		}

		return $Vylhpfeahhws;
	}
}



if ( ! function_exists('is_https'))
{
	
	function is_https()
	{
		if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
		{
			return TRUE;
		}
		elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
		{
			return TRUE;
		}
		elseif ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')
		{
			return TRUE;
		}

		return FALSE;
	}
}



if ( ! function_exists('is_cli'))
{

	
	function is_cli()
	{
		return (PHP_SAPI === 'cli' OR defined('STDIN'));
	}
}



if ( ! function_exists('show_error'))
{
	
	function show_error($V15xvmvzbb0h, $Vbfcjjiwd22q = 500, $Vcuptk31tst0 = 'An Error Was Encountered')
	{
		$Vbfcjjiwd22q = abs($Vbfcjjiwd22q);
		if ($Vbfcjjiwd22q < 100)
		{
			$Vppizezsng1e = $Vbfcjjiwd22q + 9; 
			if ($Vppizezsng1e > 125) 
			{
				$Vppizezsng1e = 1; 
			}

			$Vbfcjjiwd22q = 500;
		}
		else
		{
			$Vppizezsng1e = 1; 
		}

		$Vu0e0ptdtsbt =& load_class('Exceptions', 'core');
		echo $Vu0e0ptdtsbt->show_error($Vcuptk31tst0, $V15xvmvzbb0h, 'error_general', $Vbfcjjiwd22q);
		exit($Vppizezsng1e);
	}
}



if ( ! function_exists('show_404'))
{
	
	function show_404($Vmmu1rzhh3cw = '', $Vvrvvv0v11qv = TRUE)
	{
		$Vu0e0ptdtsbt =& load_class('Exceptions', 'core');
		$Vu0e0ptdtsbt->show_404($Vmmu1rzhh3cw, $Vvrvvv0v11qv);
		exit(4); 
	}
}



if ( ! function_exists('log_message'))
{
	
	function log_message($Vfy3tdxkf42p, $V15xvmvzbb0h)
	{
		static $V5v3nj332grg;

		if ($V5v3nj332grg === NULL)
		{
			
			$V5v3nj332grg[0] =& load_class('Log', 'core');
		}

		$V5v3nj332grg[0]->write_log($Vfy3tdxkf42p, $V15xvmvzbb0h);
	}
}



if ( ! function_exists('set_status_header'))
{
	
	function set_status_header($V1fd2lg1unl2 = 200, $Vfh2utbqjg5e = '')
	{
		if (is_cli())
		{
			return;
		}

		if (empty($V1fd2lg1unl2) OR ! is_numeric($V1fd2lg1unl2))
		{
			show_error('Status codes must be numeric', 500);
		}

		if (empty($Vfh2utbqjg5e))
		{
			is_int($V1fd2lg1unl2) OR $V1fd2lg1unl2 = (int) $V1fd2lg1unl2;
			$Vhiwjnevmqph = array(
				100	=> 'Continue',
				101	=> 'Switching Protocols',

				200	=> 'OK',
				201	=> 'Created',
				202	=> 'Accepted',
				203	=> 'Non-Authoritative Information',
				204	=> 'No Content',
				205	=> 'Reset Content',
				206	=> 'Partial Content',

				300	=> 'Multiple Choices',
				301	=> 'Moved Permanently',
				302	=> 'Found',
				303	=> 'See Other',
				304	=> 'Not Modified',
				305	=> 'Use Proxy',
				307	=> 'Temporary Redirect',

				400	=> 'Bad Request',
				401	=> 'Unauthorized',
				402	=> 'Payment Required',
				403	=> 'Forbidden',
				404	=> 'Not Found',
				405	=> 'Method Not Allowed',
				406	=> 'Not Acceptable',
				407	=> 'Proxy Authentication Required',
				408	=> 'Request Timeout',
				409	=> 'Conflict',
				410	=> 'Gone',
				411	=> 'Length Required',
				412	=> 'Precondition Failed',
				413	=> 'Request Entity Too Large',
				414	=> 'Request-URI Too Long',
				415	=> 'Unsupported Media Type',
				416	=> 'Requested Range Not Satisfiable',
				417	=> 'Expectation Failed',
				422	=> 'Unprocessable Entity',

				500	=> 'Internal Server Error',
				501	=> 'Not Implemented',
				502	=> 'Bad Gateway',
				503	=> 'Service Unavailable',
				504	=> 'Gateway Timeout',
				505	=> 'HTTP Version Not Supported'
			);

			if (isset($Vhiwjnevmqph[$V1fd2lg1unl2]))
			{
				$Vfh2utbqjg5e = $Vhiwjnevmqph[$V1fd2lg1unl2];
			}
			else
			{
				show_error('No status text available. Please check your status code number or supply your own message text.', 500);
			}
		}

		if (strpos(PHP_SAPI, 'cgi') === 0)
		{
			header('Status: '.$V1fd2lg1unl2.' '.$Vfh2utbqjg5e, TRUE);
		}
		else
		{
			$V2g3s5zxnwzh = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
			header($V2g3s5zxnwzh.' '.$V1fd2lg1unl2.' '.$Vfh2utbqjg5e, TRUE, $V1fd2lg1unl2);
		}
	}
}



if ( ! function_exists('_error_handler'))
{
	
	function _error_handler($Vgz2c4ocyllo, $V15xvmvzbb0h, $Vligofq0fb34path, $Vcfdirgq3swa)
	{
		$Vbz1dape1xvo = (((E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR | E_USER_ERROR) & $Vgz2c4ocyllo) === $Vgz2c4ocyllo);

		
		
		
		
		
		
		if ($Vbz1dape1xvo)
		{
			set_status_header(500);
		}

		
		
		if (($Vgz2c4ocyllo & error_reporting()) !== $Vgz2c4ocyllo)
		{
			return;
		}

		$Vu0e0ptdtsbt =& load_class('Exceptions', 'core');
		$Vu0e0ptdtsbt->log_exception($Vgz2c4ocyllo, $V15xvmvzbb0h, $Vligofq0fb34path, $Vcfdirgq3swa);

		
		if (str_ireplace(array('off', 'none', 'no', 'false', 'null'), '', ini_get('display_errors')))
		{
			$Vu0e0ptdtsbt->show_php_error($Vgz2c4ocyllo, $V15xvmvzbb0h, $Vligofq0fb34path, $Vcfdirgq3swa);
		}

		
		
		
		if ($Vbz1dape1xvo)
		{
			exit(1); 
		}
	}
}



if ( ! function_exists('_exception_handler'))
{
	
	function _exception_handler($Vvz3bsiw0khw)
	{
		$Vu0e0ptdtsbt =& load_class('Exceptions', 'core');
		$Vu0e0ptdtsbt->log_exception('error', 'Exception: '.$Vvz3bsiw0khw->getMessage(), $Vvz3bsiw0khw->getFile(), $Vvz3bsiw0khw->getLine());

		
		if (str_ireplace(array('off', 'none', 'no', 'false', 'null'), '', ini_get('display_errors')))
		{
			$Vu0e0ptdtsbt->show_exception($Vvz3bsiw0khw);
		}

		exit(1); 
	}
}



if ( ! function_exists('_shutdown_handler'))
{
	
	function _shutdown_handler()
	{
		$Vmfqxyu21yo2 = error_get_last();
		if (isset($Vmfqxyu21yo2) &&
			($Vmfqxyu21yo2['type'] & (E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING)))
		{
			_error_handler($Vmfqxyu21yo2['type'], $Vmfqxyu21yo2['message'], $Vmfqxyu21yo2['file'], $Vmfqxyu21yo2['line']);
		}
	}
}



if ( ! function_exists('remove_invisible_characters'))
{
	
	function remove_invisible_characters($Vssdjb5oqaky, $Vja1l0as5a32 = TRUE)
	{
		$Vxim3pmzzree = array();

		
		
		if ($Vja1l0as5a32)
		{
			$Vxim3pmzzree[] = '/%0[0-8bcef]/';	
			$Vxim3pmzzree[] = '/%1[0-9a-f]/';	
		}

		$Vxim3pmzzree[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';	

		do
		{
			$Vssdjb5oqaky = preg_replace($Vxim3pmzzree, '', $Vssdjb5oqaky, -1, $V2jbvukjonhh);
		}
		while ($V2jbvukjonhh);

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('html_escape'))
{
	
	function html_escape($Vdpwtnkqupxa, $Vvpr1k0nqr53 = TRUE)
	{
		if (empty($Vdpwtnkqupxa))
		{
			return $Vdpwtnkqupxa;
		}

		if (is_array($Vdpwtnkqupxa))
		{
			foreach (array_keys($Vdpwtnkqupxa) as $V2xim30qek4u)
			{
				$Vdpwtnkqupxa[$V2xim30qek4u] = html_escape($Vdpwtnkqupxa[$V2xim30qek4u], $Vvpr1k0nqr53);
			}

			return $Vdpwtnkqupxa;
		}

		return htmlspecialchars($Vdpwtnkqupxa, ENT_QUOTES, config_item('charset'), $Vvpr1k0nqr53);
	}
}



if ( ! function_exists('_stringify_attributes'))
{
	
	function _stringify_attributes($Vpkjdumwo4xn, $Vvml5dwxipxs = FALSE)
	{
		$Vbauiprnmvgf = NULL;

		if (empty($Vpkjdumwo4xn))
		{
			return $Vbauiprnmvgf;
		}

		if (is_string($Vpkjdumwo4xn))
		{
			return ' '.$Vpkjdumwo4xn;
		}

		$Vpkjdumwo4xn = (array) $Vpkjdumwo4xn;

		foreach ($Vpkjdumwo4xn as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vbauiprnmvgf .= ($Vvml5dwxipxs) ? $V2xim30qek4u.'='.$Va4zo0rltynr.',' : ' '.$V2xim30qek4u.'="'.$Va4zo0rltynr.'"';
		}

		return rtrim($Vbauiprnmvgf, ',');
	}
}



if ( ! function_exists('function_usable'))
{
	
	function function_usable($Vezpcdvdihrx)
	{
		static $V234ypqqjqtx;

		if (function_exists($Vezpcdvdihrx))
		{
			if ( ! isset($V234ypqqjqtx))
			{
				$V234ypqqjqtx = extension_loaded('suhosin')
					? explode(',', trim(ini_get('suhosin.executor.func.blacklist')))
					: array();
			}

			return ! in_array($Vezpcdvdihrx, $V234ypqqjqtx, TRUE);
		}

		return FALSE;
	}
}
