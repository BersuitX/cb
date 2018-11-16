<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Unit_test {

	
	public $V3oqseoezkak = TRUE;

	
	public $Ve4ocxhooq2w = array();

	
	public $Vxoptmq4yk55 = FALSE;

	
	protected $V00cika1bxtt = NULL;

	
	protected $V00cika1bxtt_rows = NULL;

	
	protected $Vtki0vqbmdyc	= array(
		'test_name',
		'test_datatype',
		'res_datatype',
		'result',
		'file',
		'line',
		'notes'
	);

	

	
	public function __construct()
	{
		log_message('info', 'Unit Testing Class Initialized');
	}

	

	
	public function set_test_items($Vschrm24dzkm)
	{
		if ( ! empty($Vschrm24dzkm) && is_array($Vschrm24dzkm))
		{
			$this->_test_items_visible = $Vschrm24dzkm;
		}
	}

	

	
	public function run($V5ok01k1lox1, $Vmgoej4ntvrb = TRUE, $V5ok01k1lox1_name = 'undefined', $Vi5c3m3c0mc3 = '')
	{
		if ($this->active === FALSE)
		{
			return FALSE;
		}

		if (in_array($Vmgoej4ntvrb, array('is_object', 'is_string', 'is_bool', 'is_true', 'is_false', 'is_int', 'is_numeric', 'is_float', 'is_double', 'is_array', 'is_null', 'is_resource'), TRUE))
		{
			$Vmgoej4ntvrb = str_replace('is_double', 'is_float', $Vmgoej4ntvrb);
			$Voetc43kt2cr = $Vmgoej4ntvrb($V5ok01k1lox1);
			$Vkox1iyaxqa0 = str_replace(array('true', 'false'), 'bool', str_replace('is_', '', $Vmgoej4ntvrb));
		}
		else
		{
			$Voetc43kt2cr = ($this->strict === TRUE) ? ($V5ok01k1lox1 === $Vmgoej4ntvrb) : ($V5ok01k1lox1 == $Vmgoej4ntvrb);
			$Vkox1iyaxqa0 = gettype($Vmgoej4ntvrb);
		}

		$Vcfa4oiysj5h = $this->_backtrace();

		$V1owac1v4gxs = array (
			'test_name'     => $V5ok01k1lox1_name,
			'test_datatype' => gettype($V5ok01k1lox1),
			'res_datatype'  => $Vkox1iyaxqa0,
			'result'        => ($Voetc43kt2cr === TRUE) ? 'passed' : 'failed',
			'file'          => $Vcfa4oiysj5h['file'],
			'line'          => $Vcfa4oiysj5h['line'],
			'notes'         => $Vi5c3m3c0mc3
		);

		$this->results[] = $V1owac1v4gxs;

		return $this->report($this->result(array($V1owac1v4gxs)));
	}

	

	
	public function report($Voetc43kt2cr = array())
	{
		if (count($Voetc43kt2cr) === 0)
		{
			$Voetc43kt2cr = $this->result();
		}

		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->load->language('unit_test');

		$this->_parse_template();

		$Vyotgbgs03ci = '';
		foreach ($Voetc43kt2cr as $Vyotgbgs03cies)
		{
			$Vhyg2tjvah5t = '';

			foreach ($Vyotgbgs03cies as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if ($V2xim30qek4u === $Vgw3d0qe3dgd->lang->line('ut_result'))
				{
					if ($Va4zo0rltynr === $Vgw3d0qe3dgd->lang->line('ut_passed'))
					{
						$Va4zo0rltynr = '<span style="color: #0C0;">'.$Va4zo0rltynr.'</span>';
					}
					elseif ($Va4zo0rltynr === $Vgw3d0qe3dgd->lang->line('ut_failed'))
					{
						$Va4zo0rltynr = '<span style="color: #C00;">'.$Va4zo0rltynr.'</span>';
					}
				}

				$Vhyg2tjvah5t .= str_replace(array('{item}', '{result}'), array($V2xim30qek4u, $Va4zo0rltynr), $this->_template_rows);
			}

			$Vyotgbgs03ci .= str_replace('{rows}', $Vhyg2tjvah5t, $this->_template);
		}

		return $Vyotgbgs03ci;
	}

	

	
	public function use_strict($Vnvig451khe4 = TRUE)
	{
		$this->strict = (bool) $Vnvig451khe4;
	}

	

	
	public function active($Vnvig451khe4 = TRUE)
	{
		$this->active = (bool) $Vnvig451khe4;
	}

	

	
	public function result($Ve4ocxhooq2w = array())
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->load->language('unit_test');

		if (count($Ve4ocxhooq2w) === 0)
		{
			$Ve4ocxhooq2w = $this->results;
		}

		$Vyotgbgs03cietval = array();
		foreach ($Ve4ocxhooq2w as $Voetc43kt2cr)
		{
			$V3iiokxda3xw = array();
			foreach ($Voetc43kt2cr as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if ( ! in_array($V2xim30qek4u, $this->_test_items_visible))
				{
					continue;
				}
				elseif (in_array($V2xim30qek4u, array('test_name', 'test_datatype', 'test_res_datatype', 'result'), TRUE))
				{
					if (FALSE !== ($Vcfdirgq3swa = $Vgw3d0qe3dgd->lang->line(strtolower('ut_'.$Va4zo0rltynr), FALSE)))
					{
						$Va4zo0rltynr = $Vcfdirgq3swa;
					}
				}

				$V3iiokxda3xw[$Vgw3d0qe3dgd->lang->line('ut_'.$V2xim30qek4u, FALSE)] = $Va4zo0rltynr;
			}

			$Vyotgbgs03cietval[] = $V3iiokxda3xw;
		}

		return $Vyotgbgs03cietval;
	}

	

	
	public function set_template($V3iiokxda3xwlate)
	{
		$this->_template = $V3iiokxda3xwlate;
	}

	

	
	protected function _backtrace()
	{
		$Vcfa4oiysj5h = debug_backtrace();
		return array(
			'file' => (isset($Vcfa4oiysj5h[1]['file']) ? $Vcfa4oiysj5h[1]['file'] : ''),
			'line' => (isset($Vcfa4oiysj5h[1]['line']) ? $Vcfa4oiysj5h[1]['line'] : '')
		);
	}

	

	
	protected function _default_template()
	{
		$this->_template = "\n".'<table style="width:100%; font-size:small; margin:10px 0; border-collapse:collapse; border:1px solid #CCC;">{rows}'."\n</table>";

		$this->_template_rows = "\n\t<tr>\n\t\t".'<th style="text-align: left; border-bottom:1px solid #CCC;">{item}</th>'
					."\n\t\t".'<td style="border-bottom:1px solid #CCC;">{result}</td>'."\n\t</tr>";
	}

	

	
	protected function _parse_template()
	{
		if ($this->_template_rows !== NULL)
		{
			return;
		}

		if ($this->_template === NULL OR ! preg_match('/\{rows\}(.*?)\{\/rows\}/si', $this->_template, $V4uvjtwtgjvp))
		{
			$this->_default_template();
			return;
		}

		$this->_template_rows = $V4uvjtwtgjvp[1];
		$this->_template = str_replace($V4uvjtwtgjvp[0], '{rows}', $this->_template);
	}

}


function is_true($V5ok01k1lox1)
{
	return ($V5ok01k1lox1 === TRUE);
}


function is_false($V5ok01k1lox1)
{
	return ($V5ok01k1lox1 === FALSE);
}
