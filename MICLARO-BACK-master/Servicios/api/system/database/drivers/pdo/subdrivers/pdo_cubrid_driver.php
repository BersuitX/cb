<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_cubrid_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'cubrid';

	
	protected $Vnm3z344krng = '`';

	
	protected $Vbqls34cvlhv = array('RANDOM()', 'RANDOM(%d)');

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'cubrid:host='.(empty($this->hostname) ? '127.0.0.1' : $this->hostname);

			empty($this->port) OR $this->dsn .= ';port='.$this->port;
			empty($this->database) OR $this->dsn .= ';dbname='.$this->database;
			empty($this->char_set) OR $this->dsn .= ';charset='.$this->char_set;
		}
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SHOW TABLES';

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg." LIKE '".$this->escape_like_str($this->dbprefix)."%'";
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (($Vfvggg0pmnws = $this->query('SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE))) === FALSE)
		{
			return FALSE;
		}
		$Vfvggg0pmnws = $Vfvggg0pmnws->result_object();

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]->Field;

			sscanf($Vfvggg0pmnws[$Vep0df0xosaw]->Type, '%[a-z](%d)',
				$V1qi3fii2jjy[$Vep0df0xosaw]->type,
				$V1qi3fii2jjy[$Vep0df0xosaw]->max_length
			);

			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->Default;
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) ($Vfvggg0pmnws[$Vep0df0xosaw]->Key === 'PRI');
		}

		return $V1qi3fii2jjy;
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
					$Vep4ncm02uco[$Vwji4rxkyw5j][] = 'WHEN '.$Vep0df0xosawndex.' = '.$Va4zo0rltynr[$Vep0df0xosawndex].' THEN '.$Va4zo0rltynr[$Vwji4rxkyw5j];
				}
			}
		}

		$Vn2ycfau434sases = '';
		foreach ($Vep4ncm02uco as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vn2ycfau434sases .= $Vwyse0flpyxh." = CASE \n"
				.implode("\n", $Vxxtccqydhzn)."\n"
				.'ELSE '.$Vwyse0flpyxh.' END), ';
		}

		$this->where($Vep0df0xosawndex.' IN('.implode(',', $Vep0df0xosawds).')', NULL, FALSE);

		return 'UPDATE '.$Vhyg2tjvah5t.' SET '.substr($Vn2ycfau434sases, 0, -2).$this->_compile_wh('qb_where');
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE '.$Vhyg2tjvah5t;
	}

	

	
	protected function _from_tables()
	{
		if ( ! empty($this->qb_join) && count($this->qb_from) > 1)
		{
			return '('.implode(', ', $this->qb_from).')';
		}

		return implode(', ', $this->qb_from);
	}

}
