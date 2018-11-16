<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_firebird_forge extends CI_DB_pdo_forge {

	
	protected $Vxmkjultibgc	= FALSE;

	
	protected $Vvlk2zsqqzvw		= array(
		'SMALLINT'	=> 'INTEGER',
		'INTEGER'	=> 'INT64',
		'FLOAT'		=> 'DOUBLE PRECISION'
	);

	
	protected $Vruso1q53jc2		= 'NULL';

	

	
	public function create_database($Vdbt0toj5uko)
	{
		

		
		empty($this->db->hostname) OR $Vdbt0toj5uko = $this->hostname.':'.$Vdbt0toj5uko;

		return parent::create_database('"'.$Vdbt0toj5uko.'"');
	}

	

	
	public function drop_database($Vdbt0toj5uko = '')
	{
		if ( ! ibase_drop_db($this->conn_id))
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unable_to_drop') : FALSE;
		}
		elseif ( ! empty($this->db->data_cache['db_names']))
		{
			$V2xim30qek4u = array_search(strtolower($this->db->database), array_map('strtolower', $this->db->data_cache['db_names']), TRUE);
			if ($V2xim30qek4u !== FALSE)
			{
				unset($this->db->data_cache['db_names'][$V2xim30qek4u]);
			}
		}

		return TRUE;
	}

	

	
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
				return FALSE;
			}

			if (isset($Vwji4rxkyw5j[$Vep0df0xosaw]['type']))
			{
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' ALTER COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.' TYPE '.$Vwji4rxkyw5j[$Vep0df0xosaw]['type'].$Vwji4rxkyw5j[$Vep0df0xosaw]['length'];
			}

			if ( ! empty($Vwji4rxkyw5j[$Vep0df0xosaw]['default']))
			{
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' ALTER COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.' SET DEFAULT '.$Vwji4rxkyw5j[$Vep0df0xosaw]['default'];
			}

			if (isset($Vwji4rxkyw5j[$Vep0df0xosaw]['null']))
			{
				$Vcusg10hsxxgs[] = 'UPDATE "RDB$V3n0uwmnppwq" SET "RDB$Vvhkojmv5lee" = '
					.($Vwji4rxkyw5j[$Vep0df0xosaw]['null'] === TRUE ? 'NULL' : '1')
					.' WHERE "RDB$Vttlgcfuse2e" = '.$this->db->escape($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.' AND "RDB$Vl0t13qwpavt" = '.$this->db->escape($Vhyg2tjvah5t);
			}

			if ( ! empty($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']))
			{
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' ALTER COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.' TO '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']);
			}
		}

		return $Vcusg10hsxxgs;
 	}

	

	
	protected function _process_column($Vwji4rxkyw5j)
	{
		return $this->db->escape_identifiers($Vwji4rxkyw5j['name'])
			.' '.$Vwji4rxkyw5j['type'].$Vwji4rxkyw5j['length']
			.$Vwji4rxkyw5j['null']
			.$Vwji4rxkyw5j['unique']
			.$Vwji4rxkyw5j['default'];
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
			case 'INT':
				$Vpkjdumwo4xn['TYPE'] = 'INTEGER';
				return;
			case 'BIGINT':
				$Vpkjdumwo4xn['TYPE'] = 'INT64';
				return;
			default: return;
		}
	}

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		
	}

}
