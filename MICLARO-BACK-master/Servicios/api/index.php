<?php



	define('ENVIRONMENT', 'production');


switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); 
}


	$Vzhi4dyojnjo = 'system';


	$V11pzyibjrvt = 'application';


	$Vhs0z1ovfvyt = '';



	
	
	

	
	

	
	



	









	
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (($Vjsnlmrco1mg = realpath($Vzhi4dyojnjo)) !== FALSE)
	{
		$Vzhi4dyojnjo = $Vjsnlmrco1mg.DIRECTORY_SEPARATOR;
	}
	else
	{
		
		$Vzhi4dyojnjo = strtr(
			rtrim($Vzhi4dyojnjo, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		).DIRECTORY_SEPARATOR;
	}

	
	if ( ! is_dir($Vzhi4dyojnjo))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); 
	}


	
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	
	define('BASEPATH', $Vzhi4dyojnjo);

	
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

	
	define('SYSDIR', basename(BASEPATH));

	
	if (is_dir($V11pzyibjrvt))
	{
		if (($Vjsnlmrco1mg = realpath($V11pzyibjrvt)) !== FALSE)
		{
			$V11pzyibjrvt = $Vjsnlmrco1mg;
		}
		else
		{
			$V11pzyibjrvt = strtr(
				rtrim($V11pzyibjrvt, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(BASEPATH.$V11pzyibjrvt.DIRECTORY_SEPARATOR))
	{
		$V11pzyibjrvt = BASEPATH.strtr(
			trim($V11pzyibjrvt, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); 
	}

	define('APPPATH', $V11pzyibjrvt.DIRECTORY_SEPARATOR);

	
	if ( ! isset($Vhs0z1ovfvyt[0]) && is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
	{
		$Vhs0z1ovfvyt = APPPATH.'views';
	}
	elseif (is_dir($Vhs0z1ovfvyt))
	{
		if (($Vjsnlmrco1mg = realpath($Vhs0z1ovfvyt)) !== FALSE)
		{
			$Vhs0z1ovfvyt = $Vjsnlmrco1mg;
		}
		else
		{
			$Vhs0z1ovfvyt = strtr(
				rtrim($Vhs0z1ovfvyt, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(APPPATH.$Vhs0z1ovfvyt.DIRECTORY_SEPARATOR))
	{
		$Vhs0z1ovfvyt = APPPATH.strtr(
			trim($Vhs0z1ovfvyt, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); 
	}

	define('VIEWPATH', $Vhs0z1ovfvyt.DIRECTORY_SEPARATOR);


require_once BASEPATH.'core/CodeIgniter.php';
