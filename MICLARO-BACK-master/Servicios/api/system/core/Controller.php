<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Controller {

	
	private static $Vozwd3ql5kxg;

	
	public function __construct()
	{
		self::$Vozwd3ql5kxg =& $this;

		
		
		
		foreach (is_loaded() as $Vdpwtnkqupxa => $Va3nq5n3hqmx)
		{
			$this->$Vdpwtnkqupxa =& load_class($Va3nq5n3hqmx);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
	}

	

	
	public static function &get_instance()
	{
		return self::$Vozwd3ql5kxg;
	}

}
