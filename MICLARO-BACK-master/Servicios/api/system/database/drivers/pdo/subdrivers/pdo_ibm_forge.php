<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_ibm_forge extends CI_DB_pdo_forge {

	
	protected $Vxmkjultibgc	= 'RENAME TABLE %s TO %s';

	
	protected $Vvlk2zsqqzvw		= array(
		'SMALLINT'	=> 'INTEGER',
		'INT'		=> 'BIGINT',
		'INTEGER'	=> 'BIGINT'
	);

	
	protected $Vmds0uhotuau		= FALSE;

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if ($Vr5gy0qe5urt === 'CHANGE')
		{
			$Vr5gy0qe5urt = 'MODIFY';
		}

		return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
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
		
	}

}
