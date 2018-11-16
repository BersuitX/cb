<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Profiler {

	
	protected $V5xpn1es0sxm = array(
		'benchmarks',
		'get',
		'memory_usage',
		'post',
		'uri_string',
		'controller_info',
		'queries',
		'http_headers',
		'session_data',
		'config'
	);

	
	protected $Vpaywpgh1yg2 = 25;

	
	protected $Vgw3d0qe3dgd;

	

	
	public function __construct($Vnmcm15juye5 = array())
	{
		$this->CI =& get_instance();
		$this->CI->load->language('profiler');

		
		foreach ($this->_available_sections as $Vrmtbsqo0kd5)
		{
			if ( ! isset($Vnmcm15juye5[$Vrmtbsqo0kd5]))
			{
				$this->_compile_{$Vrmtbsqo0kd5} = TRUE;
			}
		}

		$this->set_sections($Vnmcm15juye5);
		log_message('info', 'Profiler Class Initialized');
	}

	

	
	public function set_sections($Vnmcm15juye5)
	{
		if (isset($Vnmcm15juye5['query_toggle_count']))
		{
			$this->_query_toggle_count = (int) $Vnmcm15juye5['query_toggle_count'];
			unset($Vnmcm15juye5['query_toggle_count']);
		}

		foreach ($Vnmcm15juye5 as $V5dsbozs5xhq => $Vgbm4eqld3ta)
		{
			if (in_array($V5dsbozs5xhq, $this->_available_sections))
			{
				$this->_compile_{$V5dsbozs5xhq} = ($Vgbm4eqld3ta !== FALSE);
			}
		}
	}

	

	
	protected function _compile_benchmarks()
	{
		$V3evn5nenhjb = array();
		foreach ($this->CI->benchmark->marker as $V2xim30qek4u => $Va4zo0rltynr)
		{
			
			
			if (preg_match('/(.+?)_end$/i', $V2xim30qek4u, $V4uvjtwtgjvp)
				&& isset($this->CI->benchmark->marker[$V4uvjtwtgjvp[1].'_end'], $this->CI->benchmark->marker[$V4uvjtwtgjvp[1].'_start']))
			{
				$V3evn5nenhjb[$V4uvjtwtgjvp[1]] = $this->CI->benchmark->elapsed_time($V4uvjtwtgjvp[1].'_start', $V2xim30qek4u);
			}
		}

		
		
		

		$Vzxix2pqoztx = "\n\n"
			.'<fieldset id="ci_profiler_benchmarks" style="border:1px solid #900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#900;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_benchmarks')."&nbsp;&nbsp;</legend>"
			."\n\n\n<table style=\"width:100%;\">\n";

		foreach ($V3evn5nenhjb as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$V2xim30qek4u = ucwords(str_replace(array('_', '-'), ' ', $V2xim30qek4u));
			$Vzxix2pqoztx .= '<tr><td style="padding:5px;width:50%;color:#000;font-weight:bold;background-color:#ddd;">'
					.$V2xim30qek4u.'&nbsp;&nbsp;</td><td style="padding:5px;width:50%;color:#900;font-weight:normal;background-color:#ddd;">'
					.$Va4zo0rltynr."</td></tr>\n";
		}

		return $Vzxix2pqoztx."</table>\n</fieldset>";
	}

	

	
	protected function _compile_queries()
	{
		$Vzte3h30kgw4 = array();

		
		foreach (get_object_vars($this->CI) as $Vaclaigdbtoo => $Vjlx4oedcjel)
		{
			if (is_object($Vjlx4oedcjel))
			{
				if ($Vjlx4oedcjel instanceof CI_DB)
				{
					$Vzte3h30kgw4[get_class($this->CI).':$'.$Vaclaigdbtoo] = $Vjlx4oedcjel;
				}
				elseif ($Vjlx4oedcjel instanceof CI_Model)
				{
					foreach (get_object_vars($Vjlx4oedcjel) as $Vc2y5ov2drc1 => $Vxgod4rjethb)
					{
						if ($Vxgod4rjethb instanceof CI_DB)
						{
							$Vzte3h30kgw4[get_class($Vjlx4oedcjel).':$'.$Vc2y5ov2drc1] = $Vxgod4rjethb;
						}
					}
				}
			}
		}

		if (count($Vzte3h30kgw4) === 0)
		{
			return "\n\n"
				.'<fieldset id="ci_profiler_queries" style="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
				."\n"
				.'<legend style="color:#0000FF;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_queries').'&nbsp;&nbsp;</legend>'
				."\n\n\n<table style=\"border:none; width:100%;\">\n"
				.'<tr><td style="width:100%;color:#0000FF;font-weight:normal;background-color:#eee;padding:5px;">'
				.$this->CI->lang->line('profiler_no_db')
				."</td></tr>\n</table>\n</fieldset>";
		}

		
		$this->CI->load->helper('text');

		
		$Vedl3q0ss0hv = array('SELECT', 'DISTINCT', 'FROM', 'WHERE', 'AND', 'LEFT&nbsp;JOIN', 'ORDER&nbsp;BY', 'GROUP&nbsp;BY', 'LIMIT', 'INSERT', 'INTO', 'VALUES', 'UPDATE', 'OR&nbsp;', 'HAVING', 'OFFSET', 'NOT&nbsp;IN', 'IN', 'LIKE', 'NOT&nbsp;LIKE', 'COUNT', 'MAX', 'MIN', 'ON', 'AS', 'AVG', 'SUM', '(', ')');

		$Vzxix2pqoztx  = "\n\n";
		$V2jbvukjonhh = 0;

		foreach ($Vzte3h30kgw4 as $Vaclaigdbtoo => $Vwensv4j4idw)
		{
			$Vpsxmv0xe3sd = (count($Vwensv4j4idw->queries) > $this->_query_toggle_count) ? ' display:none' : '';
			$Vq2cwo4chxzt = number_format(array_sum($Vwensv4j4idw->query_times), 4).' '.$this->CI->lang->line('profiler_seconds');

			$V11r0szdprpa = '(<span style="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_queries_db_'.$V2jbvukjonhh.'\').style;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_hide').'\'?\''.$this->CI->lang->line('profiler_section_show').'\':\''.$this->CI->lang->line('profiler_section_hide').'\';">'.$this->CI->lang->line('profiler_section_hide').'</span>)';

			if ($Vpsxmv0xe3sd !== '')
			{
				$V11r0szdprpa = '(<span style="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_queries_db_'.$V2jbvukjonhh.'\').style;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show').'</span>)';
			}

			$Vzxix2pqoztx .= '<fieldset style="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
				."\n"
				.'<legend style="color:#0000FF;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_database')
				.':&nbsp; '.$Vwensv4j4idw->database.' ('.$Vaclaigdbtoo.')&nbsp;&nbsp;&nbsp;'.$this->CI->lang->line('profiler_queries')
				.': '.count($Vwensv4j4idw->queries).' ('.$Vq2cwo4chxzt.')&nbsp;&nbsp;'.$V11r0szdprpa."</legend>\n\n\n"
				.'<table style="width:100%;'.$Vpsxmv0xe3sd.'" id="ci_profiler_queries_db_'.$V2jbvukjonhh."\">\n";

			if (count($Vwensv4j4idw->queries) === 0)
			{
				$Vzxix2pqoztx .= '<tr><td style="width:100%;color:#0000FF;font-weight:normal;background-color:#eee;padding:5px;">'
						.$this->CI->lang->line('profiler_no_queries')."</td></tr>\n";
			}
			else
			{
				foreach ($Vwensv4j4idw->queries as $V2xim30qek4u => $Va4zo0rltynr)
				{
					$Vzfk1zisr4jl = number_format($Vwensv4j4idw->query_times[$V2xim30qek4u], 4);
					$Va4zo0rltynr = highlight_code($Va4zo0rltynr);

					foreach ($Vedl3q0ss0hv as $Vyz11ycgelrb)
					{
						$Va4zo0rltynr = str_replace($Vyz11ycgelrb, '<strong>'.$Vyz11ycgelrb.'</strong>', $Va4zo0rltynr);
					}

					$Vzxix2pqoztx .= '<tr><td style="padding:5px;vertical-align:top;width:1%;color:#900;font-weight:normal;background-color:#ddd;">'
							.$Vzfk1zisr4jl.'&nbsp;&nbsp;</td><td style="padding:5px;color:#000;font-weight:normal;background-color:#ddd;">'
							.$Va4zo0rltynr."</td></tr>\n";
				}
			}

			$Vzxix2pqoztx .= "</table>\n</fieldset>";
			$V2jbvukjonhh++;
		}

		return $Vzxix2pqoztx;
	}

	

	
	protected function _compile_get()
	{
		$Vzxix2pqoztx = "\n\n"
			.'<fieldset id="ci_profiler_get" style="border:1px solid #cd6e00;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#cd6e00;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_get_data')."&nbsp;&nbsp;</legend>\n";

		if (count($_GET) === 0)
		{
			$Vzxix2pqoztx .= '<div style="color:#cd6e00;font-weight:normal;padding:4px 0 4px 0;">'.$this->CI->lang->line('profiler_no_get').'</div>';
		}
		else
		{
			$Vzxix2pqoztx .= "\n\n<table style=\"width:100%;border:none;\">\n";

			foreach ($_GET as $V2xim30qek4u => $Va4zo0rltynr)
			{
				is_int($V2xim30qek4u) OR $V2xim30qek4u = "'".htmlspecialchars($V2xim30qek4u, ENT_QUOTES, config_item('charset'))."'";
				$Va4zo0rltynr = (is_array($Va4zo0rltynr) OR is_object($Va4zo0rltynr))
					? '<pre>'.htmlspecialchars(print_r($Va4zo0rltynr, TRUE), ENT_QUOTES, config_item('charset'))
					: htmlspecialchars($Va4zo0rltynr, ENT_QUOTES, config_item('charset'));

				$Vzxix2pqoztx .= '<tr><td style="width:50%;color:#000;background-color:#ddd;padding:5px;">&#36;_GET['
					.$V2xim30qek4u.']&nbsp;&nbsp; </td><td style="width:50%;padding:5px;color:#cd6e00;font-weight:normal;background-color:#ddd;">'
					.$Va4zo0rltynr."</td></tr>\n";
			}

			$Vzxix2pqoztx .= "</table>\n";
		}

		return $Vzxix2pqoztx.'</fieldset>';
	}

	

	
	protected function _compile_post()
	{
		$Vzxix2pqoztx = "\n\n"
			.'<fieldset id="ci_profiler_post" style="border:1px solid #009900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#009900;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_post_data')."&nbsp;&nbsp;</legend>\n";

		if (count($_POST) === 0 && count($_FILES) === 0)
		{
			$Vzxix2pqoztx .= '<div style="color:#009900;font-weight:normal;padding:4px 0 4px 0;">'.$this->CI->lang->line('profiler_no_post').'</div>';
		}
		else
		{
			$Vzxix2pqoztx .= "\n\n<table style=\"width:100%;\">\n";

			foreach ($_POST as $V2xim30qek4u => $Va4zo0rltynr)
			{
				is_int($V2xim30qek4u) OR $V2xim30qek4u = "'".htmlspecialchars($V2xim30qek4u, ENT_QUOTES, config_item('charset'))."'";
				$Va4zo0rltynr = (is_array($Va4zo0rltynr) OR is_object($Va4zo0rltynr))
					? '<pre>'.htmlspecialchars(print_r($Va4zo0rltynr, TRUE), ENT_QUOTES, config_item('charset'))
					: htmlspecialchars($Va4zo0rltynr, ENT_QUOTES, config_item('charset'));

				$Vzxix2pqoztx .= '<tr><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_POST['
					.$V2xim30qek4u.']&nbsp;&nbsp; </td><td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">'
					.$Va4zo0rltynr."</td></tr>\n";
			}

			foreach ($_FILES as $V2xim30qek4u => $Va4zo0rltynr)
			{
				is_int($V2xim30qek4u) OR $V2xim30qek4u = "'".htmlspecialchars($V2xim30qek4u, ENT_QUOTES, config_item('charset'))."'";
				$Va4zo0rltynr = (is_array($Va4zo0rltynr) OR is_object($Va4zo0rltynr))
					? '<pre>'.htmlspecialchars(print_r($Va4zo0rltynr, TRUE), ENT_QUOTES, config_item('charset'))
					: htmlspecialchars($Va4zo0rltynr, ENT_QUOTES, config_item('charset'));

				$Vzxix2pqoztx .= '<tr><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_FILES['
					.$V2xim30qek4u.']&nbsp;&nbsp; </td><td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">'
					.$Va4zo0rltynr."</td></tr>\n";
			}

			$Vzxix2pqoztx .= "</table>\n";
		}

		return $Vzxix2pqoztx.'</fieldset>';
	}

	

	
	protected function _compile_uri_string()
	{
		return "\n\n"
			.'<fieldset id="ci_profiler_uri_string" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_uri_string')."&nbsp;&nbsp;</legend>\n"
			.'<div style="color:#000;font-weight:normal;padding:4px 0 4px 0;">'
			.($this->CI->uri->uri_string === '' ? $this->CI->lang->line('profiler_no_uri') : $this->CI->uri->uri_string)
			.'</div></fieldset>';
	}

	

	
	protected function _compile_controller_info()
	{
		return "\n\n"
			.'<fieldset id="ci_profiler_controller_info" style="border:1px solid #995300;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#995300;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_controller_info')."&nbsp;&nbsp;</legend>\n"
			.'<div style="color:#995300;font-weight:normal;padding:4px 0 4px 0;">'.$this->CI->router->class.'/'.$this->CI->router->method
			.'</div></fieldset>';
	}

	

	
	protected function _compile_memory_usage()
	{
		return "\n\n"
			.'<fieldset id="ci_profiler_memory_usage" style="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#5a0099;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_memory_usage')."&nbsp;&nbsp;</legend>\n"
			.'<div style="color:#5a0099;font-weight:normal;padding:4px 0 4px 0;">'
			.(($Vg4015w14r2s = memory_get_usage()) != '' ? number_format($Vg4015w14r2s).' bytes' : $this->CI->lang->line('profiler_no_memory'))
			.'</div></fieldset>';
	}

	

	
	protected function _compile_http_headers()
	{
		$Vzxix2pqoztx = "\n\n"
			.'<fieldset id="ci_profiler_http_headers" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_headers')
			.'&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_httpheaders_table\').style;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show')."</span>)</legend>\n\n\n"
			.'<table style="width:100%;display:none;" id="ci_profiler_httpheaders_table">'."\n";

		foreach (array('HTTP_ACCEPT', 'HTTP_USER_AGENT', 'HTTP_CONNECTION', 'SERVER_PORT', 'SERVER_NAME', 'REMOTE_ADDR', 'SERVER_SOFTWARE', 'HTTP_ACCEPT_LANGUAGE', 'SCRIPT_NAME', 'REQUEST_METHOD',' HTTP_HOST', 'REMOTE_HOST', 'CONTENT_TYPE', 'SERVER_PROTOCOL', 'QUERY_STRING', 'HTTP_ACCEPT_ENCODING', 'HTTP_X_FORWARDED_FOR', 'HTTP_DNT') as $V3lefstrzfrx)
		{
			$Va4zo0rltynr = isset($_SERVER[$V3lefstrzfrx]) ? htmlspecialchars($_SERVER[$V3lefstrzfrx], ENT_QUOTES, config_item('charset')) : '';
			$Vzxix2pqoztx .= '<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">'
				.$V3lefstrzfrx.'&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">'.$Va4zo0rltynr."</td></tr>\n";
		}

		return $Vzxix2pqoztx."</table>\n</fieldset>";
	}

	

	
	protected function _compile_config()
	{
		$Vzxix2pqoztx = "\n\n"
			.'<fieldset id="ci_profiler_config" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend style="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_config').'&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_config_table\').style;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show')."</span>)</legend>\n\n\n"
			.'<table style="width:100%;display:none;" id="ci_profiler_config_table">'."\n";

		foreach ($this->CI->config->config as $Vnmcm15juye5 => $Va4zo0rltynr)
		{
			if (is_array($Va4zo0rltynr) OR is_object($Va4zo0rltynr))
			{
				$Va4zo0rltynr = print_r($Va4zo0rltynr, TRUE);
			}

			$Vzxix2pqoztx .= '<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">'
				.$Vnmcm15juye5.'&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">'.htmlspecialchars($Va4zo0rltynr)."</td></tr>\n";
		}

		return $Vzxix2pqoztx."</table>\n</fieldset>";
	}

	

	
	protected function _compile_session_data()
	{
		if ( ! isset($this->CI->session))
		{
			return;
		}

		$Vzxix2pqoztx = '<fieldset id="ci_profiler_csession" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			.'<legend style="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_session_data').'&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_session_data\').style;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show').'</span>)</legend>'
			.'<table style="width:100%;display:none;" id="ci_profiler_session_data">';

		foreach ($this->CI->session->userdata() as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (is_array($Va4zo0rltynr) OR is_object($Va4zo0rltynr))
			{
				$Va4zo0rltynr = print_r($Va4zo0rltynr, TRUE);
			}

			$Vzxix2pqoztx .= '<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">'
				.$V2xim30qek4u.'&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">'.htmlspecialchars($Va4zo0rltynr)."</td></tr>\n";
		}

		return $Vzxix2pqoztx."</table>\n</fieldset>";
	}

	

	
	public function run()
	{
		$Vzxix2pqoztx = '<div id="codeigniter_profiler" style="clear:both;background-color:#fff;padding:10px;">';
		$Vkee2t1qnf3l = 0;

		foreach ($this->_available_sections as $Vrmtbsqo0kd5)
		{
			if ($this->_compile_{$Vrmtbsqo0kd5} !== FALSE)
			{
				$Vsbou1hu1dji = '_compile_'.$Vrmtbsqo0kd5;
				$Vzxix2pqoztx .= $this->{$Vsbou1hu1dji}();
				$Vkee2t1qnf3l++;
			}
		}

		if ($Vkee2t1qnf3l === 0)
		{
			$Vzxix2pqoztx .= '<p style="border:1px solid #5a0099;padding:10px;margin:20px 0;background-color:#eee;">'
				.$this->CI->lang->line('profiler_no_profiles').'</p>';
		}

		return $Vzxix2pqoztx.'</div>';
	}

}
