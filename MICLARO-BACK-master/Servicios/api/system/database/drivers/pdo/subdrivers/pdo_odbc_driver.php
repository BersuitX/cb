<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_odbc_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'odbc';

	
	public $Vtwmmjbkasze = 'public';

	

	
	protected $Vnm3z344krng = '';

	
	protected $Vrjisyvepiwz = " {escape '%s'} ";

	
	protected $Vbqls34cvlhv = array('RND()', 'RND(%d)');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'odbc:';

			
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

	

	
	public function is_write_type($Vcusg10hsxxg)
	{
		if (preg_match('#^(INSERT|UPDATE).*RETURNING\s.+(\,\s?.+)*$#i', $Vcusg10hsxxg))
		{
			return FALSE;
		}

		return parent::is_write_type($Vcusg10hsxxg);
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
		return 'SELECT column_name FROM information_schema.columns WHERE table_name = '.$this->escape($Vhyg2tjvah5t);
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

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		return preg_replace('/(^\SELECT (DISTINCT)?)/i','\\1 TOP '.$this->qb_limit.' ', $Vcusg10hsxxg);
	}

}
