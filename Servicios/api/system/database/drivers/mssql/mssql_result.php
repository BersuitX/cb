<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mssql_result extends CI_DB_result {

	
	public function num_rows()
	{
		return is_int($this->num_rows)
			? $this->num_rows
			: $this->num_rows = mssql_num_rows($this->result_id);
	}

	

	
	public function num_fields()
	{
		return mssql_num_fields($this->result_id);
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		mssql_field_seek($this->result_id, 0);
		while ($Vwji4rxkyw5j = mssql_fetch_field($this->result_id))
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
			$Vwji4rxkyw5j = mssql_fetch_field($this->result_id, $Vep0df0xosaw);

			$V1qi3fii2jjy[$Vep0df0xosaw]		= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name	= $Vwji4rxkyw5j->name;
			$V1qi3fii2jjy[$Vep0df0xosaw]->type	= $Vwji4rxkyw5j->type;
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length	= $Vwji4rxkyw5j->max_length;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			mssql_free_result($this->result_id);
			$this->result_id = FALSE;
		}
	}

	

	
	public function data_seek($Vewkafdpowpc = 0)
	{
		return mssql_data_seek($this->result_id, $Vewkafdpowpc);
	}

	

	
	protected function _fetch_assoc()
	{
		return mssql_fetch_assoc($this->result_id);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		$Vf3jo4nkd2sr = mssql_fetch_object($this->result_id);

		if ($Vn2ycfau434slass_name === 'stdClass' OR ! $Vf3jo4nkd2sr)
		{
			return $Vf3jo4nkd2sr;
		}

		$Vn2ycfau434slass_name = new $Vn2ycfau434slass_name();
		foreach ($Vf3jo4nkd2sr as $V2xim30qek4u => $Vcnwqsowvhom)
		{
			$Vn2ycfau434slass_name->$V2xim30qek4u = $Vcnwqsowvhom;
		}

		return $Vn2ycfau434slass_name;
	}

}
