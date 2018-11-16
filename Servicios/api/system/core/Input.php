<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Input {

	
	protected $Vcnuiqtjibnj = FALSE;

	
	protected $Vq4qhech3cmt = TRUE;

	
	protected $V1jx21irhzqz;

	
	protected $V3yczjyyes4f = FALSE;

	
	protected $Vkz3mpxdtyal = FALSE;

	
	protected $V3zljh1vyslw = array();

	
	protected $Vuf0ccy11ijd;

	
	protected $Vrycyykoef5s;

	protected $V0hmlbglzaic;
	protected $Vp32kagxvebl;

	

	
	public function __construct()
	{
		$this->_allow_get_array		= (config_item('allow_get_array') === TRUE);
		$this->_enable_xss		= (config_item('global_xss_filtering') === TRUE);
		$this->_enable_csrf		= (config_item('csrf_protection') === TRUE);
		$this->_standardize_newlines	= (bool) config_item('standardize_newlines');

		$this->security =& load_class('Security', 'core');

		
		if (UTF8_ENABLED === TRUE)
		{
			$this->uni =& load_class('Utf8', 'core');
		}

		
		$this->_sanitize_globals();

		
		if ($this->_enable_csrf === TRUE && ! is_cli())
		{
			$this->security->csrf_verify();
		}

		log_message('info', 'Input Class Initialized');
	}

	

	
	protected function _fetch_from_array(&$V5adckfdzb1d, $Vuglyh4gwddb = NULL, $Vgzlesc0sebt = NULL)
	{
		is_bool($Vgzlesc0sebt) OR $Vgzlesc0sebt = $this->_enable_xss;

		
		isset($Vuglyh4gwddb) OR $Vuglyh4gwddb = array_keys($V5adckfdzb1d);

		
		if (is_array($Vuglyh4gwddb))
		{
			$Vzxix2pqoztx = array();
			foreach ($Vuglyh4gwddb as $V2xim30qek4u)
			{
				$Vzxix2pqoztx[$V2xim30qek4u] = $this->_fetch_from_array($V5adckfdzb1d, $V2xim30qek4u, $Vgzlesc0sebt);
			}

			return $Vzxix2pqoztx;
		}

		if (isset($V5adckfdzb1d[$Vuglyh4gwddb]))
		{
			$Vcnwqsowvhom = $V5adckfdzb1d[$Vuglyh4gwddb];
		}
		elseif (($V2jbvukjonhh = preg_match_all('/(?:^[^\[]+)|\[[^]]*\]/', $Vuglyh4gwddb, $Vmbknpbfqa1s)) > 1) 
		{
			$Vcnwqsowvhom = $V5adckfdzb1d;
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $V2jbvukjonhh; $Vep0df0xosaw++)
			{
				$V2xim30qek4u = trim($Vmbknpbfqa1s[0][$Vep0df0xosaw], '[]');
				if ($V2xim30qek4u === '') 
				{
					break;
				}

				if (isset($Vcnwqsowvhom[$V2xim30qek4u]))
				{
					$Vcnwqsowvhom = $Vcnwqsowvhom[$V2xim30qek4u];
				}
				else
				{
					return NULL;
				}
			}
		}
		else
		{
			return NULL;
		}

		return ($Vgzlesc0sebt === TRUE)
			? $this->security->xss_clean($Vcnwqsowvhom)
			: $Vcnwqsowvhom;
	}

	

	
	public function get($Vuglyh4gwddb = NULL, $Vgzlesc0sebt = NULL)
	{
		return $this->_fetch_from_array($_GET, $Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function post($Vuglyh4gwddb = NULL, $Vgzlesc0sebt = NULL)
	{
		return $this->_fetch_from_array($_POST, $Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function post_get($Vuglyh4gwddb, $Vgzlesc0sebt = NULL)
	{
		return isset($_POST[$Vuglyh4gwddb])
			? $this->post($Vuglyh4gwddb, $Vgzlesc0sebt)
			: $this->get($Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function get_post($Vuglyh4gwddb, $Vgzlesc0sebt = NULL)
	{
		return isset($_GET[$Vuglyh4gwddb])
			? $this->get($Vuglyh4gwddb, $Vgzlesc0sebt)
			: $this->post($Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function cookie($Vuglyh4gwddb = NULL, $Vgzlesc0sebt = NULL)
	{
		return $this->_fetch_from_array($_COOKIE, $Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function server($Vuglyh4gwddb, $Vgzlesc0sebt = NULL)
	{
		return $this->_fetch_from_array($_SERVER, $Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function input_stream($Vuglyh4gwddb = NULL, $Vgzlesc0sebt = NULL)
	{
		
		
		if ( ! is_array($this->_input_stream))
		{
			
			parse_str($this->raw_input_stream, $this->_input_stream);
			is_array($this->_input_stream) OR $this->_input_stream = array();
		}

		return $this->_fetch_from_array($this->_input_stream, $Vuglyh4gwddb, $Vgzlesc0sebt);
	}

	

	
	public function set_cookie($Vaclaigdbtoo, $Vcnwqsowvhom = '', $Vgoa5d5z2ckk = '', $Vlzscfbh40lv = '', $Vcmaitbcbmmk = '/', $Vapdd0fqkaxu = '', $Vminjnrogeju = FALSE, $Vfgixglqo00l = FALSE)
	{
		if (is_array($Vaclaigdbtoo))
		{
			
			foreach (array('value', 'expire', 'domain', 'path', 'prefix', 'secure', 'httponly', 'name') as $Vep0df0xosawtem)
			{
				if (isset($Vaclaigdbtoo[$Vep0df0xosawtem]))
				{
					$$Vep0df0xosawtem = $Vaclaigdbtoo[$Vep0df0xosawtem];
				}
			}
		}

		if ($Vapdd0fqkaxu === '' && config_item('cookie_prefix') !== '')
		{
			$Vapdd0fqkaxu = config_item('cookie_prefix');
		}

		if ($Vlzscfbh40lv == '' && config_item('cookie_domain') != '')
		{
			$Vlzscfbh40lv = config_item('cookie_domain');
		}

		if ($Vcmaitbcbmmk === '/' && config_item('cookie_path') !== '/')
		{
			$Vcmaitbcbmmk = config_item('cookie_path');
		}

		if ($Vminjnrogeju === FALSE && config_item('cookie_secure') === TRUE)
		{
			$Vminjnrogeju = config_item('cookie_secure');
		}

		if ($Vfgixglqo00l === FALSE && config_item('cookie_httponly') !== FALSE)
		{
			$Vfgixglqo00l = config_item('cookie_httponly');
		}

		if ( ! is_numeric($Vgoa5d5z2ckk))
		{
			$Vgoa5d5z2ckk = time() - 86500;
		}
		else
		{
			$Vgoa5d5z2ckk = ($Vgoa5d5z2ckk > 0) ? time() + $Vgoa5d5z2ckk : 0;
		}

		setcookie($Vapdd0fqkaxu.$Vaclaigdbtoo, $Vcnwqsowvhom, $Vgoa5d5z2ckk, $Vcmaitbcbmmk, $Vlzscfbh40lv, $Vminjnrogeju, $Vfgixglqo00l);
	}

	

	
	public function ip_address()
	{
		if ($this->ip_address !== FALSE)
		{
			return $this->ip_address;
		}

		$Vp1pdqahbz41 = config_item('proxy_ips');
		if ( ! empty($Vp1pdqahbz41) && ! is_array($Vp1pdqahbz41))
		{
			$Vp1pdqahbz41 = explode(',', str_replace(' ', '', $Vp1pdqahbz41));
		}

		$this->ip_address = $this->server('REMOTE_ADDR');

		if ($Vp1pdqahbz41)
		{
			foreach (array('HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_X_CLIENT_IP', 'HTTP_X_CLUSTER_CLIENT_IP') as $V3lefstrzfrx)
			{
				if (($Vzmhzcm32uqd = $this->server($V3lefstrzfrx)) !== NULL)
				{
					
					
					
					sscanf($Vzmhzcm32uqd, '%[^,]', $Vzmhzcm32uqd);

					if ( ! $this->valid_ip($Vzmhzcm32uqd))
					{
						$Vzmhzcm32uqd = NULL;
					}
					else
					{
						break;
					}
				}
			}

			if ($Vzmhzcm32uqd)
			{
				for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vp1pdqahbz41); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
				{
					
					if (strpos($Vp1pdqahbz41[$Vep0df0xosaw], '/') === FALSE)
					{
						
						
						if ($Vp1pdqahbz41[$Vep0df0xosaw] === $this->ip_address)
						{
							$this->ip_address = $Vzmhzcm32uqd;
							break;
						}

						continue;
					}

					
					isset($V424xxy2eh3t) OR $V424xxy2eh3t = $this->valid_ip($this->ip_address, 'ipv6') ? ':' : '.';

					
					if (strpos($Vp1pdqahbz41[$Vep0df0xosaw], $V424xxy2eh3t) === FALSE)
					{
						continue;
					}

					
					if ( ! isset($Vep0df0xosawp, $Vigiv0m5ai2d))
					{
						if ($V424xxy2eh3t === ':')
						{
							
							$Vep0df0xosawp = explode(':',
								str_replace('::',
									str_repeat(':', 9 - substr_count($this->ip_address, ':')),
									$this->ip_address
								)
							);

							for ($Vv3o4gn4ugio = 0; $Vv3o4gn4ugio < 8; $Vv3o4gn4ugio++)
							{
								$Vep0df0xosawp[$Vv3o4gn4ugio] = intval($Vep0df0xosawp[$Vv3o4gn4ugio], 16);
							}

							$Vigiv0m5ai2d = '%016b%016b%016b%016b%016b%016b%016b%016b';
						}
						else
						{
							$Vep0df0xosawp = explode('.', $this->ip_address);
							$Vigiv0m5ai2d = '%08b%08b%08b%08b';
						}

						$Vep0df0xosawp = vsprintf($Vigiv0m5ai2d, $Vep0df0xosawp);
					}

					
					sscanf($Vp1pdqahbz41[$Vep0df0xosaw], '%[^/]/%d', $Vlfzwhjlk3zn, $Vqhsh0pt2qt5);

					
					if ($V424xxy2eh3t === ':')
					{
						$Vlfzwhjlk3zn = explode(':', str_replace('::', str_repeat(':', 9 - substr_count($Vlfzwhjlk3zn, ':')), $Vlfzwhjlk3zn));
						for ($Vep0df0xosaw = 0; $Vep0df0xosaw < 8; $Vep0df0xosaw++)
						{
							$Vlfzwhjlk3zn[$Vep0df0xosaw] = intval($Vlfzwhjlk3zn[$Vep0df0xosaw], 16);
						}
					}
					else
					{
						$Vlfzwhjlk3zn = explode('.', $Vlfzwhjlk3zn);
					}

					
					if (strncmp($Vep0df0xosawp, vsprintf($Vigiv0m5ai2d, $Vlfzwhjlk3zn), $Vqhsh0pt2qt5) === 0)
					{
						$this->ip_address = $Vzmhzcm32uqd;
						break;
					}
				}
			}
		}

		if ( ! $this->valid_ip($this->ip_address))
		{
			return $this->ip_address = '0.0.0.0';
		}

		return $this->ip_address;
	}

	

	
	public function valid_ip($Vep0df0xosawp, $Vffv04rnk4xn = '')
	{
		switch (strtolower($Vffv04rnk4xn))
		{
			case 'ipv4':
				$Vffv04rnk4xn = FILTER_FLAG_IPV4;
				break;
			case 'ipv6':
				$Vffv04rnk4xn = FILTER_FLAG_IPV6;
				break;
			default:
				$Vffv04rnk4xn = NULL;
				break;
		}

		return (bool) filter_var($Vep0df0xosawp, FILTER_VALIDATE_IP, $Vffv04rnk4xn);
	}

	

	
	public function user_agent($Vgzlesc0sebt = NULL)
	{
		return $this->_fetch_from_array($_SERVER, 'HTTP_USER_AGENT', $Vgzlesc0sebt);
	}

	

	
	protected function _sanitize_globals()
	{
		
		if ($this->_allow_get_array === FALSE)
		{
			$_GET = array();
		}
		elseif (is_array($_GET))
		{
			foreach ($_GET as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$_GET[$this->_clean_input_keys($V2xim30qek4u)] = $this->_clean_input_data($Va4zo0rltynr);
			}
		}

		
		if (is_array($_POST))
		{
			foreach ($_POST as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$_POST[$this->_clean_input_keys($V2xim30qek4u)] = $this->_clean_input_data($Va4zo0rltynr);
			}
		}

		
		if (is_array($_COOKIE))
		{
			
			
			
			
			
			unset(
				$_COOKIE['$V5ml2x2nkl3r'],
				$_COOKIE['$Vqhks5zx4kmn'],
				$_COOKIE['$Vgchwfffm4wd']
			);

			foreach ($_COOKIE as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (($Vn2ycfau434sookie_key = $this->_clean_input_keys($V2xim30qek4u)) !== FALSE)
				{
					$_COOKIE[$Vn2ycfau434sookie_key] = $this->_clean_input_data($Va4zo0rltynr);
				}
				else
				{
					unset($_COOKIE[$V2xim30qek4u]);
				}
			}
		}

		
		$_SERVER['PHP_SELF'] = strip_tags($_SERVER['PHP_SELF']);

		log_message('debug', 'Global POST, GET and COOKIE data sanitized');
	}

	

	
	protected function _clean_input_data($Vssdjb5oqaky)
	{
		if (is_array($Vssdjb5oqaky))
		{
			$Vbosdmlbttmu = array();
			foreach (array_keys($Vssdjb5oqaky) as $V2xim30qek4u)
			{
				$Vbosdmlbttmu[$this->_clean_input_keys($V2xim30qek4u)] = $this->_clean_input_data($Vssdjb5oqaky[$V2xim30qek4u]);
			}
			return $Vbosdmlbttmu;
		}

		
		if ( ! is_php('5.4') && get_magic_quotes_gpc())
		{
			$Vssdjb5oqaky = stripslashes($Vssdjb5oqaky);
		}

		
		if (UTF8_ENABLED === TRUE)
		{
			$Vssdjb5oqaky = $this->uni->clean_string($Vssdjb5oqaky);
		}

		
		$Vssdjb5oqaky = remove_invisible_characters($Vssdjb5oqaky, FALSE);

		
		if ($this->_standardize_newlines === TRUE)
		{
			return preg_replace('/(?:\r\n|[\r\n])/', PHP_EOL, $Vssdjb5oqaky);
		}

		return $Vssdjb5oqaky;
	}

	

	
	protected function _clean_input_keys($Vssdjb5oqaky, $V12u3pbii5cy = TRUE)
	{
		if ( ! preg_match('/^[a-z0-9:_\/|-]+$/i', $Vssdjb5oqaky))
		{
			if ($V12u3pbii5cy === TRUE)
			{
				return FALSE;
			}
			else
			{
				set_status_header(503);
				echo 'Disallowed Key Characters.';
				exit(7); 
			}
		}

		
		if (UTF8_ENABLED === TRUE)
		{
			return $this->uni->clean_string($Vssdjb5oqaky);
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function request_headers($Vgzlesc0sebt = FALSE)
	{
		
		if ( ! empty($this->headers))
		{
			return $this->headers;
		}

		
		if (function_exists('apache_request_headers'))
		{
			return $this->headers = apache_request_headers();
		}

		$this->headers['Content-Type'] = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : @getenv('CONTENT_TYPE');

		foreach ($_SERVER as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (sscanf($V2xim30qek4u, 'HTTP_%s', $V3lefstrzfrx) === 1)
			{
				
				$V3lefstrzfrx = str_replace('_', ' ', strtolower($V3lefstrzfrx));
				$V3lefstrzfrx = str_replace(' ', '-', ucwords($V3lefstrzfrx));

				$this->headers[$V3lefstrzfrx] = $this->_fetch_from_array($_SERVER, $V2xim30qek4u, $Vgzlesc0sebt);
			}
		}

		return $this->headers;
	}

	

	
	public function get_request_header($Vuglyh4gwddb, $Vgzlesc0sebt = FALSE)
	{
		static $V3zljh1vyslw;

		if ( ! isset($V3zljh1vyslw))
		{
			empty($this->headers) && $this->request_headers();
			foreach ($this->headers as $V2xim30qek4u => $Vcnwqsowvhom)
			{
				$V3zljh1vyslw[strtolower($V2xim30qek4u)] = $Vcnwqsowvhom;
			}
		}

		$Vuglyh4gwddb = strtolower($Vuglyh4gwddb);

		if ( ! isset($V3zljh1vyslw[$Vuglyh4gwddb]))
		{
			return NULL;
		}

		return ($Vgzlesc0sebt === TRUE)
			? $this->security->xss_clean($V3zljh1vyslw[$Vuglyh4gwddb])
			: $V3zljh1vyslw[$Vuglyh4gwddb];
	}

	

	
	public function is_ajax_request()
	{
		return ( ! empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
	}

	

	
	public function is_cli_request()
	{
		return is_cli();
	}

	

	
	public function method($Vnoyno0s41nr = FALSE)
	{
		return ($Vnoyno0s41nr)
			? strtoupper($this->server('REQUEST_METHOD'))
			: strtolower($this->server('REQUEST_METHOD'));
	}

	

	
	public function __get($Vaclaigdbtoo)
	{
		if ($Vaclaigdbtoo === 'raw_input_stream')
		{
			isset($this->_raw_input_stream) OR $this->_raw_input_stream = file_get_contents('php://input');
			return $this->_raw_input_stream;
		}
		elseif ($Vaclaigdbtoo === 'ip_address')
		{
			return $this->ip_address;
		}
	}

}
