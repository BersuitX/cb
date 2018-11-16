<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mysqli_result extends CI_DB_result {

	
	public function num_rows()
	{
		return is_int($this->num_rows)
			? $this->num_rows
			: $this->num_rows = $this->result_id->num_rows;
	}

	

	
	public function num_fields()
	{
		return $this->result_id->field_count;
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		$this->result_id->field_seek(0);
		while ($Vwji4rxkyw5j = $this->result_id->fetch_field())
		{
			$Vo40x0tig1n0[] = $Vwji4rxkyw5j->name;
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		$Vwji4rxkyw5j_data = $this->result_id->fetch_fields();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwji4rxkyw5j_data); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vwji4rxkyw5j_data[$Vep0df0xosaw]->name;
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vwji4rxkyw5j_data[$Vep0df0xosaw]->type;
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= $Vwji4rxkyw5j_data[$Vep0df0xosaw]->max_length;
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) ($Vwji4rxkyw5j_data[$Vep0df0xosaw]->flags & 2);
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vwji4rxkyw5j_data[$Vep0df0xosaw]->def;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_object($this->result_id))
		{
			$this->result_id->free();
			$this->result_id = FALSE;
		}
	}

	

	
	public function data_seek($Vewkafdpowpc = 0)
	{
		return $this->result_id->data_seek($Vewkafdpowpc);
	}

	

	
	protected function _fetch_assoc()
	{
		return $this->result_id->fetch_assoc();
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		return $this->result_id->fetch_object($Vn2ycfau434slass_name);
	}

}
