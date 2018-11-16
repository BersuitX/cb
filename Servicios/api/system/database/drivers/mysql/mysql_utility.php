<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mysql_utility extends CI_DB_utility {

	
	protected $Vx21j431t0ux	= 'SHOW DATABASES';

	
	protected $Vpjjq031rqsw	= 'OPTIMIZE TABLE %s';

	
	protected $Vtt4oafzhief	= 'REPAIR TABLE %s';

	

	
	protected function _backup($Vpz5i5lfmwft = array())
	{
		if (count($Vpz5i5lfmwft) === 0)
		{
			return FALSE;
		}

		
		extract($Vpz5i5lfmwft);

		
		$Vzxix2pqoztx = '';

		
		if ($Vtbjfdzbsjul === FALSE)
		{
			$Vzxix2pqoztx .= 'SET foreign_key_checks = 0;'.$Vkq5rgcyqdq1;
		}

		foreach ( (array) $Vlkfks3g4p11 as $Vhyg2tjvah5t)
		{
			
			if (in_array($Vhyg2tjvah5t, (array) $V035d0s5kf1i, TRUE))
			{
				continue;
			}

			
			$Vfvggg0pmnws = $this->db->query('SHOW CREATE TABLE '.$this->db->escape_identifiers($this->db->database.'.'.$Vhyg2tjvah5t));

			
			if ($Vfvggg0pmnws === FALSE)
			{
				continue;
			}

			
			$Vzxix2pqoztx .= '#'.$Vkq5rgcyqdq1.'# TABLE STRUCTURE FOR: '.$Vhyg2tjvah5t.$Vkq5rgcyqdq1.'#'.$Vkq5rgcyqdq1.$Vkq5rgcyqdq1;

			if ($Vz5ftvysxqmy === TRUE)
			{
				$Vzxix2pqoztx .= 'DROP TABLE IF EXISTS '.$this->db->protect_identifiers($Vhyg2tjvah5t).';'.$Vkq5rgcyqdq1.$Vkq5rgcyqdq1;
			}

			$Vep0df0xosaw = 0;
			$Voetc43kt2cr = $Vfvggg0pmnws->result_array();
			foreach ($Voetc43kt2cr[0] as $Va4zo0rltynr)
			{
				if ($Vep0df0xosaw++ % 2)
				{
					$Vzxix2pqoztx .= $Va4zo0rltynr.';'.$Vkq5rgcyqdq1.$Vkq5rgcyqdq1;
				}
			}

			
			if ($Vpllrn4icyel === FALSE)
			{
				continue;
			}

			
			$Vfvggg0pmnws = $this->db->query('SELECT * FROM '.$this->db->protect_identifiers($Vhyg2tjvah5t));

			if ($Vfvggg0pmnws->num_rows() === 0)
			{
				continue;
			}

			
			
			

			$Vep0df0xosaw = 0;
			$Vrjclj3swfzk = '';
			$Vep0df0xosaws_int = array();
			while ($Vwji4rxkyw5j = mysql_fetch_field($Vfvggg0pmnws->result_id))
			{
				
				$Vep0df0xosaws_int[$Vep0df0xosaw] = in_array(strtolower(mysql_field_type($Vfvggg0pmnws->result_id, $Vep0df0xosaw)),
							array('tinyint', 'smallint', 'mediumint', 'int', 'bigint'), 
							TRUE);

				
				$Vrjclj3swfzk .= $this->db->escape_identifiers($Vwji4rxkyw5j->name).', ';
				$Vep0df0xosaw++;
			}

			
			$Vrjclj3swfzk = preg_replace('/, $/' , '', $Vrjclj3swfzk);

			
			foreach ($Vfvggg0pmnws->result_array() as $Vf3jo4nkd2sr)
			{
				$Va4zo0rltynr_str = '';

				$Vep0df0xosaw = 0;
				foreach ($Vf3jo4nkd2sr as $Vxxtccqydhzn)
				{
					
					if ($Vxxtccqydhzn === NULL)
					{
						$Va4zo0rltynr_str .= 'NULL';
					}
					else
					{
						
						$Va4zo0rltynr_str .= ($Vep0df0xosaws_int[$Vep0df0xosaw] === FALSE) ? $this->db->escape($Vxxtccqydhzn) : $Vxxtccqydhzn;
					}

					
					$Va4zo0rltynr_str .= ', ';
					$Vep0df0xosaw++;
				}

				
				$Va4zo0rltynr_str = preg_replace('/, $/' , '', $Va4zo0rltynr_str);

				
				$Vzxix2pqoztx .= 'INSERT INTO '.$this->db->protect_identifiers($Vhyg2tjvah5t).' ('.$Vrjclj3swfzk.') VALUES ('.$Va4zo0rltynr_str.');'.$Vkq5rgcyqdq1;
			}

			$Vzxix2pqoztx .= $Vkq5rgcyqdq1.$Vkq5rgcyqdq1;
		}

		
		if ($Vtbjfdzbsjul === FALSE)
		{
			$Vzxix2pqoztx .= 'SET foreign_key_checks = 1;'.$Vkq5rgcyqdq1;
		}

		return $Vzxix2pqoztx;
	}

}
