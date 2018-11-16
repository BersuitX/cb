<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Jquery extends CI_Javascript {

	
	protected $Vtlslyf53fe0 = 'js';

	
	public $Vwqjyszjf5p5 = array();

	
	public $Vrnpqix3hfbo = array();

	
	public $Vaitv4ex1azr = FALSE;

	
	public $Vm2r40sbcrjl = FALSE;

	
	public $Vtjsukn5gq3r = FALSE;

	
	public $Vb0hjwt4rrdb = '';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		$this->CI =& get_instance();
		extract($Vpz5i5lfmwft);

		if ($Vpjdan4sxhq4 === TRUE)
		{
			$this->script();
		}

		log_message('info', 'Jquery Class Initialized');
	}

	
	
	

	
	protected function _blur($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'blur');
	}

	

	
	protected function _change($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'change');
	}

	

	
	protected function _click($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '', $Va52erai10ca = TRUE)
	{
		is_array($Vvml5dwxipxs) OR $Vvml5dwxipxs = array($Vvml5dwxipxs);

		if ($Va52erai10ca)
		{
			$Vvml5dwxipxs[] = 'return false;';
		}

		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'click');
	}

	

	
	protected function _dblclick($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'dblclick');
	}

	

	
	protected function _error($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'error');
	}

	

	
	protected function _focus($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'focus');
	}

	

	
	protected function _hover($V4sohn3vk0eg = 'this', $Vfzfg5gvtkhu = '', $Vlxaqc0cx0ab = '')
	{
		$Vlpartrmogje = "\n\t$(".$this->_prep_element($V4sohn3vk0eg).").hover(\n\t\tfunction()\n\t\t{\n\t\t\t{$Vfzfg5gvtkhu}\n\t\t}, \n\t\tfunction()\n\t\t{\n\t\t\t{$Vlxaqc0cx0ab}\n\t\t});\n";

		$this->jquery_code_for_compile[] = $Vlpartrmogje;

		return $Vlpartrmogje;
	}

	

	
	protected function _keydown($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'keydown');
	}

	

	
	protected function _keyup($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'keyup');
	}

	

	
	protected function _load($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'load');
	}

	

	
	protected function _mousedown($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'mousedown');
	}

	

	
	protected function _mouseout($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'mouseout');
	}

	

	
	protected function _mouseover($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'mouseover');
	}

	

	
	protected function _mouseup($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'mouseup');
	}

	

	
	protected function _output($Vfh01sh3nep3 = array())
	{
		if ( ! is_array($Vfh01sh3nep3))
		{
			$Vfh01sh3nep3 = array($Vfh01sh3nep3);
		}

		foreach ($Vfh01sh3nep3 as $Vvml5dwxipxs)
		{
			$this->jquery_code_for_compile[] = "\t".$Vvml5dwxipxs."\n";
		}
	}

	

	
	protected function _resize($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'resize');
	}

	

	
	protected function _scroll($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'scroll');
	}

	

	
	protected function _unload($V4sohn3vk0eg = 'this', $Vvml5dwxipxs = '')
	{
		return $this->_add_event($V4sohn3vk0eg, $Vvml5dwxipxs, 'unload');
	}

	
	
	

	
	protected function _addClass($V4sohn3vk0eg = 'this', $Va3nq5n3hqmx = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		return '$('.$V4sohn3vk0eg.').addClass("'.$Va3nq5n3hqmx.'");';
	}

	

	
	protected function _animate($V4sohn3vk0eg = 'this', $Vpz5i5lfmwft = array(), $Vakkwp2ovede = '', $Vfi5bo00ptdr = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		$Vx15oamkk2pm = "\t\t\t";

		foreach ($Vpz5i5lfmwft as $Vtij4wo4sgso => $Vcnwqsowvhom)
		{
			$Vx15oamkk2pm .= $Vtij4wo4sgso.": '".$Vcnwqsowvhom."', ";
		}

		$Vx15oamkk2pm = substr($Vx15oamkk2pm, 0, -2); 

		if ($Vakkwp2ovede !== '')
		{
			$Vakkwp2ovede = ', '.$Vakkwp2ovede;
		}

		if ($Vfi5bo00ptdr !== '')
		{
			$Vfi5bo00ptdr = ', '.$Vfi5bo00ptdr;
		}

		return "$({$V4sohn3vk0eg}).animate({\n$Vx15oamkk2pm\n\t\t}".$Vakkwp2ovede.$Vfi5bo00ptdr.');';
	}

	

	
	protected function _fadeIn($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return "$({$V4sohn3vk0eg}).fadeIn({$Vakkwp2ovede}{$V5qfphxtzqv1});";
	}

	

	
	protected function _fadeOut($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return '$('.$V4sohn3vk0eg.').fadeOut('.$Vakkwp2ovede.$V5qfphxtzqv1.');';
	}

	

	
	protected function _hide($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return "$({$V4sohn3vk0eg}).hide({$Vakkwp2ovede}{$V5qfphxtzqv1});";
	}

	

	
	protected function _removeClass($V4sohn3vk0eg = 'this', $Va3nq5n3hqmx = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		return '$('.$V4sohn3vk0eg.').removeClass("'.$Va3nq5n3hqmx.'");';
	}

	

	
	protected function _slideUp($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return '$('.$V4sohn3vk0eg.').slideUp('.$Vakkwp2ovede.$V5qfphxtzqv1.');';
	}

	

	
	protected function _slideDown($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return '$('.$V4sohn3vk0eg.').slideDown('.$Vakkwp2ovede.$V5qfphxtzqv1.');';
	}

	

	
	protected function _slideToggle($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return '$('.$V4sohn3vk0eg.').slideToggle('.$Vakkwp2ovede.$V5qfphxtzqv1.');';
	}

	

	
	protected function _toggle($V4sohn3vk0eg = 'this')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		return '$('.$V4sohn3vk0eg.').toggle();';
	}

	

	
	protected function _toggleClass($V4sohn3vk0eg = 'this', $Va3nq5n3hqmx = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		return '$('.$V4sohn3vk0eg.').toggleClass("'.$Va3nq5n3hqmx.'");';
	}

	

	
	protected function _show($V4sohn3vk0eg = 'this', $Vakkwp2ovede = '', $V5qfphxtzqv1 = '')
	{
		$V4sohn3vk0eg = $this->_prep_element($V4sohn3vk0eg);
		$Vakkwp2ovede = $this->_validate_speed($Vakkwp2ovede);

		if ($V5qfphxtzqv1 !== '')
		{
			$V5qfphxtzqv1 = ", function(){\n{$V5qfphxtzqv1}\n}";
		}

		return '$('.$V4sohn3vk0eg.').show('.$Vakkwp2ovede.$V5qfphxtzqv1.');';
	}

	

	

	protected function _updater($Vbtqsqazug1g = 'this', $Vhu2a2k1d152 = '', $V1flr55fnyyv = '')
	{
		$Vbtqsqazug1g = $this->_prep_element($Vbtqsqazug1g);
		$Vhu2a2k1d152 = (strpos('://', $Vhu2a2k1d152) === FALSE) ? $Vhu2a2k1d152 : $this->CI->config->site_url($Vhu2a2k1d152);

		
		if ($this->CI->config->item('javascript_ajax_img') === '')
		{
			$V23kbztklqw3 = 'Loading...';
		}
		else
		{
			$V23kbztklqw3 = '<img src="'.$this->CI->config->slash_item('base_url').$this->CI->config->item('javascript_ajax_img').'" alt="Loading" />';
		}

		$V4k2oeybaklj = '$('.$Vbtqsqazug1g.").empty();\n" 
			."\t\t$(".$Vbtqsqazug1g.').prepend("'.$V23kbztklqw3."\");\n"; 

		$Vy52rtnoma1q = '';
		if ($V1flr55fnyyv !== '')
		{
			$Vy52rtnoma1q .= ', {'
					.(is_array($V1flr55fnyyv) ? "'".implode("', '", $V1flr55fnyyv)."'" : "'".str_replace(':', "':'", $V1flr55fnyyv)."'")
					.'}';
		}

		return $V4k2oeybaklj."\t\t$($Vbtqsqazug1g).load('$Vhu2a2k1d152'$Vy52rtnoma1q);";
	}

	
	
	

	
	protected function _zebraTables($Va3nq5n3hqmx = '', $Vbgrnmcw44tw = 'odd', $Vkjnzqr0qobt = '')
	{
		$Va3nq5n3hqmx = ($Va3nq5n3hqmx !== '') ? '.'.$Va3nq5n3hqmx : '';
		$Vcnaodo5k0fn = "\t\$(\"table{$Va3nq5n3hqmx} tbody tr:nth-child(even)\").addClass(\"{$Vbgrnmcw44tw}\");";

		$this->jquery_code_for_compile[] = $Vcnaodo5k0fn;

		if ($Vkjnzqr0qobt !== '')
		{
			$Vkjnzqr0qobt = $this->hover("table{$Va3nq5n3hqmx} tbody tr", "$(this).addClass('hover');", "$(this).removeClass('hover');");
		}

		return $Vcnaodo5k0fn;
	}

	
	
	

	
	public function corner($V4sohn3vk0eg = '', $Vddpyigc5aqs = '')
	{
		
		$Vhxnlwymgmz2 = '/plugins/jquery.corner.js';

		if ($Vddpyigc5aqs !== '')
		{
			$Vddpyigc5aqs = '"'.$Vddpyigc5aqs.'"';
		}

		return '$('.$this->_prep_element($V4sohn3vk0eg).').corner('.$Vddpyigc5aqs.');';
	}

	

	
	public function modal($Vfxvkffw4s0y, $Vouvwwgmuf3i = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($Vfxvkffw4s0y, $Vouvwwgmuf3i);
	}

	

	
	public function effect($Vfxvkffw4s0y, $Vouvwwgmuf3i = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($Vfxvkffw4s0y, $Vouvwwgmuf3i);
	}

	

	
	public function plugin($Vfxvkffw4s0y, $Vouvwwgmuf3i = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($Vfxvkffw4s0y, $Vouvwwgmuf3i);
	}

	

	
	public function ui($Vfxvkffw4s0y, $Vouvwwgmuf3i = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($Vfxvkffw4s0y, $Vouvwwgmuf3i);
	}

	

	
	public function sortable($V4sohn3vk0eg, $V1flr55fnyyv = array())
	{
		if (count($V1flr55fnyyv) > 0)
		{
			$Vgpaqv225j0w = array();
			foreach ($V1flr55fnyyv as $Vwyse0flpyxh=>$Vxxtccqydhzn)
			{
				$Vgpaqv225j0w[] = "\n\t\t".$Vwyse0flpyxh.': '.$Vxxtccqydhzn;
			}
			$Vgpaqv225j0w = implode(',', $Vgpaqv225j0w);
		}
		else
		{
			$Vgpaqv225j0w = '';
		}

		return '$('.$this->_prep_element($V4sohn3vk0eg).').sortable({'.$Vgpaqv225j0w."\n\t});";
	}

	

	
	public function tablesorter($Vhyg2tjvah5t = '', $V1flr55fnyyv = '')
	{
		$this->jquery_code_for_compile[] = "\t$(".$this->_prep_element($Vhyg2tjvah5t).').tablesorter('.$V1flr55fnyyv.");\n";
	}

	
	
	

	
	protected function _add_event($V4sohn3vk0eg, $Vvml5dwxipxs, $Vlpartrmogje)
	{
		if (is_array($Vvml5dwxipxs))
		{
			$Vvml5dwxipxs = implode("\n\t\t", $Vvml5dwxipxs);
		}

		$Vlpartrmogje = "\n\t$(".$this->_prep_element($V4sohn3vk0eg).').'.$Vlpartrmogje."(function(){\n\t\t{$Vvml5dwxipxs}\n\t});\n";
		$this->jquery_code_for_compile[] = $Vlpartrmogje;
		return $Vlpartrmogje;
	}

	

	
	protected function _compile($Vxxtccqydhzniew_var = 'script_foot', $Vitew3fyrij0 = TRUE)
	{
		
		$Vyt1bbzhshjd = implode('', $this->jquery_code_for_load);
		$this->CI->load->vars(array('library_src' => $Vyt1bbzhshjd));

		if (count($this->jquery_code_for_compile) === 0)
		{
			
			return;
		}

		
		$Vyjhklndi0ik = '$(document).ready(function() {'."\n"
			.implode('', $this->jquery_code_for_compile)
			.'});';

		$Vlxaqc0cx0abput = ($Vitew3fyrij0 === FALSE) ? $Vyjhklndi0ik : $this->inline($Vyjhklndi0ik);

		$this->CI->load->vars(array($Vxxtccqydhzniew_var => $Vlxaqc0cx0abput));
	}

	

	
	protected function _clear_compile()
	{
		$this->jquery_code_for_compile = array();
	}

	

	
	protected function _document_ready($Vvml5dwxipxs)
	{
		is_array($Vvml5dwxipxs) OR $Vvml5dwxipxs = array($Vvml5dwxipxs);

		foreach ($Vvml5dwxipxs as $Vyjhklndi0ik)
		{
			$this->jquery_code_for_compile[] = $Vyjhklndi0ik;
		}
	}

	

	
	public function script($Vn4s30lpknv5 = '', $Vouvwwgmuf3i = FALSE)
	{
		$Vn4s30lpknv5 = $this->external($Vn4s30lpknv5, $Vouvwwgmuf3i);
		$this->jquery_code_for_load[] = $Vn4s30lpknv5;
		return $Vn4s30lpknv5;
	}

	

	
	protected function _prep_element($V4sohn3vk0eg)
	{
		if ($V4sohn3vk0eg !== 'this')
		{
			$V4sohn3vk0eg = '"'.$V4sohn3vk0eg.'"';
		}

		return $V4sohn3vk0eg;
	}

	

	
	protected function _validate_speed($Vakkwp2ovede)
	{
		if (in_array($Vakkwp2ovede, array('slow', 'normal', 'fast')))
		{
			return '"'.$Vakkwp2ovede.'"';
		}
		elseif (preg_match('/[^0-9]/', $Vakkwp2ovede))
		{
			return '';
		}

		return $Vakkwp2ovede;
	}

}
