<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Table {

	
	public $Vzlzesfkprmn		= array();

	
	public $Vcuptk31tst0		= array();

	
	public $Vcqsy2r20pfa	= TRUE;

	
	public $Vtrc4mikjes3		= NULL;

	
	public $Vwwfk0sxxxmx	= NULL;

	
	public $Vkq5rgcyqdq1		= "\n";

	
	public $V3kvkhd14dap	= '';

	
	public $V5mhcgfyfeif	= NULL;

	
	public function __construct($Vnmcm15juye5 = array())
	{
		
		foreach ($Vnmcm15juye5 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$this->template[$V2xim30qek4u] = $Va4zo0rltynr;
		}

		log_message('info', 'Table Class Initialized');
	}

	

	
	public function set_template($Vwwfk0sxxxmx)
	{
		if ( ! is_array($Vwwfk0sxxxmx))
		{
			return FALSE;
		}

		$this->template = $Vwwfk0sxxxmx;
		return TRUE;
	}

	

	
	public function set_heading($Vz3ndrbat24t = array())
	{
		$this->heading = $this->_prep_args(func_get_args());
		return $this;
	}

	

	
	public function make_columns($V5adckfdzb1d = array(), $Vwvlq1dv2sch = 0)
	{
		if ( ! is_array($V5adckfdzb1d) OR count($V5adckfdzb1d) === 0 OR ! is_int($Vwvlq1dv2sch))
		{
			return FALSE;
		}

		
		
		$this->auto_heading = FALSE;

		if ($Vwvlq1dv2sch === 0)
		{
			return $V5adckfdzb1d;
		}

		$Vexceixfrb3w = array();
		do
		{
			$V3iiokxda3xw = array_splice($V5adckfdzb1d, 0, $Vwvlq1dv2sch);

			if (count($V3iiokxda3xw) < $Vwvlq1dv2sch)
			{
				for ($Vep0df0xosaw = count($V3iiokxda3xw); $Vep0df0xosaw < $Vwvlq1dv2sch; $Vep0df0xosaw++)
				{
					$V3iiokxda3xw[] = '&nbsp;';
				}
			}

			$Vexceixfrb3w[] = $V3iiokxda3xw;
		}
		while (count($V5adckfdzb1d) > 0);

		return $Vexceixfrb3w;
	}

	

	
	public function set_empty($Va4zo0rltynrue)
	{
		$this->empty_cells = $Va4zo0rltynrue;
		return $this;
	}

	

	
	public function add_row($Vz3ndrbat24t = array())
	{
		$this->rows[] = $this->_prep_args(func_get_args());
		return $this;
	}

	

	
	protected function _prep_args($Vz3ndrbat24t)
	{
		
		
		
		if (isset($Vz3ndrbat24t[0]) && count($Vz3ndrbat24t) === 1 && is_array($Vz3ndrbat24t[0]) && ! isset($Vz3ndrbat24t[0]['data']))
		{
			$Vz3ndrbat24t = $Vz3ndrbat24t[0];
		}

		foreach ($Vz3ndrbat24t as $V2xim30qek4u => $Va4zo0rltynr)
		{
			is_array($Va4zo0rltynr) OR $Vz3ndrbat24t[$V2xim30qek4u] = array('data' => $Va4zo0rltynr);
		}

		return $Vz3ndrbat24t;
	}

	

	
	public function set_caption($Vtrc4mikjes3)
	{
		$this->caption = $Vtrc4mikjes3;
	}

	

	
	public function generate($Vjwoxglr4age = NULL)
	{
		
		
		if ( ! empty($Vjwoxglr4age))
		{
			if ($Vjwoxglr4age instanceof CI_DB_result)
			{
				$this->_set_from_db_result($Vjwoxglr4age);
			}
			elseif (is_array($Vjwoxglr4age))
			{
				$this->_set_from_array($Vjwoxglr4age);
			}
		}

		
		if (empty($this->heading) && empty($this->rows))
		{
			return 'Undefined table data';
		}

		
		$this->_compile_template();

		
		if (isset($this->function) && ! is_callable($this->function))
		{
			$this->function = NULL;
		}

		

		$Vlxaqc0cx0ab = $this->template['table_open'].$this->newline;

		
		if ($this->caption)
		{
			$Vlxaqc0cx0ab .= '<caption>'.$this->caption.'</caption>'.$this->newline;
		}

		
		if ( ! empty($this->heading))
		{
			$Vlxaqc0cx0ab .= $this->template['thead_open'].$this->newline.$this->template['heading_row_start'].$this->newline;

			foreach ($this->heading as $Vcuptk31tst0)
			{
				$V3iiokxda3xw = $this->template['heading_cell_start'];

				foreach ($Vcuptk31tst0 as $V2xim30qek4u => $Va4zo0rltynr)
				{
					if ($V2xim30qek4u !== 'data')
					{
						$V3iiokxda3xw = str_replace('<th', '<th '.$V2xim30qek4u.'="'.$Va4zo0rltynr.'"', $V3iiokxda3xw);
					}
				}

				$Vlxaqc0cx0ab .= $V3iiokxda3xw.(isset($Vcuptk31tst0['data']) ? $Vcuptk31tst0['data'] : '').$this->template['heading_cell_end'];
			}

			$Vlxaqc0cx0ab .= $this->template['heading_row_end'].$this->newline.$this->template['thead_close'].$this->newline;
		}

		
		if ( ! empty($this->rows))
		{
			$Vlxaqc0cx0ab .= $this->template['tbody_open'].$this->newline;

			$Vep0df0xosaw = 1;
			foreach ($this->rows as $Vf3jo4nkd2sr)
			{
				if ( ! is_array($Vf3jo4nkd2sr))
				{
					break;
				}

				
				$Vaclaigdbtoo = fmod($Vep0df0xosaw++, 2) ? '' : 'alt_';

				$Vlxaqc0cx0ab .= $this->template['row_'.$Vaclaigdbtoo.'start'].$this->newline;

				foreach ($Vf3jo4nkd2sr as $Vg4auxhyjvfy)
				{
					$V3iiokxda3xw = $this->template['cell_'.$Vaclaigdbtoo.'start'];

					foreach ($Vg4auxhyjvfy as $V2xim30qek4u => $Va4zo0rltynr)
					{
						if ($V2xim30qek4u !== 'data')
						{
							$V3iiokxda3xw = str_replace('<td', '<td '.$V2xim30qek4u.'="'.$Va4zo0rltynr.'"', $V3iiokxda3xw);
						}
					}

					$Vg4auxhyjvfy = isset($Vg4auxhyjvfy['data']) ? $Vg4auxhyjvfy['data'] : '';
					$Vlxaqc0cx0ab .= $V3iiokxda3xw;

					if ($Vg4auxhyjvfy === '' OR $Vg4auxhyjvfy === NULL)
					{
						$Vlxaqc0cx0ab .= $this->empty_cells;
					}
					elseif (isset($this->function))
					{
						$Vlxaqc0cx0ab .= call_user_func($this->function, $Vg4auxhyjvfy);
					}
					else
					{
						$Vlxaqc0cx0ab .= $Vg4auxhyjvfy;
					}

					$Vlxaqc0cx0ab .= $this->template['cell_'.$Vaclaigdbtoo.'end'];
				}

				$Vlxaqc0cx0ab .= $this->template['row_'.$Vaclaigdbtoo.'end'].$this->newline;
			}

			$Vlxaqc0cx0ab .= $this->template['tbody_close'].$this->newline;
		}

		$Vlxaqc0cx0ab .= $this->template['table_close'];

		
		$this->clear();

		return $Vlxaqc0cx0ab;
	}

	

	
	public function clear()
	{
		$this->rows = array();
		$this->heading = array();
		$this->auto_heading = TRUE;
		return $this;
	}

	

	
	protected function _set_from_db_result($V1v3xsp031u0)
	{
		
		if ($this->auto_heading === TRUE && empty($this->heading))
		{
			$this->heading = $this->_prep_args($V1v3xsp031u0->list_fields());
		}

		foreach ($V1v3xsp031u0->result_array() as $Vf3jo4nkd2sr)
		{
			$this->rows[] = $this->_prep_args($Vf3jo4nkd2sr);
		}
	}

	

	
	protected function _set_from_array($Vfeinw1hsfej)
	{
		if ($this->auto_heading === TRUE && empty($this->heading))
		{
			$this->heading = $this->_prep_args(array_shift($Vfeinw1hsfej));
		}

		foreach ($Vfeinw1hsfej as &$Vf3jo4nkd2sr)
		{
			$this->rows[] = $this->_prep_args($Vf3jo4nkd2sr);
		}
	}

	

	
	protected function _compile_template()
	{
		if ($this->template === NULL)
		{
			$this->template = $this->_default_template();
			return;
		}

		$this->temp = $this->_default_template();
		foreach (array('table_open', 'thead_open', 'thead_close', 'heading_row_start', 'heading_row_end', 'heading_cell_start', 'heading_cell_end', 'tbody_open', 'tbody_close', 'row_start', 'row_end', 'cell_start', 'cell_end', 'row_alt_start', 'row_alt_end', 'cell_alt_start', 'cell_alt_end', 'table_close') as $Va4zo0rltynr)
		{
			if ( ! isset($this->template[$Va4zo0rltynr]))
			{
				$this->template[$Va4zo0rltynr] = $this->temp[$Va4zo0rltynr];
			}
		}
	}

	

	
	protected function _default_template()
	{
		return array(
			'table_open'		=> '<table border="0" cellpadding="4" cellspacing="0">',

			'thead_open'		=> '<thead>',
			'thead_close'		=> '</thead>',

			'heading_row_start'	=> '<tr>',
			'heading_row_end'	=> '</tr>',
			'heading_cell_start'	=> '<th>',
			'heading_cell_end'	=> '</th>',

			'tbody_open'		=> '<tbody>',
			'tbody_close'		=> '</tbody>',

			'row_start'		=> '<tr>',
			'row_end'		=> '</tr>',
			'cell_start'		=> '<td>',
			'cell_end'		=> '</td>',

			'row_alt_start'		=> '<tr>',
			'row_alt_end'		=> '</tr>',
			'cell_alt_start'	=> '<td>',
			'cell_alt_end'		=> '</td>',

			'table_close'		=> '</table>'
		);
	}

}
