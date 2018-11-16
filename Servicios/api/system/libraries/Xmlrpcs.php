<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('xml_parser_create'))
{
	show_error('Your PHP installation does not support XML');
}

if ( ! class_exists('CI_Xmlrpc', FALSE))
{
	show_error('You must load the Xmlrpc class before loading the Xmlrpcs class in order to create a server.');
}




class CI_Xmlrpcs extends CI_Xmlrpc {

	
	public $Vqjdbxwow5vq = array();

	
	public $Vns0roriroq2 = '';

	
	public $V0lmdi0meir0	= array();

	
	public $V1v3xsp031u0 = FALSE;

	
	public function __construct($Vnmcm15juye5 = array())
	{
		parent::__construct();
		$this->set_system_methods();

		if (isset($Vnmcm15juye5['functions']) && is_array($Vnmcm15juye5['functions']))
		{
			$this->methods = array_merge($this->methods, $Vnmcm15juye5['functions']);
		}

		log_message('info', 'XML-RPC Server Class Initialized');
	}

	

	
	public function initialize($Vnmcm15juye5 = array())
	{
		if (isset($Vnmcm15juye5['functions']) && is_array($Vnmcm15juye5['functions']))
		{
			$this->methods = array_merge($this->methods, $Vnmcm15juye5['functions']);
		}

		if (isset($Vnmcm15juye5['debug']))
		{
			$this->debug = $Vnmcm15juye5['debug'];
		}

		if (isset($Vnmcm15juye5['object']) && is_object($Vnmcm15juye5['object']))
		{
			$this->object = $Vnmcm15juye5['object'];
		}

		if (isset($Vnmcm15juye5['xss_clean']))
		{
			$this->xss_clean = $Vnmcm15juye5['xss_clean'];
		}
	}

	

	
	public function set_system_methods()
	{
		$this->methods = array(
					'system.listMethods'	 => array(
										'function' => 'this.listMethods',
										'signature' => array(array($this->xmlrpcArray, $this->xmlrpcString), array($this->xmlrpcArray)),
										'docstring' => 'Returns an array of available methods on this server'),
					'system.methodHelp'	 => array(
										'function' => 'this.methodHelp',
										'signature' => array(array($this->xmlrpcString, $this->xmlrpcString)),
										'docstring' => 'Returns a documentation string for the specified method'),
					'system.methodSignature' => array(
										'function' => 'this.methodSignature',
										'signature' => array(array($this->xmlrpcArray, $this->xmlrpcString)),
										'docstring' => 'Returns an array describing the return type and required parameters of a method'),
					'system.multicall'	 => array(
										'function' => 'this.multicall',
										'signature' => array(array($this->xmlrpcArray, $this->xmlrpcArray)),
										'docstring' => 'Combine multiple RPC calls in one request. See http://www.xmlrpc.com/discuss/msgReader$1208 for details')
				);
	}

	

	
	public function serve()
	{
		$Vyotgbgs03ci = $this->parseRequest();
		$Vslgp0k341xf = '<?xml version="1.0" encoding="'.$this->xmlrpc_defencoding.'"?'.'>'."\n".$this->debug_msg.$Vyotgbgs03ci->prepare_response();

		header('Content-Type: text/xml');
		header('Content-Length: '.strlen($Vslgp0k341xf));
		exit($Vslgp0k341xf);
	}

	

	
	public function add_to_map($Vtlapygqxrh0, $V5mhcgfyfeif, $Vykkkbjeclbr, $Vp0mfnsrbefd)
	{
		$this->methods[$Vtlapygqxrh0] = array(
			'function'	=> $V5mhcgfyfeif,
			'signature'	=> $Vykkkbjeclbr,
			'docstring'	=> $Vp0mfnsrbefd
		);
	}

	

	
	public function parseRequest($Vfeinw1hsfej = '')
	{
		
		
		

		if ($Vfeinw1hsfej === '')
		{
			$Vgw3d0qe3dgd =& get_instance();
			if ($Vgw3d0qe3dgd->input->method() === 'post')
			{
				$Vfeinw1hsfej = $Vgw3d0qe3dgd->input->raw_input_stream;
			}
		}

		
		
		

		$Vyxnfe3d002h = xml_parser_create($this->xmlrpc_defencoding);
		$Vyxnfe3d002h_object = new XML_RPC_Message('filler');
		$Vdg54dqqikm5 = (string) $Vyxnfe3d002h;

		$Vyxnfe3d002h_object->xh[$Vdg54dqqikm5] = array(
			'isf' => 0,
			'isf_reason' => '',
			'params' => array(),
			'stack' => array(),
			'valuestack' => array(),
			'method' => ''
		);

		xml_set_object($Vyxnfe3d002h, $Vyxnfe3d002h_object);
		xml_parser_set_option($Vyxnfe3d002h, XML_OPTION_CASE_FOLDING, TRUE);
		xml_set_element_handler($Vyxnfe3d002h, 'open_tag', 'closing_tag');
		xml_set_character_data_handler($Vyxnfe3d002h, 'character_data');
		

		
		
		

		if ( ! xml_parse($Vyxnfe3d002h, $Vfeinw1hsfej, 1))
		{
			
			$Vyotgbgs03ci = new XML_RPC_Response(0,
				$this->xmlrpcerrxml + xml_get_error_code($Vyxnfe3d002h),
				sprintf('XML error: %s at line %d',
				xml_error_string(xml_get_error_code($Vyxnfe3d002h)),
				xml_get_current_line_number($Vyxnfe3d002h)));
			xml_parser_free($Vyxnfe3d002h);
		}
		elseif ($Vyxnfe3d002h_object->xh[$Vdg54dqqikm5]['isf'])
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['invalid_return'], $this->xmlrpcstr['invalid_return']);
		}
		else
		{
			xml_parser_free($Vyxnfe3d002h);

			$Vlnkcet4wpd0 = new XML_RPC_Message($Vyxnfe3d002h_object->xh[$Vdg54dqqikm5]['method']);
			$Vgsb4etiylcx = '';

			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vyxnfe3d002h_object->xh[$Vdg54dqqikm5]['params']); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				if ($this->debug === TRUE)
				{
					$Vgsb4etiylcx .= $Vep0df0xosaw.' - '.print_r(get_object_vars($Vyxnfe3d002h_object->xh[$Vdg54dqqikm5]['params'][$Vep0df0xosaw]), TRUE).";\n";
				}

				$Vlnkcet4wpd0->addParam($Vyxnfe3d002h_object->xh[$Vdg54dqqikm5]['params'][$Vep0df0xosaw]);
			}

			if ($this->debug === TRUE)
			{
				echo "<pre>---PLIST---\n".$Vgsb4etiylcx."\n---PLIST END---\n\n</pre>";
			}

			$Vyotgbgs03ci = $this->_execute($Vlnkcet4wpd0);
		}

		
		
		

		if ($this->debug === TRUE)
		{
			$this->debug_msg = "<!-- DEBUG INFO:\n\n".$Vgsb4etiylcx."\n END DEBUG-->\n";
		}

		return $Vyotgbgs03ci;
	}

	

	
	protected function _execute($Vlnkcet4wpd0)
	{
		$Vlnkcet4wpd0ethName = $Vlnkcet4wpd0->method_name;

		
		$Vw4nu0yyjdn1 = (strpos($Vlnkcet4wpd0ethName, 'system') === 0);

		if ($this->xss_clean === FALSE)
		{
			$Vlnkcet4wpd0->xss_clean = FALSE;
		}

		
		
		

		if ( ! isset($this->methods[$Vlnkcet4wpd0ethName]['function']))
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
		}

		
		
		

		$Vlnkcet4wpd0ethod_parts = explode('.', $this->methods[$Vlnkcet4wpd0ethName]['function']);
		$V1v3xsp031u0Call = (isset($Vlnkcet4wpd0ethod_parts[1]) && $Vlnkcet4wpd0ethod_parts[1] !== '');

		if ($Vw4nu0yyjdn1 === TRUE)
		{
			if ( ! is_callable(array($this,$Vlnkcet4wpd0ethod_parts[1])))
			{
				return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
			}
		}
		elseif (($V1v3xsp031u0Call && ! is_callable(array($Vlnkcet4wpd0ethod_parts[0], $Vlnkcet4wpd0ethod_parts[1])))
			OR ( ! $V1v3xsp031u0Call && ! is_callable($this->methods[$Vlnkcet4wpd0ethName]['function']))
		)
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
		}

		
		
		

		if (isset($this->methods[$Vlnkcet4wpd0ethName]['signature']))
		{
			$Vykkkbjeclbr = $this->methods[$Vlnkcet4wpd0ethName]['signature'];
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vykkkbjeclbr); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vn2ycfau434surrent_sig = $Vykkkbjeclbr[$Vep0df0xosaw];

				if (count($Vn2ycfau434surrent_sig) === count($Vlnkcet4wpd0->params)+1)
				{
					for ($Vewkafdpowpc = 0, $Vlnkcet4wpd0c = count($Vlnkcet4wpd0->params); $Vewkafdpowpc < $Vlnkcet4wpd0c; $Vewkafdpowpc++)
					{
						$Varkxlurwgur = $Vlnkcet4wpd0->params[$Vewkafdpowpc];
						$Varkxlurwgurt = ($Varkxlurwgur->kindOf() === 'scalar') ? $Varkxlurwgur->scalarval() : $Varkxlurwgur->kindOf();

						if ($Varkxlurwgurt !== $Vn2ycfau434surrent_sig[$Vewkafdpowpc+1])
						{
							$Varkxlurwgurno = $Vewkafdpowpc+1;
							$Vkfmzf1kypn5 = $Vn2ycfau434surrent_sig[$Vewkafdpowpc+1];

							return new XML_RPC_Response(0,
								$this->xmlrpcerr['incorrect_params'],
								$this->xmlrpcstr['incorrect_params'] .
								': Wanted '.$Vkfmzf1kypn5.', got '.$Varkxlurwgurt.' at param '.$Varkxlurwgurno.')');
						}
					}
				}
			}
		}

		
		
		

		if ($V1v3xsp031u0Call === TRUE)
		{
			if ($Vlnkcet4wpd0ethod_parts[0] === 'this' && $Vw4nu0yyjdn1 === TRUE)
			{
				return call_user_func(array($this, $Vlnkcet4wpd0ethod_parts[1]), $Vlnkcet4wpd0);
			}
			elseif ($this->object === FALSE)
			{
				return get_instance()->$Vlnkcet4wpd0ethod_parts[1]($Vlnkcet4wpd0);
			}
			else
			{
				return $this->object->$Vlnkcet4wpd0ethod_parts[1]($Vlnkcet4wpd0);
			}
		}
		else
		{
			return call_user_func($this->methods[$Vlnkcet4wpd0ethName]['function'], $Vlnkcet4wpd0);
		}
	}

	

	
	public function listMethods($Vlnkcet4wpd0)
	{
		$Vxxtccqydhzn = new XML_RPC_Values();
		$Vzxix2pqoztx = array();

		foreach ($this->methods as $V2xim30qek4u => $Vxxtccqydhznalue)
		{
			$Vzxix2pqoztx[] = new XML_RPC_Values($V2xim30qek4u, 'string');
		}

		foreach ($this->system_methods as $V2xim30qek4u => $Vxxtccqydhznalue)
		{
			$Vzxix2pqoztx[] = new XML_RPC_Values($V2xim30qek4u, 'string');
		}

		$Vxxtccqydhzn->addArray($Vzxix2pqoztx);
		return new XML_RPC_Response($Vxxtccqydhzn);
	}

	

	
	public function methodSignature($Vlnkcet4wpd0)
	{
		$Varkxlurwgurarameters = $Vlnkcet4wpd0->output_parameters();
		$Vlnkcet4wpd0ethod_name = $Varkxlurwgurarameters[0];

		if (isset($this->methods[$Vlnkcet4wpd0ethod_name]))
		{
			if ($this->methods[$Vlnkcet4wpd0ethod_name]['signature'])
			{
				$Vykkkbjeclbrs = array();
				$Vykkkbjeclbrnature = $this->methods[$Vlnkcet4wpd0ethod_name]['signature'];

				for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vykkkbjeclbrnature); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
				{
					$Vn2ycfau434sursig = array();
					$Vep0df0xosawnSig = $Vykkkbjeclbrnature[$Vep0df0xosaw];
					for ($Vv3o4gn4ugio = 0, $Vv3o4gn4ugioc = count($Vep0df0xosawnSig); $Vv3o4gn4ugio < $Vv3o4gn4ugioc; $Vv3o4gn4ugio++)
					{
						$Vn2ycfau434sursig[]= new XML_RPC_Values($Vep0df0xosawnSig[$Vv3o4gn4ugio], 'string');
					}
					$Vykkkbjeclbrs[] = new XML_RPC_Values($Vn2ycfau434sursig, 'array');
				}

				return new XML_RPC_Response(new XML_RPC_Values($Vykkkbjeclbrs, 'array'));
			}

			return new XML_RPC_Response(new XML_RPC_Values('undef', 'string'));
		}

		return new XML_RPC_Response(0, $this->xmlrpcerr['introspect_unknown'], $this->xmlrpcstr['introspect_unknown']);
	}

	

	
	public function methodHelp($Vlnkcet4wpd0)
	{
		$Varkxlurwgurarameters = $Vlnkcet4wpd0->output_parameters();
		$Vlnkcet4wpd0ethod_name = $Varkxlurwgurarameters[0];

		if (isset($this->methods[$Vlnkcet4wpd0ethod_name]))
		{
			$Vp0mfnsrbefdstring = isset($this->methods[$Vlnkcet4wpd0ethod_name]['docstring']) ? $this->methods[$Vlnkcet4wpd0ethod_name]['docstring'] : '';

			return new XML_RPC_Response(new XML_RPC_Values($Vp0mfnsrbefdstring, 'string'));
		}
		else
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['introspect_unknown'], $this->xmlrpcstr['introspect_unknown']);
		}
	}

	

	
	public function multicall($Vlnkcet4wpd0)
	{
		
		return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);

		$Varkxlurwgurarameters = $Vlnkcet4wpd0->output_parameters();
		$Vn2ycfau434salls = $Varkxlurwgurarameters[0];

		$Vyotgbgs03ciesult = array();

		foreach ($Vn2ycfau434salls as $Vxxtccqydhznalue)
		{
			$Vlnkcet4wpd0 = new XML_RPC_Message($Vxxtccqydhznalue[0]);
			$Vgsb4etiylcx = '';

			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vxxtccqydhznalue[1]); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vlnkcet4wpd0->addParam(new XML_RPC_Values($Vxxtccqydhznalue[1][$Vep0df0xosaw], 'string'));
			}

			$Vygsezqztitl = $this->_execute($Vlnkcet4wpd0);

			if ($Vygsezqztitl->faultCode() !== 0)
			{
				return $Vygsezqztitl;
			}

			$Vyotgbgs03ciesult[] = new XML_RPC_Values(array($Vygsezqztitl->value()), 'array');
		}

		return new XML_RPC_Response(new XML_RPC_Values($Vyotgbgs03ciesult, 'array'));
	}

	

	
	public function multicall_error($Vkoqtpzairgk)
	{
		$Vssdjb5oqaky = is_string($Vkoqtpzairgk) ? $this->xmlrpcstr["multicall_${err}"] : $Vkoqtpzairgk->faultString();
		$Vn2ycfau434sode = is_string($Vkoqtpzairgk) ? $this->xmlrpcerr["multicall_${err}"] : $Vkoqtpzairgk->faultCode();

		$Vssdjb5oqakyuct['faultCode'] = new XML_RPC_Values($Vn2ycfau434sode, 'int');
		$Vssdjb5oqakyuct['faultString'] = new XML_RPC_Values($Vssdjb5oqaky, 'string');

		return new XML_RPC_Values($Vssdjb5oqakyuct, 'struct');
	}

	

	
	public function do_multicall($Vn2ycfau434sall)
	{
		if ($Vn2ycfau434sall->kindOf() !== 'struct')
		{
			return $this->multicall_error('notstruct');
		}
		elseif ( ! $Vlnkcet4wpd0ethName = $Vn2ycfau434sall->me['struct']['methodName'])
		{
			return $this->multicall_error('nomethod');
		}

		list($V355xgogsuwq, $Vforx2djfd0y) = each($Vlnkcet4wpd0ethName->me);
		$V355xgogsuwq = $V355xgogsuwq === $this->xmlrpcI4 ? $this->xmlrpcInt : $V355xgogsuwq;

		if ($Vlnkcet4wpd0ethName->kindOf() !== 'scalar' OR $V355xgogsuwq !== 'string')
		{
			return $this->multicall_error('notstring');
		}
		elseif ($Vforx2djfd0y === 'system.multicall')
		{
			return $this->multicall_error('recursion');
		}
		elseif ( ! $Varkxlurwgurarams = $Vn2ycfau434sall->me['struct']['params'])
		{
			return $this->multicall_error('noparams');
		}
		elseif ($Varkxlurwgurarams->kindOf() !== 'array')
		{
			return $this->multicall_error('notarray');
		}

		list($Vqtrwdgbny00, $Vwkzrpaksezs) = each($Varkxlurwgurarams->me);

		$Vlnkcet4wpd0sg = new XML_RPC_Message($Vforx2djfd0y);
		for ($Vep0df0xosaw = 0, $VewkafdpowpcumParams = count($Vwkzrpaksezs); $Vep0df0xosaw < $VewkafdpowpcumParams; $Vep0df0xosaw++)
		{
			$Vlnkcet4wpd0sg->params[] = $Varkxlurwgurarams->me['array'][$Vep0df0xosaw];
		}

		$Vyotgbgs03ciesult = $this->_execute($Vlnkcet4wpd0sg);

		if ($Vyotgbgs03ciesult->faultCode() !== 0)
		{
			return $this->multicall_error($Vyotgbgs03ciesult);
		}

		return new XML_RPC_Values(array($Vyotgbgs03ciesult->value()), 'array');
	}

}
