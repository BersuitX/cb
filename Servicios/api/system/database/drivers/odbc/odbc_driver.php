<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_odbc_driver extends CI_DB {

	
	public $V4toindljvfg = 'odbc';

	
	public $Vtwmmjbkasze = 'public';

	

	
	protected $Vnm3z344krng = '';

	
	protected $Vrjisyvepiwz = " {escape '%s'} ";

	
	protected $Vbqls34cvlhv = array('RND()', 'RND(%d)');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		
		if (empty($this->dsn))
		{
			$this->dsn = $this->hostname;
		}
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		return ($Vzrtmbotfake === TRUE)
			? odbc_pconnect($this->dsn, $this->username, $this->password)
			: odbc_connect($this->dsn, $this->username, $this->password);
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return odbc_exec($this->conn_id, $Vcusg10hsxxg);
	}

	

	
	protected function _trans_begin()
	{
		return odbc_autocommit($this->conn_id, FALSE);
	}

	

	
	protected function _trans_commit()
	{
		if (odbc_commit($this->conn_id))
		{
			odbc_autocommit($this->conn_id, TRUE);
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _trans_rollback()
	{
		if (odbc_rollback($this->conn_id))
		{
			odbc_autocommit($this->conn_id, TRUE);
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function is_write_type($Vcusg10hsxxg)
	{
		if (preg_match('#^(INSERT|UPDATE).*RETURNING\s.+(\,\s?.+)*$#i', $Vcusg10hsxxg))
		{
			return FALSE;
		}

		return parent::is_write_type($Vcusg10hsxxg);
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return remove_invisible_characters($Vssdjb5oqaky);
	}

	

	
	public function affected_rows()
	{
		return odbc_num_rows($this->result_id);
	}

	

	
	public function insert_id()
	{
		return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = "SELECT table_name FROM information_schema.tables WHERE table_schema = '".$this->schema."'";

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg." AND table_name LIKE '".$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SHOW COLUMNS FROM '.$Vhyg2tjvah5t;
	}

	

	
	protected function _field_data($Vhyg2tjvah5t)
	{
		return 'SELECT TOP 1 FROM '.$Vhyg2tjvah5t;
	}

	

	
	public function error()
	{
		return array('code' => odbc_error($this->conn_id), 'message' => odbc_errormsg($this->conn_id));
	}

	

	
	protected function _update($Vhyg2tjvah5t, $V3jjxja3nkgt)
	{
		$this->qb_limit = FALSE;
		$this->qb_orderby = array();
		return parent::_update($Vhyg2tjvah5t, $V3jjxja3nkgt);
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'DELETE FROM '.$Vhyg2tjvah5t;
	}

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		$this->qb_limit = FALSE;
		return parent::_delete($Vhyg2tjvah5t);
	}

	

	
	protected function _close()
	{
		odbc_close($this->conn_id);
	}

}
