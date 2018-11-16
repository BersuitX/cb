<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_ibm_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'ibm';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'ibm:';

			
			if (empty($this->hostname) && empty($this->HOSTNAME) && empty($this->port) && empty($this->PORT))
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

			$this->dsn .= 'DRIVER='.(isset($this->DRIVER) ? '{'.$this->DRIVER.'}' : '{IBM DB2 ODBC DRIVER}').';';

			if (isset($this->DATABASE))
			{
				$this->dsn .= 'DATABASE='.$this->DATABASE.';';
			}
			elseif ( ! empty($this->database))
			{
				$this->dsn .= 'DATABASE='.$this->database.';';
			}

			if (isset($this->HOSTNAME))
			{
				$this->dsn .= 'HOSTNAME='.$this->HOSTNAME.';';
			}
			else
			{
				$this->dsn .= 'HOSTNAME='.(empty($this->hostname) ? '127.0.0.1;' : $this->hostname.';');
			}

			if (isset($this->PORT))
			{
				$this->dsn .= 'PORT='.$this->port.';';
			}
			elseif ( ! empty($this->port))
			{
				$this->dsn .= ';PORT='.$this->port.';';
			}

			$this->dsn .= 'PROTOCOL='.(isset($this->PROTOCOL) ? $this->PROTOCOL.';' : 'TCPIP;');
		}
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "tabname" FROM "syscat"."tables"
			WHERE "type" = \'T\' AND LOWER("tabschema") = '.$this->escape(strtolower($this->database));

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			$Vcusg10hsxxg .= ' AND "tabname" LIKE \''.$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SELECT "colname" FROM "syscat"."columns"
			WHERE LOWER("tabschema") = '.$this->escape(strtolower($this->database)).'
				AND LOWER("tabname") = '.$this->escape(strtolower($Vhyg2tjvah5t));
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = 'SELECT "colname" AS "name", "typename" AS "type", "default" AS "default", "length" AS "max_length",
				CASE "keyseq" WHEN NULL THEN 0 ELSE 1 END AS "primary_key"
			FROM "syscat"."columns"
			WHERE LOWER("tabschema") = '.$this->escape(strtolower($this->database)).'
				AND LOWER("tabname") = '.$this->escape(strtolower($Vhyg2tjvah5t)).'
			ORDER BY "colno"';

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

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		$this->qb_limit = FALSE;
		return parent::_delete($Vhyg2tjvah5t);
	}

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		$Vcusg10hsxxg .= ' FETCH FIRST '.($this->qb_limit + $this->qb_offset).' ROWS ONLY';

		return ($this->qb_offset)
			? 'SELECT * FROM ('.$Vcusg10hsxxg.') WHERE rownum > '.$this->qb_offset
			: $Vcusg10hsxxg;
	}

}
