<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_cubrid_driver extends CI_DB {

	
	public $V4toindljvfg = 'cubrid';

	
	public $Vjqlofmb40lr = TRUE;

	

	
	protected $Vnm3z344krng = '`';

	
	protected $Vbqls34cvlhv = array('RANDOM()', 'RANDOM(%d)');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (preg_match('/^CUBRID:[^:]+(:[0-9][1-9]{0,4})?:[^:]+:[^:]*:[^:]*:(\?.+)?$/', $this->dsn, $Vmbknpbfqa1s))
		{
			if (stripos($Vmbknpbfqa1s[2], 'autocommit=off') !== FALSE)
			{
				$this->auto_commit = FALSE;
			}
		}
		else
		{
			
			empty($this->port) OR $this->port = 33000;
		}
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		if (preg_match('/^CUBRID:[^:]+(:[0-9][1-9]{0,4})?:[^:]+:([^:]*):([^:]*):(\?.+)?$/', $this->dsn, $Vmbknpbfqa1s))
		{
			$Vsbou1hu1dji = ($Vzrtmbotfake !== TRUE) ? 'cubrid_connect_with_url' : 'cubrid_pconnect_with_url';
			return ($Vmbknpbfqa1s[2] === '' && $Vmbknpbfqa1s[3] === '' && $this->username !== '' && $this->password !== '')
				? $Vsbou1hu1dji($this->dsn, $this->username, $this->password)
				: $Vsbou1hu1dji($this->dsn);
		}

		$Vsbou1hu1dji = ($Vzrtmbotfake !== TRUE) ? 'cubrid_connect' : 'cubrid_pconnect';
		return ($this->username !== '')
			? $Vsbou1hu1dji($this->hostname, $this->port, $this->database, $this->username, $this->password)
			: $Vsbou1hu1dji($this->hostname, $this->port, $this->database);
	}

	

	
	public function reconnect()
	{
		if (cubrid_ping($this->conn_id) === FALSE)
		{
			$this->conn_id = FALSE;
		}
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		return ( ! $this->conn_id OR ($Vfrz01we23rs = cubrid_get_server_info($this->conn_id)) === FALSE)
			? FALSE
			: $this->data_cache['version'] = $Vfrz01we23rs;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return cubrid_query($Vcusg10hsxxg, $this->conn_id);
	}

	

	
	protected function _trans_begin()
	{
		if (($Vyuykottoksm = cubrid_get_autocommit($this->conn_id)) === NULL)
		{
			return FALSE;
		}
		elseif ($Vyuykottoksm === TRUE)
		{
			return cubrid_set_autocommit($this->conn_id, CUBRID_AUTOCOMMIT_FALSE);
		}

		return TRUE;
	}

	

	
	protected function _trans_commit()
	{
		if ( ! cubrid_commit($this->conn_id))
		{
			return FALSE;
		}

		if ($this->auto_commit && ! cubrid_get_autocommit($this->conn_id))
		{
			return cubrid_set_autocommit($this->conn_id, CUBRID_AUTOCOMMIT_TRUE);
		}

		return TRUE;
	}

	

	
	protected function _trans_rollback()
	{
		if ( ! cubrid_rollback($this->conn_id))
		{
			return FALSE;
		}

		if ($this->auto_commit && ! cubrid_get_autocommit($this->conn_id))
		{
			cubrid_set_autocommit($this->conn_id, CUBRID_AUTOCOMMIT_TRUE);
		}

		return TRUE;
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return cubrid_real_escape_string($Vssdjb5oqaky, $this->conn_id);
	}

	

	
	public function affected_rows()
	{
		return cubrid_affected_rows();
	}

	

	
	public function insert_id()
	{
		return cubrid_insert_id($this->conn_id);
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SHOW TABLES';

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
		return array('code' => cubrid_errno($this->conn_id), 'message' => cubrid_error($this->conn_id));
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
		cubrid_close($this->conn_id);
	}

}
