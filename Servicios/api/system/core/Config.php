<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Config {

	
	public $Vnmcm15juye5 = array();

	
	public $Vovatdfmsqln =	array();

	
	public $V42qdzktnslr =	array(APPPATH);

	

	
	public function __construct()
	{
		$this->config =& get_config();

		
		if (empty($this->config['base_url']))
		{
			if (isset($_SERVER['SERVER_ADDR']))
			{
				if (strpos($_SERVER['SERVER_ADDR'], ':') !== FALSE)
				{
					$Vv4rymb1rurd = '['.$_SERVER['SERVER_ADDR'].']';
				}
				else
				{
					$Vv4rymb1rurd = $_SERVER['SERVER_ADDR'];
				}

				$Vbyw4pefezev = (is_https() ? 'https' : 'http').'://'.$Vv4rymb1rurd
					.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
			}
			else
			{
				$Vbyw4pefezev = 'http://localhost/';
			}

			$this->set_item('base_url', $Vbyw4pefezev);
		}

		log_message('info', 'Config Class Initialized');
	}

	

	
	public function load($Vligofq0fb34 = '', $Vjwurk1sjs1c = FALSE, $Vt4pj4rhqzjl = FALSE)
	{
		$Vligofq0fb34 = ($Vligofq0fb34 === '') ? 'config' : str_replace('.php', '', $Vligofq0fb34);
		$Vgnsfwme3cn3 = FALSE;

		foreach ($this->_config_paths as $Vcmaitbcbmmk)
		{
			foreach (array($Vligofq0fb34, ENVIRONMENT.DIRECTORY_SEPARATOR.$Vligofq0fb34) as $Vrookiwro2xp)
			{
				$Vligofq0fb34_path = $Vcmaitbcbmmk.'config/'.$Vrookiwro2xp.'.php';
				if (in_array($Vligofq0fb34_path, $this->is_loaded, TRUE))
				{
					return TRUE;
				}

				if ( ! file_exists($Vligofq0fb34_path))
				{
					continue;
				}

				include($Vligofq0fb34_path);

				if ( ! isset($Vnmcm15juye5) OR ! is_array($Vnmcm15juye5))
				{
					if ($Vt4pj4rhqzjl === TRUE)
					{
						return FALSE;
					}

					show_error('Your '.$Vligofq0fb34_path.' file does not appear to contain a valid configuration array.');
				}

				if ($Vjwurk1sjs1c === TRUE)
				{
					$this->config[$Vligofq0fb34] = isset($this->config[$Vligofq0fb34])
						? array_merge($this->config[$Vligofq0fb34], $Vnmcm15juye5)
						: $Vnmcm15juye5;
				}
				else
				{
					$this->config = array_merge($this->config, $Vnmcm15juye5);
				}

				$this->is_loaded[] = $Vligofq0fb34_path;
				$Vnmcm15juye5 = NULL;
				$Vgnsfwme3cn3 = TRUE;
				log_message('debug', 'Config file loaded: '.$Vligofq0fb34_path);
			}
		}

		if ($Vgnsfwme3cn3 === TRUE)
		{
			return TRUE;
		}
		elseif ($Vt4pj4rhqzjl === TRUE)
		{
			return FALSE;
		}

		show_error('The configuration file '.$Vligofq0fb34.'.php does not exist.');
	}

	

	
	public function item($Vutaiebycwbq, $Vuglyh4gwddb = '')
	{
		if ($Vuglyh4gwddb == '')
		{
			return isset($this->config[$Vutaiebycwbq]) ? $this->config[$Vutaiebycwbq] : NULL;
		}

		return isset($this->config[$Vuglyh4gwddb], $this->config[$Vuglyh4gwddb][$Vutaiebycwbq]) ? $this->config[$Vuglyh4gwddb][$Vutaiebycwbq] : NULL;
	}

	

	
	public function slash_item($Vutaiebycwbq)
	{
		if ( ! isset($this->config[$Vutaiebycwbq]))
		{
			return NULL;
		}
		elseif (trim($this->config[$Vutaiebycwbq]) === '')
		{
			return '';
		}

		return rtrim($this->config[$Vutaiebycwbq], '/').'/';
	}

	

	
	public function site_url($V1naxfrpd12s = '', $Vibnldchwanv = NULL)
	{
		$Vbyw4pefezev = $this->slash_item('base_url');

		if (isset($Vibnldchwanv))
		{
			
			if ($Vibnldchwanv === '')
			{
				$Vbyw4pefezev = substr($Vbyw4pefezev, strpos($Vbyw4pefezev, '//'));
			}
			else
			{
				$Vbyw4pefezev = $Vibnldchwanv.substr($Vbyw4pefezev, strpos($Vbyw4pefezev, '://'));
			}
		}

		if (empty($V1naxfrpd12s))
		{
			return $Vbyw4pefezev.$this->item('index_page');
		}

		$V1naxfrpd12s = $this->_uri_string($V1naxfrpd12s);

		if ($this->item('enable_query_strings') === FALSE)
		{
			$Vth1qrkbbg4y = isset($this->config['url_suffix']) ? $this->config['url_suffix'] : '';

			if ($Vth1qrkbbg4y !== '')
			{
				if (($Vzawlyjaf5xg = strpos($V1naxfrpd12s, '?')) !== FALSE)
				{
					$V1naxfrpd12s = substr($V1naxfrpd12s, 0, $Vzawlyjaf5xg).$Vth1qrkbbg4y.substr($V1naxfrpd12s, $Vzawlyjaf5xg);
				}
				else
				{
					$V1naxfrpd12s .= $Vth1qrkbbg4y;
				}
			}

			return $Vbyw4pefezev.$this->slash_item('index_page').$V1naxfrpd12s;
		}
		elseif (strpos($V1naxfrpd12s, '?') === FALSE)
		{
			$V1naxfrpd12s = '?'.$V1naxfrpd12s;
		}

		return $Vbyw4pefezev.$this->item('index_page').$V1naxfrpd12s;
	}

	

	
	public function base_url($V1naxfrpd12s = '', $Vibnldchwanv = NULL)
	{
		$Vbyw4pefezev = $this->slash_item('base_url');

		if (isset($Vibnldchwanv))
		{
			
			if ($Vibnldchwanv === '')
			{
				$Vbyw4pefezev = substr($Vbyw4pefezev, strpos($Vbyw4pefezev, '//'));
			}
			else
			{
				$Vbyw4pefezev = $Vibnldchwanv.substr($Vbyw4pefezev, strpos($Vbyw4pefezev, '://'));
			}
		}

		return $Vbyw4pefezev.ltrim($this->_uri_string($V1naxfrpd12s), '/');
	}

	

	
	protected function _uri_string($V1naxfrpd12s)
	{
		if ($this->item('enable_query_strings') === FALSE)
		{
			if (is_array($V1naxfrpd12s))
			{
				$V1naxfrpd12s = implode('/', $V1naxfrpd12s);
			}
			return trim($V1naxfrpd12s, '/');
		}
		elseif (is_array($V1naxfrpd12s))
		{
			return http_build_query($V1naxfrpd12s);
		}

		return $V1naxfrpd12s;
	}

	

	
	public function system_url()
	{
		$V5ozzo11urso = explode('/', preg_replace('|/*(.+?)/*$|', '\\1', BASEPATH));
		return $this->slash_item('base_url').end($V5ozzo11urso).'/';
	}

	

	
	public function set_item($Vutaiebycwbq, $Vcnwqsowvhom)
	{
		$this->config[$Vutaiebycwbq] = $Vcnwqsowvhom;
	}

}
