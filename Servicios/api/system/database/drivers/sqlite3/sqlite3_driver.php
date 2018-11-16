<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_sqlite3_driver extends CI_DB {

	
	public $V4toindljvfg = 'sqlite3';

	

	
	protected $Vbqls34cvlhv = array('RANDOM()', 'RANDOM()');

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		if ($Vzrtmbotfake)
		{
			log_message('debug', 'SQLite3 doesn\'t support persistent connections');
		}

		try
		{
			return ( ! $this->password)
				? new SQLite3($this->database)
				: new SQLite3($this->database, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, $this->password);
		}
		catch (Exception $Veengl4bqqud)
		{
			return FALSE;
		}
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		$Vfrz01we23rs = SQLite3::version();
		return $this->data_cache['version'] = $Vfrz01we23rs['versionString'];
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return $this->is_write_type($Vcusg10hsxxg)
			? $this->conn_id->exec($Vcusg10hsxxg)
			: $this->conn_id->query($Vcusg10hsxxg);
	}

	

	
	protected function _trans_begin()
	{
		return $this->conn_id->exec('BEGIN TRANSACTION');
	}

	

	
	protected function _trans_commit()
	{
		return $this->conn_id->exec('END TRANSACTION');
	}

	

	
	protected function _trans_rollback()
	{
		return $this->conn_id->exec('ROLLBACK');
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return $this->conn_id->escapeString($Vssdjb5oqaky);
	}

	

	
	public function affected_rows()
	{
		return $this->conn_id->changes();
	}

	

	
	public function insert_id()
	{
		return $this->conn_id->lastInsertRowID();
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		return 'SELECT "NAME" FROM "SQLITE_MASTER" WHERE "TYPE" = \'table\''
			.(($Voyorvgwidbq !== FALSE && $this->dbprefix != '')
				? ' AND "NAME" LIKE \''.$this->escape_like_str($this->dbprefix).'%\' '.sprintf($this->_like_escape_str, $this->_like_escape_chr)
				: '');
	}

	

	
	public function list_fields($Vhyg2tjvah5t)
	{
		
		if (isset($this->data_cache['field_names'][$Vhyg2tjvah5t]))
		{
			return $this->data_cache['field_names'][$Vhyg2tjvah5t];
		}

		if (($Voetc43kt2cr = $this->query('PRAGMA TABLE_INFO('.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE).')')) === FALSE)
		{
			return FALSE;
		}

		$this->data_cache['field_names'][$Vhyg2tjvah5t] = array();
		foreach ($Voetc43kt2cr->result_array() as $Vf3jo4nkd2sr)
		{
			$this->data_cache['field_names'][$Vhyg2tjvah5t][] = $Vf3jo4nkd2sr['name'];
		}

		return $this->data_cache['field_names'][$Vhyg2tjvah5t];
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
		return array('code' => $this->conn_id->lastErrorCode(), 'message' => $this->conn_id->lastErrorMsg());
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
		$this->conn_id->close();
	}

}
