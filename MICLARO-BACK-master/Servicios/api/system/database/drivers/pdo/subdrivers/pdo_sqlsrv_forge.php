<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_sqlsrv_forge extends CI_DB_pdo_forge {

	
	protected $Vv4juxnogj5t	= "IF NOT EXISTS (SELECT * FROM sysobjects WHERE ID = object_id(N'%s') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)\nCREATE TABLE";

	
	protected $Vditquhzfbq4	= "IF EXISTS (SELECT * FROM sysobjects WHERE ID = object_id(N'%s') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)\nDROP TABLE";

	
	protected $Vvlk2zsqqzvw		= array(
		'TINYINT'	=> 'SMALLINT',
		'SMALLINT'	=> 'INT',
		'INT'		=> 'BIGINT',
		'REAL'		=> 'FLOAT'
	);

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if (in_array($Vr5gy0qe5urt, array('ADD', 'DROP'), TRUE))
		{
			return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
		}

		$Vcusg10hsxxg = 'ALTER TABLE '.$this->db->escape_identifiers($Vhyg2tjvah5t).' ALTER COLUMN ';
		$Vcusg10hsxxgs = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwji4rxkyw5j); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vcusg10hsxxgs[] = $Vcusg10hsxxg.$this->_process_column($Vwji4rxkyw5j[$Vep0df0xosaw]);
		}

		return $Vcusg10hsxxgs;
	}

	

	
	protected function _attr_type(&$Vpkjdumwo4xn)
	{
		switch (strtoupper($Vpkjdumwo4xn['TYPE']))
		{
			case 'MEDIUMINT':
				$Vpkjdumwo4xn['TYPE'] = 'INTEGER';
				$Vpkjdumwo4xn['UNSIGNED'] = FALSE;
				return;
			case 'INTEGER':
				$Vpkjdumwo4xn['TYPE'] = 'INT';
				return;
			default: return;
		}
	}

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['AUTO_INCREMENT']) && $Vpkjdumwo4xn['AUTO_INCREMENT'] === TRUE && stripos($Vwji4rxkyw5j['type'], 'int') !== FALSE)
		{
			$Vwji4rxkyw5j['auto_increment'] = ' IDENTITY(1,1)';
		}
	}

}
