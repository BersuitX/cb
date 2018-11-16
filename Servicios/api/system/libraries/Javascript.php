<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Javascript {

	
	protected $Vrkdjiln0qv4 = 'js';

	

	
	public function __construct($Vpz5i5lfmwft = array())
	{
		$Vpoj1s2hpsj1 = array('js_library_driver' => 'jquery', 'autoload' => TRUE);

		foreach ($Vpoj1s2hpsj1 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (isset($Vpz5i5lfmwft[$V2xim30qek4u]) && $Vpz5i5lfmwft[$V2xim30qek4u] !== '')
			{
				$Vpoj1s2hpsj1[$V2xim30qek4u] = $Vpz5i5lfmwft[$V2xim30qek4u];
			}
		}

		extract($Vpoj1s2hpsj1);

		$this->CI =& get_instance();

		
		$this->CI->load->library('Javascript/'.$Vrdpobbysb4e, array('autoload' => $Vpjdan4sxhq4));
		
		$this->js =& $this->CI->$Vrdpobbysb4e;

		log_message('info', 'Javascript Class Initialized and loaded. Driver used: '.$Vrdpobbysb4e);
	}

	
	
	

	
	public function blur($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_blur($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function change($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_change($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function click($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '', $Va52erai10ca = TRUE)
	{
		return $this->js->_click($V4sohn3vk0eg, $Vvml5dwxipxs, $Va52erai10ca);
	}

	

	
	public function dblclick($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_dblclick($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function error($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_error($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function focus($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_focus($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function hover($V4sohn3vk0eg = 'this', $Vfzfg5gvtkhu = '', $Vlxaqc0cx0ab = '')
	{
		return $this->js->_hover($V4sohn3vk0eg, $Vfzfg5gvtkhu, $Vlxaqc0cx0ab);
	}

	

	
	public function keydown($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_keydown($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function keyup($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_keyup($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function load($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_load($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function mousedown($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_mousedown($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function mouseout($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_mouseout($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function mouseover($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_mouseover($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function mouseup($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_mouseup($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function output($Vvml5dwxipxs)
	{
		return $this->js->_output($Vvml5dwxipxs);
	}

	

	
	public function ready($Vvml5dwxipxs)
	{
		return $this->js->_document_ready($Vvml5dwxipxs);
	}

	

	
	public function resize($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_resize($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function scroll($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_scroll($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	

	
	public function unload($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->js->_unload($V4sohn3vk0eg, $Vvml5dwxipxs);
	}

	
	
	

	
	public function addClass($V4sohn3vk0eg = 'this', $Va3nq5n3hqmx = '')
	{
		return $this->js->_addClass($V4sohn3vk0eg, $Va3nq5n3hqmx);
	}

	

	
	public function animate($V4sohn3vk0eg = 'this', $Vpz5i5lfmwft = array(), $Vakkwp2ovede = '', $Vfi5bo00ptdr = '')
	{
		return $this->js->_animate($V4sohn3vk0eg, $Vpz5i5lfmwft, $Vakkwp2ovede, $Vfi5bo00ptdr);
	}

	

	
	public function fadeIn($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_fadeIn($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);
	}

	

	
	public function fadeOut($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_fadeOut($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);
	}
	

	
	public function slideUp($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_slideUp($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);

	}

	

	
	public function removeClass($V4sohn3vk0eg = 'this', $Va3nq5n3hqmx = '')
	{
		return $this->js->_removeClass($V4sohn3vk0eg, $Va3nq5n3hqmx);
	}

	

	
	public function slideDown($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_slideDown($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);
	}

	

	
	public function slideToggle($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_slideToggle($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);

	}

	

	
	public function hide($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_hide($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);
	}

	

	
	public function toggle($V4sohn3vk0eg = 'this')
	{
		return $this->js->_toggle($V4sohn3vk0eg);

	}

	

	
	public function toggleClass($V4sohn3vk0eg = 'this', $Va3nq5n3hqmx = '')
	{
		return $this->js->_toggleClass($V4sohn3vk0eg, $Va3nq5n3hqmx);
	}

	

	
	public function show($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_show($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);
	}

	

	
	public function compile($Vqdnzywa351s = 'script_foot', $Vitew3fyrij0 = TRUE)
	{
		$this->js->_compile($Vqdnzywa351s, $Vitew3fyrij0);
	}

	

	
	public function clear_compile()
	{
		$this->js->_clear_compile();
	}

	

	
	public function external($Vscxbzuhecgt = '', $Vouvwwgmuf3i = FALSE)
	{
		if ($Vscxbzuhecgt !== '')
		{
			$this->_javascript_location = $Vscxbzuhecgt;
		}
		elseif ($this->CI->config->item('javascript_location') !== '')
		{
			$this->_javascript_location = $this->CI->config->item('javascript_location');
		}

		if ($Vouvwwgmuf3i === TRUE OR strpos($Vscxbzuhecgt, 'http://') === 0 OR strpos($Vscxbzuhecgt, 'https://') === 0)
		{
			$Vssdjb5oqaky = $this->_open_script($Vscxbzuhecgt);
		}
		elseif (strpos($this->_javascript_location, 'http://') !== FALSE)
		{
			$Vssdjb5oqaky = $this->_open_script($this->_javascript_location.$Vscxbzuhecgt);
		}
		else
		{
			$Vssdjb5oqaky = $this->_open_script($this->CI->config->slash_item('base_url').$this->_javascript_location.$Vscxbzuhecgt);
		}

		return $Vssdjb5oqaky.$this->_close_script();
	}

	

	
	public function inline($Vyjhklndi0ik, $Vqpnqywezwz3 = TRUE)
	{
		return $this->_open_script()
			. ($Vqpnqywezwz3 ? "\n// <![CDATA[\n".$Vyjhklndi0ik."\n// ]]>\n" : "\n".$Vyjhklndi0ik."\n")
			. $this->_close_script();
	}

	

	
	protected function _open_script($Vfxvkffw4s0y = '')
	{
		return '<script type="text/javascript" charset="'.strtolower($this->CI->config->item('charset')).'"'
			.($Vfxvkffw4s0y === '' ? '>' : ' src="'.$Vfxvkffw4s0y.'">');
	}

	

	
	protected function _close_script($Vfi5bo00ptdr = "\n")
	{
		return '</script>'.$Vfi5bo00ptdr;
	}

	
	
	

	
	public function update($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		return $this->js->_updater($V4sohn3vk0eg, $Vakkwp2ovede, $V5qfphxtzqv1);
	}

	

	
	public function generate_json($Voetc43kt2cr = NULL, $Vu11ga5b55dr = FALSE)
	{
		
		
		if ($Voetc43kt2cr !== NULL)
		{
			if (is_object($Voetc43kt2cr))
			{
				$Vvml5dwxipxson_result = is_callable(array($Voetc43kt2cr, 'result_array')) ? $Voetc43kt2cr->result_array() : (array) $Voetc43kt2cr;
			}
			elseif (is_array($Voetc43kt2cr))
			{
				$Vvml5dwxipxson_result = $Voetc43kt2cr;
			}
			else
			{
				return $this->_prep_args($Voetc43kt2cr);
			}
		}
		else
		{
			return 'null';
		}

		$Vvml5dwxipxson = array();
		$V3bs0vcoc2ft = TRUE;

		if ( ! is_array($Vvml5dwxipxson_result) && empty($Vvml5dwxipxson_result))
		{
			show_error('Generate JSON Failed - Illegal key, value pair.');
		}
		elseif ($Vu11ga5b55dr)
		{
			$V3bs0vcoc2ft = $this->_is_associative_array($Vvml5dwxipxson_result);
		}

		foreach ($Vvml5dwxipxson_result as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			if ($V3bs0vcoc2ft)
			{
				$Vvml5dwxipxson[] = $this->_prep_args($Vwyse0flpyxh, TRUE).':'.$this->generate_json($Vxxtccqydhzn, $Vu11ga5b55dr);
			}
			else
			{
				$Vvml5dwxipxson[] = $this->generate_json($Vxxtccqydhzn, $Vu11ga5b55dr);
			}
		}

		$Vvml5dwxipxson = implode(',', $Vvml5dwxipxson);

		return $V3bs0vcoc2ft ? '{'.$Vvml5dwxipxson.'}' : '['.$Vvml5dwxipxson.']';

	}

	

	
	protected function _is_associative_array($Vxspxkugwklm)
	{
		foreach (array_keys($Vxspxkugwklm) as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if ($V2xim30qek4u !== $Va4zo0rltynr)
			{
				return TRUE;
			}
		}

		return FALSE;
	}

	

	
	protected function _prep_args($Voetc43kt2cr, $Vlumq4gtr0am = FALSE)
	{
		if ($Voetc43kt2cr === NULL)
		{
			return 'null';
		}
		elseif (is_bool($Voetc43kt2cr))
		{
			return ($Voetc43kt2cr === TRUE) ? 'true' : 'false';
		}
		elseif (is_string($Voetc43kt2cr) OR $Vlumq4gtr0am)
		{
			return '"'.str_replace(array('\\', "\t", "\n", "\r", '"', '/'), array('\\\\', '\\t', '\\n', "\\r", '\"', '\/'), $Voetc43kt2cr).'"';
		}
		elseif (is_scalar($Voetc43kt2cr))
		{
			return $Voetc43kt2cr;
		}
	}

}
