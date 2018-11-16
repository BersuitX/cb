<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_sqlsrv_driver extends CI_DB {

	
	public $V4toindljvfg = 'sqlsrv';

	
	public $V1ejiufxjwkg;

	

	
	protected $Vbqls34cvlhv = array('NEWID()', 'RAND(%d)');

	
	protected $Vxr5oxhxfngp = TRUE;

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		
		if ($this->scrollable === NULL)
		{
			$this->scrollable = defined('SQLSRV_CURSOR_CLIENT_BUFFERED')
				? SQLSRV_CURSOR_CLIENT_BUFFERED
				: FALSE;
		}
	}

	

	
	public function db_connect($Vkwlqgsmp4sx = FALSE)
	{
		$Vwxuqfbo3r2c = in_array(strtolower($this->char_set), array('utf-8', 'utf8'), TRUE)
			? 'UTF-8' : SQLSRV_ENC_CHAR;

		$Vtddg2xxswq4 = array(
			'UID'			=> empty($this->username) ? '' : $this->username,
			'PWD'			=> empty($this->password) ? '' : $this->password,
			'Database'		=> $this->database,
			'ConnectionPooling'	=> ($Vkwlqgsmp4sx === TRUE) ? 1 : 0,
			'CharacterSet'		=> $Vwxuqfbo3r2c,
			'Encrypt'		=> ($this->encrypt === TRUE) ? 1 : 0,
			'ReturnDatesAsStrings'	=> 1
		);

		
		
		if (empty($Vtddg2xxswq4['UID']) && empty($Vtddg2xxswq4['PWD']))
		{
			unset($Vtddg2xxswq4['UID'], $Vtddg2xxswq4['PWD']);
		}

		if (FALSE !== ($this->conn_id = sqlsrv_connect($this->hostname, $Vtddg2xxswq4)))
		{
			
			$Vfvggg0pmnws = $this->query('SELECT CASE WHEN (@@OPTIONS | 256) = @@OPTIONS THEN 1 ELSE 0 END AS qi');
			$Vfvggg0pmnws = $Vfvggg0pmnws->row_array();
			$this->_quoted_identifier = empty($Vfvggg0pmnws) ? FALSE : (bool) $Vfvggg0pmnws['qi'];
			$this->_escape_char = ($this->_quoted_identifier) ? '"' : array('[', ']');
		}

		return $this->conn_id;
	}

	

	
	public function db_select($Vvfjs0vadwyn = '')
	{
		if ($Vvfjs0vadwyn === '')
		{
			$Vvfjs0vadwyn = $this->database;
		}

		if ($this->_execute('USE '.$this->escape_identifiers($Vvfjs0vadwyn)))
		{
			$this->database = $Vvfjs0vadwyn;
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return ($this->scrollable === FALSE OR $this->is_write_type($Vcusg10hsxxg))
			? sqlsrv_query($this->conn_id, $Vcusg10hsxxg)
			: sqlsrv_query($this->conn_id, $Vcusg10hsxxg, NULL, array('Scrollable' => $this->scrollable));
	}

	

	
	protected function _trans_begin()
	{
		return sqlsrv_begin_transaction($this->conn_id);
	}

	

	
	protected function _trans_commit()
	{
		return sqlsrv_commit($this->conn_id);
	}

	

	
	protected function _trans_rollback()
	{
		return sqlsrv_rollback($this->conn_id);
	}

	

	
	public function affected_rows()
	{
		return sqlsrv_rows_affected($this->result_id);
	}

	

	
	public function insert_id()
	{
		return $this->query('SELECT SCOPE_IDENTITY() AS insert_id')->row()->insert_id;
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if ( ! $this->conn_id OR ($V2fu10swij5z = sqlsrv_server_info($this->conn_id)) === FALSE)
		{
			return FALSE;
		}

		return $this->data_cache['version'] = $V2fu10swij5z['SQLServerVersion'];
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT '.$this->escape_identifiers('name')
			.' FROM '.$this->escape_identifiers('sysobjects')
			.' WHERE '.$this->escape_identifiers('type')." = 'U'";

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			$Vcusg10hsxxg .= ' AND '.$this->escape_identifiers('name')." LIKE '".$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_escape_like_str, $this->_escape_like_chr);
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
		$Veqekzxyjyqy = array('code' => '00000', 'message' => '');
		$Vcusg10hsxxgsrv_errors = sqlsrv_errors(SQLSRV_ERR_ERRORS);

		if ( ! is_array($Vcusg10hsxxgsrv_errors))
		{
			return $Veqekzxyjyqy;
		}

		$Vcusg10hsxxgsrv_error = array_shift($Vcusg10hsxxgsrv_errors);
		if (isset($Vcusg10hsxxgsrv_error['SQLSTATE']))
		{
			$Veqekzxyjyqy['code'] = isset($Vcusg10hsxxgsrv_error['code']) ? $Vcusg10hsxxgsrv_error['SQLSTATE'].'/'.$Vcusg10hsxxgsrv_error['code'] : $Vcusg10hsxxgsrv_error['SQLSTATE'];
		}
		elseif (isset($Vcusg10hsxxgsrv_error['code']))
		{
			$Veqekzxyjyqy['code'] = $Vcusg10hsxxgsrv_error['code'];
		}

		if (isset($Vcusg10hsxxgsrv_error['message']))
		{
			$Veqekzxyjyqy['message'] = $Vcusg10hsxxgsrv_error['message'];
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
		
		if (version_compare($this->version(), '11', '>='))
		{
			
			empty($this->qb_orderby) && $Vcusg10hsxxg .= ' ORDER BY 1';

			return $Vcusg10hsxxg.' OFFSET '.(int) $this->qb_offset.' ROWS FETCH NEXT '.$this->qb_limit.' ROWS ONLY';
		}

		$V2bur4u05u2g = $this->qb_offset + $this->qb_limit;

		
		if ($this->qb_offset && ! empty($this->qb_orderby))
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
		sqlsrv_close($this->conn_id);
	}

}
