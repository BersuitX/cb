<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_sqlsrv_result extends CI_DB_result {

	
	public $V1ejiufxjwkg;

	

	
	public function __construct(&$Vzoudzpzgmc0)
	{
		parent::__construct($Vzoudzpzgmc0);

		$this->scrollable = $Vzoudzpzgmc0->scrollable;
	}

	

	
	public function num_rows()
	{
		
		if ( ! in_array($this->scrollable, array(FALSE, SQLSRV_CURSOR_FORWARD, SQLSRV_CURSOR_DYNAMIC), TRUE))
		{
			return parent::num_rows();
		}

		return is_int($this->num_rows)
			? $this->num_rows
			: $this->num_rows = sqlsrv_num_rows($this->result_id);
	}

	

	
	public function num_fields()
	{
		return @sqlsrv_num_fields($this->result_id);
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		foreach (sqlsrv_field_metadata($this->result_id) as $Vzawlyjaf5xg => $Vwji4rxkyw5j)
		{
			$Vo40x0tig1n0[] = $Vwji4rxkyw5j['Name'];
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		foreach (sqlsrv_field_metadata($this->result_id) as $Vep0df0xosaw => $Vwji4rxkyw5j)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]		= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name	= $Vwji4rxkyw5j['Name'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->type	= $Vwji4rxkyw5j['Type'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length	= $Vwji4rxkyw5j['Size'];
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			sqlsrv_free_stmt($this->result_id);
			$this->result_id = FALSE;
		}
	}

	

	
	protected function _fetch_assoc()
	{
		return sqlsrv_fetch_array($this->result_id, SQLSRV_FETCH_ASSOC);
	}

	

	
	protected function _fetch_object($V0c5k5m205p1 = 'stdClass')
	{
		return sqlsrv_fetch_object($this->result_id, $V0c5k5m205p1);
	}

}
