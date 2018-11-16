<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mysql_forge extends CI_DB_forge {

	
	protected $Vaejnnwb1m5n	= 'CREATE DATABASE %s CHARACTER SET %s COLLATE %s';

	
	protected $Vnnr4qrrqbc2	= TRUE;

	
	protected $Vvlk2zsqqzvw		= array(
		'TINYINT',
		'SMALLINT',
		'MEDIUMINT',
		'INT',
		'INTEGER',
		'BIGINT',
		'REAL',
		'DOUBLE',
		'DOUBLE PRECISION',
		'FLOAT',
		'DECIMAL',
		'NUMERIC'
	);

	
	protected $Vruso1q53jc2 = 'NULL';

	

	
	protected function _create_table_attr($Vpkjdumwo4xn)
	{
		$Vcusg10hsxxg = '';

		foreach (array_keys($Vpkjdumwo4xn) as $V2xim30qek4u)
		{
			if (is_string($V2xim30qek4u))
			{
				$Vcusg10hsxxg .= ' '.strtoupper($V2xim30qek4u).' = '.$Vpkjdumwo4xn[$V2xim30qek4u];
			}
		}

		if ( ! empty($this->db->char_set) && ! strpos($Vcusg10hsxxg, 'CHARACTER SET') && ! strpos($Vcusg10hsxxg, 'CHARSET'))
		{
			$Vcusg10hsxxg .= ' DEFAULT CHARACTER SET = '.$this->db->char_set;
		}

		if ( ! empty($this->db->dbcollat) && ! strpos($Vcusg10hsxxg, 'COLLATE'))
		{
			$Vcusg10hsxxg .= ' COLLATE = '.$this->db->dbcollat;
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if ($Vr5gy0qe5urt === 'DROP')
		{
			return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
		}

		$Vcusg10hsxxg = 'ALTER TABLE '.$this->db->escape_identifiers($Vhyg2tjvah5t);
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwji4rxkyw5j); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ($Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] !== FALSE)
			{
				$Vwji4rxkyw5j[$Vep0df0xosaw] = ($Vr5gy0qe5urt === 'ADD')
						? "\n\tADD ".$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal']
						: "\n\tMODIFY ".$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'];
			}
			else
			{
				if ($Vr5gy0qe5urt === 'ADD')
				{
					$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] = "\n\tADD ";
				}
				else
				{
					$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] = empty($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']) ? "\n\tMODIFY " : "\n\tCHANGE ";
				}

				$Vwji4rxkyw5j[$Vep0df0xosaw] = $Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'].$this->_process_column($Vwji4rxkyw5j[$Vep0df0xosaw]);
			}
		}

		return array($Vcusg10hsxxg.implode(',', $Vwji4rxkyw5j));
	}

	

	
	protected function _process_column($Vwji4rxkyw5j)
	{
		$Vifdyk0kuyy1 = isset($Vwji4rxkyw5j['after'])
			? ' AFTER '.$this->db->escape_identifiers($Vwji4rxkyw5j['after']) : '';

		if (empty($Vifdyk0kuyy1) && isset($Vwji4rxkyw5j['first']) && $Vwji4rxkyw5j['first'] === TRUE)
		{
			$Vifdyk0kuyy1 = ' FIRST';
		}


		return $this->db->escape_identifiers($Vwji4rxkyw5j['name'])
			.(empty($Vwji4rxkyw5j['new_name']) ? '' : ' '.$this->db->escape_identifiers($Vwji4rxkyw5j['new_name']))
			.' '.$Vwji4rxkyw5j['type'].$Vwji4rxkyw5j['length']
			.$Vwji4rxkyw5j['unsigned']
			.$Vwji4rxkyw5j['null']
			.$Vwji4rxkyw5j['default']
			.$Vwji4rxkyw5j['auto_increment']
			.$Vwji4rxkyw5j['unique']
			.(empty($Vwji4rxkyw5j['comment']) ? '' : ' COMMENT '.$Vwji4rxkyw5j['comment'])
			.$Vifdyk0kuyy1;
	}

	

	
	protected function _process_indexes($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = '';

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->keys); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if (is_array($this->keys[$Vep0df0xosaw]))
			{
				for ($Vep0df0xosaw2 = 0, $Vn2ycfau434s2 = count($this->keys[$Vep0df0xosaw]); $Vep0df0xosaw2 < $Vn2ycfau434s2; $Vep0df0xosaw2++)
				{
					if ( ! isset($this->fields[$this->keys[$Vep0df0xosaw][$Vep0df0xosaw2]]))
					{
						unset($this->keys[$Vep0df0xosaw][$Vep0df0xosaw2]);
						continue;
					}
				}
			}
			elseif ( ! isset($this->fields[$this->keys[$Vep0df0xosaw]]))
			{
				unset($this->keys[$Vep0df0xosaw]);
				continue;
			}

			is_array($this->keys[$Vep0df0xosaw]) OR $this->keys[$Vep0df0xosaw] = array($this->keys[$Vep0df0xosaw]);

			$Vcusg10hsxxg .= ",\n\tKEY ".$this->db->escape_identifiers(implode('_', $this->keys[$Vep0df0xosaw]))
				.' ('.implode(', ', $this->db->escape_identifiers($this->keys[$Vep0df0xosaw])).')';
		}

		$this->keys = array();

		return $Vcusg10hsxxg;
	}

}
