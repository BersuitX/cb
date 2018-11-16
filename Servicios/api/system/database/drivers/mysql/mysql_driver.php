<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mysql_driver extends CI_DB {

	
	public $V4toindljvfg = 'mysql';

	
	public $V3h0ce0jcbph = FALSE;

	
	public $V44qci1exq5s = TRUE;

	
	public $Vcdj14fjn3m1;

	

	
	protected $Vnm3z344krng = '`';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if ( ! empty($this->port))
		{
			$this->hostname .= ':'.$this->port;
		}
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$V4v1252qjla2 = ($this->compress === FALSE) ? 0 : MYSQL_CLIENT_COMPRESS;

		if ($this->encrypt === TRUE)
		{
			$V4v1252qjla2 = $V4v1252qjla2 | MYSQL_CLIENT_SSL;
		}

		
		$this->conn_id = ($Vzrtmbotfake === TRUE)
			? mysql_pconnect($this->hostname, $this->username, $this->password, $V4v1252qjla2)
			: mysql_connect($this->hostname, $this->username, $this->password, TRUE, $V4v1252qjla2);

		

		
		if ($this->database !== '' && ! $this->db_select())
		{
			log_message('error', 'Unable to select database: '.$this->database);

			return ($this->db_debug === TRUE)
				? $this->display_error('db_unable_to_select', $this->database)
				: FALSE;
		}

		if (isset($this->stricton) && is_resource($this->conn_id))
		{
			if ($this->stricton)
			{
				$this->simple_query('SET SESSION sql_mode = CONCAT(@@sql_mode, ",", "STRICT_ALL_TABLES")');
			}
			else
			{
				$this->simple_query(
					'SET SESSION sql_mode =
					REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
					@@sql_mode,
					"STRICT_ALL_TABLES,", ""),
					",STRICT_ALL_TABLES", ""),
					"STRICT_ALL_TABLES", ""),
					"STRICT_TRANS_TABLES,", ""),
					",STRICT_TRANS_TABLES", ""),
					"STRICT_TRANS_TABLES", "")'
				);
			}
		}

		return $this->conn_id;
	}

	

	
	public function reconnect()
	{
		if (mysql_ping($this->conn_id) === FALSE)
		{
			$this->conn_id = FALSE;
		}
	}

	

	
	public function db_select($Vvfjs0vadwyn = '')
	{
		if ($Vvfjs0vadwyn === '')
		{
			$Vvfjs0vadwyn = $this->database;
		}

		if (mysql_select_db($Vvfjs0vadwyn, $this->conn_id))
		{
			$this->database = $Vvfjs0vadwyn;
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _db_set_charset($Vwxuqfbo3r2c)
	{
		return mysql_set_charset($Vwxuqfbo3r2c, $this->conn_id);
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if ( ! $this->conn_id OR ($Vfrz01we23rs = mysql_get_server_info($this->conn_id)) === FALSE)
		{
			return FALSE;
		}

		return $this->data_cache['version'] = $Vfrz01we23rs;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return mysql_query($this->_prep_query($Vcusg10hsxxg), $this->conn_id);
	}

	

	
	protected function _prep_query($Vcusg10hsxxg)
	{
		
		
		if ($this->delete_hack === TRUE && preg_match('/^\s*DELETE\s+FROM\s+(\S+)\s*$/i', $Vcusg10hsxxg))
		{
			return trim($Vcusg10hsxxg).' WHERE 1=1';
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _trans_begin()
	{
		$this->simple_query('SET AUTOCOMMIT=0');
		return $this->simple_query('START TRANSACTION'); 
	}

	

	
	protected function _trans_commit()
	{
		if ($this->simple_query('COMMIT'))
		{
			$this->simple_query('SET AUTOCOMMIT=1');
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _trans_rollback()
	{
		if ($this->simple_query('ROLLBACK'))
		{
			$this->simple_query('SET AUTOCOMMIT=1');
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return mysql_real_escape_string($Vssdjb5oqaky, $this->conn_id);
	}

	

	
	public function affected_rows()
	{
		return mysql_affected_rows($this->conn_id);
	}

	

	
	public function insert_id()
	{
		return mysql_insert_id($this->conn_id);
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SHOW TABLES FROM '.$this->escape_identifiers($this->database);

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg." LIKE '".$this->escape_like_str($this->dbprefix)."%'";
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (($Vfvggg0pmnws = $this->query('SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE))) === FALSE)
		{
			return FALSE;
		}
		$Vfvggg0pmnws = $Vfvggg0pmnws->result_object();

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]->Field;

			sscanf($Vfvggg0pmnws[$Vep0df0xosaw]->Type, '%[a-z](%d)',
				$V1qi3fii2jjy[$Vep0df0xosaw]->type,
				$V1qi3fii2jjy[$Vep0df0xosaw]->max_length
			);

			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->Default;
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) ($Vfvggg0pmnws[$Vep0df0xosaw]->Key === 'PRI');
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function error()
	{
		return array('code' => mysql_errno($this->conn_id), 'message' => mysql_error($this->conn_id));
	}

	

	
	protected function _from_tables()
	{
		if ( ! empty($this->qb_join) && count($this->qb_from) > 1)
		{
			return '('.implode(', ', $this->qb_from).')';
		}

		return implode(', ', $this->qb_from);
	}

	

	
	protected function _close()
	{
		
		
		@mysql_close($this->conn_id);
	}

}
