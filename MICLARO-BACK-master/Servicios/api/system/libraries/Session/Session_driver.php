<?php

defined('BASEPATH') OR exit('No direct script access allowed');


abstract class CI_Session_driver implements SessionHandlerInterface {

	protected $Vxqclttgjl02;

	
	protected $Vtwg4cble5cq;

	
	protected $Vjqnx2q4qp4s = FALSE;

	
	protected $V3yvggcv3yon;

	
	protected $Vcmm0bazrnsh, $V0coqokdg1tb;

	

	
	public function __construct(&$Vpz5i5lfmwft)
	{
		$this->_config =& $Vpz5i5lfmwft;

		if (is_php('7'))
		{
			$this->_success = TRUE;
			$this->_failure = FALSE;
		}
		else
		{
			$this->_success = 0;
			$this->_failure = -1;
		}
	}

	

	
	protected function _cookie_destroy()
	{
		return setcookie(
			$this->_config['cookie_name'],
			NULL,
			1,
			$this->_config['cookie_path'],
			$this->_config['cookie_domain'],
			$this->_config['cookie_secure'],
			TRUE
		);
	}

	

	
	protected function _get_lock($Vh3ontjxlhd5)
	{
		$this->_lock = TRUE;
		return TRUE;
	}

	

	
	protected function _release_lock()
	{
		if ($this->_lock)
		{
			$this->_lock = FALSE;
		}

		return TRUE;
	}

	

	
	protected function _fail()
	{
		ini_set('session.save_path', config_item('sess_save_path'));
		return $this->_failure;
	}
}
