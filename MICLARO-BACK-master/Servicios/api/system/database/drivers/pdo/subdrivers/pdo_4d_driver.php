<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_4d_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = '4d';

	
	protected $Vnm3z344krng = array('[', ']');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = '4D:host='.(empty($this->hostname) ? '127.0.0.1' : $this->hostname);

			empty($this->port) OR $this->dsn .= ';port='.$this->port;
			empty($this->database) OR $this->dsn .= ';dbname='.$this->database;
			empty($this->char_set) OR $this->dsn .= ';charset='.$this->char_set;
		}
		elseif ( ! empty($this->char_set) && strpos($this->dsn, 'charset=', 3) === FALSE)
		{
			$this->dsn .= ';charset='.$this->char_set;
		}
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT '.$this->escape_identifiers('TABLE_NAME').' FROM '.$this->escape_identifiers('_USER_TABLES');

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			$Vcusg10hsxxg .= ' WHERE '.$this->escape_identifiers('TABLE_NAME')." LIKE '".$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SELECT '.$this->escape_identifiers('COLUMN_NAME').' FROM '.$this->escape_identifiers('_USER_COLUMNS')
			.' WHERE '.$this->escape_identifiers('TABLE_NAME').' = '.$this->escape($Vhyg2tjvah5t);
	}

	

	
	protected function _field_data($Vhyg2tjvah5t)
	{
		return 'SELECT * FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE).' LIMIT 1';
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
		return $Vcusg10hsxxg.' LIMIT '.$this->qb_limit.($this->qb_offset ? ' OFFSET '.$this->qb_offset : '');
	}

}
