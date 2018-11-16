<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_sqlite_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'sqlite';

	

	
	protected $Vbqls34cvlhv = ' RANDOM()';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'sqlite:';

			if (empty($this->database) && empty($this->hostname))
			{
				$this->database = ':memory:';
			}

			$this->database = empty($this->database) ? $this->hostname : $this->database;
		}
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SELECT "NAME" FROM "SQLITE_MASTER" WHERE "TYPE" = \'table\'';

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg.' AND "NAME" LIKE \''.$this->escape_like_str($this->dbprefix)."%' "
				.sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $Vcusg10hsxxg;
	}

	

	
	public function list_fields($Vhyg2tjvah5t)
	{
		
		if (isset($this->data_cache['field_names'][$Vhyg2tjvah5t]))
		{
			return $this->data_cache['field_names'][$Vhyg2tjvah5t];
		}

		if (($Voetc43kt2cr = $this->query('PRAGMA TABLE_INFO('.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE).')')) === FALSE)
		{
			return FALSE;
		}

		$this->data_cache['field_names'][$Vhyg2tjvah5t] = array();
		foreach ($Voetc43kt2cr->result_array() as $Vf3jo4nkd2sr)
		{
			$this->data_cache['field_names'][$Vhyg2tjvah5t][] = $Vf3jo4nkd2sr['name'];
		}

		return $this->data_cache['field_names'][$Vhyg2tjvah5t];
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (($Vfvggg0pmnws = $this->query('PRAGMA TABLE_INFO('.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE).')')) === FALSE)
		{
			return FALSE;
		}

		$Vfvggg0pmnws = $Vfvggg0pmnws->result_array();
		if (empty($Vfvggg0pmnws))
		{
			return FALSE;
		}

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]['name'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->type		= $Vfvggg0pmnws[$Vep0df0xosaw]['type'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->max_length		= NULL;
			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]['dflt_value'];
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= isset($Vfvggg0pmnws[$Vep0df0xosaw]['pk']) ? (int) $Vfvggg0pmnws[$Vep0df0xosaw]['pk'] : 0;
		}

		return $V1qi3fii2jjy;
	}

	

	
	protected function _replace($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt)
	{
		return 'INSERT OR '.parent::_replace($Vhyg2tjvah5t, $Vpgpnbxy5p5e, $V3jjxja3nkgt);
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'DELETE FROM '.$Vhyg2tjvah5t;
	}

}
