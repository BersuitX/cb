<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_sqlite3_forge extends CI_DB_forge {

	
	protected $Vvlk2zsqqzvw		= FALSE;

	
	protected $Vruso1q53jc2		= 'NULL';

	

	
	public function __construct(&$Vwensv4j4idw)
	{
		parent::__construct($Vwensv4j4idw);

		if (version_compare($this->db->version(), '3.3', '<'))
		{
			$this->_create_table_if = FALSE;
			$this->_drop_table_if   = FALSE;
		}
	}

	

	
	public function create_database($Vwensv4j4idw_name = '')
	{
		
		
		return TRUE;
	}

	

	
	public function drop_database($Vwensv4j4idw_name = '')
	{
		
		if (file_exists($this->db->database))
		{
			
			$this->db->close();
			if ( ! @unlink($this->db->database))
			{
				return $this->db->db_debug ? $this->db->display_error('db_unable_to_drop') : FALSE;
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

		return $this->db->db_debug ? $this->db->display_error('db_unable_to_drop') : FALSE;
	}

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		if ($Vr5gy0qe5urt === 'DROP' OR $Vr5gy0qe5urt === 'CHANGE')
		{
			
			
			
			
			
			
			
			
			

			return FALSE;
		}

		return parent::_alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j);
	}

	

	
	protected function _process_column($Vwji4rxkyw5j)
	{
		return $this->db->escape_identifiers($Vwji4rxkyw5j['name'])
			.' '.$Vwji4rxkyw5j['type']
			.$Vwji4rxkyw5j['auto_increment']
			.$Vwji4rxkyw5j['null']
			.$Vwji4rxkyw5j['unique']
			.$Vwji4rxkyw5j['default'];
	}

	

	
	protected function _attr_type(&$Vpkjdumwo4xn)
	{
		switch (strtoupper($Vpkjdumwo4xn['TYPE']))
		{
			case 'ENUM':
			case 'SET':
				$Vpkjdumwo4xn['TYPE'] = 'TEXT';
				return;
			default: return;
		}
	}

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['AUTO_INCREMENT']) && $Vpkjdumwo4xn['AUTO_INCREMENT'] === TRUE && stripos($Vwji4rxkyw5j['type'], 'int') !== FALSE)
		{
			$Vwji4rxkyw5j['type'] = 'INTEGER PRIMARY KEY';
			$Vwji4rxkyw5j['default'] = '';
			$Vwji4rxkyw5j['null'] = '';
			$Vwji4rxkyw5j['unique'] = '';
			$Vwji4rxkyw5j['auto_increment'] = ' AUTOINCREMENT';

			$this->primary_keys = array();
		}
	}

}
