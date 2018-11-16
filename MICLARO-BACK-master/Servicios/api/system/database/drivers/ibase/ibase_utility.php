<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_ibase_utility extends CI_DB_utility {

	
	protected function _backup($Vb13cwxhoi04)
	{
		if ($V0rgibksbyqm = ibase_service_attach($this->db->hostname, $this->db->username, $this->db->password))
		{
			$Vnb2hggtfonp = ibase_backup($V0rgibksbyqm, $this->db->database, $Vb13cwxhoi04.'.fbk');

			
			ibase_service_detach($V0rgibksbyqm);
			return $Vnb2hggtfonp;
		}

		return FALSE;
	}

}
