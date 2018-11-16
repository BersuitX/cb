<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_postgre_driver extends CI_DB {

	
	public $V4toindljvfg = 'postgre';

	
	public $Vtwmmjbkasze = 'public';

	

	
	protected $Vbqls34cvlhv = array('RANDOM()', 'RANDOM()');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if ( ! empty($this->dsn))
		{
			return;
		}

		$this->dsn === '' OR $this->dsn = '';

		if (strpos($this->hostname, '/') !== FALSE)
		{
			
			$this->port = '';
		}

		$this->hostname === '' OR $this->dsn = 'host='.$this->hostname.' ';

		if ( ! empty($this->port) && ctype_digit($this->port))
		{
			$this->dsn .= 'port='.$this->port.' ';
		}

		if ($this->username !== '')
		{
			$this->dsn .= 'user='.$this->username.' ';

			
			$this->password === NULL OR $this->dsn .= "password='".$this->password."' ";
		}

		$this->database === '' OR $this->dsn .= 'dbname='.$this->database.' ';

		
		foreach (array('connect_timeout', 'options', 'sslmode', 'service') as $V2xim30qek4u)
		{
			if (isset($this->$V2xim30qek4u) && is_string($this->key) && $this->key !== '')
			{
				$this->dsn .= $V2xim30qek4u."='".$this->key."' ";
			}
		}

		$this->dsn = rtrim($this->dsn);
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$this->conn_id = ($Vzrtmbotfake === TRUE)
			? pg_pconnect($this->dsn)
			: pg_connect($this->dsn);

		if ($this->conn_id !== FALSE)
		{
			if ($Vzrtmbotfake === TRUE
				&& pg_connection_status($this->conn_id) === PGSQL_CONNECTION_BAD
				&& pg_ping($this->conn_id) === FALSE
			)
			{
				return FALSE;
			}

			empty($this->schema) OR $this->simple_query('SET search_path TO '.$this->schema.',public');
		}

		return $this->conn_id;
	}

	

	
	public function reconnect()
	{
		if (pg_ping($this->conn_id) === FALSE)
		{
			$this->conn_id = FALSE;
		}
	}

	

	
	protected function _db_set_charset($Vwxuqfbo3r2c)
	{
		return (pg_set_client_encoding($this->conn_id, $Vwxuqfbo3r2c) === 0);
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if ( ! $this->conn_id OR ($Vdyzxcgknl1e = pg_version($this->conn_id)) === FALSE)
		{
			return FALSE;
		}

		
		return isset($Vdyzxcgknl1e['server'])
			? $this->data_cache['version'] = $Vdyzxcgknl1e['server']
			: parent::version();
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return pg_query($this->conn_id, $Vcusg10hsxxg);
	}

	

	
	protected function _trans_begin()
	{
		return (bool) pg_query($this->conn_id, 'BEGIN');
	}

	

	
	protected function _trans_commit()
	{
		return (bool) pg_query($this->conn_id, 'COMMIT');
	}

	

	
	protected function _trans_rollback()
	{
		return (bool) pg_query($this->conn_id, 'ROLLBACK');
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
		return pg_escape_string($this->conn_id, $Vssdjb5oqaky);
	}

	

	
	public function escape($Vssdjb5oqaky)
	{
		if (is_php('5.4.4') && (is_string($Vssdjb5oqaky) OR (is_object($Vssdjb5oqaky) && method_exists($Vssdjb5oqaky, '__toString'))))
		{
			return pg_escape_literal($this->conn_id, $Vssdjb5oqaky);
		}
		elseif (is_bool($Vssdjb5oqaky))
		{
			return ($Vssdjb5oqaky) ? 'TRUE' : 'FALSE';
		}

		return parent::escape($Vssdjb5oqaky);
	}

	

	
	public function affected_rows()
	{
		return pg_affected_rows($this->result_id);
	}

	

	
	public function insert_id()
	{
		$Vxxtccqydhzn = pg_version($this->conn_id);
		$Vxxtccqydhzn = isset($Vxxtccqydhzn['server']) ? $Vxxtccqydhzn['server'] : 0; 

		$Vhyg2tjvah5t	= (func_num_args() > 0) ? func_get_arg(0) : NULL;
		$Vwi0cbq1cjat	= (func_num_args() > 1) ? func_get_arg(1) : NULL;

		if ($Vhyg2tjvah5t === NULL && $Vxxtccqydhzn >= '8.1')
		{
			$Vcusg10hsxxg = 'SELECT LASTVAL() AS ins_id';
		}
		elseif ($Vhyg2tjvah5t !== NULL)
		{
			if ($Vwi0cbq1cjat !== NULL && $Vxxtccqydhzn >= '8.0')
			{
				$Vcusg10hsxxg = 'SELECT pg_get_serial_sequence(\''.$Vhyg2tjvah5t."', '".$Vwi0cbq1cjat."') AS seq";
				$Vfvggg0pmnws = $this->query($Vcusg10hsxxg);
				$Vfvggg0pmnws = $Vfvggg0pmnws->row();
				$Vuglld5kowvv = $Vfvggg0pmnws->seq;
			}
			else
			{
				
				$Vuglld5kowvv = $Vhyg2tjvah5t;
			}

			$Vcusg10hsxxg = 'SELECT CURRVAL(\''.$Vuglld5kowvv."') AS ins_id";
		}
		else
		{
			return pg_last_oid($this->result_id);
		}

		$Vfvggg0pmnws = $this->query($Vcusg10hsxxg);
		$Vfvggg0pmnws = $Vfvggg0pmnws->row();
		return (int) $Vfvggg0pmnws->ins_id;
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "table_name" FROM "information_schema"."tables" WHERE "table_schema" = \''.$this->schema."'";

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg.' AND "table_name" LIKE \''
				.$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SELECT "column_name"
			FROM "information_schema"."columns"
			WHERE LOWER("table_name") = '.$this->escape(strtolower($Vhyg2tjvah5t));
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = 'SELECT "column_name", "data_type", "character_maximum_length", "numeric_precision", "column_default"
			FROM "information_schema"."columns"
			WHERE LOWER("table_name") = '.$this->escape(strtolower($Vhyg2tjvah5t));

		if (($Vfvggg0pmnws = $this->query($Vcusg10hsxxg)) === FALSE)
		{
			return FALSE;
		}
		$Vfvggg0pmnws = $Vfvggg0pmnws->result_object();

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]->column_name;
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vfvggg0pmnws[$Vep0df0xosaw]->data_type;
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= ($Vfvggg0pmnws[$Vep0df0xosaw]->character_maximum_length > 0) ? $Vfvggg0pmnws[$Vep0df0xosaw]->character_maximum_length : $Vfvggg0pmnws[$Vep0df0xosaw]->numeric_precision;
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->column_default;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function error()
	{
		return array('code' => '', 'message' => pg_last_error($this->conn_id));
	}

	

	
	public function order_by($V4q5sybdhm4l, $Vun3ala4ao2z = '', $Vo3ncbt2kr35 = NULL)
	{
		$Vun3ala4ao2z = strtoupper(trim($Vun3ala4ao2z));
		if ($Vun3ala4ao2z === 'RANDOM')
		{
			if ( ! is_float($V4q5sybdhm4l) && ctype_digit((string) $V4q5sybdhm4l))
			{
				$V4q5sybdhm4l = ($V4q5sybdhm4l > 1)
					? (float) '0.'.$V4q5sybdhm4l
					: (float) $V4q5sybdhm4l;
			}

			if (is_float($V4q5sybdhm4l))
			{
				$this->simple_query('SET SEED '.$V4q5sybdhm4l);
			}

			$V4q5sybdhm4l = $this->_random_keyword[0];
			$Vun3ala4ao2z = '';
			$Vo3ncbt2kr35 = FALSE;
		}

		return parent::order_by($V4q5sybdhm4l, $Vun3ala4ao2z, $Vo3ncbt2kr35);
	}

	

	
	protected function _update($Vhyg2tjvah5t, $Vxxtccqydhznalues)
	{
		$this->qb_limit = FALSE;
		$this->qb_orderby = array();
		return parent::_update($Vhyg2tjvah5t, $Vxxtccqydhznalues);
	}

	

	
	protected function _update_batch($Vhyg2tjvah5t, $Vxxtccqydhznalues, $Vep0df0xosawndex)
	{
		$Vep0df0xosawds = array();
		foreach ($Vxxtccqydhznalues as $V2xim30qek4u => $Vxxtccqydhznal)
		{
			$Vep0df0xosawds[] = $Vxxtccqydhznal[$Vep0df0xosawndex];

			foreach (array_keys($Vxxtccqydhznal) as $Vwji4rxkyw5j)
			{
				if ($Vwji4rxkyw5j !== $Vep0df0xosawndex)
				{
					$Vep4ncm02uco[$Vwji4rxkyw5j][] = 'WHEN '.$Vxxtccqydhznal[$Vep0df0xosawndex].' THEN '.$Vxxtccqydhznal[$Vwji4rxkyw5j];
				}
			}
		}

		$Vn2ycfau434sases = '';
		foreach ($Vep4ncm02uco as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vn2ycfau434sases .= $Vwyse0flpyxh.' = (CASE '.$Vep0df0xosawndex."\n"
				.implode("\n", $Vxxtccqydhzn)."\n"
				.'ELSE '.$Vwyse0flpyxh.' END), ';
		}

		$this->where($Vep0df0xosawndex.' IN('.implode(',', $Vep0df0xosawds).')', NULL, FALSE);

		return 'UPDATE '.$Vhyg2tjvah5t.' SET '.substr($Vn2ycfau434sases, 0, -2).$this->_compile_wh('qb_where');
	}

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		$this->qb_limit = FALSE;
		return parent::_delete($Vhyg2tjvah5t);
	}

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		return $Vcusg10hsxxg.' LIMIT '.$this->qb_limit.($this->qb_offset ? ' OFFSET '.$this->qb_offset : '');
	}

	

	
	protected function _close()
	{
		pg_close($this->conn_id);
	}

}
