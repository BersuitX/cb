<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_pgsql_forge extends CI_DB_pdo_forge {

	
	protected $Vditquhzfbq4	= 'DROP TABLE IF EXISTS';

	
	protected $Vvlk2zsqqzvw		= array(
		'INT2'		=> 'INTEGER',
		'SMALLINT'	=> 'INTEGER',
		'INT'		=> 'BIGINT',
		'INT4'		=> 'BIGINT',
		'INTEGER'	=> 'BIGINT',
		'INT8'		=> 'NUMERIC',
		'BIGINT'	=> 'NUMERIC',
		'REAL'		=> 'DOUBLE PRECISION',
		'FLOAT'		=> 'DOUBLE PRECISION'
	);

	
	protected $Vruso1q53jc2 = 'NULL';

	

	
	public function __construct(&$Vwensv4j4idw)
	{
		parent::__construct($Vwensv4j4idw);

		if (version_compare($this->db->version(), '9.0', '>'))
		{
			$this->create_table_if = 'CREATE TABLE IF NOT EXISTS';
		}
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

			if (version_compare($this->db->version(), '8', '>=') && isset($Vwji4rxkyw5j[$Vep0df0xosaw]['type']))
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
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' ALTER COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.($Vwji4rxkyw5j[$Vep0df0xosaw]['null'] === TRUE ? ' DROP NOT NULL' : ' SET NOT NULL');
			}

			if ( ! empty($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']))
			{
				$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' RENAME COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.' TO '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']);
			}

			if ( ! empty($Vwji4rxkyw5j[$Vep0df0xosaw]['comment']))
			{
				$Vcusg10hsxxgs[] = 'COMMENT ON COLUMN '
					.$this->db->escape_identifiers($Vhyg2tjvah5t).'.'.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
					.' IS '.$Vwji4rxkyw5j[$Vep0df0xosaw]['comment'];
			}
		}

		return $Vcusg10hsxxgs;
 	}

	

	
	protected function _attr_type(&$Vpkjdumwo4xn)
	{
		
		if (isset($Vpkjdumwo4xn['CONSTRAINT']) && stripos($Vpkjdumwo4xn['TYPE'], 'int') !== FALSE)
		{
			$Vpkjdumwo4xn['CONSTRAINT'] = NULL;
		}

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

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['AUTO_INCREMENT']) && $Vpkjdumwo4xn['AUTO_INCREMENT'] === TRUE)
		{
			$Vwji4rxkyw5j['type'] = ($Vwji4rxkyw5j['type'] === 'NUMERIC')
				? 'BIGSERIAL'
				: 'SERIAL';
		}
	}

}
