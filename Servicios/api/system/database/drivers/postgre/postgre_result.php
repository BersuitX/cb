<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_postgre_result extends CI_DB_result {

	
	public function num_rows()
	{
		return is_int($this->num_rows)
			? $this->num_rows
			: $this->num_rows = pg_num_rows($this->result_id);
	}

	

	
	public function num_fields()
	{
		return pg_num_fields($this->result_id);
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vo40x0tig1n0[] = pg_field_name($this->result_id, $Vep0df0xosaw);
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= pg_field_name($this->result_id, $Vep0df0xosaw);
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= pg_field_type($this->result_id, $Vep0df0xosaw);
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= pg_field_size($this->result_id, $Vep0df0xosaw);
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			pg_free_result($this->result_id);
			$this->result_id = FALSE;
		}
	}

	

	
	public function data_seek($Vewkafdpowpc = 0)
	{
		return pg_result_seek($this->result_id, $Vewkafdpowpc);
	}

	

	
	protected function _fetch_assoc()
	{
		return pg_fetch_assoc($this->result_id);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		return pg_fetch_object($this->result_id, NULL, $Vn2ycfau434slass_name);
	}

}
