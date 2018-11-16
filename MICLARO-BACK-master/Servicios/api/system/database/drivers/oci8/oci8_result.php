<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_oci8_result extends CI_DB_result {

	
	public $Ves2mb3mv53x;

	
	public $Vovlw4xuybhd;

	
	public $Vgwsz13qp1xf;

	
	public $Vggm4wfcj1su;

	

	
	public function __construct(&$Vzoudzpzgmc0)
	{
		parent::__construct($Vzoudzpzgmc0);

		$this->stmt_id = $Vzoudzpzgmc0->stmt_id;
		$this->curs_id = $Vzoudzpzgmc0->curs_id;
		$this->limit_used = $Vzoudzpzgmc0->limit_used;
		$this->commit_mode =& $Vzoudzpzgmc0->commit_mode;
		$Vzoudzpzgmc0->stmt_id = FALSE;
	}

	

	
	public function num_fields()
	{
		$V2jbvukjonhh = oci_num_fields($this->stmt_id);

		
		return ($this->limit_used) ? $V2jbvukjonhh - 1 : $V2jbvukjonhh;
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		for ($Vn2ycfau434s = 1, $V0ytlzon0meu = $this->num_fields(); $Vn2ycfau434s <= $V0ytlzon0meu; $Vn2ycfau434s++)
		{
			$Vo40x0tig1n0[] = oci_field_name($this->stmt_id, $Vn2ycfau434s);
		}
		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		for ($Vn2ycfau434s = 1, $V0ytlzon0meu = $this->num_fields(); $Vn2ycfau434s <= $V0ytlzon0meu; $Vn2ycfau434s++)
		{
			$V5a313q2gqoq		= new stdClass();
			$V5a313q2gqoq->name	= oci_field_name($this->stmt_id, $Vn2ycfau434s);
			$V5a313q2gqoq->type	= oci_field_type($this->stmt_id, $Vn2ycfau434s);
			$V5a313q2gqoq->max_length	= oci_field_size($this->stmt_id, $Vn2ycfau434s);

			$V1qi3fii2jjy[] = $V5a313q2gqoq;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			oci_free_statement($this->result_id);
			$this->result_id = FALSE;
		}

		if (is_resource($this->stmt_id))
		{
			oci_free_statement($this->stmt_id);
		}

		if (is_resource($this->curs_id))
		{
			oci_cancel($this->curs_id);
			$this->curs_id = NULL;
		}
	}

	

	
	protected function _fetch_assoc()
	{
		$Vdrzyozqxvbr = ($this->curs_id) ? $this->curs_id : $this->stmt_id;
		return oci_fetch_assoc($Vdrzyozqxvbr);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		$Vf3jo4nkd2sr = ($this->curs_id)
			? oci_fetch_object($this->curs_id)
			: oci_fetch_object($this->stmt_id);

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
