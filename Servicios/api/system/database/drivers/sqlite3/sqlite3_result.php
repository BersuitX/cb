<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_sqlite3_result extends CI_DB_result {

	
	public function num_fields()
	{
		return $this->result_id->numColumns();
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vo40x0tig1n0[] = $this->result_id->columnName($Vep0df0xosaw);
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		static $Vdiyhbgr3mw4 = array(
			SQLITE3_INTEGER	=> 'integer',
			SQLITE3_FLOAT	=> 'float',
			SQLITE3_TEXT	=> 'text',
			SQLITE3_BLOB	=> 'blob',
			SQLITE3_NULL	=> 'null'
		);

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $this->result_id->columnName($Vep0df0xosaw);

			$V4wtbblc1wn4 = $this->result_id->columnType($Vep0df0xosaw);
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= isset($Vdiyhbgr3mw4[$V4wtbblc1wn4]) ? $Vdiyhbgr3mw4[$V4wtbblc1wn4] : $V4wtbblc1wn4;

			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= NULL;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_object($this->result_id))
		{
			$this->result_id->finalize();
			$this->result_id = NULL;
		}
	}

	

	
	protected function _fetch_assoc()
	{
		return $this->result_id->fetchArray(SQLITE3_ASSOC);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		
		if (($Vf3jo4nkd2sr = $this->result_id->fetchArray(SQLITE3_ASSOC)) === FALSE)
		{
			return FALSE;
		}
		elseif ($Vn2ycfau434slass_name === 'stdClass')
		{
			return (object) $Vf3jo4nkd2sr;
		}

		$Vn2ycfau434slass_name = new $Vn2ycfau434slass_name();
		foreach (array_keys($Vf3jo4nkd2sr) as $V2xim30qek4u)
		{
			$Vn2ycfau434slass_name->$V2xim30qek4u = $Vf3jo4nkd2sr[$V2xim30qek4u];
		}

		return $Vn2ycfau434slass_name;
	}

	

	
	public function data_seek($Vewkafdpowpc = 0)
	{
		
		return ($Vewkafdpowpc > 0) ? FALSE : $this->result_id->reset();
	}

}
