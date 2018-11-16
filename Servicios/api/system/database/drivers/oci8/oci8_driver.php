<?php

defined('BASEPATH') OR exit('No direct script access allowed');




class CI_DB_oci8_driver extends CI_DB {

	
	public $V4toindljvfg = 'oci8';

	
	public $Ves2mb3mv53x;

	
	public $Vovlw4xuybhd;

	
	public $Vggm4wfcj1su = OCI_COMMIT_ON_SUCCESS;

	
	public $Vgwsz13qp1xf;

	

	
	protected $Vnaax0zfoxqe = TRUE;

	
	protected $Vnuagy5i3hbl = array('*', 'rownum');

	
	protected $Vbqls34cvlhv = array('ASC', 'ASC'); 

	
	protected $V54rf2cloc2q = 'SELECT COUNT(1) AS ';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		$Vgbjpym5fccu = array(
			'tns'	=> '/^\(DESCRIPTION=(\(.+\)){2,}\)$/', 
			
			'ec'	=> '/^(\/\/)?[a-z0-9.:_-]+(:[1-9][0-9]{0,4})?(\/[a-z0-9$Vnp5ulyprp0o]+)?(:[^\/])?(\/[a-z0-9$Vnp5ulyprp0o]+)?$/i',
			'in'	=> '/^[a-z0-9$Vnp5ulyprp0o]+$/i' 
		);

		
		$this->dsn = str_replace(array("\n", "\r", "\t", ' '), '', $this->dsn);

		if ($this->dsn !== '')
		{
			foreach ($Vgbjpym5fccu as $V2ntvdv0oalk)
			{
				if (preg_match($V2ntvdv0oalk, $this->dsn))
				{
					return;
				}
			}
		}

		
		$this->hostname = str_replace(array("\n", "\r", "\t", ' '), '', $this->hostname);
		if (preg_match($Vgbjpym5fccu['tns'], $this->hostname))
		{
			$this->dsn = $this->hostname;
			return;
		}
		elseif ($this->hostname !== '' && strpos($this->hostname, '/') === FALSE && strpos($this->hostname, ':') === FALSE
			&& (( ! empty($this->port) && ctype_digit($this->port)) OR $this->database !== ''))
		{
			
			$this->dsn = $this->hostname
				.(( ! empty($this->port) && ctype_digit($this->port)) ? ':'.$this->port : '')
				.($this->database !== '' ? '/'.ltrim($this->database, '/') : '');

			if (preg_match($Vgbjpym5fccu['ec'], $this->dsn))
			{
				return;
			}
		}

		
		if (preg_match($Vgbjpym5fccu['ec'], $this->hostname) OR preg_match($Vgbjpym5fccu['in'], $this->hostname))
		{
			$this->dsn = $this->hostname;
			return;
		}

		$this->database = str_replace(array("\n", "\r", "\t", ' '), '', $this->database);
		foreach ($Vgbjpym5fccu as $V2ntvdv0oalk)
		{
			if (preg_match($V2ntvdv0oalk, $this->database))
			{
				return;
			}
		}

		
		$this->dsn = '';
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$Vsbou1hu1dji = ($Vzrtmbotfake === TRUE) ? 'oci_pconnect' : 'oci_connect';
		return empty($this->char_set)
			? $Vsbou1hu1dji($this->username, $this->password, $this->dsn)
			: $Vsbou1hu1dji($this->username, $this->password, $this->dsn, $this->char_set);
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if ( ! $this->conn_id OR ($Vtrbtzapfh1v = oci_server_version($this->conn_id)) === FALSE)
		{
			return FALSE;
		}
		elseif (preg_match('#Release\s(\d+(?:\.\d+)+)#', $Vtrbtzapfh1v, $V4uvjtwtgjvp))
		{
			return $this->data_cache['version'] = $V4uvjtwtgjvp[1];
		}

		return FALSE;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		
		if ($this->_reset_stmt_id === TRUE)
		{
			$this->stmt_id = oci_parse($this->conn_id, $Vcusg10hsxxg);
		}

		oci_set_prefetch($this->stmt_id, 1000);
		return oci_execute($this->stmt_id, $this->commit_mode);
	}

	

	
	public function get_cursor()
	{
		return $this->curs_id = oci_new_cursor($this->conn_id);
	}

	

	
	public function stored_procedure($V1g5r11pbgut, $Vsrqkuge0b4i, array $Vpz5i5lfmwft)
	{
		if ($V1g5r11pbgut === '' OR $Vsrqkuge0b4i === '')
		{
			log_message('error', 'Invalid query: '.$V1g5r11pbgut.'.'.$Vsrqkuge0b4i);
			return ($this->db_debug) ? $this->display_error('db_invalid_query') : FALSE;
		}

		
		$Vcusg10hsxxg = 'BEGIN '.$V1g5r11pbgut.'.'.$Vsrqkuge0b4i.'(';

		$Vye5jclipfz1 = FALSE;
		foreach ($Vpz5i5lfmwft as $Vtij4wo4sgso)
		{
			$Vcusg10hsxxg .= $Vtij4wo4sgso['name'].',';

			if (isset($Vtij4wo4sgso['type']) && $Vtij4wo4sgso['type'] === OCI_B_CURSOR)
			{
				$Vye5jclipfz1 = TRUE;
			}
		}
		$Vcusg10hsxxg = trim($Vcusg10hsxxg, ',').'); END;';

		$this->_reset_stmt_id = FALSE;
		$this->stmt_id = oci_parse($this->conn_id, $Vcusg10hsxxg);
		$this->_bind_params($Vpz5i5lfmwft);
		$Voetc43kt2cr = $this->query($Vcusg10hsxxg, FALSE, $Vye5jclipfz1);
		$this->_reset_stmt_id = TRUE;
		return $Voetc43kt2cr;
	}

	

	
	protected function _bind_params($Vpz5i5lfmwft)
	{
		if ( ! is_array($Vpz5i5lfmwft) OR ! is_resource($this->stmt_id))
		{
			return;
		}

		foreach ($Vpz5i5lfmwft as $Vtij4wo4sgso)
		{
			foreach (array('name', 'value', 'type', 'length') as $Va4zo0rltynr)
			{
				if ( ! isset($Vtij4wo4sgso[$Va4zo0rltynr]))
				{
					$Vtij4wo4sgso[$Va4zo0rltynr] = '';
				}
			}

			oci_bind_by_name($this->stmt_id, $Vtij4wo4sgso['name'], $Vtij4wo4sgso['value'], $Vtij4wo4sgso['length'], $Vtij4wo4sgso['type']);
		}
	}

	

	
	protected function _trans_begin()
	{
		$this->commit_mode = is_php('5.3.2') ? OCI_NO_AUTO_COMMIT : OCI_DEFAULT;
		return TRUE;
	}

	

	
	protected function _trans_commit()
	{
		$this->commit_mode = OCI_COMMIT_ON_SUCCESS;

		return oci_commit($this->conn_id);
	}

	

	
	protected function _trans_rollback()
	{
		$this->commit_mode = OCI_COMMIT_ON_SUCCESS;
		return oci_rollback($this->conn_id);
	}

	

	
	public function affected_rows()
	{
		return oci_num_rows($this->stmt_id);
	}

	

	
	public function insert_id()
	{
		
		return $this->display_error('db_unsupported_function');
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "TABLE_NAME" FROM "ALL_TABLES"';

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg.' WHERE "TABLE_NAME" LIKE \''.$this->escape_like_str($this->dbprefix)."%' "
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

		return 'SELECT COLUMN_NAME FROM ALL_TAB_COLUMNS
			WHERE UPPER(OWNER) = '.$this->escape(strtoupper($Vou4ogyefw4t)).'
				AND UPPER(TABLE_NAME) = '.$this->escape(strtoupper($Vhyg2tjvah5t));
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (strpos($Vhyg2tjvah5t, '.') !== FALSE)
		{
			sscanf($Vhyg2tjvah5t, '%[^.].%s', $Vou4ogyefw4t, $Vhyg2tjvah5t);
		}
		else
		{
			$Vou4ogyefw4t = $this->username;
		}

		$Vcusg10hsxxg = 'SELECT COLUMN_NAME, DATA_TYPE, CHAR_LENGTH, DATA_PRECISION, DATA_LENGTH, DATA_DEFAULT, NULLABLE
			FROM ALL_TAB_COLUMNS
			WHERE UPPER(OWNER) = '.$this->escape(strtoupper($Vou4ogyefw4t)).'
				AND UPPER(TABLE_NAME) = '.$this->escape(strtoupper($Vhyg2tjvah5t));

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

			$Vgdtiboyfq04 = ($Vfvggg0pmnws[$Vep0df0xosaw]->CHAR_LENGTH > 0)
				? $Vfvggg0pmnws[$Vep0df0xosaw]->CHAR_LENGTH : $Vfvggg0pmnws[$Vep0df0xosaw]->DATA_PRECISION;
			if ($Vgdtiboyfq04 === NULL)
			{
				$Vgdtiboyfq04 = $Vfvggg0pmnws[$Vep0df0xosaw]->DATA_LENGTH;
			}
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= $Vgdtiboyfq04;

			$Vexts11gu2nb = $Vfvggg0pmnws[$Vep0df0xosaw]->DATA_DEFAULT;
			if ($Vexts11gu2nb === NULL && $Vfvggg0pmnws[$Vep0df0xosaw]->NULLABLE === 'N')
			{
				$Vexts11gu2nb = '';
			}
			$V1qi3fii2jjy[$Vep0df0xosaw]->default = $Vexts11gu2nb;
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function error()
	{
		
		if (is_resource($this->curs_id))
		{
			return oci_error($this->curs_id);
		}
		elseif (is_resource($this->stmt_id))
		{
			return oci_error($this->stmt_id);
		}
		elseif (is_resource($this->conn_id))
		{
			return oci_error($this->conn_id);
		}

		return oci_error();
	}

	

	
	protected function _insert_batch($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $Va4zo0rltynrues)
	{
		$Vpgpnbxy5p5e = implode(', ', $Vpgpnbxy5p5e);
		$Vcusg10hsxxg = "INSERT ALL\n";

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Va4zo0rltynrues); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vcusg10hsxxg .= '	INTO '.$Vhyg2tjvah5t.' ('.$Vpgpnbxy5p5e.') VALUES '.$Va4zo0rltynrues[$Vep0df0xosaw]."\n";
		}

		return $Vcusg10hsxxg.'SELECT * FROM dual';
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE TABLE '.$Vhyg2tjvah5t;
	}

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		if ($this->qb_limit)
		{
			$this->where('rownum <= ',$this->qb_limit, FALSE);
			$this->qb_limit = FALSE;
		}

		return parent::_delete($Vhyg2tjvah5t);
	}

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		if (version_compare($this->version(), '12.1', '>='))
		{
			
			empty($this->qb_orderby) && $Vcusg10hsxxg .= ' ORDER BY 1';

			return $Vcusg10hsxxg.' OFFSET '.(int) $this->qb_offset.' ROWS FETCH NEXT '.$this->qb_limit.' ROWS ONLY';
		}

		$this->limit_used = TRUE;
		return 'SELECT * FROM (SELECT inner_query.*, rownum rnum FROM ('.$Vcusg10hsxxg.') inner_query WHERE rownum < '.($this->qb_offset + $this->qb_limit + 1).')'
			.($this->qb_offset ? ' WHERE rnum >= '.($this->qb_offset + 1) : '');
	}

	

	
	protected function _close()
	{
		oci_close($this->conn_id);
	}

}
