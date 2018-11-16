<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_oci8_forge extends CI_DB_forge {

	
	protected $Vaejnnwb1m5n	= FALSE;

	
	protected $Vm1ca03opd2u	= FALSE;

	
	protected $Vditquhzfbq4	= FALSE;

	
	protected $Vvlk2zsqqzvw		= FALSE;

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if ($Vr5gy0qe5urt === 'DROP')
		{
			return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
		}
		elseif ($Vr5gy0qe5urt === 'CHANGE')
		{
			$Vr5gy0qe5urt = 'MODIFY';
		}

		$Vcusg10hsxxg = 'ALTER TABLE '.$this->db->escape_identifiers($Vhyg2tjvah5t);
		$Vcusg10hsxxgs = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwji4rxkyw5j); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ($Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] !== FALSE)
			{
				$Vwji4rxkyw5j[$Vep0df0xosaw] = "\n\t".$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'];
			}
			else
			{
				$Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] = "\n\t".$this->_process_column($Vwji4rxkyw5j[$Vep0df0xosaw]);

				if ( ! empty($Vwji4rxkyw5j[$Vep0df0xosaw]['comment']))
				{
					$Vcusg10hsxxgs[] = 'COMMENT ON COLUMN '
						.$this->db->escape_identifiers($Vhyg2tjvah5t).'.'.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
						.' IS '.$Vwji4rxkyw5j[$Vep0df0xosaw]['comment'];
				}

				if ($Vr5gy0qe5urt === 'MODIFY' && ! empty($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']))
				{
					$Vcusg10hsxxgs[] = $Vcusg10hsxxg.' RENAME COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['name'])
						.' '.$this->db->escape_identifiers($Vwji4rxkyw5j[$Vep0df0xosaw]['new_name']);
				}
			}
		}

		$Vcusg10hsxxg .= ' '.$Vr5gy0qe5urt.' ';
		$Vcusg10hsxxg .= (count($Vwji4rxkyw5j) === 1)
				? $Vwji4rxkyw5j[0]
				: '('.implode(',', $Vwji4rxkyw5j).')';

		
		array_unshift($Vcusg10hsxxgs, $Vcusg10hsxxg);
		return $Vcusg10hsxxg;
	}

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		
	}

}
