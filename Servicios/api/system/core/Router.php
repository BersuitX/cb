<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Router {

	
	public $Vnmcm15juye5;

	
	public $Vizg1eeiqbo3 =	array();

	
	public $Va3nq5n3hqmx =		'';

	
	public $V5dsbozs5xhq =	'index';

	
	public $V1zlhujai52g;

	
	public $V0zsp32n1zqi;

	
	public $Vygpg0rmg0ka = FALSE;

	
	public $V1nf0egs1ten = FALSE;

	

	
	public function __construct($V44oyxpkut05 = NULL)
	{
		$this->config =& load_class('Config', 'core');
		$this->uri =& load_class('URI', 'core');

		$this->enable_query_strings = ( ! is_cli() && $this->config->item('enable_query_strings') === TRUE);

		
		is_array($V44oyxpkut05) && isset($V44oyxpkut05['directory']) && $this->set_directory($V44oyxpkut05['directory']);
		$this->_set_routing();

		
		if (is_array($V44oyxpkut05))
		{
			empty($V44oyxpkut05['controller']) OR $this->set_class($V44oyxpkut05['controller']);
			empty($V44oyxpkut05['function'])   OR $this->set_method($V44oyxpkut05['function']);
		}

		log_message('info', 'Router Class Initialized');
	}

	

	
	protected function _set_routing()
	{
		
		
		
		if (file_exists(APPPATH.'config/routes.php'))
		{
			include(APPPATH.'config/routes.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/routes.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/routes.php');
		}

		
		if (isset($Vinyo1kg4awu) && is_array($Vinyo1kg4awu))
		{
			isset($Vinyo1kg4awu['default_controller']) && $this->default_controller = $Vinyo1kg4awu['default_controller'];
			isset($Vinyo1kg4awu['translate_uri_dashes']) && $this->translate_uri_dashes = $Vinyo1kg4awu['translate_uri_dashes'];
			unset($Vinyo1kg4awu['default_controller'], $Vinyo1kg4awu['translate_uri_dashes']);
			$this->routes = $Vinyo1kg4awu;
		}

		
		
		
		if ($this->enable_query_strings)
		{
			
			if ( ! isset($this->directory))
			{
				$Vicmkubajpnt = $this->config->item('directory_trigger');
				$Vicmkubajpnt = isset($_GET[$Vicmkubajpnt]) ? trim($_GET[$Vicmkubajpnt], " \t\n\r\0\x0B/") : '';

				if ($Vicmkubajpnt !== '')
				{
					$this->uri->filter_uri($Vicmkubajpnt);
					$this->set_directory($Vicmkubajpnt);
				}
			}

			$Vjfbkosdntym = trim($this->config->item('controller_trigger'));
			if ( ! empty($_GET[$Vjfbkosdntym]))
			{
				$this->uri->filter_uri($_GET[$Vjfbkosdntym]);
				$this->set_class($_GET[$Vjfbkosdntym]);

				$V5i4mb2tsboz = trim($this->config->item('function_trigger'));
				if ( ! empty($_GET[$V5i4mb2tsboz]))
				{
					$this->uri->filter_uri($_GET[$V5i4mb2tsboz]);
					$this->set_method($_GET[$V5i4mb2tsboz]);
				}

				$this->uri->rsegments = array(
					1 => $this->class,
					2 => $this->method
				);
			}
			else
			{
				$this->_set_default_controller();
			}

			
			
			return;
		}

		
		if ($this->uri->uri_string !== '')
		{
			$this->_parse_routes();
		}
		else
		{
			$this->_set_default_controller();
		}
	}

	

	
	protected function _set_request($Vlszxw4pvps0 = array())
	{
		$Vlszxw4pvps0 = $this->_validate_request($Vlszxw4pvps0);
		
		
		if (empty($Vlszxw4pvps0))
		{
			$this->_set_default_controller();
			return;
		}

		if ($this->translate_uri_dashes === TRUE)
		{
			$Vlszxw4pvps0[0] = str_replace('-', '_', $Vlszxw4pvps0[0]);
			if (isset($Vlszxw4pvps0[1]))
			{
				$Vlszxw4pvps0[1] = str_replace('-', '_', $Vlszxw4pvps0[1]);
			}
		}

		$this->set_class($Vlszxw4pvps0[0]);
		if (isset($Vlszxw4pvps0[1]))
		{
			$this->set_method($Vlszxw4pvps0[1]);
		}
		else
		{
			$Vlszxw4pvps0[1] = 'index';
		}

		array_unshift($Vlszxw4pvps0, NULL);
		unset($Vlszxw4pvps0[0]);
		$this->uri->rsegments = $Vlszxw4pvps0;
	}

	

	
	protected function _set_default_controller()
	{
		if (empty($this->default_controller))
		{
			show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
		}

		
		if (sscanf($this->default_controller, '%[^/]/%s', $Va3nq5n3hqmx, $V5dsbozs5xhq) !== 2)
		{
			$V5dsbozs5xhq = 'index';
		}

		if ( ! file_exists(APPPATH.'controllers/'.$this->directory.ucfirst($Va3nq5n3hqmx).'.php'))
		{
			
			return;
		}

		$this->set_class($Va3nq5n3hqmx);
		$this->set_method($V5dsbozs5xhq);

		
		$this->uri->rsegments = array(
			1 => $Va3nq5n3hqmx,
			2 => $V5dsbozs5xhq
		);

		log_message('debug', 'No URI present. Default controller set.');
	}

	

	
	protected function _validate_request($Vlszxw4pvps0)
	{
		$Vn2ycfau434s = count($Vlszxw4pvps0);
		$V1zlhujai52g_override = isset($this->directory);

		
		
		while ($Vn2ycfau434s-- > 0)
		{
			$V5ok01k1lox1 = $this->directory
				.ucfirst($this->translate_uri_dashes === TRUE ? str_replace('-', '_', $Vlszxw4pvps0[0]) : $Vlszxw4pvps0[0]);

			if ( ! file_exists(APPPATH.'controllers/'.$V5ok01k1lox1.'.php')
				&& $V1zlhujai52g_override === FALSE
				&& is_dir(APPPATH.'controllers/'.$this->directory.$Vlszxw4pvps0[0])
			)
			{
				$this->set_directory(array_shift($Vlszxw4pvps0), TRUE);
				continue;
			}

			return $Vlszxw4pvps0;
		}

		
		return $Vlszxw4pvps0;
	}

	

	
	protected function _parse_routes()
	{
		
		$V1naxfrpd12s = implode('/', $this->uri->segments);

		
		$Vhdd0fbo3fra = isset($_SERVER['REQUEST_METHOD']) ? strtolower($_SERVER['REQUEST_METHOD']) : 'cli';

		
		foreach ($this->routes as $V2xim30qek4u => $Va4zo0rltynr)
		{
			
			if (is_array($Va4zo0rltynr))
			{
				$Va4zo0rltynr = array_change_key_case($Va4zo0rltynr, CASE_LOWER);
				if (isset($Va4zo0rltynr[$Vhdd0fbo3fra]))
				{
					$Va4zo0rltynr = $Va4zo0rltynr[$Vhdd0fbo3fra];
				}
				else
				{
					continue;
				}
			}

			
			$V2xim30qek4u = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $V2xim30qek4u);

			
			if (preg_match('#^'.$V2xim30qek4u.'$#', $V1naxfrpd12s, $Vmbknpbfqa1s))
			{
				
				if ( ! is_string($Va4zo0rltynr) && is_callable($Va4zo0rltynr))
				{
					
					array_shift($Vmbknpbfqa1s);

					
					$Va4zo0rltynr = call_user_func_array($Va4zo0rltynr, $Vmbknpbfqa1s);
				}
				
				elseif (strpos($Va4zo0rltynr, '$') !== FALSE && strpos($V2xim30qek4u, '(') !== FALSE)
				{
					$Va4zo0rltynr = preg_replace('#^'.$V2xim30qek4u.'$#', $Va4zo0rltynr, $V1naxfrpd12s);
				}

				$this->_set_request(explode('/', $Va4zo0rltynr));
				return;
			}
		}

		
		
		$this->_set_request(array_values($this->uri->segments));
	}

	

	
	public function set_class($Va3nq5n3hqmx)
	{
		$this->class = str_replace(array('/', '.'), '', $Va3nq5n3hqmx);
	}

	

	
	public function fetch_class()
	{
		return $this->class;
	}

	

	
	public function set_method($V5dsbozs5xhq)
	{
		$this->method = $V5dsbozs5xhq;
	}

	

	
	public function fetch_method()
	{
		return $this->method;
	}

	

	
	public function set_directory($Vjjrg1uzzvor, $Vzvgdhpel1hc = FALSE)
	{
		if ($Vzvgdhpel1hc !== TRUE OR empty($this->directory))
		{
			$this->directory = str_replace('.', '', trim($Vjjrg1uzzvor, '/')).'/';
		}
		else
		{
			$this->directory .= str_replace('.', '', trim($Vjjrg1uzzvor, '/')).'/';
		}
	}

	

	
	public function fetch_directory()
	{
		return $this->directory;
	}

}
