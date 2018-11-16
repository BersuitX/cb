<?php

defined('BASEPATH') OR exit('No direct script access allowed');


abstract class CI_DB_forge {

	
	protected $Vwensv4j4idw;

	
	public $Vmxl5tv5ktcc		= array();

	
	public $Vpgpnbxy5p5e		= array();

	
	public $V31yuocwcnfk	= array();

	
	public $Vwensv4j4idw_char_set	= '';

	

	
	protected $Vaejnnwb1m5n	= 'CREATE DATABASE %s';

	
	protected $Vm1ca03opd2u	= 'DROP DATABASE %s';

	
	protected $Vxi0iq13f1ad	= "%s %s (%s\n)";

	
	protected $Vxi0iq13f1ad_if	= 'CREATE TABLE IF NOT EXISTS';

	
	protected $Vxi0iq13f1ad_keys	= FALSE;

	
	protected $Vditquhzfbq4	= 'DROP TABLE IF EXISTS';

	
	protected $Vxmkjultibgc	= 'ALTER TABLE %s RENAME TO %s;';

	
	protected $Vvlk2zsqqzvw		= TRUE;

	
	protected $Vruso1q53jc2		= '';

	
	protected $Vmds0uhotuau		= ' DEFAULT ';

	

	
	public function __construct(&$Vwensv4j4idw)
	{
		$this->db =& $Vwensv4j4idw;
		log_message('info', 'Database Forge Class Initialized');
	}

	

	
	public function create_database($Vwensv4j4idw_name)
	{
		if ($this->_create_database === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}
		elseif ( ! $this->db->query(sprintf($this->_create_database, $Vwensv4j4idw_name, $this->db->char_set, $this->db->dbcollat)))
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unable_to_drop') : FALSE;
		}

		if ( ! empty($this->db->data_cache['db_names']))
		{
			$this->db->data_cache['db_names'][] = $Vwensv4j4idw_name;
		}

		return TRUE;
	}

	

	
	public function drop_database($Vwensv4j4idw_name)
	{
		if ($this->_drop_database === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}
		elseif ( ! $this->db->query(sprintf($this->_drop_database, $Vwensv4j4idw_name)))
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unable_to_drop') : FALSE;
		}

		if ( ! empty($this->db->data_cache['db_names']))
		{
			$V2xim30qek4u = array_search(strtolower($Vwensv4j4idw_name), array_map('strtolower', $this->db->data_cache['db_names']), TRUE);
			if ($V2xim30qek4u !== FALSE)
			{
				unset($this->db->data_cache['db_names'][$V2xim30qek4u]);
			}
		}

		return TRUE;
	}

	

	
	public function add_key($V2xim30qek4u, $V0rwip0llqvs = FALSE)
	{
		
		
		
		
		
		
		if ($V0rwip0llqvs === TRUE && is_array($V2xim30qek4u))
		{
			foreach ($V2xim30qek4u as $Vnducgjcgydm)
			{
				$this->add_key($Vnducgjcgydm, $V0rwip0llqvs);
			}

			return $this;
		}

		if ($V0rwip0llqvs === TRUE)
		{
			$this->primary_keys[] = $V2xim30qek4u;
		}
		else
		{
			$this->keys[] = $V2xim30qek4u;
		}

		return $this;
	}

	

	
	public function add_field($Vwji4rxkyw5j)
	{
		if (is_string($Vwji4rxkyw5j))
		{
			if ($Vwji4rxkyw5j === 'id')
			{
				$this->add_field(array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 9,
						'auto_increment' => TRUE
					)
				));
				$this->add_key('id', TRUE);
			}
			else
			{
				if (strpos($Vwji4rxkyw5j, ' ') === FALSE)
				{
					show_error('Field information is required for that operation.');
				}

				$this->fields[] = $Vwji4rxkyw5j;
			}
		}

		if (is_array($Vwji4rxkyw5j))
		{
			$this->fields = array_merge($this->fields, $Vwji4rxkyw5j);
		}

		return $this;
	}

	

	
	public function create_table($Vhyg2tjvah5t, $Vtbsr0efengr = FALSE, array $Vpkjdumwo4xn = array())
	{
		if ($Vhyg2tjvah5t === '')
		{
			show_error('A table name is required for that operation.');
		}
		else
		{
			$Vhyg2tjvah5t = $this->db->dbprefix.$Vhyg2tjvah5t;
		}

		if (count($this->fields) === 0)
		{
			show_error('Field information is required.');
		}

		$Vcusg10hsxxg = $this->_create_table($Vhyg2tjvah5t, $Vtbsr0efengr, $Vpkjdumwo4xn);

		if (is_bool($Vcusg10hsxxg))
		{
			$this->_reset();
			if ($Vcusg10hsxxg === FALSE)
			{
				return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
			}
		}

		if (($Voetc43kt2cr = $this->db->query($Vcusg10hsxxg)) !== FALSE)
		{
			empty($this->db->data_cache['table_names']) OR $this->db->data_cache['table_names'][] = $Vhyg2tjvah5t;

			
			if ( ! empty($this->keys))
			{
				for ($Vep0df0xosaw = 0, $Vcusg10hsxxgs = $this->_process_indexes($Vhyg2tjvah5t), $Vn2ycfau434s = count($Vcusg10hsxxgs); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
				{
					$this->db->query($Vcusg10hsxxgs[$Vep0df0xosaw]);
				}
			}
		}

		$this->_reset();
		return $Voetc43kt2cr;
	}

	

	
	protected function _create_table($Vhyg2tjvah5t, $Vtbsr0efengr, $Vpkjdumwo4xn)
	{
		if ($Vtbsr0efengr === TRUE && $this->_create_table_if === FALSE)
		{
			if ($this->db->table_exists($Vhyg2tjvah5t))
			{
				return TRUE;
			}
			else
			{
				$Vtbsr0efengr = FALSE;
			}
		}

		$Vcusg10hsxxg = ($Vtbsr0efengr)
			? sprintf($this->_create_table_if, $this->db->escape_identifiers($Vhyg2tjvah5t))
			: 'CREATE TABLE';

		$Vn2ycfau434solumns = $this->_process_fields(TRUE);
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vn2ycfau434solumns); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vn2ycfau434solumns[$Vep0df0xosaw] = ($Vn2ycfau434solumns[$Vep0df0xosaw]['_literal'] !== FALSE)
					? "\n\t".$Vn2ycfau434solumns[$Vep0df0xosaw]['_literal']
					: "\n\t".$this->_process_column($Vn2ycfau434solumns[$Vep0df0xosaw]);
		}

		$Vn2ycfau434solumns = implode(',', $Vn2ycfau434solumns)
				.$this->_process_primary_keys($Vhyg2tjvah5t);

		
		if ($this->_create_table_keys === TRUE)
		{
			$Vn2ycfau434solumns .= $this->_process_indexes($Vhyg2tjvah5t);
		}

		
		$Vcusg10hsxxg = sprintf($this->_create_table.'%s',
			$Vcusg10hsxxg,
			$this->db->escape_identifiers($Vhyg2tjvah5t),
			$Vn2ycfau434solumns,
			$this->_create_table_attr($Vpkjdumwo4xn)
		);

		return $Vcusg10hsxxg;
	}

	

	
	protected function _create_table_attr($Vpkjdumwo4xn)
	{
		$Vcusg10hsxxg = '';

		foreach (array_keys($Vpkjdumwo4xn) as $V2xim30qek4u)
		{
			if (is_string($V2xim30qek4u))
			{
				$Vcusg10hsxxg .= ' '.strtoupper($V2xim30qek4u).' '.$Vpkjdumwo4xn[$V2xim30qek4u];
			}
		}

		return $Vcusg10hsxxg;
	}

	

	
	public function drop_table($Vhyg2tjvah5t_name, $Vep0df0xosawf_exists = FALSE)
	{
		if ($Vhyg2tjvah5t_name === '')
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_table_name_required') : FALSE;
		}

		if (($Vfvggg0pmnws = $this->_drop_table($this->db->dbprefix.$Vhyg2tjvah5t_name, $Vep0df0xosawf_exists)) === TRUE)
		{
			return TRUE;
		}

		$Vfvggg0pmnws = $this->db->query($Vfvggg0pmnws);

		
		if ($Vfvggg0pmnws && ! empty($this->db->data_cache['table_names']))
		{
			$V2xim30qek4u = array_search(strtolower($this->db->dbprefix.$Vhyg2tjvah5t_name), array_map('strtolower', $this->db->data_cache['table_names']), TRUE);
			if ($V2xim30qek4u !== FALSE)
			{
				unset($this->db->data_cache['table_names'][$V2xim30qek4u]);
			}
		}

		return $Vfvggg0pmnws;
	}

	

	
	protected function _drop_table($Vhyg2tjvah5t, $Vep0df0xosawf_exists)
	{
		$Vcusg10hsxxg = 'DROP TABLE';

		if ($Vep0df0xosawf_exists)
		{
			if ($this->_drop_table_if === FALSE)
			{
				if ( ! $this->db->table_exists($Vhyg2tjvah5t))
				{
					return TRUE;
				}
			}
			else
			{
				$Vcusg10hsxxg = sprintf($this->_drop_table_if, $this->db->escape_identifiers($Vhyg2tjvah5t));
			}
		}

		return $Vcusg10hsxxg.' '.$this->db->escape_identifiers($Vhyg2tjvah5t);
	}

	

	
	public function rename_table($Vhyg2tjvah5t_name, $Vq51lrs4dmo1)
	{
		if ($Vhyg2tjvah5t_name === '' OR $Vq51lrs4dmo1 === '')
		{
			show_error('A table name is required for that operation.');
			return FALSE;
		}
		elseif ($this->_rename_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		$Voetc43kt2cr = $this->db->query(sprintf($this->_rename_table,
						$this->db->escape_identifiers($this->db->dbprefix.$Vhyg2tjvah5t_name),
						$this->db->escape_identifiers($this->db->dbprefix.$Vq51lrs4dmo1))
					);

		if ($Voetc43kt2cr && ! empty($this->db->data_cache['table_names']))
		{
			$V2xim30qek4u = array_search(strtolower($this->db->dbprefix.$Vhyg2tjvah5t_name), array_map('strtolower', $this->db->data_cache['table_names']), TRUE);
			if ($V2xim30qek4u !== FALSE)
			{
				$this->db->data_cache['table_names'][$V2xim30qek4u] = $this->db->dbprefix.$Vq51lrs4dmo1;
			}
		}

		return $Voetc43kt2cr;
	}

	

	
	public function add_column($Vhyg2tjvah5t, $Vwji4rxkyw5j, $V42jffykoks3 = NULL)
	{
		
		is_array($Vwji4rxkyw5j) OR $Vwji4rxkyw5j = array($Vwji4rxkyw5j);

		foreach (array_keys($Vwji4rxkyw5j) as $Vwyse0flpyxh)
		{
			
			if ($V42jffykoks3 !== NULL && is_array($Vwji4rxkyw5j[$Vwyse0flpyxh]) && ! isset($Vwji4rxkyw5j[$Vwyse0flpyxh]['after']))
			{
				$Vwji4rxkyw5j[$Vwyse0flpyxh]['after'] = $V42jffykoks3;
			}

			$this->add_field(array($Vwyse0flpyxh => $Vwji4rxkyw5j[$Vwyse0flpyxh]));
		}

		$Vcusg10hsxxgs = $this->_alter_table('ADD', $this->db->dbprefix.$Vhyg2tjvah5t, $this->_process_fields());
		$this->_reset();
		if ($Vcusg10hsxxgs === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vcusg10hsxxgs); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ($this->db->query($Vcusg10hsxxgs[$Vep0df0xosaw]) === FALSE)
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	

	
	public function drop_column($Vhyg2tjvah5t, $Vn2ycfau434solumn_name)
	{
		$Vcusg10hsxxg = $this->_alter_table('DROP', $this->db->dbprefix.$Vhyg2tjvah5t, $Vn2ycfau434solumn_name);
		if ($Vcusg10hsxxg === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		return $this->db->query($Vcusg10hsxxg);
	}

	

	
	public function modify_column($Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		
		is_array($Vwji4rxkyw5j) OR $Vwji4rxkyw5j = array($Vwji4rxkyw5j);

		foreach (array_keys($Vwji4rxkyw5j) as $Vwyse0flpyxh)
		{
			$this->add_field(array($Vwyse0flpyxh => $Vwji4rxkyw5j[$Vwyse0flpyxh]));
		}

		if (count($this->fields) === 0)
		{
			show_error('Field information is required.');
		}

		$Vcusg10hsxxgs = $this->_alter_table('CHANGE', $this->db->dbprefix.$Vhyg2tjvah5t, $this->_process_fields());
		$this->_reset();
		if ($Vcusg10hsxxgs === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vcusg10hsxxgs); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ($this->db->query($Vcusg10hsxxgs[$Vep0df0xosaw]) === FALSE)
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	

	
	protected function _alter_table($Vr5gy0qe5urt, $Vhyg2tjvah5t, $Vwji4rxkyw5j)
	{
		$Vcusg10hsxxg = 'ALTER TABLE '.$this->db->escape_identifiers($Vhyg2tjvah5t).' ';

		
		if ($Vr5gy0qe5urt === 'DROP')
		{
			return $Vcusg10hsxxg.'DROP COLUMN '.$this->db->escape_identifiers($Vwji4rxkyw5j);
		}

		$Vcusg10hsxxg .= ($Vr5gy0qe5urt === 'ADD')
			? 'ADD '
			: $Vr5gy0qe5urt.' COLUMN ';

		$Vcusg10hsxxgs = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwji4rxkyw5j); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vcusg10hsxxgs[] = $Vcusg10hsxxg
				.($Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] !== FALSE ? $Vwji4rxkyw5j[$Vep0df0xosaw]['_literal'] : $this->_process_column($Vwji4rxkyw5j[$Vep0df0xosaw]));
		}

		return $Vcusg10hsxxgs;
	}

	

	
	protected function _process_fields($Vn2ycfau434sreate_table = FALSE)
	{
		$Vmxl5tv5ktcc = array();

		foreach ($this->fields as $V2xim30qek4u => $Vpkjdumwo4xn)
		{
			if (is_int($V2xim30qek4u) && ! is_array($Vpkjdumwo4xn))
			{
				$Vmxl5tv5ktcc[] = array('_literal' => $Vpkjdumwo4xn);
				continue;
			}

			$Vpkjdumwo4xn = array_change_key_case($Vpkjdumwo4xn, CASE_UPPER);

			if ($Vn2ycfau434sreate_table === TRUE && empty($Vpkjdumwo4xn['TYPE']))
			{
				continue;
			}

			isset($Vpkjdumwo4xn['TYPE']) && $this->_attr_type($Vpkjdumwo4xn);

			$Vwji4rxkyw5j = array(
				'name'			=> $V2xim30qek4u,
				'new_name'		=> isset($Vpkjdumwo4xn['NAME']) ? $Vpkjdumwo4xn['NAME'] : NULL,
				'type'			=> isset($Vpkjdumwo4xn['TYPE']) ? $Vpkjdumwo4xn['TYPE'] : NULL,
				'length'		=> '',
				'unsigned'		=> '',
				'null'			=> '',
				'unique'		=> '',
				'default'		=> '',
				'auto_increment'	=> '',
				'_literal'		=> FALSE
			);

			isset($Vpkjdumwo4xn['TYPE']) && $this->_attr_unsigned($Vpkjdumwo4xn, $Vwji4rxkyw5j);

			if ($Vn2ycfau434sreate_table === FALSE)
			{
				if (isset($Vpkjdumwo4xn['AFTER']))
				{
					$Vwji4rxkyw5j['after'] = $Vpkjdumwo4xn['AFTER'];
				}
				elseif (isset($Vpkjdumwo4xn['FIRST']))
				{
					$Vwji4rxkyw5j['first'] = (bool) $Vpkjdumwo4xn['FIRST'];
				}
			}

			$this->_attr_default($Vpkjdumwo4xn, $Vwji4rxkyw5j);

			if (isset($Vpkjdumwo4xn['NULL']))
			{
				if ($Vpkjdumwo4xn['NULL'] === TRUE)
				{
					$Vwji4rxkyw5j['null'] = empty($this->_null) ? '' : ' '.$this->_null;
				}
				else
				{
					$Vwji4rxkyw5j['null'] = ' NOT NULL';
				}
			}
			elseif ($Vn2ycfau434sreate_table === TRUE)
			{
				$Vwji4rxkyw5j['null'] = ' NOT NULL';
			}

			$this->_attr_auto_increment($Vpkjdumwo4xn, $Vwji4rxkyw5j);
			$this->_attr_unique($Vpkjdumwo4xn, $Vwji4rxkyw5j);

			if (isset($Vpkjdumwo4xn['COMMENT']))
			{
				$Vwji4rxkyw5j['comment'] = $this->db->escape($Vpkjdumwo4xn['COMMENT']);
			}

			if (isset($Vpkjdumwo4xn['TYPE']) && ! empty($Vpkjdumwo4xn['CONSTRAINT']))
			{
				switch (strtoupper($Vpkjdumwo4xn['TYPE']))
				{
					case 'ENUM':
					case 'SET':
						$Vpkjdumwo4xn['CONSTRAINT'] = $this->db->escape($Vpkjdumwo4xn['CONSTRAINT']);
					default:
						$Vwji4rxkyw5j['length'] = is_array($Vpkjdumwo4xn['CONSTRAINT'])
							? '('.implode(',', $Vpkjdumwo4xn['CONSTRAINT']).')'
							: '('.$Vpkjdumwo4xn['CONSTRAINT'].')';
						break;
				}
			}

			$Vmxl5tv5ktcc[] = $Vwji4rxkyw5j;
		}

		return $Vmxl5tv5ktcc;
	}

	

	
	protected function _process_column($Vwji4rxkyw5j)
	{
		return $this->db->escape_identifiers($Vwji4rxkyw5j['name'])
			.' '.$Vwji4rxkyw5j['type'].$Vwji4rxkyw5j['length']
			.$Vwji4rxkyw5j['unsigned']
			.$Vwji4rxkyw5j['default']
			.$Vwji4rxkyw5j['null']
			.$Vwji4rxkyw5j['auto_increment']
			.$Vwji4rxkyw5j['unique'];
	}

	

	
	protected function _attr_type(&$Vpkjdumwo4xn)
	{
		
	}

	

	
	protected function _attr_unsigned(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if (empty($Vpkjdumwo4xn['UNSIGNED']) OR $Vpkjdumwo4xn['UNSIGNED'] !== TRUE)
		{
			return;
		}

		
		$Vpkjdumwo4xn['UNSIGNED'] = FALSE;

		if (is_array($this->_unsigned))
		{
			foreach (array_keys($this->_unsigned) as $V2xim30qek4u)
			{
				if (is_int($V2xim30qek4u) && strcasecmp($Vpkjdumwo4xn['TYPE'], $this->_unsigned[$V2xim30qek4u]) === 0)
				{
					$Vwji4rxkyw5j['unsigned'] = ' UNSIGNED';
					return;
				}
				elseif (is_string($V2xim30qek4u) && strcasecmp($Vpkjdumwo4xn['TYPE'], $V2xim30qek4u) === 0)
				{
					$Vwji4rxkyw5j['type'] = $V2xim30qek4u;
					return;
				}
			}

			return;
		}

		$Vwji4rxkyw5j['unsigned'] = ($this->_unsigned === TRUE) ? ' UNSIGNED' : '';
	}

	

	
	protected function _attr_default(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ($this->_default === FALSE)
		{
			return;
		}

		if (array_key_exists('DEFAULT', $Vpkjdumwo4xn))
		{
			if ($Vpkjdumwo4xn['DEFAULT'] === NULL)
			{
				$Vwji4rxkyw5j['default'] = empty($this->_null) ? '' : $this->_default.$this->_null;

				
				$Vpkjdumwo4xn['NULL'] = TRUE;
				$Vwji4rxkyw5j['null'] = empty($this->_null) ? '' : ' '.$this->_null;
			}
			else
			{
				$Vwji4rxkyw5j['default'] = $this->_default.$this->db->escape($Vpkjdumwo4xn['DEFAULT']);
			}
		}
	}

	

	
	protected function _attr_unique(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['UNIQUE']) && $Vpkjdumwo4xn['UNIQUE'] === TRUE)
		{
			$Vwji4rxkyw5j['unique'] = ' UNIQUE';
		}
	}

	

	
	protected function _attr_auto_increment(&$Vpkjdumwo4xn, &$Vwji4rxkyw5j)
	{
		if ( ! empty($Vpkjdumwo4xn['AUTO_INCREMENT']) && $Vpkjdumwo4xn['AUTO_INCREMENT'] === TRUE && stripos($Vwji4rxkyw5j['type'], 'int') !== FALSE)
		{
			$Vwji4rxkyw5j['auto_increment'] = ' AUTO_INCREMENT';
		}
	}

	

	
	protected function _process_primary_keys($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxg = '';

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->primary_keys); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ( ! isset($this->fields[$this->primary_keys[$Vep0df0xosaw]]))
			{
				unset($this->primary_keys[$Vep0df0xosaw]);
			}
		}

		if (count($this->primary_keys) > 0)
		{
			$Vcusg10hsxxg .= ",\n\tCONSTRAINT ".$this->db->escape_identifiers('pk_'.$Vhyg2tjvah5t)
				.' PRIMARY KEY('.implode(', ', $this->db->escape_identifiers($this->primary_keys)).')';
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _process_indexes($Vhyg2tjvah5t)
	{
		$Vcusg10hsxxgs = array();

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

			$Vcusg10hsxxgs[] = 'CREATE INDEX '.$this->db->escape_identifiers($Vhyg2tjvah5t.'_'.implode('_', $this->keys[$Vep0df0xosaw]))
				.' ON '.$this->db->escape_identifiers($Vhyg2tjvah5t)
				.' ('.implode(', ', $this->db->escape_identifiers($this->keys[$Vep0df0xosaw])).');';
		}

		return $Vcusg10hsxxgs;
	}

	

	
	protected function _reset()
	{
		$this->fields = $this->keys = $this->primary_keys = array();
	}

}
