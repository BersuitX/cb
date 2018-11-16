<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Migration {

	
	protected $Vpt4xyol0hb4 = FALSE;

	
	protected $Vlv43me4zjdw = 'sequential';

	
	protected $V5whqghzfe45 = NULL;

	
	protected $Vjrzelzin152 = 0;

	
	protected $Vbxj43gux3sv = 'migrations';

	
	protected $Vnetenhsnrae = FALSE;

	
	protected $Vv4udgj3agpv;

	
	protected $Vhbh3fkditdx = '';

	
	public function __construct($Vnmcm15juye5 = array())
	{
		
		if ( ! in_array(get_class($this), array('CI_Migration', config_item('subclass_prefix').'Migration'), TRUE))
		{
			return;
		}

		foreach ($Vnmcm15juye5 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$this->{'_'.$V2xim30qek4u} = $Va4zo0rltynr;
		}

		log_message('info', 'Migrations Class Initialized');

		
		if ($this->_migration_enabled !== TRUE)
		{
			show_error('Migrations has been loaded but is disabled or set up incorrectly.');
		}

		
		$this->_migration_path !== '' OR $this->_migration_path = APPPATH.'migrations/';

		
		$this->_migration_path = rtrim($this->_migration_path, '/').'/';

		
		$this->lang->load('migration');

		
		$this->load->dbforge();

		
		if (empty($this->_migration_table))
		{
			show_error('Migrations configuration file (migration.php) must have "migration_table" set.');
		}

		
		$this->_migration_regex = ($this->_migration_type === 'timestamp')
			? '/^\d{14}_(\w+)$/'
			: '/^\d{3}_(\w+)$/';

		
		if ( ! in_array($this->_migration_type, array('sequential', 'timestamp')))
		{
			show_error('An invalid migration numbering type was specified: '.$this->_migration_type);
		}

		
		if ( ! $this->db->table_exists($this->_migration_table))
		{
			$this->dbforge->add_field(array(
				'version' => array('type' => 'BIGINT', 'constraint' => 20),
			));

			$this->dbforge->create_table($this->_migration_table, TRUE);

			$this->db->insert($this->_migration_table, array('version' => 0));
		}

		
		if ($this->_migration_auto_latest === TRUE && ! $this->latest())
		{
			show_error($this->error_string());
		}
	}

	

	
	public function version($Vjfnovktuuaw)
	{
		
		$Vctwfh5gqlbg = $this->_get_version();

		if ($this->_migration_type === 'sequential')
		{
			$Vjfnovktuuaw = sprintf('%03d', $Vjfnovktuuaw);
		}
		else
		{
			$Vjfnovktuuaw = (string) $Vjfnovktuuaw;
		}

		$Vsusx1gt34md = $this->find_migrations();

		if ($Vjfnovktuuaw > 0 && ! isset($Vsusx1gt34md[$Vjfnovktuuaw]))
		{
			$this->_error_string = sprintf($this->lang->line('migration_not_found'), $Vjfnovktuuaw);
			return FALSE;
		}

		if ($Vjfnovktuuaw > $Vctwfh5gqlbg)
		{
			$V5dsbozs5xhq = 'up';
		}
		elseif ($Vjfnovktuuaw < $Vctwfh5gqlbg)
		{
			$V5dsbozs5xhq = 'down';
			
			krsort($Vsusx1gt34md);
		}
		else
		{
			
			return TRUE;
		}

		
		
		
		
		
		
		$Vguwj0glq1zx = array();
		foreach ($Vsusx1gt34md as $Vvl2owq3ojca => $Vligofq0fb34)
		{
			
			
			
			
			if ($V5dsbozs5xhq === 'up')
			{
				if ($Vvl2owq3ojca <= $Vctwfh5gqlbg)
				{
					continue;
				}
				elseif ($Vvl2owq3ojca > $Vjfnovktuuaw)
				{
					break;
				}
			}
			else
			{
				if ($Vvl2owq3ojca > $Vctwfh5gqlbg)
				{
					continue;
				}
				elseif ($Vvl2owq3ojca <= $Vjfnovktuuaw)
				{
					break;
				}
			}

			
			if ($this->_migration_type === 'sequential')
			{
				if (isset($Vg4r0avwl2jv) && abs($Vvl2owq3ojca - $Vg4r0avwl2jv) > 1)
				{
					$this->_error_string = sprintf($this->lang->line('migration_sequence_gap'), $Vvl2owq3ojca);
					return FALSE;
				}

				$Vg4r0avwl2jv = $Vvl2owq3ojca;
			}

			include_once($Vligofq0fb34);
			$Va3nq5n3hqmx = 'Migration_'.ucfirst(strtolower($this->_get_migration_name(basename($Vligofq0fb34, '.php'))));

			
			if ( ! class_exists($Va3nq5n3hqmx, FALSE))
			{
				$this->_error_string = sprintf($this->lang->line('migration_class_doesnt_exist'), $Va3nq5n3hqmx);
				return FALSE;
			}
			
			
			
			elseif ( ! in_array($V5dsbozs5xhq, array_map('strtolower', get_class_methods($Va3nq5n3hqmx))))
			{
				$this->_error_string = sprintf($this->lang->line('migration_missing_'.$V5dsbozs5xhq.'_method'), $Va3nq5n3hqmx);
				return FALSE;
			}

			$Vguwj0glq1zx[$Vvl2owq3ojca] = array($Va3nq5n3hqmx, $V5dsbozs5xhq);
		}

		
		foreach ($Vguwj0glq1zx as $Vvl2owq3ojca => $Vnq33mazgcxj)
		{
			log_message('debug', 'Migrating '.$V5dsbozs5xhq.' from version '.$Vctwfh5gqlbg.' to version '.$Vvl2owq3ojca);

			$Vnq33mazgcxj[0] = new $Vnq33mazgcxj[0];
			call_user_func($Vnq33mazgcxj);
			$Vctwfh5gqlbg = $Vvl2owq3ojca;
			$this->_update_version($Vctwfh5gqlbg);
		}

		
		
		if ($Vctwfh5gqlbg <> $Vjfnovktuuaw)
		{
			$Vctwfh5gqlbg = $Vjfnovktuuaw;
			$this->_update_version($Vctwfh5gqlbg);
		}

		log_message('debug', 'Finished migrating to '.$Vctwfh5gqlbg);
		return $Vctwfh5gqlbg;
	}

	

	
	public function latest()
	{
		$Vsusx1gt34md = $this->find_migrations();

		if (empty($Vsusx1gt34md))
		{
			$this->_error_string = $this->lang->line('migration_none_found');
			return FALSE;
		}

		$Vjat30bkne1v = basename(end($Vsusx1gt34md));

		
		
		return $this->version($this->_get_migration_number($Vjat30bkne1v));
	}

	

	
	public function current()
	{
		return $this->version($this->_migration_version);
	}

	

	
	public function error_string()
	{
		return $this->_error_string;
	}

	

	
	public function find_migrations()
	{
		$Vsusx1gt34md = array();

		
		foreach (glob($this->_migration_path.'*_*.php') as $Vligofq0fb34)
		{
			$Vaclaigdbtoo = basename($Vligofq0fb34, '.php');

			
			if (preg_match($this->_migration_regex, $Vaclaigdbtoo))
			{
				$Vvl2owq3ojca = $this->_get_migration_number($Vaclaigdbtoo);

				
				if (isset($Vsusx1gt34md[$Vvl2owq3ojca]))
				{
					$this->_error_string = sprintf($this->lang->line('migration_multiple_version'), $Vvl2owq3ojca);
					show_error($this->_error_string);
				}

				$Vsusx1gt34md[$Vvl2owq3ojca] = $Vligofq0fb34;
			}
		}

		ksort($Vsusx1gt34md);
		return $Vsusx1gt34md;
	}

	

	
	protected function _get_migration_number($Vnq33mazgcxj)
	{
		return sscanf($Vnq33mazgcxj, '%[0-9]+', $Vvl2owq3ojca)
			? $Vvl2owq3ojca : '0';
	}

	

	
	protected function _get_migration_name($Vnq33mazgcxj)
	{
		$Vxfb02ptgyna = explode('_', $Vnq33mazgcxj);
		array_shift($Vxfb02ptgyna);
		return implode('_', $Vxfb02ptgyna);
	}

	

	
	protected function _get_version()
	{
		$Vf3jo4nkd2sr = $this->db->select('version')->get($this->_migration_table)->row();
		return $Vf3jo4nkd2sr ? $Vf3jo4nkd2sr->version : '0';
	}

	

	
	protected function _update_version($Vnq33mazgcxj)
	{
		$this->db->update($this->_migration_table, array(
			'version' => $Vnq33mazgcxj
		));
	}

	

	
	public function __get($Vdpwtnkqupxa)
	{
		return get_instance()->$Vdpwtnkqupxa;
	}

}
