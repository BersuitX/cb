<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mssql_driver extends CI_DB {

	
	public $V4toindljvfg = 'mssql';

	

	
	protected $Vbqls34cvlhv = array('NEWID()', 'RAND(%d)');

	
	protected $Vxr5oxhxfngp = TRUE;

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if ( ! empty($this->port))
		{
			$this->hostname .= (DIRECTORY_SEPARATOR === '\\' ? ',' : ':').$this->port;
		}
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$this->conn_id = ($Vzrtmbotfake)
				? mssql_pconnect($this->hostname, $this->username, $this->password)
				: mssql_connect($this->hostname, $this->username, $this->password);

		if ( ! $this->conn_id)
		{
			return FALSE;
		}

		

		
		if ($this->database !== '' && ! $this->db_select())
		{
			log_message('error', 'Unable to select database: '.$this->database);

			return ($this->db_debug === TRUE)
				? $this->display_error('db_unable_to_select', $this->database)
				: FALSE;
		}

		
		$Vfvggg0pmnws = $this->query('SELECT CASE WHEN (@@OPTIONS | 256) = @@OPTIONS THEN 1 ELSE 0 END AS qi');
		$Vfvggg0pmnws = $Vfvggg0pmnws->row_array();
		$this->_quoted_identifier = empty($Vfvggg0pmnws) ? FALSE : (bool) $Vfvggg0pmnws['qi'];
		$this->_escape_char = ($this->_quoted_identifier) ? '"' : array('[', ']');

		return $this->conn_id;
	}

	

	
	public function db_select($Vvfjs0vadwyn = '')
	{
		if ($Vvfjs0vadwyn === '')
		{
			$Vvfjs0vadwyn = $this->database;
		}

		
		
		if (mssql_select_db('['.$Vvfjs0vadwyn.']', $this->conn_id))
		{
			$this->database = $Vvfjs0vadwyn;
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return mssql_query($Vcusg10hsxxg, $this->conn_id);
	}

	

	
	protected function _trans_begin()
	{
		return $this->simple_query('BEGIN TRAN');
	}

	

	
	protected function _trans_commit()
	{
		return $this->simple_query('COMMIT TRAN');
	}

	

	
	protected function _trans_rollback()
	{
		return $this->simple_query('ROLLBACK TRAN');
	}

	

	
	public function affected_rows()
	{
		return mssql_rows_affected($this->conn_id);
	}

	

	
	public function insert_id()
	{
		$Vfvggg0pmnws = version_compare($this->version(), '8', '>=')
			? 'SELECT SCOPE_IDENTITY() AS last_id'
			: 'SELECT @@IDENTITY AS last_id';

		$Vfvggg0pmnws = $this->query($Vfvggg0pmnws);
		$Vfvggg0pmnws = $Vfvggg0pmnws->row();
		return $Vfvggg0pmnws->last_id;
	}

	

	
	protected function _db_set_charset($Vwxuqfbo3r2c)
	{
		return (ini_set('mssql.charset', $Vwxuqfbo3r2c) !== FALSE);
	}

	

	
	protected function _version()
	{
		return "SELECT SERVERPROPERTY('ProductVersion') AS ver";
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT '.$this->escape_identifiers('name')
			.' FROM '.$this->escape_identifiers('sysobjects')
			.' WHERE '.$this->escape_identifiers('type')." = 'U'";

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			$Vcusg10hsxxg .= ' AND '.$this->escape_identifiers('name')." LIKE '".$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg.' ORDER BY '.$this->escape_identifiers('name');
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SELECT COLUMN_NAME
			FROM INFORMATION_SCHEMA.Columns
			WHERE UPPER(TABLE_NAME) = '.$this->escape(strtoupper($Vhyg2tjvah5t));
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = 'SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH, NUMERIC_PRECISION, COLUMN_DEFAULT
			FROM INFORMATION_SCHEMA.Columns
			WHERE UPPER(TABLE_NAME) = '.$this->escape(strtoupper($Vhyg2tjvah5t));

		if (($Vfvggg0pmnws = $this->query($Vcusg10hsxxg)) === FALSE)
		{
			return FALSE;
		}
		$Vfvggg0pmnws = $Vfvggg0pmnws->result_object();

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]->COLUMN_NAME;
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vfvggg0pmnws[$Vep0df0xosaw]->DATA_TYPE;
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= ($Vfvggg0pmnws[$Vep0df0xosaw]->CHARACTER_MAXIMUM_LENGTH > 0) ? $Vfvggg0pmnws[$Vep0df0xosaw]->CHARACTER_MAXIMUM_LENGTH : $Vfvggg0pmnws[$Vep0df0xosaw]->NUMERIC_PRECISION;
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->COLUMN_DEFAULT;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function error()
	{
		
		
		
		static $Veqekzxyjyqy = array('code' => 0, 'message' => NULL);

		$V15xvmvzbb0h = mssql_get_last_message();
		if ( ! empty($V15xvmvzbb0h))
		{
			$Veqekzxyjyqy['code']    = $this->query('SELECT @@ERROR AS code')->row()->code;
			$Veqekzxyjyqy['message'] = $V15xvmvzbb0h;
		}

		return $Veqekzxyjyqy;
	}

	

	
	protected function _update($Vhyg2tjvah5t, $V3jjxja3nkgt)
	{
		$this->qb_limit = FALSE;
		$this->qb_orderby = array();
		return parent::_update($Vhyg2tjvah5t, $V3jjxja3nkgt);
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE TABLE '.$Vhyg2tjvah5t;
	}

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		if ($this->qb_limit)
		{
			return 'WITH ci_delete AS (SELECT TOP '.$this->qb_limit.' * FROM '.$Vhyg2tjvah5t.$this->_compile_wh('qb_where').') DELETE FROM ci_delete';
		}

		return parent::_delete($Vhyg2tjvah5t);
	}

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		$V2bur4u05u2g = $this->qb_offset + $this->qb_limit;

		
		
		if (version_compare($this->version(), '9', '>=') && $this->qb_offset && ! empty($this->qb_orderby))
		{
			$V4q5sybdhm4l = $this->_compile_order_by();

			
			$Vcusg10hsxxg = trim(substr($Vcusg10hsxxg, 0, strrpos($Vcusg10hsxxg, $V4q5sybdhm4l)));

			
			if (count($this->qb_select) === 0)
			{
				$Vjsggk5v2fqw = '*'; 
			}
			else
			{
				
				$Vjsggk5v2fqw = array();
				$Va5gwxxc3kkg = ($this->_quoted_identifier)
					? '("[^\"]+")' : '(\[[^\]]+\])';
				for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->qb_select); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
				{
					$Vjsggk5v2fqw[] = preg_match('/(?:\s|\.)'.$Va5gwxxc3kkg.'$/i', $this->qb_select[$Vep0df0xosaw], $Vlnkcet4wpd0)
						? $Vlnkcet4wpd0[1] : $this->qb_select[$Vep0df0xosaw];
				}
				$Vjsggk5v2fqw = implode(', ', $Vjsggk5v2fqw);
			}

			return 'SELECT '.$Vjsggk5v2fqw." FROM (\n\n"
				.preg_replace('/^(SELECT( DISTINCT)?)/i', '\\1 ROW_NUMBER() OVER('.trim($V4q5sybdhm4l).') AS '.$this->escape_identifiers('CI_rownum').', ', $Vcusg10hsxxg)
				."\n\n) ".$this->escape_identifiers('CI_subquery')
				."\nWHERE ".$this->escape_identifiers('CI_rownum').' BETWEEN '.($this->qb_offset + 1).' AND '.$V2bur4u05u2g;
		}

		return preg_replace('/(^\SELECT (DISTINCT)?)/i','\\1 TOP '.$V2bur4u05u2g.' ', $Vcusg10hsxxg);
	}

	

	
	protected function _insert_batch($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt)
	{
		
		if (version_compare($this->version(), '10', '>='))
		{
			return parent::_insert_batch($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt);
		}

		return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
	}

	

	
	protected function _close()
	{
		mssql_close($this->conn_id);
	}

}
