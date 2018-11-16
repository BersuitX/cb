<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mysql_result extends CI_DB_result {

	
	public function __construct(&$Vzoudzpzgmc0)
	{
		parent::__construct($Vzoudzpzgmc0);

		
		
		$this->num_rows = mysql_num_rows($this->result_id);
	}

	

	
	public function num_rows()
	{
		return $this->num_rows;
	}

	

	
	public function num_fields()
	{
		return mysql_num_fields($this->result_id);
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		mysql_field_seek($this->result_id, 0);
		while ($Vwji4rxkyw5j = mysql_fetch_field($this->result_id))
		{
			$Vo40x0tig1n0[] = $Vwji4rxkyw5j->name;
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= mysql_field_name($this->result_id, $Vep0df0xosaw);
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= mysql_field_type($this->result_id, $Vep0df0xosaw);
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= mysql_field_len($this->result_id, $Vep0df0xosaw);
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) (strpos(mysql_field_flags($this->result_id, $Vep0df0xosaw), 'primary_key') !== FALSE);
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			mysql_free_result($this->result_id);
			$this->result_id = FALSE;
		}
	}

	

	
	public function data_seek($Vewkafdpowpc = 0)
	{
		return $this->num_rows
			? mysql_data_seek($this->result_id, $Vewkafdpowpc)
			: FALSE;
	}

	

	
	protected function _fetch_assoc()
	{
		return mysql_fetch_assoc($this->result_id);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		return mysql_fetch_object($this->result_id, $Vn2ycfau434slass_name);
	}

}
