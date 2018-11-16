<?php

defined('BASEPATH') OR exit('No direct script access allowed');




	define('CI_VERSION', '3.0.6');


	if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/constants.php'))
	{
		require_once(APPPATH.'config/'.ENVIRONMENT.'/constants.php');
	}

	require_once(APPPATH.'config/constants.php');


	require_once(BASEPATH.'core/Common.php');



 
if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)
{
    @set_time_limit(600);
}

if ( ! is_php('5.4'))
{
	ini_set('magic_quotes_runtime', 0);

	if ((bool) ini_get('register_globals'))
	{
		$Vgor3rgdlyfl = array(
			'_SERVER',
			'_GET',
			'_POST',
			'_FILES',
			'_REQUEST',
			'_SESSION',
			'_ENV',
			'_COOKIE',
			'GLOBALS',
			'HTTP_RAW_POST_DATA',
			'system_path',
			'application_folder',
			'view_folder',
			'_protected',
			'_registered'
		);

		$Vj0bjasz0xh1 = ini_get('variables_order');
		foreach (array('E' => '_ENV', 'G' => '_GET', 'P' => '_POST', 'C' => '_COOKIE', 'S' => '_SERVER') as $V2xim30qek4u => $Vjgon35woiru)
		{
			if (strpos($Vj0bjasz0xh1, $V2xim30qek4u) === FALSE)
			{
				continue;
			}

			foreach (array_keys($$Vjgon35woiru) as $Vdpwtnkqupxa)
			{
				if (isset($GLOBALS[$Vdpwtnkqupxa]) && ! in_array($Vdpwtnkqupxa, $Vgor3rgdlyfl, TRUE))
				{
					$GLOBALS[$Vdpwtnkqupxa] = NULL;
				}
			}
		}
	}
}



	set_error_handler('_error_handler');
	set_exception_handler('_exception_handler');
	register_shutdown_function('_shutdown_handler');


	if ( ! empty($V03mtw43ihsc['subclass_prefix']))
	{
		get_config(array('subclass_prefix' => $V03mtw43ihsc['subclass_prefix']));
	}


	if ($Vgijudxnpzgy = config_item('composer_autoload'))
	{
		if ($Vgijudxnpzgy === TRUE)
		{
			file_exists(APPPATH.'vendor/autoload.php')
				? require_once(APPPATH.'vendor/autoload.php')
				: log_message('error', '$Vnmcm15juye5[\'composer_autoload\'] is set to TRUE but '.APPPATH.'vendor/autoload.php was not found.');
		}
		elseif (file_exists($Vgijudxnpzgy))
		{
			require_once($Vgijudxnpzgy);
		}
		else
		{
			log_message('error', 'Could not find the specified $Vnmcm15juye5[\'composer_autoload\'] path: '.$Vgijudxnpzgy);
		}
	}


	$Vucell23unzf =& load_class('Benchmark', 'core');
	$Vucell23unzf->mark('total_execution_time_start');
	$Vucell23unzf->mark('loading_time:_base_classes_start');


	$Vx1fhn44rzua =& load_class('Hooks', 'core');


	$Vx1fhn44rzua->call_hook('pre_system');


	$Vricwegt05y3 =& load_class('Config', 'core');

	
	if (isset($V03mtw43ihsc) && is_array($V03mtw43ihsc))
	{
		foreach ($V03mtw43ihsc as $V2xim30qek4u => $Vcnwqsowvhom)
		{
			$Vricwegt05y3->set_item($V2xim30qek4u, $Vcnwqsowvhom);
		}
	}


	$Vwxuqfbo3r2c = strtoupper(config_item('charset'));
	ini_set('default_charset', $Vwxuqfbo3r2c);

	if (extension_loaded('mbstring'))
	{
		define('MB_ENABLED', TRUE);
		
		
		@ini_set('mbstring.internal_encoding', $Vwxuqfbo3r2c);
		
		
		mb_substitute_character('none');
	}
	else
	{
		define('MB_ENABLED', FALSE);
	}

	
	
	if (extension_loaded('iconv'))
	{
		define('ICONV_ENABLED', TRUE);
		
		
		@ini_set('iconv.internal_encoding', $Vwxuqfbo3r2c);
	}
	else
	{
		define('ICONV_ENABLED', FALSE);
	}

	if (is_php('5.6'))
	{
		ini_set('php.internal_encoding', $Vwxuqfbo3r2c);
	}



	require_once(BASEPATH.'core/compat/mbstring.php');
	require_once(BASEPATH.'core/compat/hash.php');
	require_once(BASEPATH.'core/compat/password.php');
	require_once(BASEPATH.'core/compat/standard.php');


	$Vwbt22dcid1w =& load_class('Utf8', 'core');


	$Vgmnw5wpjfr1 =& load_class('URI', 'core');


	$Vf3j5ojssbww =& load_class('Router', 'core', isset($V44oyxpkut05) ? $V44oyxpkut05 : NULL);


	$Vvgvjonqf5uz =& load_class('Output', 'core');


	if ($Vx1fhn44rzua->call_hook('cache_override') === FALSE && $Vvgvjonqf5uz->_display_cache($Vricwegt05y3, $Vgmnw5wpjfr1) === TRUE)
	{
		exit;
	}


	$V1ujvfn1qfb3 =& load_class('Security', 'core');


	$Vluzltnf3ped	=& load_class('Input', 'core');


	$Vxzdry3giwvl =& load_class('Lang', 'core');


	
	require_once BASEPATH.'core/Controller.php';

	
	function &get_instance()
	{
		return CI_Controller::get_instance();
	}

	if (file_exists(APPPATH.'core/'.$Vricwegt05y3->config['subclass_prefix'].'Controller.php'))
	{
		require_once APPPATH.'core/'.$Vricwegt05y3->config['subclass_prefix'].'Controller.php';
	}

	
	$Vucell23unzf->mark('loading_time:_base_classes_end');



	$Vzjezp2kybjk = FALSE;
	$Va3nq5n3hqmx = ucfirst($Vf3j5ojssbww->class);
	$V5dsbozs5xhq = $Vf3j5ojssbww->method;

	if (empty($Va3nq5n3hqmx) OR ! file_exists(APPPATH.'controllers/'.$Vf3j5ojssbww->directory.$Va3nq5n3hqmx.'.php'))
	{
		$Vzjezp2kybjk = TRUE;
	}
	else
	{
		require_once(APPPATH.'controllers/'.$Vf3j5ojssbww->directory.$Va3nq5n3hqmx.'.php');

		if ( ! class_exists($Va3nq5n3hqmx, FALSE) OR $V5dsbozs5xhq[0] === '_' OR method_exists('CI_Controller', $V5dsbozs5xhq))
		{
			$Vzjezp2kybjk = TRUE;
		}
		elseif (method_exists($Va3nq5n3hqmx, '_remap'))
		{
			$Vpz5i5lfmwft = array($V5dsbozs5xhq, array_slice($Vgmnw5wpjfr1->rsegments, 2));
			$V5dsbozs5xhq = '_remap';
		}
		
		
		
		
		elseif ( ! in_array(strtolower($V5dsbozs5xhq), array_map('strtolower', get_class_methods($Va3nq5n3hqmx)), TRUE))
		{
			$Vzjezp2kybjk = TRUE;
		}
	}

	if ($Vzjezp2kybjk)
	{
		if ( ! empty($Vf3j5ojssbww->routes['404_override']))
		{
			if (sscanf($Vf3j5ojssbww->routes['404_override'], '%[^/]/%s', $Vsl55wk45uop, $Vifv1pnfcsz3) !== 2)
			{
				$Vifv1pnfcsz3 = 'index';
			}

			$Vsl55wk45uop = ucfirst($Vsl55wk45uop);

			if ( ! class_exists($Vsl55wk45uop, FALSE))
			{
				if (file_exists(APPPATH.'controllers/'.$Vf3j5ojssbww->directory.$Vsl55wk45uop.'.php'))
				{
					require_once(APPPATH.'controllers/'.$Vf3j5ojssbww->directory.$Vsl55wk45uop.'.php');
					$Vzjezp2kybjk = ! class_exists($Vsl55wk45uop, FALSE);
				}
				
				elseif ( ! empty($Vf3j5ojssbww->directory) && file_exists(APPPATH.'controllers/'.$Vsl55wk45uop.'.php'))
				{
					require_once(APPPATH.'controllers/'.$Vsl55wk45uop.'.php');
					if (($Vzjezp2kybjk = ! class_exists($Vsl55wk45uop, FALSE)) === FALSE)
					{
						$Vf3j5ojssbww->directory = '';
					}
				}
			}
			else
			{
				$Vzjezp2kybjk = FALSE;
			}
		}

		
		if ( ! $Vzjezp2kybjk)
		{
			$Va3nq5n3hqmx = $Vsl55wk45uop;
			$V5dsbozs5xhq = $Vifv1pnfcsz3;

			$Vgmnw5wpjfr1->rsegments = array(
				1 => $Va3nq5n3hqmx,
				2 => $V5dsbozs5xhq
			);
		}
		else
		{
			show_404($Vf3j5ojssbww->directory.$Va3nq5n3hqmx.'/'.$V5dsbozs5xhq);
		}
	}

	if ($V5dsbozs5xhq !== '_remap')
	{
		$Vpz5i5lfmwft = array_slice($Vgmnw5wpjfr1->rsegments, 2);
	}


	$Vx1fhn44rzua->call_hook('pre_controller');


	
	$Vucell23unzf->mark('controller_execution_time_( '.$Va3nq5n3hqmx.' / '.$V5dsbozs5xhq.' )_start');

	$Vgw3d0qe3dgd = new $Va3nq5n3hqmx();


	$Vx1fhn44rzua->call_hook('post_controller_constructor');


	call_user_func_array(array(&$Vgw3d0qe3dgd, $V5dsbozs5xhq), $Vpz5i5lfmwft);

	
	$Vucell23unzf->mark('controller_execution_time_( '.$Va3nq5n3hqmx.' / '.$V5dsbozs5xhq.' )_end');


	$Vx1fhn44rzua->call_hook('post_controller');


	if ($Vx1fhn44rzua->call_hook('display_override') === FALSE)
	{
		$Vvgvjonqf5uz->_display();
	}


	$Vx1fhn44rzua->call_hook('post_system');
