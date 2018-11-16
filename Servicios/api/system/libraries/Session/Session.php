<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Session {

	
	public $V4gs4gkq4fxm;

	protected $Vnjstfz3xmu1 = 'files';
	protected $Vxqclttgjl02;

	

	
	public function __construct(array $Vpz5i5lfmwft = array())
	{
		
		if (is_cli())
		{
			log_message('debug', 'Session: Initialization under CLI aborted.');
			return;
		}
		elseif ((bool) ini_get('session.auto_start'))
		{
			log_message('error', 'Session: session.auto_start is enabled in php.ini. Aborting.');
			return;
		}
		elseif ( ! empty($Vpz5i5lfmwft['driver']))
		{
			$this->_driver = $Vpz5i5lfmwft['driver'];
			unset($Vpz5i5lfmwft['driver']);
		}
		elseif ($Vxanpyuscvfx = config_item('sess_driver'))
		{
			$this->_driver = $Vxanpyuscvfx;
		}
		
		elseif (config_item('sess_use_database'))
		{
			$this->_driver = 'database';
		}

		$Va3nq5n3hqmx = $this->_ci_load_classes($this->_driver);

		
		$this->_configure($Vpz5i5lfmwft);

		$Va3nq5n3hqmx = new $Va3nq5n3hqmx($this->_config);
		if ($Va3nq5n3hqmx instanceof SessionHandlerInterface)
		{
			if (is_php('5.4'))
			{
				session_set_save_handler($Va3nq5n3hqmx, TRUE);
			}
			else
			{
				session_set_save_handler(
					array($Va3nq5n3hqmx, 'open'),
					array($Va3nq5n3hqmx, 'close'),
					array($Va3nq5n3hqmx, 'read'),
					array($Va3nq5n3hqmx, 'write'),
					array($Va3nq5n3hqmx, 'destroy'),
					array($Va3nq5n3hqmx, 'gc')
				);

				register_shutdown_function('session_write_close');
			}
		}
		else
		{
			log_message('error', "Session: Driver '".$this->_driver."' doesn't implement SessionHandlerInterface. Aborting.");
			return;
		}

		
		if (isset($_COOKIE[$this->_config['cookie_name']])
			&& (
				! is_string($_COOKIE[$this->_config['cookie_name']])
				OR ! preg_match('/^[0-9a-f]{40}$/', $_COOKIE[$this->_config['cookie_name']])
			)
		)
		{
			unset($_COOKIE[$this->_config['cookie_name']]);
		}

		session_start();

		
		if ((empty($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
			&& ($Vy2veykpnblm = config_item('sess_time_to_update')) > 0
		)
		{
			if ( ! isset($_SESSION['__ci_last_regenerate']))
			{
				$_SESSION['__ci_last_regenerate'] = time();
			}
			elseif ($_SESSION['__ci_last_regenerate'] < (time() - $Vy2veykpnblm))
			{
				$this->sess_regenerate((bool) config_item('sess_regenerate_destroy'));
			}
		}
		
		
		elseif (isset($_COOKIE[$this->_config['cookie_name']]) && $_COOKIE[$this->_config['cookie_name']] === session_id())
		{
			setcookie(
				$this->_config['cookie_name'],
				session_id(),
				(empty($this->_config['cookie_lifetime']) ? 0 : time() + $this->_config['cookie_lifetime']),
				$this->_config['cookie_path'],
				$this->_config['cookie_domain'],
				$this->_config['cookie_secure'],
				TRUE
			);
		}

		$this->_ci_init_vars();

		log_message('info', "Session: Class initialized using '".$this->_driver."' driver.");
	}

	

	
	protected function _ci_load_classes($Vxanpyuscvfx)
	{
		
		interface_exists('SessionHandlerInterface', FALSE) OR require_once(BASEPATH.'libraries/Session/SessionHandlerInterface.php');

		$Vapdd0fqkaxu = config_item('subclass_prefix');

		if ( ! class_exists('CI_Session_driver', FALSE))
		{
			require_once(
				file_exists(APPPATH.'libraries/Session/Session_driver.php')
					? APPPATH.'libraries/Session/Session_driver.php'
					: BASEPATH.'libraries/Session/Session_driver.php'
			);

			if (file_exists($V3emdg0kb1po = APPPATH.'libraries/Session/'.$Vapdd0fqkaxu.'Session_driver.php'))
			{
				require_once($V3emdg0kb1po);
			}
		}

		$Va3nq5n3hqmx = 'Session_'.$Vxanpyuscvfx.'_driver';

		
		if ( ! class_exists($Va3nq5n3hqmx, FALSE) && file_exists($V3emdg0kb1po = APPPATH.'libraries/Session/drivers/'.$Va3nq5n3hqmx.'.php'))
		{
			require_once($V3emdg0kb1po);
			if (class_exists($Va3nq5n3hqmx, FALSE))
			{
				return $Va3nq5n3hqmx;
			}
		}

		if ( ! class_exists('CI_'.$Va3nq5n3hqmx, FALSE))
		{
			if (file_exists($V3emdg0kb1po = APPPATH.'libraries/Session/drivers/'.$Va3nq5n3hqmx.'.php') OR file_exists($V3emdg0kb1po = BASEPATH.'libraries/Session/drivers/'.$Va3nq5n3hqmx.'.php'))
			{
				require_once($V3emdg0kb1po);
			}

			if ( ! class_exists('CI_'.$Va3nq5n3hqmx, FALSE) && ! class_exists($Va3nq5n3hqmx, FALSE))
			{
				throw new UnexpectedValueException("Session: Configured driver '".$Vxanpyuscvfx."' was not found. Aborting.");
			}
		}

		if ( ! class_exists($Vapdd0fqkaxu.$Va3nq5n3hqmx, FALSE) && file_exists($V3emdg0kb1po = APPPATH.'libraries/Session/drivers/'.$Vapdd0fqkaxu.$Va3nq5n3hqmx.'.php'))
		{
			require_once($V3emdg0kb1po);
			if (class_exists($Vapdd0fqkaxu.$Va3nq5n3hqmx, FALSE))
			{
				return $Vapdd0fqkaxu.$Va3nq5n3hqmx;
			}
			else
			{
				log_message('debug', 'Session: '.$Vapdd0fqkaxu.$Va3nq5n3hqmx.".php found but it doesn't declare class ".$Vapdd0fqkaxu.$Va3nq5n3hqmx.'.');
			}
		}

		return 'CI_'.$Va3nq5n3hqmx;
	}

	

	
	protected function _configure(&$Vpz5i5lfmwft)
	{
		$Vw0rqc1cqgza = config_item('sess_expiration');

		if (isset($Vpz5i5lfmwft['cookie_lifetime']))
		{
			$Vpz5i5lfmwft['cookie_lifetime'] = (int) $Vpz5i5lfmwft['cookie_lifetime'];
		}
		else
		{
			$Vpz5i5lfmwft['cookie_lifetime'] = ( ! isset($Vw0rqc1cqgza) && config_item('sess_expire_on_close'))
				? 0 : (int) $Vw0rqc1cqgza;
		}

		isset($Vpz5i5lfmwft['cookie_name']) OR $Vpz5i5lfmwft['cookie_name'] = config_item('sess_cookie_name');
		if (empty($Vpz5i5lfmwft['cookie_name']))
		{
			$Vpz5i5lfmwft['cookie_name'] = ini_get('session.name');
		}
		else
		{
			ini_set('session.name', $Vpz5i5lfmwft['cookie_name']);
		}

		isset($Vpz5i5lfmwft['cookie_path']) OR $Vpz5i5lfmwft['cookie_path'] = config_item('cookie_path');
		isset($Vpz5i5lfmwft['cookie_domain']) OR $Vpz5i5lfmwft['cookie_domain'] = config_item('cookie_domain');
		isset($Vpz5i5lfmwft['cookie_secure']) OR $Vpz5i5lfmwft['cookie_secure'] = (bool) config_item('cookie_secure');

		session_set_cookie_params(
			$Vpz5i5lfmwft['cookie_lifetime'],
			$Vpz5i5lfmwft['cookie_path'],
			$Vpz5i5lfmwft['cookie_domain'],
			$Vpz5i5lfmwft['cookie_secure'],
			TRUE 
		);

		if (empty($Vw0rqc1cqgza))
		{
			$Vpz5i5lfmwft['expiration'] = (int) ini_get('session.gc_maxlifetime');
		}
		else
		{
			$Vpz5i5lfmwft['expiration'] = (int) $Vw0rqc1cqgza;
			ini_set('session.gc_maxlifetime', $Vw0rqc1cqgza);
		}

		$Vpz5i5lfmwft['match_ip'] = (bool) (isset($Vpz5i5lfmwft['match_ip']) ? $Vpz5i5lfmwft['match_ip'] : config_item('sess_match_ip'));

		isset($Vpz5i5lfmwft['save_path']) OR $Vpz5i5lfmwft['save_path'] = config_item('sess_save_path');

		$this->_config = $Vpz5i5lfmwft;

		
		ini_set('session.use_trans_sid', 0);
		ini_set('session.use_strict_mode', 1);
		ini_set('session.use_cookies', 1);
		ini_set('session.use_only_cookies', 1);
		ini_set('session.hash_function', 1);
		ini_set('session.hash_bits_per_character', 4);
	}

	

	
	protected function _ci_init_vars()
	{
		if ( ! empty($_SESSION['__ci_vars']))
		{
			$V4lkl2vcyab3 = time();

			foreach ($_SESSION['__ci_vars'] as $V2xim30qek4u => &$Vcnwqsowvhom)
			{
				if ($Vcnwqsowvhom === 'new')
				{
					$_SESSION['__ci_vars'][$V2xim30qek4u] = 'old';
				}
				
				
				elseif ($Vcnwqsowvhom < $V4lkl2vcyab3)
				{
					unset($_SESSION[$V2xim30qek4u], $_SESSION['__ci_vars'][$V2xim30qek4u]);
				}
			}

			if (empty($_SESSION['__ci_vars']))
			{
				unset($_SESSION['__ci_vars']);
			}
		}

		$this->userdata =& $_SESSION;
	}

	

	
	public function mark_as_flash($V2xim30qek4u)
	{
		if (is_array($V2xim30qek4u))
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V2xim30qek4u); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				if ( ! isset($_SESSION[$V2xim30qek4u[$Vep0df0xosaw]]))
				{
					return FALSE;
				}
			}

			$Vexceixfrb3w = array_fill_keys($V2xim30qek4u, 'new');

			$_SESSION['__ci_vars'] = isset($_SESSION['__ci_vars'])
				? array_merge($_SESSION['__ci_vars'], $Vexceixfrb3w)
				: $Vexceixfrb3w;

			return TRUE;
		}

		if ( ! isset($_SESSION[$V2xim30qek4u]))
		{
			return FALSE;
		}

		$_SESSION['__ci_vars'][$V2xim30qek4u] = 'new';
		return TRUE;
	}

	

	
	public function get_flash_keys()
	{
		if ( ! isset($_SESSION['__ci_vars']))
		{
			return array();
		}

		$V2xim30qek4us = array();
		foreach (array_keys($_SESSION['__ci_vars']) as $V2xim30qek4u)
		{
			is_int($_SESSION['__ci_vars'][$V2xim30qek4u]) OR $V2xim30qek4us[] = $V2xim30qek4u;
		}

		return $V2xim30qek4us;
	}

	

	
	public function unmark_flash($V2xim30qek4u)
	{
		if (empty($_SESSION['__ci_vars']))
		{
			return;
		}

		is_array($V2xim30qek4u) OR $V2xim30qek4u = array($V2xim30qek4u);

		foreach ($V2xim30qek4u as $Vwyse0flpyxh)
		{
			if (isset($_SESSION['__ci_vars'][$Vwyse0flpyxh]) && ! is_int($_SESSION['__ci_vars'][$Vwyse0flpyxh]))
			{
				unset($_SESSION['__ci_vars'][$Vwyse0flpyxh]);
			}
		}

		if (empty($_SESSION['__ci_vars']))
		{
			unset($_SESSION['__ci_vars']);
		}
	}

	

	
	public function mark_as_temp($V2xim30qek4u, $V1nvdczefjob = 300)
	{
		$V1nvdczefjob += time();

		if (is_array($V2xim30qek4u))
		{
			$V3iiokxda3xw = array();

			foreach ($V2xim30qek4u as $Vwyse0flpyxh => $Vxxtccqydhzn)
			{
				
				if (is_int($Vwyse0flpyxh))
				{
					$Vwyse0flpyxh = $Vxxtccqydhzn;
					$Vxxtccqydhzn = $V1nvdczefjob;
				}
				else
				{
					$Vxxtccqydhzn += time();
				}

				if ( ! isset($_SESSION[$Vwyse0flpyxh]))
				{
					return FALSE;
				}

				$V3iiokxda3xw[$Vwyse0flpyxh] = $Vxxtccqydhzn;
			}

			$_SESSION['__ci_vars'] = isset($_SESSION['__ci_vars'])
				? array_merge($_SESSION['__ci_vars'], $V3iiokxda3xw)
				: $V3iiokxda3xw;

			return TRUE;
		}

		if ( ! isset($_SESSION[$V2xim30qek4u]))
		{
			return FALSE;
		}

		$_SESSION['__ci_vars'][$V2xim30qek4u] = $V1nvdczefjob;
		return TRUE;
	}

	

	
	public function get_temp_keys()
	{
		if ( ! isset($_SESSION['__ci_vars']))
		{
			return array();
		}

		$V2xim30qek4us = array();
		foreach (array_keys($_SESSION['__ci_vars']) as $V2xim30qek4u)
		{
			is_int($_SESSION['__ci_vars'][$V2xim30qek4u]) && $V2xim30qek4us[] = $V2xim30qek4u;
		}

		return $V2xim30qek4us;
	}

	

	
	public function unmark_temp($V2xim30qek4u)
	{
		if (empty($_SESSION['__ci_vars']))
		{
			return;
		}

		is_array($V2xim30qek4u) OR $V2xim30qek4u = array($V2xim30qek4u);

		foreach ($V2xim30qek4u as $Vwyse0flpyxh)
		{
			if (isset($_SESSION['__ci_vars'][$Vwyse0flpyxh]) && is_int($_SESSION['__ci_vars'][$Vwyse0flpyxh]))
			{
				unset($_SESSION['__ci_vars'][$Vwyse0flpyxh]);
			}
		}

		if (empty($_SESSION['__ci_vars']))
		{
			unset($_SESSION['__ci_vars']);
		}
	}

	

	
	public function __get($V2xim30qek4u)
	{
		
		
		if (isset($_SESSION[$V2xim30qek4u]))
		{
			return $_SESSION[$V2xim30qek4u];
		}
		elseif ($V2xim30qek4u === 'session_id')
		{
			return session_id();
		}

		return NULL;
	}

	

	
	public function __isset($V2xim30qek4u)
	{
		if ($V2xim30qek4u === 'session_id')
		{
			return (session_status() === PHP_SESSION_ACTIVE);
		}

		return isset($_SESSION[$V2xim30qek4u]);
	}

	

	
	public function __set($V2xim30qek4u, $Vcnwqsowvhom)
	{
		$_SESSION[$V2xim30qek4u] = $Vcnwqsowvhom;
	}

	

	
	public function sess_destroy()
	{
		session_destroy();
	}

	

	
	public function sess_regenerate($V2tzxe1hfysb = FALSE)
	{
		$_SESSION['__ci_last_regenerate'] = time();
		session_regenerate_id($V2tzxe1hfysb);
	}

	

	
	public function &get_userdata()
	{
		return $_SESSION;
	}

	

	
	public function userdata($V2xim30qek4u = NULL)
	{
		if (isset($V2xim30qek4u))
		{
			return isset($_SESSION[$V2xim30qek4u]) ? $_SESSION[$V2xim30qek4u] : NULL;
		}
		elseif (empty($_SESSION))
		{
			return array();
		}

		$V4gs4gkq4fxm = array();
		$Vardq4z443hv = array_merge(
			array('__ci_vars'),
			$this->get_flash_keys(),
			$this->get_temp_keys()
		);

		foreach (array_keys($_SESSION) as $V2xim30qek4u)
		{
			if ( ! in_array($V2xim30qek4u, $Vardq4z443hv, TRUE))
			{
				$V4gs4gkq4fxm[$V2xim30qek4u] = $_SESSION[$V2xim30qek4u];
			}
		}

		return $V4gs4gkq4fxm;
	}

	

	
	public function set_userdata($Vfeinw1hsfej, $Vcnwqsowvhom = NULL)
	{
		if (is_array($Vfeinw1hsfej))
		{
			foreach ($Vfeinw1hsfej as $V2xim30qek4u => &$Vcnwqsowvhom)
			{
				$_SESSION[$V2xim30qek4u] = $Vcnwqsowvhom;
			}

			return;
		}

		$_SESSION[$Vfeinw1hsfej] = $Vcnwqsowvhom;
	}

	

	
	public function unset_userdata($V2xim30qek4u)
	{
		if (is_array($V2xim30qek4u))
		{
			foreach ($V2xim30qek4u as $Vwyse0flpyxh)
			{
				unset($_SESSION[$Vwyse0flpyxh]);
			}

			return;
		}

		unset($_SESSION[$V2xim30qek4u]);
	}

	

	
	public function all_userdata()
	{
		return $this->userdata();
	}

	

	
	public function has_userdata($V2xim30qek4u)
	{
		return isset($_SESSION[$V2xim30qek4u]);
	}

	

	
	public function flashdata($V2xim30qek4u = NULL)
	{
		if (isset($V2xim30qek4u))
		{
			return (isset($_SESSION['__ci_vars'], $_SESSION['__ci_vars'][$V2xim30qek4u], $_SESSION[$V2xim30qek4u]) && ! is_int($_SESSION['__ci_vars'][$V2xim30qek4u]))
				? $_SESSION[$V2xim30qek4u]
				: NULL;
		}

		$V0hrok1qp00z = array();

		if ( ! empty($_SESSION['__ci_vars']))
		{
			foreach ($_SESSION['__ci_vars'] as $V2xim30qek4u => &$Vcnwqsowvhom)
			{
				is_int($Vcnwqsowvhom) OR $V0hrok1qp00z[$V2xim30qek4u] = $_SESSION[$V2xim30qek4u];
			}
		}

		return $V0hrok1qp00z;
	}

	

	
	public function set_flashdata($Vfeinw1hsfej, $Vcnwqsowvhom = NULL)
	{
		$this->set_userdata($Vfeinw1hsfej, $Vcnwqsowvhom);
		$this->mark_as_flash(is_array($Vfeinw1hsfej) ? array_keys($Vfeinw1hsfej) : $Vfeinw1hsfej);
	}

	

	
	public function keep_flashdata($V2xim30qek4u)
	{
		$this->mark_as_flash($V2xim30qek4u);
	}

	

	
	public function tempdata($V2xim30qek4u = NULL)
	{
		if (isset($V2xim30qek4u))
		{
			return (isset($_SESSION['__ci_vars'], $_SESSION['__ci_vars'][$V2xim30qek4u], $_SESSION[$V2xim30qek4u]) && is_int($_SESSION['__ci_vars'][$V2xim30qek4u]))
				? $_SESSION[$V2xim30qek4u]
				: NULL;
		}

		$V3iiokxda3xwdata = array();

		if ( ! empty($_SESSION['__ci_vars']))
		{
			foreach ($_SESSION['__ci_vars'] as $V2xim30qek4u => &$Vcnwqsowvhom)
			{
				is_int($Vcnwqsowvhom) && $V3iiokxda3xwdata[$V2xim30qek4u] = $_SESSION[$V2xim30qek4u];
			}
		}

		return $V3iiokxda3xwdata;
	}

	

	
	public function set_tempdata($Vfeinw1hsfej, $Vcnwqsowvhom = NULL, $V1nvdczefjob = 300)
	{
		$this->set_userdata($Vfeinw1hsfej, $Vcnwqsowvhom);
		$this->mark_as_temp(is_array($Vfeinw1hsfej) ? array_keys($Vfeinw1hsfej) : $Vfeinw1hsfej, $V1nvdczefjob);
	}

	

	
	public function unset_tempdata($V2xim30qek4u)
	{
		$this->unmark_temp($V2xim30qek4u);
	}

}
