<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_result {

	
	public $Viv0fs0wvdfd;

	
	public $Visuet3dnhtv;

	
	public $V02us0staru1			= array();

	
	public $Vy14a25ytwe0			= array();

	
	public $Vtkedlur5hor		= array();

	
	public $Vtlbd0tawyrp			= 0;

	
	public $Vsp22x00cbsw;

	
	public $Vd24vyzv5gs1;

	

	
	public function __construct(&$Vzoudzpzgmc0)
	{
		$this->conn_id = $Vzoudzpzgmc0->conn_id;
		$this->result_id = $Vzoudzpzgmc0->result_id;
	}

	

	
	public function num_rows()
	{
		if (is_int($this->num_rows))
		{
			return $this->num_rows;
		}
		elseif (count($this->result_array) > 0)
		{
			return $this->num_rows = count($this->result_array);
		}
		elseif (count($this->result_object) > 0)
		{
			return $this->num_rows = count($this->result_object);
		}

		return $this->num_rows = count($this->result_array());
	}

	

	
	public function result($V4wtbblc1wn4 = 'object')
	{
		if ($V4wtbblc1wn4 === 'array')
		{
			return $this->result_array();
		}
		elseif ($V4wtbblc1wn4 === 'object')
		{
			return $this->result_object();
		}
		else
		{
			return $this->custom_result_object($V4wtbblc1wn4);
		}
	}

	

	
	public function custom_result_object($V0c5k5m205p1)
	{
		if (isset($this->custom_result_object[$V0c5k5m205p1]))
		{
			return $this->custom_result_object[$V0c5k5m205p1];
		}
		elseif ( ! $this->result_id OR $this->num_rows === 0)
		{
			return array();
		}

		
		$Vu5wjodvknd4 = NULL;
		if (($Vn2ycfau434s = count($this->result_array)) > 0)
		{
			$Vu5wjodvknd4 = 'result_array';
		}
		elseif (($Vn2ycfau434s = count($this->result_object)) > 0)
		{
			$Vu5wjodvknd4 = 'result_object';
		}

		if ($Vu5wjodvknd4 !== NULL)
		{
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$this->custom_result_object[$V0c5k5m205p1][$Vep0df0xosaw] = new $V0c5k5m205p1();

				foreach ($this->{$Vu5wjodvknd4}[$Vep0df0xosaw] as $V2xim30qek4u => $Vcnwqsowvhom)
				{
					$this->custom_result_object[$V0c5k5m205p1][$Vep0df0xosaw]->$V2xim30qek4u = $Vcnwqsowvhom;
				}
			}

			return $this->custom_result_object[$V0c5k5m205p1];
		}

		is_null($this->row_data) OR $this->data_seek(0);
		$this->custom_result_object[$V0c5k5m205p1] = array();

		while ($Vf3jo4nkd2sr = $this->_fetch_object($V0c5k5m205p1))
		{
			$this->custom_result_object[$V0c5k5m205p1][] = $Vf3jo4nkd2sr;
		}

		return $this->custom_result_object[$V0c5k5m205p1];
	}

	

	
	public function result_object()
	{
		if (count($this->result_object) > 0)
		{
			return $this->result_object;
		}

		
		
		
		if ( ! $this->result_id OR $this->num_rows === 0)
		{
			return array();
		}

		if (($Vn2ycfau434s = count($this->result_array)) > 0)
		{
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$this->result_object[$Vep0df0xosaw] = (object) $this->result_array[$Vep0df0xosaw];
			}

			return $this->result_object;
		}

		is_null($this->row_data) OR $this->data_seek(0);
		while ($Vf3jo4nkd2sr = $this->_fetch_object())
		{
			$this->result_object[] = $Vf3jo4nkd2sr;
		}

		return $this->result_object;
	}

	

	
	public function result_array()
	{
		if (count($this->result_array) > 0)
		{
			return $this->result_array;
		}

		
		
		
		if ( ! $this->result_id OR $this->num_rows === 0)
		{
			return array();
		}

		if (($Vn2ycfau434s = count($this->result_object)) > 0)
		{
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$this->result_array[$Vep0df0xosaw] = (array) $this->result_object[$Vep0df0xosaw];
			}

			return $this->result_array;
		}

		is_null($this->row_data) OR $this->data_seek(0);
		while ($Vf3jo4nkd2sr = $this->_fetch_assoc())
		{
			$this->result_array[] = $Vf3jo4nkd2sr;
		}

		return $this->result_array;
	}

	

	
	public function row($Vewkafdpowpc = 0, $V4wtbblc1wn4 = 'object')
	{
		if ( ! is_numeric($Vewkafdpowpc))
		{
			
			is_array($this->row_data) OR $this->row_data = $this->row_array(0);

			
			if (empty($this->row_data) OR ! array_key_exists($Vewkafdpowpc, $this->row_data))
			{
				return NULL;
			}

			return $this->row_data[$Vewkafdpowpc];
		}

		if ($V4wtbblc1wn4 === 'object') return $this->row_object($Vewkafdpowpc);
		elseif ($V4wtbblc1wn4 === 'array') return $this->row_array($Vewkafdpowpc);
		else return $this->custom_row_object($Vewkafdpowpc, $V4wtbblc1wn4);
	}

	

	
	public function set_row($V2xim30qek4u, $Vcnwqsowvhom = NULL)
	{
		
		if ( ! is_array($this->row_data))
		{
			$this->row_data = $this->row_array(0);
		}

		if (is_array($V2xim30qek4u))
		{
			foreach ($V2xim30qek4u as $Vwyse0flpyxh => $Vxxtccqydhzn)
			{
				$this->row_data[$Vwyse0flpyxh] = $Vxxtccqydhzn;
			}
			return;
		}

		if ($V2xim30qek4u !== '' && $Vcnwqsowvhom !== NULL)
		{
			$this->row_data[$V2xim30qek4u] = $Vcnwqsowvhom;
		}
	}

	

	
	public function custom_row_object($Vewkafdpowpc, $V4wtbblc1wn4)
	{
		isset($this->custom_result_object[$V4wtbblc1wn4]) OR $this->custom_result_object($V4wtbblc1wn4);

		if (count($this->custom_result_object[$V4wtbblc1wn4]) === 0)
		{
			return NULL;
		}

		if ($Vewkafdpowpc !== $this->current_row && isset($this->custom_result_object[$V4wtbblc1wn4][$Vewkafdpowpc]))
		{
			$this->current_row = $Vewkafdpowpc;
		}

		return $this->custom_result_object[$V4wtbblc1wn4][$this->current_row];
	}

	

	
	public function row_object($Vewkafdpowpc = 0)
	{
		$Voetc43kt2cr = $this->result_object();
		if (count($Voetc43kt2cr) === 0)
		{
			return NULL;
		}

		if ($Vewkafdpowpc !== $this->current_row && isset($Voetc43kt2cr[$Vewkafdpowpc]))
		{
			$this->current_row = $Vewkafdpowpc;
		}

		return $Voetc43kt2cr[$this->current_row];
	}

	

	
	public function row_array($Vewkafdpowpc = 0)
	{
		$Voetc43kt2cr = $this->result_array();
		if (count($Voetc43kt2cr) === 0)
		{
			return NULL;
		}

		if ($Vewkafdpowpc !== $this->current_row && isset($Voetc43kt2cr[$Vewkafdpowpc]))
		{
			$this->current_row = $Vewkafdpowpc;
		}

		return $Voetc43kt2cr[$this->current_row];
	}

	

	
	public function first_row($V4wtbblc1wn4 = 'object')
	{
		$Voetc43kt2cr = $this->result($V4wtbblc1wn4);
		return (count($Voetc43kt2cr) === 0) ? NULL : $Voetc43kt2cr[0];
	}

	

	
	public function last_row($V4wtbblc1wn4 = 'object')
	{
		$Voetc43kt2cr = $this->result($V4wtbblc1wn4);
		return (count($Voetc43kt2cr) === 0) ? NULL : $Voetc43kt2cr[count($Voetc43kt2cr) - 1];
	}

	

	
	public function next_row($V4wtbblc1wn4 = 'object')
	{
		$Voetc43kt2cr = $this->result($V4wtbblc1wn4);
		if (count($Voetc43kt2cr) === 0)
		{
			return NULL;
		}

		return isset($Voetc43kt2cr[$this->current_row + 1])
			? $Voetc43kt2cr[++$this->current_row]
			: NULL;
	}

	

	
	public function previous_row($V4wtbblc1wn4 = 'object')
	{
		$Voetc43kt2cr = $this->result($V4wtbblc1wn4);
		if (count($Voetc43kt2cr) === 0)
		{
			return NULL;
		}

		if (isset($Voetc43kt2cr[$this->current_row - 1]))
		{
			--$this->current_row;
		}
		return $Voetc43kt2cr[$this->current_row];
	}

	

	
	public function unbuffered_row($V4wtbblc1wn4 = 'object')
	{
		if ($V4wtbblc1wn4 === 'array')
		{
			return $this->_fetch_assoc();
		}
		elseif ($V4wtbblc1wn4 === 'object')
		{
			return $this->_fetch_object();
		}

		return $this->_fetch_object($V4wtbblc1wn4);
	}

	

	

	

	
	public function num_fields()
	{
		return 0;
	}

	

	
	public function list_fields()
	{
		return array();
	}

	

	
	public function field_data()
	{
		return array();
	}

	

	
	public function free_result()
	{
		$this->result_id = FALSE;
	}

	

	
	public function data_seek($Vewkafdpowpc = 0)
	{
		return FALSE;
	}

	

	
	protected function _fetch_assoc()
	{
		return array();
	}

	

	
	protected function _fetch_object($V0c5k5m205p1 = 'stdClass')
	{
		return array();
	}

}
