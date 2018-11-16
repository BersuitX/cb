<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_URI {

	
	public $Vv5ql0ieepod = array();

	
	public $Vyxyiwbswies = '';

	
	public $Vlszxw4pvps0 = array();

	
	public $V4fnwknizkma = array();

	
	protected $V2xsvy3zhfu4;

	
	public function __construct()
	{
		$this->config =& load_class('Config', 'core');

		
		
		if (is_cli() OR $this->config->item('enable_query_strings') !== TRUE)
		{
			$this->_permitted_uri_chars = $this->config->item('permitted_uri_chars');

			
			if (is_cli())
			{
				$V1naxfrpd12s = $this->_parse_argv();
			}
			else
			{
				$Vibnldchwanv = $this->config->item('uri_protocol');
				empty($Vibnldchwanv) && $Vibnldchwanv = 'REQUEST_URI';

				switch ($Vibnldchwanv)
				{
					case 'AUTO': 
					case 'REQUEST_URI':
						$V1naxfrpd12s = $this->_parse_request_uri();
						break;
					case 'QUERY_STRING':
						$V1naxfrpd12s = $this->_parse_query_string();
						break;
					case 'PATH_INFO':
					default:
						$V1naxfrpd12s = isset($_SERVER[$Vibnldchwanv])
							? $_SERVER[$Vibnldchwanv]
							: $this->_parse_request_uri();
						break;
				}
			}

			$this->_set_uri_string($V1naxfrpd12s);
		}

		log_message('info', 'URI Class Initialized');
	}

	

	
	protected function _set_uri_string($Vssdjb5oqaky)
	{
		
		$this->uri_string = trim(remove_invisible_characters($Vssdjb5oqaky, FALSE), '/');

		if ($this->uri_string !== '')
		{
			
			if (($Vth1qrkbbg4y = (string) $this->config->item('url_suffix')) !== '')
			{
				$Vqmi0l4jfbci = strlen($Vth1qrkbbg4y);

				if (substr($this->uri_string, -$Vqmi0l4jfbci) === $Vth1qrkbbg4y)
				{
					$this->uri_string = substr($this->uri_string, 0, -$Vqmi0l4jfbci);
				}
			}

			$this->segments[0] = NULL;
			
			foreach (explode('/', trim($this->uri_string, '/')) as $Va4zo0rltynr)
			{
				$Va4zo0rltynr = trim($Va4zo0rltynr);
				
				$this->filter_uri($Va4zo0rltynr);

				if ($Va4zo0rltynr !== '')
				{
					$this->segments[] = $Va4zo0rltynr;
				}
			}

			unset($this->segments[0]);
		}
	}

	

	
	protected function _parse_request_uri()
	{
		if ( ! isset($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME']))
		{
			return '';
		}

		
		
		$V1naxfrpd12s = parse_url('http://dummy'.$_SERVER['REQUEST_URI']);
		$Vfvggg0pmnws = isset($V1naxfrpd12s['query']) ? $V1naxfrpd12s['query'] : '';
		$V1naxfrpd12s = isset($V1naxfrpd12s['path']) ? $V1naxfrpd12s['path'] : '';

		if (isset($_SERVER['SCRIPT_NAME'][0]))
		{
			if (strpos($V1naxfrpd12s, $_SERVER['SCRIPT_NAME']) === 0)
			{
				$V1naxfrpd12s = (string) substr($V1naxfrpd12s, strlen($_SERVER['SCRIPT_NAME']));
			}
			elseif (strpos($V1naxfrpd12s, dirname($_SERVER['SCRIPT_NAME'])) === 0)
			{
				$V1naxfrpd12s = (string) substr($V1naxfrpd12s, strlen(dirname($_SERVER['SCRIPT_NAME'])));
			}
		}

		
		
		if (trim($V1naxfrpd12s, '/') === '' && strncmp($Vfvggg0pmnws, '/', 1) === 0)
		{
			$Vfvggg0pmnws = explode('?', $Vfvggg0pmnws, 2);
			$V1naxfrpd12s = $Vfvggg0pmnws[0];
			$_SERVER['QUERY_STRING'] = isset($Vfvggg0pmnws[1]) ? $Vfvggg0pmnws[1] : '';
		}
		else
		{
			$_SERVER['QUERY_STRING'] = $Vfvggg0pmnws;
		}

		parse_str($_SERVER['QUERY_STRING'], $_GET);

		if ($V1naxfrpd12s === '/' OR $V1naxfrpd12s === '')
		{
			return '/';
		}

		
		return $this->_remove_relative_directory($V1naxfrpd12s);
	}

	

	
	protected function _parse_query_string()
	{
		$V1naxfrpd12s = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : @getenv('QUERY_STRING');

		if (trim($V1naxfrpd12s, '/') === '')
		{
			return '';
		}
		elseif (strncmp($V1naxfrpd12s, '/', 1) === 0)
		{
			$V1naxfrpd12s = explode('?', $V1naxfrpd12s, 2);
			$_SERVER['QUERY_STRING'] = isset($V1naxfrpd12s[1]) ? $V1naxfrpd12s[1] : '';
			$V1naxfrpd12s = $V1naxfrpd12s[0];
		}

		parse_str($_SERVER['QUERY_STRING'], $_GET);

		return $this->_remove_relative_directory($V1naxfrpd12s);
	}

	

	
	protected function _parse_argv()
	{
		$Vz3ndrbat24t = array_slice($_SERVER['argv'], 1);
		return $Vz3ndrbat24t ? implode('/', $Vz3ndrbat24t) : '';
	}

	

	
	protected function _remove_relative_directory($V1naxfrpd12s)
	{
		$V1naxfrpd12ss = array();
		$V1w1svghx0yw = strtok($V1naxfrpd12s, '/');
		while ($V1w1svghx0yw !== FALSE)
		{
			if (( ! empty($V1w1svghx0yw) OR $V1w1svghx0yw === '0') && $V1w1svghx0yw !== '..')
			{
				$V1naxfrpd12ss[] = $V1w1svghx0yw;
			}
			$V1w1svghx0yw = strtok('/');
		}

		return implode('/', $V1naxfrpd12ss);
	}

	

	
	public function filter_uri(&$Vssdjb5oqaky)
	{
		if ( ! empty($Vssdjb5oqaky) && ! empty($this->_permitted_uri_chars) && ! preg_match('/^['.$this->_permitted_uri_chars.']+$/i'.(UTF8_ENABLED ? 'u' : ''), $Vssdjb5oqaky))
		{
			show_error('The URI you submitted has disallowed characters.', 400);
		}
	}

	

	
	public function segment($Vewkafdpowpc, $Vewkafdpowpco_result = NULL)
	{
		return isset($this->segments[$Vewkafdpowpc]) ? $this->segments[$Vewkafdpowpc] : $Vewkafdpowpco_result;
	}

	

	
	public function rsegment($Vewkafdpowpc, $Vewkafdpowpco_result = NULL)
	{
		return isset($this->rsegments[$Vewkafdpowpc]) ? $this->rsegments[$Vewkafdpowpc] : $Vewkafdpowpco_result;
	}

	

	
	public function uri_to_assoc($Vewkafdpowpc = 3, $Vexts11gu2nb = array())
	{
		return $this->_uri_to_assoc($Vewkafdpowpc, $Vexts11gu2nb, 'segment');
	}

	

	
	public function ruri_to_assoc($Vewkafdpowpc = 3, $Vexts11gu2nb = array())
	{
		return $this->_uri_to_assoc($Vewkafdpowpc, $Vexts11gu2nb, 'rsegment');
	}

	

	
	protected function _uri_to_assoc($Vewkafdpowpc = 3, $Vexts11gu2nb = array(), $Vffv04rnk4xn = 'segment')
	{
		if ( ! is_numeric($Vewkafdpowpc))
		{
			return $Vexts11gu2nb;
		}

		if (isset($this->keyval[$Vffv04rnk4xn], $this->keyval[$Vffv04rnk4xn][$Vewkafdpowpc]))
		{
			return $this->keyval[$Vffv04rnk4xn][$Vewkafdpowpc];
		}

		$Vhngwc3usp3x = "total_{$Vffv04rnk4xn}s";
		$Vh3zch0n2dfe = "{$Vffv04rnk4xn}_array";

		if ($this->$Vhngwc3usp3x() < $Vewkafdpowpc)
		{
			return (count($Vexts11gu2nb) === 0)
				? array()
				: array_fill_keys($Vexts11gu2nb, NULL);
		}

		$Vlszxw4pvps0 = array_slice($this->$Vh3zch0n2dfe(), ($Vewkafdpowpc - 1));
		$Vep0df0xosaw = 0;
		$Vjhsohcofw13 = '';
		$V1qi3fii2jjy = array();
		foreach ($Vlszxw4pvps0 as $V2kckrpstzjm)
		{
			if ($Vep0df0xosaw % 2)
			{
				$V1qi3fii2jjy[$Vjhsohcofw13] = $V2kckrpstzjm;
			}
			else
			{
				$V1qi3fii2jjy[$V2kckrpstzjm] = NULL;
				$Vjhsohcofw13 = $V2kckrpstzjm;
			}

			$Vep0df0xosaw++;
		}

		if (count($Vexts11gu2nb) > 0)
		{
			foreach ($Vexts11gu2nb as $Va4zo0rltynr)
			{
				if ( ! array_key_exists($Va4zo0rltynr, $V1qi3fii2jjy))
				{
					$V1qi3fii2jjy[$Va4zo0rltynr] = NULL;
				}
			}
		}

		
		isset($this->keyval[$Vffv04rnk4xn]) OR $this->keyval[$Vffv04rnk4xn] = array();
		$this->keyval[$Vffv04rnk4xn][$Vewkafdpowpc] = $V1qi3fii2jjy;
		return $V1qi3fii2jjy;
	}

	

	
	public function assoc_to_uri($V5adckfdzb1d)
	{
		$V3iiokxda3xw = array();
		foreach ((array) $V5adckfdzb1d as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$V3iiokxda3xw[] = $V2xim30qek4u;
			$V3iiokxda3xw[] = $Va4zo0rltynr;
		}

		return implode('/', $V3iiokxda3xw);
	}

	

	
	public function slash_segment($Vewkafdpowpc, $Vutq5hwyqsvw = 'trailing')
	{
		return $this->_slash_segment($Vewkafdpowpc, $Vutq5hwyqsvw, 'segment');
	}

	

	
	public function slash_rsegment($Vewkafdpowpc, $Vutq5hwyqsvw = 'trailing')
	{
		return $this->_slash_segment($Vewkafdpowpc, $Vutq5hwyqsvw, 'rsegment');
	}

	

	
	protected function _slash_segment($Vewkafdpowpc, $Vutq5hwyqsvw = 'trailing', $Vffv04rnk4xn = 'segment')
	{
		$Vo31bwnu5rwu = $Vxiheuyeqyyg = '/';

		if ($Vutq5hwyqsvw === 'trailing')
		{
			$Vo31bwnu5rwu	= '';
		}
		elseif ($Vutq5hwyqsvw === 'leading')
		{
			$Vxiheuyeqyyg	= '';
		}

		return $Vo31bwnu5rwu.$this->$Vffv04rnk4xn($Vewkafdpowpc).$Vxiheuyeqyyg;
	}

	

	
	public function segment_array()
	{
		return $this->segments;
	}

	

	
	public function rsegment_array()
	{
		return $this->rsegments;
	}

	

	
	public function total_segments()
	{
		return count($this->segments);
	}

	

	
	public function total_rsegments()
	{
		return count($this->rsegments);
	}

	

	
	public function uri_string()
	{
		return $this->uri_string;
	}

	

	
	public function ruri_string()
	{
		return ltrim(load_class('Router', 'core')->directory, '/').implode('/', $this->rsegments);
	}

}
