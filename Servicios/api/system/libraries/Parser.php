<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Parser {

	
	public $V4uw1sxcvznu = '{';

	
	public $Vfkdx1130lvs = '}';

	
	protected $Vgw3d0qe3dgd;

	

	
	public function __construct()
	{
		$this->CI =& get_instance();
		log_message('info', 'Parser Class Initialized');
	}

	

	
	public function parse($Vwwfk0sxxxmx, $Vfeinw1hsfej, $Vb5hjbk2mbwk = FALSE)
	{
		$Vwwfk0sxxxmx = $this->CI->load->view($Vwwfk0sxxxmx, $Vfeinw1hsfej, TRUE);

		return $this->_parse($Vwwfk0sxxxmx, $Vfeinw1hsfej, $Vb5hjbk2mbwk);
	}

	

	
	public function parse_string($Vwwfk0sxxxmx, $Vfeinw1hsfej, $Vb5hjbk2mbwk = FALSE)
	{
		return $this->_parse($Vwwfk0sxxxmx, $Vfeinw1hsfej, $Vb5hjbk2mbwk);
	}

	

	
	protected function _parse($Vwwfk0sxxxmx, $Vfeinw1hsfej, $Vb5hjbk2mbwk = FALSE)
	{
		if ($Vwwfk0sxxxmx === '')
		{
			return FALSE;
		}

		$Vfx40ovsdrwf = array();
		foreach ($Vfeinw1hsfej as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vfx40ovsdrwf = array_merge(
				$Vfx40ovsdrwf,
				is_array($Va4zo0rltynr)
					? $this->_parse_pair($V2xim30qek4u, $Va4zo0rltynr, $Vwwfk0sxxxmx)
					: $this->_parse_single($V2xim30qek4u, (string) $Va4zo0rltynr, $Vwwfk0sxxxmx)
			);
		}

		unset($Vfeinw1hsfej);
		$Vwwfk0sxxxmx = strtr($Vwwfk0sxxxmx, $Vfx40ovsdrwf);

		if ($Vb5hjbk2mbwk === FALSE)
		{
			$this->CI->output->append_output($Vwwfk0sxxxmx);
		}

		return $Vwwfk0sxxxmx;
	}

	

	
	public function set_delimiters($V4stf05kgafy = '{', $Vyotgbgs03ci = '}')
	{
		$this->l_delim = $V4stf05kgafy;
		$this->r_delim = $Vyotgbgs03ci;
	}

	

	
	protected function _parse_single($V2xim30qek4u, $Va4zo0rltynr, $Vxgpowef4o2f)
	{
		return array($this->l_delim.$V2xim30qek4u.$this->r_delim => (string) $Va4zo0rltynr);
	}

	

	
	protected function _parse_pair($Vhbrz2xzi1vh, $Vfeinw1hsfej, $Vxgpowef4o2f)
	{
		$Vfx40ovsdrwf = array();
		preg_match_all(
			'#'.preg_quote($this->l_delim.$Vhbrz2xzi1vh.$this->r_delim).'(.+?)'.preg_quote($this->l_delim.'/'.$Vhbrz2xzi1vh.$this->r_delim).'#s',
			$Vxgpowef4o2f,
			$Vmbknpbfqa1s,
			PREG_SET_ORDER
		);

		foreach ($Vmbknpbfqa1s as $V4uvjtwtgjvp)
		{
			$Vssdjb5oqaky = '';
			foreach ($Vfeinw1hsfej as $Vyotgbgs03ciow)
			{
				$V3iiokxda3xw = array();
				foreach ($Vyotgbgs03ciow as $V2xim30qek4u => $Va4zo0rltynr)
				{
					if (is_array($Va4zo0rltynr))
					{
						$Vkbykeyj55np = $this->_parse_pair($V2xim30qek4u, $Va4zo0rltynr, $V4uvjtwtgjvp[1]);
						if ( ! empty($Vkbykeyj55np))
						{
							$V3iiokxda3xw = array_merge($V3iiokxda3xw, $Vkbykeyj55np);
						}

						continue;
					}

					$V3iiokxda3xw[$this->l_delim.$V2xim30qek4u.$this->r_delim] = $Va4zo0rltynr;
				}

				$Vssdjb5oqaky .= strtr($V4uvjtwtgjvp[1], $V3iiokxda3xw);
			}

			$Vfx40ovsdrwf[$V4uvjtwtgjvp[0]] = $Vssdjb5oqaky;
		}

		return $Vfx40ovsdrwf;
	}

}
