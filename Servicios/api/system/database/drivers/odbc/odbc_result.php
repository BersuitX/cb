<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_odbc_result extends CI_DB_result {

	
	public function num_rows()
	{
		if (is_int($this->num_rows))
		{
			return $this->num_rows;
		}
		elseif (($this->num_rows = odbc_num_rows($this->result_id)) !== -1)
		{
			return $this->num_rows;
		}

		
		if (count($this->result_array) > 0)
		{
			return $this->num_rows = count($this->result_array);
		}
		elseif (count($this->result_object) > 0)
		{
			return $this->num_rows = count($this->result_object);
		}

		return $this->num_rows = count($this->result_array());
	}

	

	
	public function num_fields()
	{
		return odbc_num_fields($this->result_id);
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		$Vxo5tfdhoozu = $this->num_fields();

		if ($Vxo5tfdhoozu > 0)
		{
			for ($Vep0df0xosaw = 1; $Vep0df0xosaw <= $Vxo5tfdhoozu; $Vep0df0xosaw++)
			{
				$Vo40x0tig1n0[] = odbc_field_name($this->result_id, $Vep0df0xosaw);
			}
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $V4pqg2kikihf = 1, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++, $V4pqg2kikihf++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= odbc_field_name($this->result_id, $V4pqg2kikihf);
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= odbc_field_type($this->result_id, $V4pqg2kikihf);
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= odbc_field_len($this->result_id, $V4pqg2kikihf);
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= 0;
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= '';
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			odbc_free_result($this->result_id);
			$this->result_id = FALSE;
		}
	}

	

	
	protected function _fetch_assoc()
	{
		return odbc_fetch_array($this->result_id);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		$Vf3jo4nkd2sr = odbc_fetch_object($this->result_id);

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



if ( ! function_exists('odbc_fetch_array'))
{
	
	function odbc_fetch_array(&$Voetc43kt2cr, $Vf3jo4nkd2srnumber = 1)
	{
		$Vnxpfqjkjlgn = array();
		if ( ! odbc_fetch_into($Voetc43kt2cr, $Vnxpfqjkjlgn, $Vf3jo4nkd2srnumber))
		{
			return FALSE;
		}

		$Vnxpfqjkjlgn_assoc = array();
		foreach ($Vnxpfqjkjlgn as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vws5kyblaaxj = odbc_field_name($Voetc43kt2cr, $Vwyse0flpyxh+1);
			$Vnxpfqjkjlgn_assoc[$Vws5kyblaaxj] = $Vxxtccqydhzn;
		}

		return $Vnxpfqjkjlgn_assoc;
	}
}



if ( ! function_exists('odbc_fetch_object'))
{
	
	function odbc_fetch_object(&$Voetc43kt2cr, $Vf3jo4nkd2srnumber = 1)
	{
		$Vnxpfqjkjlgn = array();
		if ( ! odbc_fetch_into($Voetc43kt2cr, $Vnxpfqjkjlgn, $Vf3jo4nkd2srnumber))
		{
			return FALSE;
		}

		$Vnxpfqjkjlgn_object = new stdClass();
		foreach ($Vnxpfqjkjlgn as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vws5kyblaaxj = odbc_field_name($Voetc43kt2cr, $Vwyse0flpyxh+1);
			$Vnxpfqjkjlgn_object->$Vws5kyblaaxj = $Vxxtccqydhzn;
		}

		return $Vnxpfqjkjlgn_object;
	}
}
