<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_cubrid_forge extends CI_DB_pdo_forge {

	
	protected $Vaejnnwb1m5n	= FALSE;

	
	protected $Vm1ca03opd2u	= FALSE;

	
	protected $Vnnr4qrrqbc2	= TRUE;

	
	protected $Vditquhzfbq4	= 'DROP TABLE IF EXISTS';

	
	protected $Vvlk2zsqqzvw		= array(
		'SHORT'		=> 'INTEGER',
		'SMALLINT'	=> 'INTEGER',
		'INT'		=> 'BIGINT',
		'INTEGER'	=> 'BIGINT',
		'BIGINT'	=> 'NUMERIC',
		'FLOAT'		=> 'DOUBLE',
		'REAL'		=> 'DOUBLE'
	);

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if (in_array($Vr5gy0qe5urt, array('DROP', 'ADD'), TRUE))
		{
			return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
		}

		$Vcusg10hsxxg = 'ALTER TABLE '.$this->db->escape_identifiers($Vhyg2tjvah5t);
		$Vcusg10hsxxgs = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwji4rxkyw5j); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ($Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] !== FALSE)
			{
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' CHANGE '.$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'];
			}
			else
			{
				$Vr5gy0qe5urt = empty($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']) ? ' MODIFY ' : ' CHANGE ';
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.$Vr5gy0qe5urt.$this->_process_column($Vwji4rxkyw5j[$Vep0df0xosaw]);
			}
		}

		return $Vcusg10hsxxgs;
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
			.$Vifdyk0kuyy1;
	}

	

	
	protected function _attr_type(&$Vpkjdumwo4xn)
	{
		switch (strtoupper($Vpkjdumwo4xn['TYPE']))
		{
			case 'TINYINT':
				$Vpkjdumwo4xn['TYPE'] = 'SMALLINT';
				$Vpkjdumwo4xn['UNSIGNED'] = FALSE;
				return;
			case 'MEDIUMINT':
				$Vpkjdumwo4xn['TYPE'] = 'INTEGER';
				$Vpkjdumwo4xn['UNSIGNED'] = FALSE;
				return;
			default: return;
		}
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
