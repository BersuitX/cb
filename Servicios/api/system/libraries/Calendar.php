<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Calendar {

	
	public $Vwwfk0sxxxmx = '';

	
	public $V3wbhixzhin2 = array();

	
	public $V1kaeiecox4c = 'sunday';

	
	public $Vtx5ghlaysg3 = 'long';

	
	public $Vpwx4jtsjdyz = 'abr';

	
	public $Vd3exw1l4dfi = FALSE;

	
	public $Vusnx0kwlacj = '';

	
	public $V5txsew1pzsf = FALSE;

	

	
	protected $Vgw3d0qe3dgd;

	

	
	public function __construct($Vnmcm15juye5 = array())
	{
		$this->CI =& get_instance();
		$this->CI->lang->load('calendar');

		empty($Vnmcm15juye5) OR $this->initialize($Vnmcm15juye5);

		log_message('info', 'Calendar Class Initialized');
	}

	

	
	public function initialize($Vnmcm15juye5 = array())
	{
		foreach ($Vnmcm15juye5 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (isset($this->$V2xim30qek4u))
			{
				$this->$V2xim30qek4u = $Va4zo0rltynr;
			}
		}

		
		if ($this->show_next_prev === TRUE && empty($this->next_prev_url))
		{
			$this->next_prev_url = $this->CI->config->site_url($this->CI->router->class.'/'.$this->CI->router->method);
		}

		return $this;
	}

	

	
	public function generate($Vpbowwbjrkfv = '', $Vxdtkja5t2tf = '', $Vfeinw1hsfej = array())
	{
		$Vfnqjcs3hoqb = time();

		
		if (empty($Vpbowwbjrkfv))
		{
			$Vpbowwbjrkfv = date('Y', $Vfnqjcs3hoqb);
		}
		elseif (strlen($Vpbowwbjrkfv) === 1)
		{
			$Vpbowwbjrkfv = '200'.$Vpbowwbjrkfv;
		}
		elseif (strlen($Vpbowwbjrkfv) === 2)
		{
			$Vpbowwbjrkfv = '20'.$Vpbowwbjrkfv;
		}

		if (empty($Vxdtkja5t2tf))
		{
			$Vxdtkja5t2tf = date('m', $Vfnqjcs3hoqb);
		}
		elseif (strlen($Vxdtkja5t2tf) === 1)
		{
			$Vxdtkja5t2tf = '0'.$Vxdtkja5t2tf;
		}

		$Venkl3lpsmac = $this->adjust_date($Vxdtkja5t2tf, $Vpbowwbjrkfv);

		$Vxdtkja5t2tf	= $Venkl3lpsmac['month'];
		$Vpbowwbjrkfv	= $Venkl3lpsmac['year'];

		
		$Vdcxwdoo1qzu = $this->get_total_days($Vxdtkja5t2tf, $Vpbowwbjrkfv);

		
		$V1kaeiecox4cs	= array('sunday' => 0, 'monday' => 1, 'tuesday' => 2, 'wednesday' => 3, 'thursday' => 4, 'friday' => 5, 'saturday' => 6);
		$V1kaeiecox4c	= isset($V1kaeiecox4cs[$this->start_day]) ? $V1kaeiecox4cs[$this->start_day] : 0;

		
		$Vuaybgl3jzbk = mktime(12, 0, 0, $Vxdtkja5t2tf, 1, $Vpbowwbjrkfv);
		$V3ti2nsbfgt2 = getdate($Vuaybgl3jzbk);
		$Voxw5rayrjck  = $V1kaeiecox4c + 1 - $V3ti2nsbfgt2['wday'];

		while ($Voxw5rayrjck > 1)
		{
			$Voxw5rayrjck -= 7;
		}

		
		
		$Vyyiwlmtsyfk	= date('Y', $Vfnqjcs3hoqb);
		$Vgjedvv4115a	= date('m', $Vfnqjcs3hoqb);
		$Vttyv0ieqotj	= date('j', $Vfnqjcs3hoqb);

		$Vgcguuo1jmak = ($Vyyiwlmtsyfk == $Vpbowwbjrkfv && $Vgjedvv4115a == $Vxdtkja5t2tf);

		
		$this->parse_template();

		
		$Vlxaqc0cx0ab = $this->replacements['table_open']."\n\n".$this->replacements['heading_row_start']."\n";

		
		if ($this->show_next_prev === TRUE)
		{
			
			$this->next_prev_url = preg_replace('/(.+?)\/*$/', '\\1/', $this->next_prev_url);

			$Venkl3lpsmac = $this->adjust_date($Vxdtkja5t2tf - 1, $Vpbowwbjrkfv);
			$Vlxaqc0cx0ab .= str_replace('{previous_url}', $this->next_prev_url.$Venkl3lpsmac['year'].'/'.$Venkl3lpsmac['month'], $this->replacements['heading_previous_cell'])."\n";
		}

		
		$Vp2pgwewo4in = ($this->show_next_prev === TRUE) ? 5 : 7;

		$this->replacements['heading_title_cell'] = str_replace('{colspan}', $Vp2pgwewo4in,
								str_replace('{heading}', $this->get_month_name($Vxdtkja5t2tf).'&nbsp;'.$Vpbowwbjrkfv, $this->replacements['heading_title_cell']));

		$Vlxaqc0cx0ab .= $this->replacements['heading_title_cell']."\n";

		
		if ($this->show_next_prev === TRUE)
		{
			$Venkl3lpsmac = $this->adjust_date($Vxdtkja5t2tf + 1, $Vpbowwbjrkfv);
			$Vlxaqc0cx0ab .= str_replace('{next_url}', $this->next_prev_url.$Venkl3lpsmac['year'].'/'.$Venkl3lpsmac['month'], $this->replacements['heading_next_cell']);
		}

		$Vlxaqc0cx0ab .= "\n".$this->replacements['heading_row_end']."\n\n"
			
			.$this->replacements['week_row_start']."\n";

		$Voxw5rayrjck_names = $this->get_day_names();

		for ($Vep0df0xosaw = 0; $Vep0df0xosaw < 7; $Vep0df0xosaw ++)
		{
			$Vlxaqc0cx0ab .= str_replace('{week_day}', $Voxw5rayrjck_names[($V1kaeiecox4c + $Vep0df0xosaw) %7], $this->replacements['week_day_cell']);
		}

		$Vlxaqc0cx0ab .= "\n".$this->replacements['week_row_end']."\n";

		
		while ($Voxw5rayrjck <= $Vdcxwdoo1qzu)
		{
			$Vlxaqc0cx0ab .= "\n".$this->replacements['cal_row_start']."\n";

			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < 7; $Vep0df0xosaw++)
			{
				if ($Voxw5rayrjck > 0 && $Voxw5rayrjck <= $Vdcxwdoo1qzu)
				{
					$Vlxaqc0cx0ab .= ($Vgcguuo1jmak === TRUE && $Voxw5rayrjck == $Vttyv0ieqotj) ? $this->replacements['cal_cell_start_today'] : $this->replacements['cal_cell_start'];

					if (isset($Vfeinw1hsfej[$Voxw5rayrjck]))
					{
						
						$V3iiokxda3xw = ($Vgcguuo1jmak === TRUE && $Voxw5rayrjck == $Vttyv0ieqotj) ?
								$this->replacements['cal_cell_content_today'] : $this->replacements['cal_cell_content'];
						$Vlxaqc0cx0ab .= str_replace(array('{content}', '{day}'), array($Vfeinw1hsfej[$Voxw5rayrjck], $Voxw5rayrjck), $V3iiokxda3xw);
					}
					else
					{
						
						$V3iiokxda3xw = ($Vgcguuo1jmak === TRUE && $Voxw5rayrjck == $Vttyv0ieqotj) ?
								$this->replacements['cal_cell_no_content_today'] : $this->replacements['cal_cell_no_content'];
						$Vlxaqc0cx0ab .= str_replace('{day}', $Voxw5rayrjck, $V3iiokxda3xw);
					}

					$Vlxaqc0cx0ab .= ($Vgcguuo1jmak === TRUE && $Voxw5rayrjck == $Vttyv0ieqotj) ? $this->replacements['cal_cell_end_today'] : $this->replacements['cal_cell_end'];
				}
				elseif ($this->show_other_days === TRUE)
				{
					$Vlxaqc0cx0ab .= $this->replacements['cal_cell_start_other'];

					if ($Voxw5rayrjck <= 0)
					{
						
						$V1n5tccn3bzl = $this->adjust_date($Vxdtkja5t2tf - 1, $Vpbowwbjrkfv);
						$V1n5tccn3bzl_days = $this->get_total_days($V1n5tccn3bzl['month'], $V1n5tccn3bzl['year']);
						$Vlxaqc0cx0ab .= str_replace('{day}', $V1n5tccn3bzl_days + $Voxw5rayrjck, $this->replacements['cal_cell_other']);
					}
					else
					{
						
						$Vlxaqc0cx0ab .= str_replace('{day}', $Voxw5rayrjck - $Vdcxwdoo1qzu, $this->replacements['cal_cell_other']);
					}

					$Vlxaqc0cx0ab .= $this->replacements['cal_cell_end_other'];
				}
				else
				{
					
					$Vlxaqc0cx0ab .= $this->replacements['cal_cell_start'].$this->replacements['cal_cell_blank'].$this->replacements['cal_cell_end'];
				}

				$Voxw5rayrjck++;
			}

			$Vlxaqc0cx0ab .= "\n".$this->replacements['cal_row_end']."\n";
		}

		return $Vlxaqc0cx0ab .= "\n".$this->replacements['table_close'];
	}

	

	
	public function get_month_name($Vxdtkja5t2tf)
	{
		if ($this->month_type === 'short')
		{
			$Vxdtkja5t2tf_names = array('01' => 'cal_jan', '02' => 'cal_feb', '03' => 'cal_mar', '04' => 'cal_apr', '05' => 'cal_may', '06' => 'cal_jun', '07' => 'cal_jul', '08' => 'cal_aug', '09' => 'cal_sep', '10' => 'cal_oct', '11' => 'cal_nov', '12' => 'cal_dec');
		}
		else
		{
			$Vxdtkja5t2tf_names = array('01' => 'cal_january', '02' => 'cal_february', '03' => 'cal_march', '04' => 'cal_april', '05' => 'cal_mayl', '06' => 'cal_june', '07' => 'cal_july', '08' => 'cal_august', '09' => 'cal_september', '10' => 'cal_october', '11' => 'cal_november', '12' => 'cal_december');
		}

		return ($this->CI->lang->line($Vxdtkja5t2tf_names[$Vxdtkja5t2tf]) === FALSE)
			? ucfirst(substr($Vxdtkja5t2tf_names[$Vxdtkja5t2tf], 4))
			: $this->CI->lang->line($Vxdtkja5t2tf_names[$Vxdtkja5t2tf]);
	}

	

	
	public function get_day_names($Vpwx4jtsjdyz = '')
	{
		if ($Vpwx4jtsjdyz !== '')
		{
			$this->day_type = $Vpwx4jtsjdyz;
		}

		if ($this->day_type === 'long')
		{
			$Voxw5rayrjck_names = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
		}
		elseif ($this->day_type === 'short')
		{
			$Voxw5rayrjck_names = array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');
		}
		else
		{
			$Voxw5rayrjck_names = array('su', 'mo', 'tu', 'we', 'th', 'fr', 'sa');
		}

		$Voxw5rayrjcks = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Voxw5rayrjck_names); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Voxw5rayrjcks[] = ($this->CI->lang->line('cal_'.$Voxw5rayrjck_names[$Vep0df0xosaw]) === FALSE) ? ucfirst($Voxw5rayrjck_names[$Vep0df0xosaw]) : $this->CI->lang->line('cal_'.$Voxw5rayrjck_names[$Vep0df0xosaw]);
		}

		return $Voxw5rayrjcks;
	}

	

	
	public function adjust_date($Vxdtkja5t2tf, $Vpbowwbjrkfv)
	{
		$V3ti2nsbfgt2 = array();

		$V3ti2nsbfgt2['month']	= $Vxdtkja5t2tf;
		$V3ti2nsbfgt2['year']	= $Vpbowwbjrkfv;

		while ($V3ti2nsbfgt2['month'] > 12)
		{
			$V3ti2nsbfgt2['month'] -= 12;
			$V3ti2nsbfgt2['year']++;
		}

		while ($V3ti2nsbfgt2['month'] <= 0)
		{
			$V3ti2nsbfgt2['month'] += 12;
			$V3ti2nsbfgt2['year']--;
		}

		if (strlen($V3ti2nsbfgt2['month']) === 1)
		{
			$V3ti2nsbfgt2['month'] = '0'.$V3ti2nsbfgt2['month'];
		}

		return $V3ti2nsbfgt2;
	}

	

	
	public function get_total_days($Vxdtkja5t2tf, $Vpbowwbjrkfv)
	{
		$this->CI->load->helper('date');
		return days_in_month($Vxdtkja5t2tf, $Vpbowwbjrkfv);
	}

	

	
	public function default_template()
	{
		return array(
			'table_open'				=> '<table border="0" cellpadding="4" cellspacing="0">',
			'heading_row_start'			=> '<tr>',
			'heading_previous_cell'		=> '<th><a href="{previous_url}">&lt;&lt;</a></th>',
			'heading_title_cell'		=> '<th colspan="{colspan}">{heading}</th>',
			'heading_next_cell'			=> '<th><a href="{next_url}">&gt;&gt;</a></th>',
			'heading_row_end'			=> '</tr>',
			'week_row_start'			=> '<tr>',
			'week_day_cell'				=> '<td>{week_day}</td>',
			'week_row_end'				=> '</tr>',
			'cal_row_start'				=> '<tr>',
			'cal_cell_start'			=> '<td>',
			'cal_cell_start_today'		=> '<td>',
			'cal_cell_start_other'		=> '<td style="color: #666;">',
			'cal_cell_content'			=> '<a href="{content}">{day}</a>',
			'cal_cell_content_today'	=> '<a href="{content}"><strong>{day}</strong></a>',
			'cal_cell_no_content'		=> '{day}',
			'cal_cell_no_content_today'	=> '<strong>{day}</strong>',
			'cal_cell_blank'			=> '&nbsp;',
			'cal_cell_other'			=> '{day}',
			'cal_cell_end'				=> '</td>',
			'cal_cell_end_today'		=> '</td>',
			'cal_cell_end_other'		=> '</td>',
			'cal_row_end'				=> '</tr>',
			'table_close'				=> '</table>'
		);
	}

	

	
	public function parse_template()
	{
		$this->replacements = $this->default_template();

		if (empty($this->template))
		{
			return $this;
		}

		if (is_string($this->template))
		{
			$Vkwbgt3i3zif = array('cal_cell_start_today', 'cal_cell_content_today', 'cal_cell_no_content_today', 'cal_cell_end_today');

			foreach (array('table_open', 'table_close', 'heading_row_start', 'heading_previous_cell', 'heading_title_cell', 'heading_next_cell', 'heading_row_end', 'week_row_start', 'week_day_cell', 'week_row_end', 'cal_row_start', 'cal_cell_start', 'cal_cell_content', 'cal_cell_no_content', 'cal_cell_blank', 'cal_cell_end', 'cal_row_end', 'cal_cell_start_today', 'cal_cell_content_today', 'cal_cell_no_content_today', 'cal_cell_end_today', 'cal_cell_start_other', 'cal_cell_other', 'cal_cell_end_other') as $Va4zo0rltynr)
			{
				if (preg_match('/\{'.$Va4zo0rltynr.'\}(.*?)\{\/'.$Va4zo0rltynr.'\}/si', $this->template, $V4uvjtwtgjvp))
				{
					$this->replacements[$Va4zo0rltynr] = $V4uvjtwtgjvp[1];
				}
				elseif (in_array($Va4zo0rltynr, $Vkwbgt3i3zif, TRUE))
				{
					$this->replacements[$Va4zo0rltynr] = $this->replacements[substr($Va4zo0rltynr, 0, -6)];
				}
			}
		}
		elseif (is_array($this->template))
		{
			$this->replacements = array_merge($this->replacements, $this->template);
		}

		return $this;
	}

}
