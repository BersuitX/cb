<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_User_agent {

	
	public $Vyvarjggb4ew = NULL;

	
	public $Va0qapkcokvc = FALSE;

	
	public $Vhhw4stiapen = FALSE;

	
	public $Vnggor5niexa = FALSE;

	
	public $Vmf2wkqmuk5o = array();

	
	public $Vfvgmx0ueoti = array();

	
	public $Vjr5tv1g1dab = array();

	
	public $Vf3rzltn5hbv = array();

	
	public $Vtenbassvgvd = array();

	
	public $Vpqk2u3mauhh = array();

	
	public $Vxbjbginqb1m = '';

	
	public $Vmpgx14hqvqd = '';

	
	public $Vfrz01we23rs = '';

	
	public $Vynte3py3x0l = '';

	
	public $Vxm1zfalr3tu = '';

	
	public $Vjw0gxxip1sb;

	

	
	public function __construct()
	{
		if (isset($_SERVER['HTTP_USER_AGENT']))
		{
			$this->agent = trim($_SERVER['HTTP_USER_AGENT']);
		}

		if ($this->agent !== NULL && $this->_load_agent_file())
		{
			$this->_compile_data();
		}

		log_message('info', 'User Agent Class Initialized');
	}

	

	
	protected function _load_agent_file()
	{
		if (($Vxk5dnosyklz = file_exists(APPPATH.'config/user_agents.php')))
		{
			include(APPPATH.'config/user_agents.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/user_agents.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/user_agents.php');
			$Vxk5dnosyklz = TRUE;
		}

		if ($Vxk5dnosyklz !== TRUE)
		{
			return FALSE;
		}

		$Vb5hjbk2mbwk = FALSE;

		if (isset($Vjr5tv1g1dab))
		{
			$this->platforms = $Vjr5tv1g1dab;
			unset($Vjr5tv1g1dab);
			$Vb5hjbk2mbwk = TRUE;
		}

		if (isset($Vf3rzltn5hbv))
		{
			$this->browsers = $Vf3rzltn5hbv;
			unset($Vf3rzltn5hbv);
			$Vb5hjbk2mbwk = TRUE;
		}

		if (isset($Vtenbassvgvd))
		{
			$this->mobiles = $Vtenbassvgvd;
			unset($Vtenbassvgvd);
			$Vb5hjbk2mbwk = TRUE;
		}

		if (isset($Vpqk2u3mauhh))
		{
			$this->robots = $Vpqk2u3mauhh;
			unset($Vpqk2u3mauhh);
			$Vb5hjbk2mbwk = TRUE;
		}

		return $Vb5hjbk2mbwk;
	}

	

	
	protected function _compile_data()
	{
		$this->_set_platform();

		foreach (array('_set_robot', '_set_browser', '_set_mobile') as $V5mhcgfyfeif)
		{
			if ($this->$V5mhcgfyfeif() === TRUE)
			{
				break;
			}
		}
	}

	

	
	protected function _set_platform()
	{
		if (is_array($this->platforms) && count($this->platforms) > 0)
		{
			foreach ($this->platforms as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (preg_match('|'.preg_quote($V2xim30qek4u).'|i', $this->agent))
				{
					$this->platform = $Va4zo0rltynr;
					return TRUE;
				}
			}
		}

		$this->platform = 'Unknown Platform';
		return FALSE;
	}

	

	
	protected function _set_browser()
	{
		if (is_array($this->browsers) && count($this->browsers) > 0)
		{
			foreach ($this->browsers as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (preg_match('|'.$V2xim30qek4u.'.*?([0-9\.]+)|i', $this->agent, $V4uvjtwtgjvp))
				{
					$this->is_browser = TRUE;
					$this->version = $V4uvjtwtgjvp[1];
					$this->browser = $Va4zo0rltynr;
					$this->_set_mobile();
					return TRUE;
				}
			}
		}

		return FALSE;
	}

	

	
	protected function _set_robot()
	{
		if (is_array($this->robots) && count($this->robots) > 0)
		{
			foreach ($this->robots as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (preg_match('|'.preg_quote($V2xim30qek4u).'|i', $this->agent))
				{
					$this->is_robot = TRUE;
					$this->robot = $Va4zo0rltynr;
					$this->_set_mobile();
					return TRUE;
				}
			}
		}

		return FALSE;
	}

	

	
	protected function _set_mobile()
	{
		if (is_array($this->mobiles) && count($this->mobiles) > 0)
		{
			foreach ($this->mobiles as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (FALSE !== (stripos($this->agent, $V2xim30qek4u)))
				{
					$this->is_mobile = TRUE;
					$this->mobile = $Va4zo0rltynr;
					return TRUE;
				}
			}
		}

		return FALSE;
	}

	

	
	protected function _set_languages()
	{
		if ((count($this->languages) === 0) && ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
		{
			$this->languages = explode(',', preg_replace('/(;\s?q=[0-9\.]+)|\s/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE']))));
		}

		if (count($this->languages) === 0)
		{
			$this->languages = array('Undefined');
		}
	}

	

	
	protected function _set_charsets()
	{
		if ((count($this->charsets) === 0) && ! empty($_SERVER['HTTP_ACCEPT_CHARSET']))
		{
			$this->charsets = explode(',', preg_replace('/(;\s?q=.+)|\s/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_CHARSET']))));
		}

		if (count($this->charsets) === 0)
		{
			$this->charsets = array('Undefined');
		}
	}

	

	
	public function is_browser($V2xim30qek4u = NULL)
	{
		if ( ! $this->is_browser)
		{
			return FALSE;
		}

		
		if ($V2xim30qek4u === NULL)
		{
			return TRUE;
		}

		
		return (isset($this->browsers[$V2xim30qek4u]) && $this->browser === $this->browsers[$V2xim30qek4u]);
	}

	

	
	public function is_robot($V2xim30qek4u = NULL)
	{
		if ( ! $this->is_robot)
		{
			return FALSE;
		}

		
		if ($V2xim30qek4u === NULL)
		{
			return TRUE;
		}

		
		return (isset($this->robots[$V2xim30qek4u]) && $this->robot === $this->robots[$V2xim30qek4u]);
	}

	

	
	public function is_mobile($V2xim30qek4u = NULL)
	{
		if ( ! $this->is_mobile)
		{
			return FALSE;
		}

		
		if ($V2xim30qek4u === NULL)
		{
			return TRUE;
		}

		
		return (isset($this->mobiles[$V2xim30qek4u]) && $this->mobile === $this->mobiles[$V2xim30qek4u]);
	}

	

	
	public function is_referral()
	{
		if ( ! isset($this->referer))
		{
			if (empty($_SERVER['HTTP_REFERER']))
			{
				$this->referer = FALSE;
			}
			else
			{
				$Vjw0gxxip1sb_host = @parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
				$Vp0mi4lsnzvx = parse_url(config_item('base_url'), PHP_URL_HOST);

				$this->referer = ($Vjw0gxxip1sb_host && $Vjw0gxxip1sb_host !== $Vp0mi4lsnzvx);
			}
		}

		return $this->referer;
	}

	

	
	public function agent_string()
	{
		return $this->agent;
	}

	

	
	public function platform()
	{
		return $this->platform;
	}

	

	
	public function browser()
	{
		return $this->browser;
	}

	

	
	public function version()
	{
		return $this->version;
	}

	

	
	public function robot()
	{
		return $this->robot;
	}
	

	
	public function mobile()
	{
		return $this->mobile;
	}

	

	
	public function referrer()
	{
		return empty($_SERVER['HTTP_REFERER']) ? '' : trim($_SERVER['HTTP_REFERER']);
	}

	

	
	public function languages()
	{
		if (count($this->languages) === 0)
		{
			$this->_set_languages();
		}

		return $this->languages;
	}

	

	
	public function charsets()
	{
		if (count($this->charsets) === 0)
		{
			$this->_set_charsets();
		}

		return $this->charsets;
	}

	

	
	public function accept_lang($V0epxtzjncyc = 'en')
	{
		return in_array(strtolower($V0epxtzjncyc), $this->languages(), TRUE);
	}

	

	
	public function accept_charset($Vwxuqfbo3r2c = 'utf-8')
	{
		return in_array(strtolower($Vwxuqfbo3r2c), $this->charsets(), TRUE);
	}

	

	
	public function parse($Vxgpowef4o2f)
	{
		
		$this->is_browser = FALSE;
		$this->is_robot = FALSE;
		$this->is_mobile = FALSE;
		$this->browser = '';
		$this->version = '';
		$this->mobile = '';
		$this->robot = '';

		
		$this->agent = $Vxgpowef4o2f;

		if ( ! empty($Vxgpowef4o2f))
		{
			$this->_compile_data();
		}
	}

}
