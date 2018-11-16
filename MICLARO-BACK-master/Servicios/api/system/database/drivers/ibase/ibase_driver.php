<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_ibase_driver extends CI_DB {

	
	public $V4toindljvfg = 'ibase';

	

	
	protected $Vbqls34cvlhv = array('RAND()', 'RAND()');

	
	protected $Vdea3pomg0bs;

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		return ($Vzrtmbotfake === TRUE)
			? ibase_pconnect($this->hostname.':'.$this->database, $this->username, $this->password, $this->char_set)
			: ibase_connect($this->hostname.':'.$this->database, $this->username, $this->password, $this->char_set);
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if (($V0rgibksbyqm = ibase_service_attach($this->hostname, $this->username, $this->password)))
		{
			$this->data_cache['version'] = ibase_server_info($V0rgibksbyqm, IBASE_SVC_SERVER_VERSION);

			
			ibase_service_detach($V0rgibksbyqm);
			return $this->data_cache['version'];
		}

		return FALSE;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return ibase_query(isset($this->_ibase_trans) ? $this->_ibase_trans : $this->conn_id, $Vcusg10hsxxg);
	}

	

	
	protected function _trans_begin()
	{
		if (($Vttnij2q4rva = ibase_trans($this->conn_id)) === FALSE)
		{
			return FALSE;
		}

		$this->_ibase_trans = $Vttnij2q4rva;
		return TRUE;
	}

	

	
	protected function _trans_commit()
	{
		if (ibase_commit($this->_ibase_trans))
		{
			$this->_ibase_trans = NULL;
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _trans_rollback()
	{
		if (ibase_rollback($this->_ibase_trans))
		{
			$this->_ibase_trans = NULL;
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function affected_rows()
	{
		return ibase_affected_rows($this->conn_id);
	}

	

	
	public function insert_id($Vprqfyzkplgm, $V25yznpzhr5j = 0)
	{
		
		return ibase_gen_id('"'.$Vprqfyzkplgm.'"', $V25yznpzhr5j);
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT TRIM("RDB$Vl0t13qwpavt") AS TABLE_NAME FROM "RDB$Vreuct5fgwdf" WHERE "RDB$Vl0t13qwpavt" NOT LIKE \'RDB$%\' AND "RDB$Vl0t13qwpavt" NOT LIKE \'MON$%\'';

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg.' AND TRIM("RDB$Vl0t13qwpavt") AS TABLE_NAME LIKE \''.$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SELECT TRIM("RDB$Vttlgcfuse2e") AS COLUMN_NAME FROM "RDB$V3n0uwmnppwq" WHERE "RDB$Vl0t13qwpavt" = '.$this->escape($Vhyg2tjvah5t);
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = 'SELECT "rfields"."RDB$Vttlgcfuse2e" AS "name",
				CASE "fields"."RDB$Vxlub0kx04nr"
					WHEN 7 THEN \'SMALLINT\'
					WHEN 8 THEN \'INTEGER\'
					WHEN 9 THEN \'QUAD\'
					WHEN 10 THEN \'FLOAT\'
					WHEN 11 THEN \'DFLOAT\'
					WHEN 12 THEN \'DATE\'
					WHEN 13 THEN \'TIME\'
					WHEN 14 THEN \'CHAR\'
					WHEN 16 THEN \'INT64\'
					WHEN 27 THEN \'DOUBLE\'
					WHEN 35 THEN \'TIMESTAMP\'
					WHEN 37 THEN \'VARCHAR\'
					WHEN 40 THEN \'CSTRING\'
					WHEN 261 THEN \'BLOB\'
					ELSE NULL
				END AS "type",
				"fields"."RDB$Vzk0rc4t5egx" AS "max_length",
				"rfields"."RDB$Vwuxb0rzjchh" AS "default"
			FROM "RDB$V3n0uwmnppwq" "rfields"
				JOIN "RDB$Vggf2xqw1hgl" "fields" ON "rfields"."RDB$V4tfryjjeedq" = "fields"."RDB$Vttlgcfuse2e"
			WHERE "rfields"."RDB$Vl0t13qwpavt" = '.$this->escape($Vhyg2tjvah5t).'
			ORDER BY "rfields"."RDB$Vcedobslkrwv"';

		return (($Vfvggg0pmnws = $this->query($Vcusg10hsxxg)) !== FALSE)
			? $Vfvggg0pmnws->result_object()
			: FALSE;
	}

	

	
	public function error()
	{
		return array('code' => ibase_errcode(), 'message' => ibase_errmsg());
	}

	

	
	protected function _update($Vhyg2tjvah5t, $V3jjxja3nkgt)
	{
		$this->qb_limit = FALSE;
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
		
		if (stripos($this->version(), 'firebird') !== FALSE)
		{
			$Vjsggk5v2fqw = 'FIRST '.$this->qb_limit
				.($this->qb_offset ? ' SKIP '.$this->qb_offset : '');
		}
		else
		{
			$Vjsggk5v2fqw = 'ROWS '
				.($this->qb_offset ? $this->qb_offset.' TO '.($this->qb_limit + $this->qb_offset) : $this->qb_limit);
		}

		return preg_replace('`SELECT`i', 'SELECT '.$Vjsggk5v2fqw, $Vcusg10hsxxg, 1);
	}

	

	
	protected function _close()
	{
		ibase_close($this->conn_id);
	}

}
