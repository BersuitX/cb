<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_sqlite_driver extends CI_DB {

	
	public $V4toindljvfg = 'sqlite';

	

	
	protected $Vbqls34cvlhv = array('RANDOM()', 'RANDOM()');

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$Veqekzxyjyqy = NULL;
		$Viv0fs0wvdfd = ($Vzrtmbotfake === TRUE)
			? sqlite_popen($this->database, 0666, $Veqekzxyjyqy)
			: sqlite_open($this->database, 0666, $Veqekzxyjyqy);

		isset($Veqekzxyjyqy) && log_message('error', $Veqekzxyjyqy);

		return $Viv0fs0wvdfd;
	}

	

	
	public function version()
	{
		return isset($this->data_cache['version'])
			? $this->data_cache['version']
			: $this->data_cache['version'] = sqlite_libversion();
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return $this->is_write_type($Vcusg10hsxxg)
			? sqlite_exec($this->conn_id, $Vcusg10hsxxg)
			: sqlite_query($this->conn_id, $Vcusg10hsxxg);
	}

	

	
	protected function _trans_begin()
	{
		return $this->simple_query('BEGIN TRANSACTION');
	}

	

	
	protected function _trans_commit()
	{
		return $this->simple_query('COMMIT');
	}

	

	
	protected function _trans_rollback()
	{
		return $this->simple_query('ROLLBACK');
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return sqlite_escape_string($Vssdjb5oqaky);
	}

	

	
	public function affected_rows()
	{
		return sqlite_changes($this->conn_id);
	}

	

	
	public function insert_id()
	{
		return sqlite_last_insert_rowid($this->conn_id);
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = "SELECT name FROM sqlite_master WHERE type='table'";

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix != '')
		{
			return $Vcusg10hsxxg." AND 'name' LIKE '".$this->escape_like_str($this->dbprefix)."%' ".sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		
		return FALSE;
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (($Vfvggg0pmnws = $this->query('PRAGMA TABLE_INFO('.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE).')')) === FALSE)
		{
			return FALSE;
		}

		$Vfvggg0pmnws = $Vfvggg0pmnws->result_array();
		if (empty($Vfvggg0pmnws))
		{
			return FALSE;
		}

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]['name'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vfvggg0pmnws[$Vep0df0xosaw]['type'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= NULL;
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]['dflt_value'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= isset($Vfvggg0pmnws[$Vep0df0xosaw]['pk']) ? (int) $Vfvggg0pmnws[$Vep0df0xosaw]['pk'] : 0;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function error()
	{
		$Veqekzxyjyqy = array('code' => sqlite_last_error($this->conn_id));
		$Veqekzxyjyqy['message'] = sqlite_error_string($Veqekzxyjyqy['code']);
		return $Veqekzxyjyqy;
	}

	

	
	protected function _replace($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt)
	{
		return 'INSERT OR '.parent::_replace($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt);
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'DELETE FROM '.$Vhyg2tjvah5t;
	}

	

	
	protected function _close()
	{
		sqlite_close($this->conn_id);
	}

}
