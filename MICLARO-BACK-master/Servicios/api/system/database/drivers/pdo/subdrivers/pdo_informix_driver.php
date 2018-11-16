<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_informix_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'informix';

	

	
	protected $Vbqls34cvlhv = array('ASC', 'ASC'); 

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'informix:';

			
			if (empty($this->hostname) && empty($this->host) && empty($this->port) && empty($this->service))
			{
				if (isset($this->DSN))
				{
					$this->dsn .= 'DSN='.$this->DSN;
				}
				elseif ( ! empty($this->database))
				{
					$this->dsn .= 'DSN='.$this->database;
				}

				return;
			}

			if (isset($this->host))
			{
				$this->dsn .= 'host='.$this->host;
			}
			else
			{
				$this->dsn .= 'host='.(empty($this->hostname) ? '127.0.0.1' : $this->hostname);
			}

			if (isset($this->service))
			{
				$this->dsn .= '; service='.$this->service;
			}
			elseif ( ! empty($this->port))
			{
				$this->dsn .= '; service='.$this->port;
			}

			empty($this->database) OR $this->dsn .= '; database='.$this->database;
			empty($this->server) OR $this->dsn .= '; server='.$this->server;

			$this->dsn .= '; protocol='.(isset($this->protocol) ? $this->protocol : 'onsoctcp')
				.'; EnableScrollableCursors=1';
		}
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "tabname" FROM "systables"
			WHERE "tabid" > 99 AND "tabtype" = \'T\' AND LOWER("owner") = '.$this->escape(strtolower($this->username));

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			$Vcusg10hsxxg .= ' AND "tabname" LIKE \''.$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		if (strpos($Vhyg2tjvah5t, '.') !== FALSE)
		{
			sscanf($Vhyg2tjvah5t, '%[^.].%s', $Vou4ogyefw4t, $Vhyg2tjvah5t);
		}
		else
		{
			$Vou4ogyefw4t = $this->username;
		}

		return 'SELECT "colname" FROM "systables", "syscolumns"
			WHERE "systables"."tabid" = "syscolumns"."tabid"
				AND "systables"."tabtype" = \'T\'
				AND LOWER("systables"."owner") = '.$this->escape(strtolower($Vou4ogyefw4t)).'
				AND LOWER("systables"."tabname") = '.$this->escape(strtolower($Vhyg2tjvah5t));
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = 'SELECT "syscolumns"."colname" AS "name",
				CASE "syscolumns"."coltype"
					WHEN 0 THEN \'CHAR\'
					WHEN 1 THEN \'SMALLINT\'
					WHEN 2 THEN \'INTEGER\'
					WHEN 3 THEN \'FLOAT\'
					WHEN 4 THEN \'SMALLFLOAT\'
					WHEN 5 THEN \'DECIMAL\'
					WHEN 6 THEN \'SERIAL\'
					WHEN 7 THEN \'DATE\'
					WHEN 8 THEN \'MONEY\'
					WHEN 9 THEN \'NULL\'
					WHEN 10 THEN \'DATETIME\'
					WHEN 11 THEN \'BYTE\'
					WHEN 12 THEN \'TEXT\'
					WHEN 13 THEN \'VARCHAR\'
					WHEN 14 THEN \'INTERVAL\'
					WHEN 15 THEN \'NCHAR\'
					WHEN 16 THEN \'NVARCHAR\'
					WHEN 17 THEN \'INT8\'
					WHEN 18 THEN \'SERIAL8\'
					WHEN 19 THEN \'SET\'
					WHEN 20 THEN \'MULTISET\'
					WHEN 21 THEN \'LIST\'
					WHEN 22 THEN \'Unnamed ROW\'
					WHEN 40 THEN \'LVARCHAR\'
					WHEN 41 THEN \'BLOB/CLOB/BOOLEAN\'
					WHEN 4118 THEN \'Named ROW\'
					ELSE "syscolumns"."coltype"
				END AS "type",
				"syscolumns"."collength" as "max_length",
				CASE "sysdefaults"."type"
					WHEN \'L\' THEN "sysdefaults"."default"
					ELSE NULL
				END AS "default"
			FROM "syscolumns", "systables", "sysdefaults"
			WHERE "syscolumns"."tabid" = "systables"."tabid"
				AND "systables"."tabid" = "sysdefaults"."tabid"
				AND "syscolumns"."colno" = "sysdefaults"."colno"
				AND "systables"."tabtype" = \'T\'
				AND LOWER("systables"."owner") = '.$this->escape(strtolower($this->username)).'
				AND LOWER("systables"."tabname") = '.$this->escape(strtolower($Vhyg2tjvah5t)).'
			ORDER BY "syscolumns"."colno"';

		return (($Vfvggg0pmnws = $this->query($Vcusg10hsxxg)) !== FALSE)
			? $Vfvggg0pmnws->result_object()
			: FALSE;
	}

	

	
	protected function _update($Vhyg2tjvah5t, $V3jjxja3nkgt)
	{
		$this->qb_limit = FALSE;
		$this->qb_orderby = array();
		return parent::_update($Vhyg2tjvah5t, $V3jjxja3nkgt);
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE TABLE ONLY '.$Vhyg2tjvah5t;
	}

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		$this->qb_limit = FALSE;
		return parent::_delete($Vhyg2tjvah5t);
	}

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		$Vjsggk5v2fqw = 'SELECT '.($this->qb_offset ? 'SKIP '.$this->qb_offset : '').'FIRST '.$this->qb_limit.' ';
		return preg_replace('/^(SELECT\s)/i', $Vjsggk5v2fqw, $Vcusg10hsxxg, 1);
	}

}
