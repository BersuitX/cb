<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_oci8_utility extends CI_DB_utility {

	
	protected $Vx21j431t0ux	= 'SELECT username FROM dba_users'; 

	
	protected function _backup($Vpz5i5lfmwft = array())
	{
		
		return $this->db->display_error('db_unsupported_feature');
	}

}
