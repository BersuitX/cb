<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_4d_forge extends CI_DB_pdo_forge {

	
	protected $Vaejnnwb1m5n	= 'CREATE SCHEMA %s';

	
	protected $Vm1ca03opd2u	= 'DROP SCHEMA %s';

	
	protected $Vv4juxnogj5t	= 'CREATE TABLE IF NOT EXISTS';

	
	protected $Vxmkjultibgc	= FALSE;

	
	protected $Vditquhzfbq4	= 'DROP TABLE IF EXISTS';

	
	protected $Vvlk2zsqqzvw		= array(
		'INT16'		=> 'INT',
		'SMALLINT'	=> 'INT',
		'INT'		=> 'INT64',
		'INT32'		=> 'INT64'
	);

	
	protected $Vmds0uhotuau		= FALSE;

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if (in_array($Vr5gy0qe5urt, array('ADD', 'DROP'), TRUE))
		{
			return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
		}

		
		return FALSE;
	}

	

	
	protected function _process_column($Vwji4rxkyw5j)
	{
		return $this->db->escape_identifiers($Vwji4rxkyw5j['name'])
			.' '.$Vwji4rxkyw5j['type'].$Vwji4rxkyw5j['length']
			.$Vwji4rxkyw5j['null']
			.$Vwji4rxkyw5j['unique']
			.$Vwji4rxkyw5j['auto_increment'];
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
			case 'INTEGER':
				$Vpkjdumwo4xn['TYPE'] = 'INT';
				return;
			case 'BIGINT':
				$Vpkjdumwo4xn['TYPE'] = 'INT64';
				return;
			default: return;
		}
	}

	

	
	protected function _attr_unique(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['UNIQUE']) && $Vpkjdumwo4xn['UNIQUE'] === TRUE)
		{
			$Vwji4rxkyw5j['unique'] = ' UNIQUE';

			
			$Vwji4rxkyw5j['null'] = ' NOT NULL';
		}
	}

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['AUTO_INCREMENT']) && $Vpkjdumwo4xn['AUTO_INCREMENT'] === TRUE)
		{
			if (stripos($Vwji4rxkyw5j['type'], 'int') !== FALSE)
			{
				$Vwji4rxkyw5j['auto_increment'] = ' AUTO_INCREMENT';
			}
			elseif (strcasecmp($Vwji4rxkyw5j['type'], 'UUID') === 0)
			{
				$Vwji4rxkyw5j['auto_increment'] = ' AUTO_GENERATE';
			}
		}
	}

}
