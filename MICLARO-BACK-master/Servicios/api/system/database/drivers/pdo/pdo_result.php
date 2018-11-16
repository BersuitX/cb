<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_result extends CI_DB_result {

	
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
		elseif (($Vsp22x00cbsw = $this->result_id->rowCount()) > 0)
		{
			return $this->num_rows = $Vsp22x00cbsw;
		}

		return $this->num_rows = count($this->result_array());
	}

	

	
	public function num_fields()
	{
		return $this->result_id->columnCount();
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			
			
			$Vo40x0tig1n0[$Vep0df0xosaw] = @$this->result_id->getColumnMeta($Vep0df0xosaw);
			$Vo40x0tig1n0[$Vep0df0xosaw] = $Vo40x0tig1n0[$Vep0df0xosaw]['name'];
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		try
		{
			$V1qi3fii2jjy = array();

			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vwji4rxkyw5j = $this->result_id->getColumnMeta($Vep0df0xosaw);

				$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
				$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vwji4rxkyw5j['name'];
				$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vwji4rxkyw5j['native_type'];
				$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= ($Vwji4rxkyw5j['len'] > 0) ? $Vwji4rxkyw5j['len'] : NULL;
				$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) ( ! empty($Vwji4rxkyw5j['flags']) && in_array('primary_key', $Vwji4rxkyw5j['flags'], TRUE));
			}

			return $V1qi3fii2jjy;
		}
		catch (Exception $Veengl4bqqud)
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unsupported_feature');
			}

			return FALSE;
		}
	}

	

	
	public function free_result()
	{
		if (is_object($this->result_id))
		{
			$this->result_id = FALSE;
		}
	}

	

	
	protected function _fetch_assoc()
	{
		return $this->result_id->fetch(PDO::FETCH_ASSOC);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		return $this->result_id->fetchObject($Vn2ycfau434slass_name);
	}

}
