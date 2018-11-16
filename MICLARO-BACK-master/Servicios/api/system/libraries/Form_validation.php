<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Form_validation {

	
	protected $Vgw3d0qe3dgd;

	
	protected $Vjb2x2zl322y		= array();

	
	protected $Vfqvdcqvlnki	= array();

	
	protected $Vlhsnxhbsvio		= array();

	
	protected $Va522o0n3kvn	= array();

	
	protected $Vqq2x5o3frmq	= '<p>';

	
	protected $Vzuzgibphexm	= '</p>';

	
	protected $Vp51pmiak25a		= '';

	
	protected $Vam3hswudgo3	= FALSE;

	
	public $Vumhhf2ncz15	= array();

	
	public function __construct($Vywtwaykxaal = array())
	{
		$this->CI =& get_instance();

		
		if (isset($Vywtwaykxaal['error_prefix']))
		{
			$this->_error_prefix = $Vywtwaykxaal['error_prefix'];
			unset($Vywtwaykxaal['error_prefix']);
		}
		if (isset($Vywtwaykxaal['error_suffix']))
		{
			$this->_error_suffix = $Vywtwaykxaal['error_suffix'];
			unset($Vywtwaykxaal['error_suffix']);
		}

		
		$this->_config_rules = $Vywtwaykxaal;

		
		$this->CI->load->helper('form');

		log_message('info', 'Form Validation Class Initialized');
	}

	

	
	public function set_rules($Vwji4rxkyw5j, $Vl024rj3h4hx = '', $Vywtwaykxaal = array(), $V4oalzimcdms = array())
	{
		
		
		if ($this->CI->input->method() !== 'post' && empty($this->validation_data))
		{
			return $this;
		}

		
		
		if (is_array($Vwji4rxkyw5j))
		{
			foreach ($Vwji4rxkyw5j as $Vf3jo4nkd2sr)
			{
				
				if ( ! isset($Vf3jo4nkd2sr['field'], $Vf3jo4nkd2sr['rules']))
				{
					continue;
				}

				
				$Vl024rj3h4hx = isset($Vf3jo4nkd2sr['label']) ? $Vf3jo4nkd2sr['label'] : $Vf3jo4nkd2sr['field'];

				
				$V4oalzimcdms = (isset($Vf3jo4nkd2sr['errors']) && is_array($Vf3jo4nkd2sr['errors'])) ? $Vf3jo4nkd2sr['errors'] : array();

				
				$this->set_rules($Vf3jo4nkd2sr['field'], $Vl024rj3h4hx, $Vf3jo4nkd2sr['rules'], $V4oalzimcdms);
			}

			return $this;
		}

		
		if ( ! is_string($Vwji4rxkyw5j) OR $Vwji4rxkyw5j === '' OR empty($Vywtwaykxaal))
		{
			return $this;
		}
		elseif ( ! is_array($Vywtwaykxaal))
		{
			
			if ( ! is_string($Vywtwaykxaal))
			{
				return $this;
			}

			$Vywtwaykxaal = preg_split('/\|(?![^\[]*\])/', $Vywtwaykxaal);
		}

		
		$Vl024rj3h4hx = ($Vl024rj3h4hx === '') ? $Vwji4rxkyw5j : $Vl024rj3h4hx;

		$V2g53og3crqk = array();

		
		
		if (($Vtjofu2d2ffo = (bool) preg_match_all('/\[(.*?)\]/', $Vwji4rxkyw5j, $Vmbknpbfqa1s)) === TRUE)
		{
			sscanf($Vwji4rxkyw5j, '%[^[][', $V2g53og3crqk[0]);

			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vmbknpbfqa1s[0]); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				if ($Vmbknpbfqa1s[1][$Vep0df0xosaw] !== '')
				{
					$V2g53og3crqk[] = $Vmbknpbfqa1s[1][$Vep0df0xosaw];
				}
			}
		}

		
		$this->_field_data[$Vwji4rxkyw5j] = array(
			'field'		=> $Vwji4rxkyw5j,
			'label'		=> $Vl024rj3h4hx,
			'rules'		=> $Vywtwaykxaal,
			'errors'	=> $V4oalzimcdms,
			'is_array'	=> $Vtjofu2d2ffo,
			'keys'		=> $V2g53og3crqk,
			'postdata'	=> NULL,
			'error'		=> ''
		);

		return $this;
	}

	

	
	public function set_data(array $Vfeinw1hsfej)
	{
		if ( ! empty($Vfeinw1hsfej))
		{
			$this->validation_data = $Vfeinw1hsfej;
		}

		return $this;
	}

	

	
	public function set_message($V0epxtzjncyc, $Va4zo0rltynr = '')
	{
		if ( ! is_array($V0epxtzjncyc))
		{
			$V0epxtzjncyc = array($V0epxtzjncyc => $Va4zo0rltynr);
		}

		$this->_error_messages = array_merge($this->_error_messages, $V0epxtzjncyc);
		return $this;
	}

	

	
	public function set_error_delimiters($Vapdd0fqkaxu = '<p>', $Vth1qrkbbg4y = '</p>')
	{
		$this->_error_prefix = $Vapdd0fqkaxu;
		$this->_error_suffix = $Vth1qrkbbg4y;
		return $this;
	}

	

	
	public function error($Vwji4rxkyw5j, $Vapdd0fqkaxu = '', $Vth1qrkbbg4y = '')
	{
		if (empty($this->_field_data[$Vwji4rxkyw5j]['error']))
		{
			return '';
		}

		if ($Vapdd0fqkaxu === '')
		{
			$Vapdd0fqkaxu = $this->_error_prefix;
		}

		if ($Vth1qrkbbg4y === '')
		{
			$Vth1qrkbbg4y = $this->_error_suffix;
		}

		return $Vapdd0fqkaxu.$this->_field_data[$Vwji4rxkyw5j]['error'].$Vth1qrkbbg4y;
	}

	

	
	public function error_array()
	{
		return $this->_error_array;
	}

	

	
	public function error_string($Vapdd0fqkaxu = '', $Vth1qrkbbg4y = '')
	{
		
		if (count($this->_error_array) === 0)
		{
			return '';
		}

		if ($Vapdd0fqkaxu === '')
		{
			$Vapdd0fqkaxu = $this->_error_prefix;
		}

		if ($Vth1qrkbbg4y === '')
		{
			$Vth1qrkbbg4y = $this->_error_suffix;
		}

		
		$Vssdjb5oqaky = '';
		foreach ($this->_error_array as $Va4zo0rltynr)
		{
			if ($Va4zo0rltynr !== '')
			{
				$Vssdjb5oqaky .= $Vapdd0fqkaxu.$Va4zo0rltynr.$Vth1qrkbbg4y."\n";
			}
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function run($Vmpppgsxkyfz = '')
	{
		$Va4zo0rltynridation_array = empty($this->validation_data)
			? $_POST
			: $this->validation_data;

		
		
		if (count($this->_field_data) === 0)
		{
			
			if (count($this->_config_rules) === 0)
			{
				return FALSE;
			}

			if (empty($Vmpppgsxkyfz))
			{
				
				$Vmpppgsxkyfz = trim($this->CI->uri->ruri_string(), '/');
				isset($this->_config_rules[$Vmpppgsxkyfz]) OR $Vmpppgsxkyfz = $this->CI->router->class.'/'.$this->CI->router->method;
			}

			$this->set_rules(isset($this->_config_rules[$Vmpppgsxkyfz]) ? $this->_config_rules[$Vmpppgsxkyfz] : $this->_config_rules);

			
			if (count($this->_field_data) === 0)
			{
				log_message('debug', 'Unable to find validation rules');
				return FALSE;
			}
		}

		
		$this->CI->lang->load('form_validation');

		
		foreach ($this->_field_data as $Vwji4rxkyw5j => &$Vf3jo4nkd2sr)
		{
			
			
			if ($Vf3jo4nkd2sr['is_array'] === TRUE)
			{
				$this->_field_data[$Vwji4rxkyw5j]['postdata'] = $this->_reduce_array($Va4zo0rltynridation_array, $Vf3jo4nkd2sr['keys']);
			}
			elseif (isset($Va4zo0rltynridation_array[$Vwji4rxkyw5j]))
			{
				$this->_field_data[$Vwji4rxkyw5j]['postdata'] = $Va4zo0rltynridation_array[$Vwji4rxkyw5j];
			}
		}

		
		
		
		foreach ($this->_field_data as $Vwji4rxkyw5j => &$Vf3jo4nkd2sr)
		{
			
			if (empty($Vf3jo4nkd2sr['rules']))
			{
				continue;
			}

			$this->_execute($Vf3jo4nkd2sr, $Vf3jo4nkd2sr['rules'], $Vf3jo4nkd2sr['postdata']);
		}

		
		$Vxvz5otkcuqi = count($this->_error_array);
		if ($Vxvz5otkcuqi > 0)
		{
			$this->_safe_form_data = TRUE;
		}

		
		empty($this->validation_data) && $this->_reset_post_array();

		return ($Vxvz5otkcuqi === 0);
	}

	

	
	protected function _reduce_array($V5adckfdzb1d, $Vpgpnbxy5p5e, $Vep0df0xosaw = 0)
	{
		if (is_array($V5adckfdzb1d) && isset($Vpgpnbxy5p5e[$Vep0df0xosaw]))
		{
			return isset($V5adckfdzb1d[$Vpgpnbxy5p5e[$Vep0df0xosaw]]) ? $this->_reduce_array($V5adckfdzb1d[$Vpgpnbxy5p5e[$Vep0df0xosaw]], $Vpgpnbxy5p5e, ($Vep0df0xosaw+1)) : NULL;
		}

		
		return ($V5adckfdzb1d === '') ? NULL : $V5adckfdzb1d;
	}

	

	
	protected function _reset_post_array()
	{
		foreach ($this->_field_data as $Vwji4rxkyw5j => $Vf3jo4nkd2sr)
		{
			if ($Vf3jo4nkd2sr['postdata'] !== NULL)
			{
				if ($Vf3jo4nkd2sr['is_array'] === FALSE)
				{
					isset($_POST[$Vwji4rxkyw5j]) && $_POST[$Vwji4rxkyw5j] = $Vf3jo4nkd2sr['postdata'];
				}
				else
				{
					
					$Va5psneuqzqi =& $_POST;

					
					if (count($Vf3jo4nkd2sr['keys']) === 1)
					{
						$Va5psneuqzqi =& $Va5psneuqzqi[current($Vf3jo4nkd2sr['keys'])];
					}
					else
					{
						foreach ($Vf3jo4nkd2sr['keys'] as $Va4zo0rltynr)
						{
							$Va5psneuqzqi =& $Va5psneuqzqi[$Va4zo0rltynr];
						}
					}

					$Va5psneuqzqi = $Vf3jo4nkd2sr['postdata'];
				}
			}
		}
	}

	

	
	protected function _execute($Vf3jo4nkd2sr, $Vywtwaykxaal, $Vinaolaljfer = NULL, $Vn2ycfau434sycles = 0)
	{
		
		
		
		
		if (is_array($Vinaolaljfer) && ! empty($Vinaolaljfer))
		{
			foreach ($Vinaolaljfer as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$this->_execute($Vf3jo4nkd2sr, $Vywtwaykxaal, $Va4zo0rltynr, $V2xim30qek4u);
			}

			return;
		}

		
		$Vn2ycfau434sallback = FALSE;
		if ( ! in_array('required', $Vywtwaykxaal) && ($Vinaolaljfer === NULL OR $Vinaolaljfer === ''))
		{
			
			foreach ($Vywtwaykxaal as &$Vuq0dlpvhwju)
			{
				if (is_string($Vuq0dlpvhwju))
				{
					if (strncmp($Vuq0dlpvhwju, 'callback_', 9) === 0)
					{
						$Vn2ycfau434sallback = TRUE;
						$Vywtwaykxaal = array(1 => $Vuq0dlpvhwju);
						break;
					}
				}
				elseif (is_callable($Vuq0dlpvhwju))
				{
					$Vn2ycfau434sallback = TRUE;
					$Vywtwaykxaal = array(1 => $Vuq0dlpvhwju);
					break;
				}
				elseif (is_array($Vuq0dlpvhwju) && isset($Vuq0dlpvhwju[0], $Vuq0dlpvhwju[1]) && is_callable($Vuq0dlpvhwju[1]))
				{
					$Vn2ycfau434sallback = TRUE;
					$Vywtwaykxaal = array(array($Vuq0dlpvhwju[0], $Vuq0dlpvhwju[1]));
					break;
				}
			}

			if ( ! $Vn2ycfau434sallback)
			{
				return;
			}
		}

		
		if (($Vinaolaljfer === NULL OR $Vinaolaljfer === '') && ! $Vn2ycfau434sallback)
		{
			if (in_array('isset', $Vywtwaykxaal, TRUE) OR in_array('required', $Vywtwaykxaal))
			{
				
				$V4wtbblc1wn4 = in_array('required', $Vywtwaykxaal) ? 'required' : 'isset';

				$Vcfdirgq3swa = $this->_get_error_message($V4wtbblc1wn4, $Vf3jo4nkd2sr['field']);

				
				$V15xvmvzbb0h = $this->_build_error_msg($Vcfdirgq3swa, $this->_translate_fieldname($Vf3jo4nkd2sr['label']));

				
				$this->_field_data[$Vf3jo4nkd2sr['field']]['error'] = $V15xvmvzbb0h;

				if ( ! isset($this->_error_array[$Vf3jo4nkd2sr['field']]))
				{
					$this->_error_array[$Vf3jo4nkd2sr['field']] = $V15xvmvzbb0h;
				}
			}

			return;
		}

		

		
		foreach ($Vywtwaykxaal as $Vuq0dlpvhwju)
		{
			$Vpkbaita2adh = FALSE;

			
			
			if ($Vf3jo4nkd2sr['is_array'] === TRUE && is_array($this->_field_data[$Vf3jo4nkd2sr['field']]['postdata']))
			{
				
				
				if ( ! isset($this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'][$Vn2ycfau434sycles]))
				{
					continue;
				}

				$Vinaolaljfer = $this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'][$Vn2ycfau434sycles];
				$Vpkbaita2adh = TRUE;
			}
			else
			{
				
				
				
				$Vinaolaljfer = is_array($this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'])
					? NULL
					: $this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'];
			}

			
			$Vn2ycfau434sallback = $Vn2ycfau434sallable = FALSE;
			if (is_string($Vuq0dlpvhwju))
			{
				if (strpos($Vuq0dlpvhwju, 'callback_') === 0)
				{
					$Vuq0dlpvhwju = substr($Vuq0dlpvhwju, 9);
					$Vn2ycfau434sallback = TRUE;
				}
			}
			elseif (is_callable($Vuq0dlpvhwju))
			{
				$Vn2ycfau434sallable = TRUE;
			}
			elseif (is_array($Vuq0dlpvhwju) && isset($Vuq0dlpvhwju[0], $Vuq0dlpvhwju[1]) && is_callable($Vuq0dlpvhwju[1]))
			{
				
				$Vn2ycfau434sallable = $Vuq0dlpvhwju[0];
				$Vuq0dlpvhwju = $Vuq0dlpvhwju[1];
			}

			
			
			$Vtij4wo4sgso = FALSE;
			if ( ! $Vn2ycfau434sallable && preg_match('/(.*?)\[(.*)\]/', $Vuq0dlpvhwju, $V4uvjtwtgjvp))
			{
				$Vuq0dlpvhwju = $V4uvjtwtgjvp[1];
				$Vtij4wo4sgso = $V4uvjtwtgjvp[2];
			}

			
			if ($Vn2ycfau434sallback OR $Vn2ycfau434sallable !== FALSE)
			{
				if ($Vn2ycfau434sallback)
				{
					if ( ! method_exists($this->CI, $Vuq0dlpvhwju))
					{
						log_message('debug', 'Unable to find callback validation rule: '.$Vuq0dlpvhwju);
						$Voetc43kt2cr = FALSE;
					}
					else
					{
						
						$Voetc43kt2cr = $this->CI->$Vuq0dlpvhwju($Vinaolaljfer, $Vtij4wo4sgso);
					}
				}
				else
				{
					$Voetc43kt2cr = is_array($Vuq0dlpvhwju)
						? $Vuq0dlpvhwju[0]->{$Vuq0dlpvhwju[1]}($Vinaolaljfer)
						: $Vuq0dlpvhwju($Vinaolaljfer);

					
					if ($Vn2ycfau434sallable !== FALSE)
					{
						$Vuq0dlpvhwju = $Vn2ycfau434sallable;
					}
				}

				
				if ($Vpkbaita2adh === TRUE)
				{
					$this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'][$Vn2ycfau434sycles] = is_bool($Voetc43kt2cr) ? $Vinaolaljfer : $Voetc43kt2cr;
				}
				else
				{
					$this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'] = is_bool($Voetc43kt2cr) ? $Vinaolaljfer : $Voetc43kt2cr;
				}

				
				if ( ! in_array('required', $Vywtwaykxaal, TRUE) && $Voetc43kt2cr !== FALSE)
				{
					continue;
				}
			}
			elseif ( ! method_exists($this, $Vuq0dlpvhwju))
			{
				
				
				if (function_exists($Vuq0dlpvhwju))
				{
					
					$Voetc43kt2cr = ($Vtij4wo4sgso !== FALSE) ? $Vuq0dlpvhwju($Vinaolaljfer, $Vtij4wo4sgso) : $Vuq0dlpvhwju($Vinaolaljfer);

					if ($Vpkbaita2adh === TRUE)
					{
						$this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'][$Vn2ycfau434sycles] = is_bool($Voetc43kt2cr) ? $Vinaolaljfer : $Voetc43kt2cr;
					}
					else
					{
						$this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'] = is_bool($Voetc43kt2cr) ? $Vinaolaljfer : $Voetc43kt2cr;
					}
				}
				else
				{
					log_message('debug', 'Unable to find validation rule: '.$Vuq0dlpvhwju);
					$Voetc43kt2cr = FALSE;
				}
			}
			else
			{
				$Voetc43kt2cr = $this->$Vuq0dlpvhwju($Vinaolaljfer, $Vtij4wo4sgso);

				if ($Vpkbaita2adh === TRUE)
				{
					$this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'][$Vn2ycfau434sycles] = is_bool($Voetc43kt2cr) ? $Vinaolaljfer : $Voetc43kt2cr;
				}
				else
				{
					$this->_field_data[$Vf3jo4nkd2sr['field']]['postdata'] = is_bool($Voetc43kt2cr) ? $Vinaolaljfer : $Voetc43kt2cr;
				}
			}

			
			if ($Voetc43kt2cr === FALSE)
			{
				
				if ( ! is_string($Vuq0dlpvhwju))
				{
					$Vcfdirgq3swa = $this->CI->lang->line('form_validation_error_message_not_set').'(Anonymous function)';
				}
				else
				{
					$Vcfdirgq3swa = $this->_get_error_message($Vuq0dlpvhwju, $Vf3jo4nkd2sr['field']);
				}

				
				
				if (isset($this->_field_data[$Vtij4wo4sgso], $this->_field_data[$Vtij4wo4sgso]['label']))
				{
					$Vtij4wo4sgso = $this->_translate_fieldname($this->_field_data[$Vtij4wo4sgso]['label']);
				}

				
				$V15xvmvzbb0h = $this->_build_error_msg($Vcfdirgq3swa, $this->_translate_fieldname($Vf3jo4nkd2sr['label']), $Vtij4wo4sgso);

				
				$this->_field_data[$Vf3jo4nkd2sr['field']]['error'] = $V15xvmvzbb0h;

				if ( ! isset($this->_error_array[$Vf3jo4nkd2sr['field']]))
				{
					$this->_error_array[$Vf3jo4nkd2sr['field']] = $V15xvmvzbb0h;
				}

				return;
			}
		}
	}

	

	
	protected function _get_error_message($Vuq0dlpvhwju, $Vwji4rxkyw5j)
	{
		
		if (isset($this->_field_data[$Vwji4rxkyw5j]['errors'][$Vuq0dlpvhwju]))
		{
			return $this->_field_data[$Vwji4rxkyw5j]['errors'][$Vuq0dlpvhwju];
		}
		
		elseif (isset($this->_error_messages[$Vuq0dlpvhwju]))
		{
			return $this->_error_messages[$Vuq0dlpvhwju];
		}
		elseif (FALSE !== ($Vcfdirgq3swa = $this->CI->lang->line('form_validation_'.$Vuq0dlpvhwju)))
		{
			return $Vcfdirgq3swa;
		}
		
		elseif (FALSE !== ($Vcfdirgq3swa = $this->CI->lang->line($Vuq0dlpvhwju, FALSE)))
		{
			return $Vcfdirgq3swa;
		}

		return $this->CI->lang->line('form_validation_error_message_not_set').'('.$Vuq0dlpvhwju.')';
	}

	

	
	protected function _translate_fieldname($Vwji4rxkyw5jname)
	{
		
		
		if (sscanf($Vwji4rxkyw5jname, 'lang:%s', $Vcfdirgq3swa) === 1 && FALSE === ($Vwji4rxkyw5jname = $this->CI->lang->line($Vcfdirgq3swa, FALSE)))
		{
			return $Vcfdirgq3swa;
		}

		return $Vwji4rxkyw5jname;
	}

	

	
	protected function _build_error_msg($Vcfdirgq3swa, $Vwji4rxkyw5j = '', $Vtij4wo4sgso = '')
	{
		
		if (strpos($Vcfdirgq3swa, '%s') !== FALSE)
		{
			return sprintf($Vcfdirgq3swa, $Vwji4rxkyw5j, $Vtij4wo4sgso);
		}

		return str_replace(array('{field}', '{param}'), array($Vwji4rxkyw5j, $Vtij4wo4sgso), $Vcfdirgq3swa);
	}

	

	
	public function has_rule($Vwji4rxkyw5j)
	{
		return isset($this->_field_data[$Vwji4rxkyw5j]);
	}

	

	
	public function set_value($Vwji4rxkyw5j = '', $Vexts11gu2nb = '')
	{
		if ( ! isset($this->_field_data[$Vwji4rxkyw5j], $this->_field_data[$Vwji4rxkyw5j]['postdata']))
		{
			return $Vexts11gu2nb;
		}

		
		
		if (is_array($this->_field_data[$Vwji4rxkyw5j]['postdata']))
		{
			return array_shift($this->_field_data[$Vwji4rxkyw5j]['postdata']);
		}

		return $this->_field_data[$Vwji4rxkyw5j]['postdata'];
	}

	

	
	public function set_select($Vwji4rxkyw5j = '', $Va4zo0rltynrue = '', $Vexts11gu2nb = FALSE)
	{
		if ( ! isset($this->_field_data[$Vwji4rxkyw5j], $this->_field_data[$Vwji4rxkyw5j]['postdata']))
		{
			return ($Vexts11gu2nb === TRUE && count($this->_field_data) === 0) ? ' selected="selected"' : '';
		}

		$Vwji4rxkyw5j = $this->_field_data[$Vwji4rxkyw5j]['postdata'];
		$Va4zo0rltynrue = (string) $Va4zo0rltynrue;
		if (is_array($Vwji4rxkyw5j))
		{
			
			foreach ($Vwji4rxkyw5j as &$Vxxtccqydhzn)
			{
				if ($Va4zo0rltynrue === $Vxxtccqydhzn)
				{
					return ' selected="selected"';
				}
			}

			return '';
		}
		elseif (($Vwji4rxkyw5j === '' OR $Va4zo0rltynrue === '') OR ($Vwji4rxkyw5j !== $Va4zo0rltynrue))
		{
			return '';
		}

		return ' selected="selected"';
	}

	

	
	public function set_radio($Vwji4rxkyw5j = '', $Va4zo0rltynrue = '', $Vexts11gu2nb = FALSE)
	{
		if ( ! isset($this->_field_data[$Vwji4rxkyw5j], $this->_field_data[$Vwji4rxkyw5j]['postdata']))
		{
			return ($Vexts11gu2nb === TRUE && count($this->_field_data) === 0) ? ' checked="checked"' : '';
		}

		$Vwji4rxkyw5j = $this->_field_data[$Vwji4rxkyw5j]['postdata'];
		$Va4zo0rltynrue = (string) $Va4zo0rltynrue;
		if (is_array($Vwji4rxkyw5j))
		{
			
			foreach ($Vwji4rxkyw5j as &$Vxxtccqydhzn)
			{
				if ($Va4zo0rltynrue === $Vxxtccqydhzn)
				{
					return ' checked="checked"';
				}
			}

			return '';
		}
		elseif (($Vwji4rxkyw5j === '' OR $Va4zo0rltynrue === '') OR ($Vwji4rxkyw5j !== $Va4zo0rltynrue))
		{
			return '';
		}

		return ' checked="checked"';
	}

	

	
	public function set_checkbox($Vwji4rxkyw5j = '', $Va4zo0rltynrue = '', $Vexts11gu2nb = FALSE)
	{
		
		return $this->set_radio($Vwji4rxkyw5j, $Va4zo0rltynrue, $Vexts11gu2nb);
	}

	

	
	public function required($Vssdjb5oqaky)
	{
		return is_array($Vssdjb5oqaky) ? (bool) count($Vssdjb5oqaky) : (trim($Vssdjb5oqaky) !== '');
	}

	

	
	public function regex_match($Vssdjb5oqaky, $Vwyoe0versv3)
	{
		return (bool) preg_match($Vwyoe0versv3, $Vssdjb5oqaky);
	}

	

	
	public function matches($Vssdjb5oqaky, $Vwji4rxkyw5j)
	{
		return isset($this->_field_data[$Vwji4rxkyw5j], $this->_field_data[$Vwji4rxkyw5j]['postdata'])
			? ($Vssdjb5oqaky === $this->_field_data[$Vwji4rxkyw5j]['postdata'])
			: FALSE;
	}

	

	
	public function differs($Vssdjb5oqaky, $Vwji4rxkyw5j)
	{
		return ! (isset($this->_field_data[$Vwji4rxkyw5j]) && $this->_field_data[$Vwji4rxkyw5j]['postdata'] === $Vssdjb5oqaky);
	}

	

	
	public function is_unique($Vssdjb5oqaky, $Vwji4rxkyw5j)
	{
		sscanf($Vwji4rxkyw5j, '%[^.].%[^.]', $Vhyg2tjvah5t, $Vwji4rxkyw5j);
		return isset($this->CI->db)
			? ($this->CI->db->limit(1)->get_where($Vhyg2tjvah5t, array($Vwji4rxkyw5j => $Vssdjb5oqaky))->num_rows() === 0)
			: FALSE;
	}

	

	
	public function min_length($Vssdjb5oqaky, $Va4zo0rltynr)
	{
		if ( ! is_numeric($Va4zo0rltynr))
		{
			return FALSE;
		}

		return ($Va4zo0rltynr <= mb_strlen($Vssdjb5oqaky));
	}

	

	
	public function max_length($Vssdjb5oqaky, $Va4zo0rltynr)
	{
		if ( ! is_numeric($Va4zo0rltynr))
		{
			return FALSE;
		}

		return ($Va4zo0rltynr >= mb_strlen($Vssdjb5oqaky));
	}

	

	
	public function exact_length($Vssdjb5oqaky, $Va4zo0rltynr)
	{
		if ( ! is_numeric($Va4zo0rltynr))
		{
			return FALSE;
		}

		return (mb_strlen($Vssdjb5oqaky) === (int) $Va4zo0rltynr);
	}

	

	
	public function valid_url($Vssdjb5oqaky)
	{
		if (empty($Vssdjb5oqaky))
		{
			return FALSE;
		}
		elseif (preg_match('/^(?:([^:]*)\:)?\/\/(.+)$/', $Vssdjb5oqaky, $Vmbknpbfqa1s))
		{
			if (empty($Vmbknpbfqa1s[2]))
			{
				return FALSE;
			}
			elseif ( ! in_array($Vmbknpbfqa1s[1], array('http', 'https'), TRUE))
			{
				return FALSE;
			}

			$Vssdjb5oqaky = $Vmbknpbfqa1s[2];
		}

		
		
		
		if (preg_match('/^\[([^\]]+)\]/', $Vssdjb5oqaky, $Vmbknpbfqa1s) && ! is_php('7') && filter_var($Vmbknpbfqa1s[1], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== FALSE)
		{
			$Vssdjb5oqaky = 'ipv6.host'.substr($Vssdjb5oqaky, strlen($Vmbknpbfqa1s[1]) + 2);
		}

		$Vssdjb5oqaky = 'http://'.$Vssdjb5oqaky;

		
		
		
		if (version_compare(PHP_VERSION, '5.2.13', '==') OR version_compare(PHP_VERSION, '5.3.2', '=='))
		{
			sscanf($Vssdjb5oqaky, 'http://%[^/]', $Vmxohjw5kehj);
			$Vssdjb5oqaky = substr_replace($Vssdjb5oqaky, strtr($Vmxohjw5kehj, array('_' => '-', '-' => '_')), 7, strlen($Vmxohjw5kehj));
		}

		return (filter_var($Vssdjb5oqaky, FILTER_VALIDATE_URL) !== FALSE);
	}

	

	
	public function valid_email($Vssdjb5oqaky)
	{
		if (function_exists('idn_to_ascii') && $Vya2qxacr13k = strpos($Vssdjb5oqaky, '@'))
		{
			$Vssdjb5oqaky = substr($Vssdjb5oqaky, 0, ++$Vya2qxacr13k).idn_to_ascii(substr($Vssdjb5oqaky, $Vya2qxacr13k));
		}

		return (bool) filter_var($Vssdjb5oqaky, FILTER_VALIDATE_EMAIL);
	}

	

	
	public function valid_emails($Vssdjb5oqaky)
	{
		if (strpos($Vssdjb5oqaky, ',') === FALSE)
		{
			return $this->valid_email(trim($Vssdjb5oqaky));
		}

		foreach (explode(',', $Vssdjb5oqaky) as $Vi2s52urac1m)
		{
			if (trim($Vi2s52urac1m) !== '' && $this->valid_email(trim($Vi2s52urac1m)) === FALSE)
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	

	
	public function valid_ip($Vep0df0xosawp, $Vffv04rnk4xn = '')
	{
		return $this->CI->input->valid_ip($Vep0df0xosawp, $Vffv04rnk4xn);
	}

	

	
	public function alpha($Vssdjb5oqaky)
	{
		return ctype_alpha($Vssdjb5oqaky);
	}

	

	
	public function alpha_numeric($Vssdjb5oqaky)
	{
		return ctype_alnum((string) $Vssdjb5oqaky);
	}

	

	
	public function alpha_numeric_spaces($Vssdjb5oqaky)
	{
		return (bool) preg_match('/^[A-Z0-9 ]+$/i', $Vssdjb5oqaky);
	}

	

	
	public function alpha_dash($Vssdjb5oqaky)
	{
		return (bool) preg_match('/^[a-z0-9_-]+$/i', $Vssdjb5oqaky);
	}

	

	
	public function numeric($Vssdjb5oqaky)
	{
		return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $Vssdjb5oqaky);

	}

	

	
	public function integer($Vssdjb5oqaky)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+$/', $Vssdjb5oqaky);
	}

	

	
	public function decimal($Vssdjb5oqaky)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $Vssdjb5oqaky);
	}

	

	
	public function greater_than($Vssdjb5oqaky, $Vs22d354gql3)
	{
		return is_numeric($Vssdjb5oqaky) ? ($Vssdjb5oqaky > $Vs22d354gql3) : FALSE;
	}

	

	
	public function greater_than_equal_to($Vssdjb5oqaky, $Vs22d354gql3)
	{
		return is_numeric($Vssdjb5oqaky) ? ($Vssdjb5oqaky >= $Vs22d354gql3) : FALSE;
	}

	

	
	public function less_than($Vssdjb5oqaky, $Vbaryldhgqml)
	{
		return is_numeric($Vssdjb5oqaky) ? ($Vssdjb5oqaky < $Vbaryldhgqml) : FALSE;
	}

	

	
	public function less_than_equal_to($Vssdjb5oqaky, $Vbaryldhgqml)
	{
		return is_numeric($Vssdjb5oqaky) ? ($Vssdjb5oqaky <= $Vbaryldhgqml) : FALSE;
	}

	

	
	public function in_list($Va4zo0rltynrue, $V1q5xkbcnn5z)
	{
		return in_array($Va4zo0rltynrue, explode(',', $V1q5xkbcnn5z), TRUE);
	}

	

	
	public function is_natural($Vssdjb5oqaky)
	{
		return ctype_digit((string) $Vssdjb5oqaky);
	}

	

	
	public function is_natural_no_zero($Vssdjb5oqaky)
	{
		return ($Vssdjb5oqaky != 0 && ctype_digit((string) $Vssdjb5oqaky));
	}

	

	
	public function valid_base64($Vssdjb5oqaky)
	{
		return (base64_encode(base64_decode($Vssdjb5oqaky)) === $Vssdjb5oqaky);
	}

	

	
	public function prep_for_form($Vfeinw1hsfej)
	{
		if ($this->_safe_form_data === FALSE OR empty($Vfeinw1hsfej))
		{
			return $Vfeinw1hsfej;
		}

		if (is_array($Vfeinw1hsfej))
		{
			foreach ($Vfeinw1hsfej as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vfeinw1hsfej[$V2xim30qek4u] = $this->prep_for_form($Va4zo0rltynr);
			}

			return $Vfeinw1hsfej;
		}

		return str_replace(array("'", '"', '<', '>'), array('&#39;', '&quot;', '&lt;', '&gt;'), stripslashes($Vfeinw1hsfej));
	}

	

	
	public function prep_url($Vssdjb5oqaky = '')
	{
		if ($Vssdjb5oqaky === 'http://' OR $Vssdjb5oqaky === '')
		{
			return '';
		}

		if (strpos($Vssdjb5oqaky, 'http://') !== 0 && strpos($Vssdjb5oqaky, 'https://') !== 0)
		{
			return 'http://'.$Vssdjb5oqaky;
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function strip_image_tags($Vssdjb5oqaky)
	{
		return $this->CI->security->strip_image_tags($Vssdjb5oqaky);
	}

	

	
	public function encode_php_tags($Vssdjb5oqaky)
	{
		return str_replace(array('<?', '?>'), array('&lt;?', '?&gt;'), $Vssdjb5oqaky);
	}

	

	
	public function reset_validation()
	{
		$this->_field_data = array();
		$this->_error_array = array();
		$this->_error_messages = array();
		$this->error_string = '';
		return $this;
	}

}
