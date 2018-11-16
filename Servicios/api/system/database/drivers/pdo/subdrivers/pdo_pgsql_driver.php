<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_pgsql_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'pgsql';

	
	public $Vtwmmjbkasze = 'public';

	

	
	protected $Vbqls34cvlhv = array('RANDOM()', 'RANDOM()');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'pgsql:host='.(empty($this->hostname) ? '127.0.0.1' : $this->hostname);

			empty($this->port) OR $this->dsn .= ';port='.$this->port;
			empty($this->database) OR $this->dsn .= ';dbname='.$this->database;

			if ( ! empty($this->username))
			{
				$this->dsn .= ';username='.$this->username;
				empty($this->password) OR $this->dsn .= ';password='.$this->password;
			}
		}
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$this->conn_id = parent::db_connect($Vzrtmbotfake);

		if (is_object($this->conn_id) && ! empty($this->schema))
		{
			$this->simple_query('SET search_path TO '.$this->schema.',public');
		}

		return $this->conn_id;
	}

	

	
	public function insert_id($Vaclaigdbtoo = NULL)
	{
		if ($Vaclaigdbtoo === NULL && version_compare($this->version(), '8.1', '>='))
		{
			$Vfvggg0pmnws = $this->query('SELECT LASTVAL() AS ins_id');
			$Vfvggg0pmnws = $Vfvggg0pmnws->row();
			return $Vfvggg0pmnws->ins_id;
		}

		return $this->conn_id->lastInsertId($Vaclaigdbtoo);
	}

	

	
	public function is_write_type($Vcusg10hsxxg)
	{
		if (preg_match('#^(INSERT|UPDATE).*RETURNING\s.+(\,\s?.+)*$#i', $Vcusg10hsxxg))
		{
			return FALSE;
		}

		return parent::is_write_type($Vcusg10hsxxg);
	}

	

	
	public function escape($Vssdjb5oqaky)
	{
		if (is_bool($Vssdjb5oqaky))
		{
			return ($Vssdjb5oqaky) ? 'TRUE' : 'FALSE';
		}

		return parent::escape($Vssdjb5oqaky);
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

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "table_name" FROM "information_schema"."tables" WHERE "table_schema" = \''.$this->schema."'";

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
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

	

	
	protected function _update($Vhyg2tjvah5t, $V3jjxja3nkgt)
	{
		$this->qb_limit = FALSE;
		$this->qb_orderby = array();
		return parent::_update($Vhyg2tjvah5t, $V3jjxja3nkgt);
	}

	

	
	protected function _update_batch($Vhyg2tjvah5t, $V3jjxja3nkgt, $Vep0df0xosawndex)
	{
		$Vep0df0xosawds = array();
		foreach ($V3jjxja3nkgt as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vep0df0xosawds[] = $Va4zo0rltynr[$Vep0df0xosawndex];

			foreach (array_keys($Va4zo0rltynr) as $Vwji4rxkyw5j)
			{
				if ($Vwji4rxkyw5j !== $Vep0df0xosawndex)
				{
					$Vep4ncm02uco[$Vwji4rxkyw5j][] = 'WHEN '.$Va4zo0rltynr[$Vep0df0xosawndex].' THEN '.$Va4zo0rltynr[$Vwji4rxkyw5j];
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

}
