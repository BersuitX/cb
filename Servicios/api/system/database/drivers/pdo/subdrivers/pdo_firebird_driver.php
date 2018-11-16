<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_firebird_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'firebird';

	

	
	protected $Vbqls34cvlhv = array('RAND()', 'RAND()');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'firebird:';

			if ( ! empty($this->database))
			{
				$this->dsn .= 'dbname='.$this->database;
			}
			elseif ( ! empty($this->hostname))
			{
				$this->dsn .= 'dbname='.$this->hostname;
			}

			empty($this->char_set) OR $this->dsn .= ';charset='.$this->char_set;
			empty($this->role) OR $this->dsn .= ';role='.$this->role;
		}
		elseif ( ! empty($this->char_set) && strpos($this->dsn, 'charset=', 9) === FALSE)
		{
			$this->dsn .= ';charset='.$this->char_set;
		}
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "RDB$Vl0t13qwpavt" FROM "RDB$Vreuct5fgwdf" WHERE "RDB$Vl0t13qwpavt" NOT LIKE \'RDB$%\' AND "RDB$Vl0t13qwpavt" NOT LIKE \'MON$%\'';

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg.' AND "RDB$Vl0t13qwpavt" LIKE \''.$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SELECT "RDB$Vttlgcfuse2e" FROM "RDB$V3n0uwmnppwq" WHERE "RDB$Vl0t13qwpavt" = '.$this->escape($Vhyg2tjvah5t);
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
				.($this->qb_offset > 0 ? ' SKIP '.$this->qb_offset : '');
		}
		else
		{
			$Vjsggk5v2fqw = 'ROWS '
				.($this->qb_offset > 0 ? $this->qb_offset.' TO '.($this->qb_limit + $this->qb_offset) : $this->qb_limit);
		}

		return preg_replace('`SELECT`i', 'SELECT '.$Vjsggk5v2fqw, $Vcusg10hsxxg);
	}

}
