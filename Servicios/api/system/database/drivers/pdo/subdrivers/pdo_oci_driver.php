<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_oci_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'oci';

	

	
	protected $Vnuagy5i3hbl = array('*', 'rownum');

	
	protected $Vbqls34cvlhv = array('ASC', 'ASC'); 

	
	protected $V54rf2cloc2q = 'SELECT COUNT(1) AS ';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'oci:dbname=';

			
			
			if (empty($this->hostname) && empty($this->port))
			{
				$this->dsn .= $this->database;
			}
			else
			{
				$this->dsn .= '//'.(empty($this->hostname) ? '127.0.0.1' : $this->hostname)
					.(empty($this->port) ? '' : ':'.$this->port).'/';

				empty($this->database) OR $this->dsn .= $this->database;
			}

			empty($this->char_set) OR $this->dsn .= ';charset='.$this->char_set;
		}
		elseif ( ! empty($this->char_set) && strpos($this->dsn, 'charset=', 4) === FALSE)
		{
			$this->dsn .= ';charset='.$this->char_set;
		}
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		$Vtrbtzapfh1v = parent::version();
		if (preg_match('#Release\s(?<version>\d+(?:\.\d+)+)#', $Vtrbtzapfh1v, $V4uvjtwtgjvp))
		{
			return $this->data_cache['version'] = $V4uvjtwtgjvp[1];
		}

		return FALSE;
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "TABLE_NAME" FROM "ALL_TABLES"';

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
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
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->COLUMN_DEFAULT;
		}

		return $V1qi3fii2jjy;
	}

	

	
	protected function _insert_batch($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt)
	{
		$Vpgpnbxy5p5e = implode(', ', $Vpgpnbxy5p5e);
		$Vcusg10hsxxg = "INSERT ALL\n";

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V3jjxja3nkgt); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vcusg10hsxxg .= '	INTO '.$Vhyg2tjvah5t.' ('.$Vpgpnbxy5p5e.') VALUES '.$V3jjxja3nkgt[$Vep0df0xosaw]."\n";
		}

		return $Vcusg10hsxxg.'SELECT * FROM dual';
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

		return 'SELECT * FROM (SELECT inner_query.*, rownum rnum FROM ('.$Vcusg10hsxxg.') inner_query WHERE rownum < '.($this->qb_offset + $this->qb_limit + 1).')'
			.($this->qb_offset ? ' WHERE rnum >= '.($this->qb_offset + 1): '');
	}

}
