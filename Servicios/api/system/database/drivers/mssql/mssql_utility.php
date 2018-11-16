<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mssql_utility extends CI_DB_utility {

	
	protected $Vx21j431t0ux	= 'EXEC sp_helpdb'; 

	
	protected $Vpjjq031rqsw	= 'ALTER INDEX all ON %s REORGANIZE';

	
	protected function _backup($Vpz5i5lfmwft = array())
	{
		
		return $this->db->display_error('db_unsupported_feature');
	}

}
