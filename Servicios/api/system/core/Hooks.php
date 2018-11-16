<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Hooks {

	
	public $Ve2hzuvsvt0k = FALSE;

	
	public $Vk1wixi0gvr3 =	array();

	
	protected $Vtcqid0tkpjb = array();

	
	protected $Vcmubn1hygbk = FALSE;

	
	public function __construct()
	{
		$Vricwegt05y3 =& load_class('Config', 'core');
		log_message('info', 'Hooks Class Initialized');

		
		
		if ($Vricwegt05y3->item('enable_hooks') === FALSE)
		{
			return;
		}

		
		if (file_exists(APPPATH.'config/hooks.php'))
		{
			include(APPPATH.'config/hooks.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/hooks.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/hooks.php');
		}

		
		if ( ! isset($Vg4txfp0jex1) OR ! is_array($Vg4txfp0jex1))
		{
			return;
		}

		$this->hooks =& $Vg4txfp0jex1;
		$this->enabled = TRUE;
	}

	

	
	public function call_hook($Vffv04rnk4xn = '')
	{
		if ( ! $this->enabled OR ! isset($this->hooks[$Vffv04rnk4xn]))
		{
			return FALSE;
		}

		if (is_array($this->hooks[$Vffv04rnk4xn]) && ! isset($this->hooks[$Vffv04rnk4xn]['function']))
		{
			foreach ($this->hooks[$Vffv04rnk4xn] as $Va4zo0rltynr)
			{
				$this->_run_hook($Va4zo0rltynr);
			}
		}
		else
		{
			$this->_run_hook($this->hooks[$Vffv04rnk4xn]);
		}

		return TRUE;
	}

	

	
	protected function _run_hook($Vfeinw1hsfej)
	{
		
		if (is_callable($Vfeinw1hsfej))
		{
			is_array($Vfeinw1hsfej)
				? $Vfeinw1hsfej[0]->{$Vfeinw1hsfej[1]}()
				: $Vfeinw1hsfej();

			return TRUE;
		}
		elseif ( ! is_array($Vfeinw1hsfej))
		{
			return FALSE;
		}

		
		
		

		
		
		if ($this->_in_progress === TRUE)
		{
			return;
		}

		
		
		

		if ( ! isset($Vfeinw1hsfej['filepath'], $Vfeinw1hsfej['filename']))
		{
			return FALSE;
		}

		$Vohaqukrowkd = APPPATH.$Vfeinw1hsfej['filepath'].'/'.$Vfeinw1hsfej['filename'];

		if ( ! file_exists($Vohaqukrowkd))
		{
			return FALSE;
		}

		
		$Va3nq5n3hqmx		= empty($Vfeinw1hsfej['class']) ? FALSE : $Vfeinw1hsfej['class'];
		$V5mhcgfyfeif	= empty($Vfeinw1hsfej['function']) ? FALSE : $Vfeinw1hsfej['function'];
		$Vpz5i5lfmwft		= isset($Vfeinw1hsfej['params']) ? $Vfeinw1hsfej['params'] : '';

		if (empty($V5mhcgfyfeif))
		{
			return FALSE;
		}

		
		$this->_in_progress = TRUE;

		
		if ($Va3nq5n3hqmx !== FALSE)
		{
			
			if (isset($this->_objects[$Va3nq5n3hqmx]))
			{
				if (method_exists($this->_objects[$Va3nq5n3hqmx], $V5mhcgfyfeif))
				{
					$this->_objects[$Va3nq5n3hqmx]->$V5mhcgfyfeif($Vpz5i5lfmwft);
				}
				else
				{
					return $this->_in_progress = FALSE;
				}
			}
			else
			{
				class_exists($Va3nq5n3hqmx, FALSE) OR require_once($Vohaqukrowkd);

				if ( ! class_exists($Va3nq5n3hqmx, FALSE) OR ! method_exists($Va3nq5n3hqmx, $V5mhcgfyfeif))
				{
					return $this->_in_progress = FALSE;
				}

				
				$this->_objects[$Va3nq5n3hqmx] = new $Va3nq5n3hqmx();
				$this->_objects[$Va3nq5n3hqmx]->$V5mhcgfyfeif($Vpz5i5lfmwft);
			}
		}
		else
		{
			function_exists($V5mhcgfyfeif) OR require_once($Vohaqukrowkd);

			if ( ! function_exists($V5mhcgfyfeif))
			{
				return $this->_in_progress = FALSE;
			}

			$V5mhcgfyfeif($Vpz5i5lfmwft);
		}

		$this->_in_progress = FALSE;
		return TRUE;
	}

}
