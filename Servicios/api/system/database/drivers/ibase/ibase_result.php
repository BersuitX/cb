<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_ibase_result extends CI_DB_result {

	
	public function num_fields()
	{
		return ibase_num_fields($this->result_id);
	}

	

	
	public function list_fields()
	{
		$Vo40x0tig1n0 = array();
		for ($Vep0df0xosaw = 0, $Vxo5tfdhoozu = $this->num_fields(); $Vep0df0xosaw < $Vxo5tfdhoozu; $Vep0df0xosaw++)
		{
			$Vep0df0xosawnfo = ibase_field_info($this->result_id, $Vep0df0xosaw);
			$Vo40x0tig1n0[] = $Vep0df0xosawnfo['name'];
		}

		return $Vo40x0tig1n0;
	}

	

	
	public function field_data()
	{
		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = $this->num_fields(); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vep0df0xosawnfo = ibase_field_info($this->result_id, $Vep0df0xosaw);

			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vep0df0xosawnfo['name'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vep0df0xosawnfo['type'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= $Vep0df0xosawnfo['length'];
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function free_result()
	{
		ibase_free_result($this->result_id);
	}

	

	
	protected function _fetch_assoc()
	{
		return ibase_fetch_assoc($this->result_id, IBASE_FETCH_BLOBS);
	}

	

	
	protected function _fetch_object($Vn2ycfau434slass_name = 'stdClass')
	{
		$Vf3jo4nkd2sr = ibase_fetch_object($this->result_id, IBASE_FETCH_BLOBS);

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
