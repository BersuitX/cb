<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Exceptions {

	
	public $Vpndvcvngf3z;

	
	public $Vqcphcu5qbe2 = array(
		E_ERROR			=>	'Error',
		E_WARNING		=>	'Warning',
		E_PARSE			=>	'Parsing Error',
		E_NOTICE		=>	'Notice',
		E_CORE_ERROR		=>	'Core Error',
		E_CORE_WARNING		=>	'Core Warning',
		E_COMPILE_ERROR		=>	'Compile Error',
		E_COMPILE_WARNING	=>	'Compile Warning',
		E_USER_ERROR		=>	'User Error',
		E_USER_WARNING		=>	'User Warning',
		E_USER_NOTICE		=>	'User Notice',
		E_STRICT		=>	'Runtime Notice'
	);

	
	public function __construct()
	{
		$this->ob_level = ob_get_level();
		
	}

	

	
	public function log_exception($Vgz2c4ocyllo, $V15xvmvzbb0h, $Vohaqukrowkd, $Vcfdirgq3swa)
	{
		$Vgz2c4ocyllo = isset($this->levels[$Vgz2c4ocyllo]) ? $this->levels[$Vgz2c4ocyllo] : $Vgz2c4ocyllo;
		log_message('error', 'Severity: '.$Vgz2c4ocyllo.' --> '.$V15xvmvzbb0h.' '.$Vohaqukrowkd.' '.$Vcfdirgq3swa);
	}

	

	
	public function show_404($Vmmu1rzhh3cw = '', $Vvrvvv0v11qv = TRUE)
	{
		if (is_cli())
		{
			$Vcuptk31tst0 = 'Not Found';
			$V15xvmvzbb0h = 'The controller/method pair you requested was not found.';
		}
		else
		{
			$Vcuptk31tst0 = '404 Page Not Found';
			$V15xvmvzbb0h = 'The page you requested was not found.';
		}

		
		if ($Vvrvvv0v11qv)
		{
			log_message('error', $Vcuptk31tst0.': '.$Vmmu1rzhh3cw);
		}

		echo $this->show_error($Vcuptk31tst0, $V15xvmvzbb0h, 'error_404', 404);
		exit(4); 
	}

	

	
	public function show_error($Vcuptk31tst0, $V15xvmvzbb0h, $Vwwfk0sxxxmx = 'error_general', $Vbfcjjiwd22q = 500)
	{
		$Vwwfk0sxxxmxs_path = config_item('error_views_path');
		if (empty($Vwwfk0sxxxmxs_path))
		{
			$Vwwfk0sxxxmxs_path = VIEWPATH.'errors'.DIRECTORY_SEPARATOR;
		}

		if (is_cli())
		{
			$V15xvmvzbb0h = "\t".(is_array($V15xvmvzbb0h) ? implode("\n\t", $V15xvmvzbb0h) : $V15xvmvzbb0h);
			$Vwwfk0sxxxmx = 'cli'.DIRECTORY_SEPARATOR.$Vwwfk0sxxxmx;
		}
		else
		{
			set_status_header($Vbfcjjiwd22q);
			$V15xvmvzbb0h = '<p>'.(is_array($V15xvmvzbb0h) ? implode('</p><p>', $V15xvmvzbb0h) : $V15xvmvzbb0h).'</p>';
			$Vwwfk0sxxxmx = 'html'.DIRECTORY_SEPARATOR.$Vwwfk0sxxxmx;
		}

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}
		ob_start();
		include($Vwwfk0sxxxmxs_path.$Vwwfk0sxxxmx.'.php');
		$Vkfvai0yofrh = ob_get_contents();
		ob_end_clean();
		return $Vkfvai0yofrh;
	}

	

	public function show_exception($Vvz3bsiw0khw)
	{
		$Vwwfk0sxxxmxs_path = config_item('error_views_path');
		if (empty($Vwwfk0sxxxmxs_path))
		{
			$Vwwfk0sxxxmxs_path = VIEWPATH.'errors'.DIRECTORY_SEPARATOR;
		}

		$V15xvmvzbb0h = $Vvz3bsiw0khw->getMessage();
		if (empty($V15xvmvzbb0h))
		{
			$V15xvmvzbb0h = '(null)';
		}

		if (is_cli())
		{
			$Vwwfk0sxxxmxs_path .= 'cli'.DIRECTORY_SEPARATOR;
		}
		else
		{
			set_status_header(500);
			$Vwwfk0sxxxmxs_path .= 'html'.DIRECTORY_SEPARATOR;
		}

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}

		ob_start();
		include($Vwwfk0sxxxmxs_path.'error_exception.php');
		$Vkfvai0yofrh = ob_get_contents();
		ob_end_clean();
		echo $Vkfvai0yofrh;
	}

	

	
	public function show_php_error($Vgz2c4ocyllo, $V15xvmvzbb0h, $Vohaqukrowkd, $Vcfdirgq3swa)
	{
		$Vwwfk0sxxxmxs_path = config_item('error_views_path');
		if (empty($Vwwfk0sxxxmxs_path))
		{
			$Vwwfk0sxxxmxs_path = VIEWPATH.'errors'.DIRECTORY_SEPARATOR;
		}

		$Vgz2c4ocyllo = isset($this->levels[$Vgz2c4ocyllo]) ? $this->levels[$Vgz2c4ocyllo] : $Vgz2c4ocyllo;

		
		if ( ! is_cli())
		{
			$Vohaqukrowkd = str_replace('\\', '/', $Vohaqukrowkd);
			if (FALSE !== strpos($Vohaqukrowkd, '/'))
			{
				$V5ozzo11urso = explode('/', $Vohaqukrowkd);
				$Vohaqukrowkd = $V5ozzo11urso[count($V5ozzo11urso)-2].'/'.end($V5ozzo11urso);
			}

			$Vwwfk0sxxxmx = 'html'.DIRECTORY_SEPARATOR.'error_php';
		}
		else
		{
			$Vwwfk0sxxxmx = 'cli'.DIRECTORY_SEPARATOR.'error_php';
		}

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}
		ob_start();
		include($Vwwfk0sxxxmxs_path.$Vwwfk0sxxxmx.'.php');
		$Vkfvai0yofrh = ob_get_contents();
		ob_end_clean();
		echo $Vkfvai0yofrh;
	}

}
