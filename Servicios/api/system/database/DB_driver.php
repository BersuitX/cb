<?php

defined('BASEPATH') OR exit('No direct script access allowed');


abstract class CI_DB_driver {

	
	public $Vcuebtfasl53;

	
	public $Vlukz41rasa4;

	
	public $Vpkw0q5n2gpv;

	
	public $Vetnqbj4ssyj;

	
	public $Vvfjs0vadwyn;

	
	public $V4toindljvfg		= 'mysqli';

	
	public $Vr4kabix5fal;

	
	public $Vbwrhtps4gk1		= '';

	
	public $Vdeiskd1jag4		= 'utf8';

	
	public $Vkyj1y3a24if		= 'utf8_general_ci';

	
	public $Vgwqrwnps4od			= FALSE;

	
	public $Veyksd05ll4x		= '';

	
	public $Vi23rpcbpupy			= '';

	
	public $Vk4qrwblgwzh		= FALSE;

	
	public $Viv0fs0wvdfd			= FALSE;

	
	public $Visuet3dnhtv		= FALSE;

	
	public $Vtemwhpprbwn		= FALSE;

	
	public $Vkebr2obigaw		= 0;

	
	public $Vayfaf1g3nk0		= 0;

	
	public $Vc0tugu0tw0c		= '?';

	
	public $Vhaifarrvqlf		= TRUE;

	
	public $Vuacynrqia2u			= array();

	
	public $V4a0ht3aujgp		= array();

	
	public $Voe5agbubvhv		= array();

	
	public $Vae2fybybgg3		= TRUE;

	
	public $Vf0i2qcxxkoi		= TRUE;

	
	protected $Vdv2re3rejre		= 0;

	
	protected $Vtryzces3ces	= TRUE;

	
	protected $Vkamhffccihw	= FALSE;

	
	public $Vz1zi3biwk53		= FALSE;

	
	public $Va4darmwziat		= '';

	
	public $Vnk1xhlbfkvy		= FALSE;

	
	public $V3htaijakfv3;

	
	protected $Vddekuctiysi		= TRUE;

	
	protected $Vnuagy5i3hbl	= array('*');

	
	protected $Vnm3z344krng = '"';

	
	protected $Vrjisyvepiwz = " ESCAPE '%s' ";

	
	protected $V3ciagyfoawr = '!';

	
	protected $Vbqls34cvlhv = array('RAND()', 'RAND(%d)');

	
	protected $V54rf2cloc2q = 'SELECT COUNT(*) AS ';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		if (is_array($Vpz5i5lfmwft))
		{
			foreach ($Vpz5i5lfmwft as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$this->$V2xim30qek4u = $Va4zo0rltynr;
			}
		}

		log_message('info', 'Database Driver Class Initialized');
	}

	

	
	public function initialize()
	{
		
		if ($this->conn_id)
		{
			return TRUE;
		}

		

		
		$this->conn_id = $this->db_connect($this->pconnect);

		
		if ( ! $this->conn_id)
		{
			
			if ( ! empty($this->failover) && is_array($this->failover))
			{
				
				foreach ($this->failover as $Vhttcs0cn5hn)
				{
					
					foreach ($Vhttcs0cn5hn as $V2xim30qek4u => $Va4zo0rltynr)
					{
						$this->$V2xim30qek4u = $Va4zo0rltynr;
					}

					
					$this->conn_id = $this->db_connect($this->pconnect);

					
					if ($this->conn_id)
					{
						break;
					}
				}
			}

			
			if ( ! $this->conn_id)
			{
				log_message('error', 'Unable to connect to the database');

				if ($this->db_debug)
				{
					$this->display_error('db_unable_to_connect');
				}

				return FALSE;
			}
		}

		
		return $this->db_set_charset($this->char_set);
	}

	

	
	public function db_connect()
	{
		return TRUE;
	}

	

	
	public function db_pconnect()
	{
		return $this->db_connect(TRUE);
	}

	

	
	public function reconnect()
	{
	}

	

	
	public function db_select()
	{
		return TRUE;
	}

	

	
	public function error()
	{
		return array('code' => NULL, 'message' => NULL);
	}

	

	
	public function db_set_charset($Vwxuqfbo3r2c)
	{
		if (method_exists($this, '_db_set_charset') && ! $this->_db_set_charset($Vwxuqfbo3r2c))
		{
			log_message('error', 'Unable to set database connection charset: '.$Vwxuqfbo3r2c);

			if ($this->db_debug)
			{
				$this->display_error('db_unable_to_set_charset', $Vwxuqfbo3r2c);
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function platform()
	{
		return $this->dbdriver;
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if (FALSE === ($Vcusg10hsxxg = $this->_version()))
		{
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		$Vfvggg0pmnws = $this->query($Vcusg10hsxxg)->row();
		return $this->data_cache['version'] = $Vfvggg0pmnws->ver;
	}

	

	
	protected function _version()
	{
		return 'SELECT VERSION() AS ver';
	}

	

	
	public function query($Vcusg10hsxxg, $Vbtcvzv314lb = FALSE, $Vsvxhmw4dq2i = NULL)
	{
		if ($Vcusg10hsxxg === '')
		{
			log_message('error', 'Invalid query: '.$Vcusg10hsxxg);
			return ($this->db_debug) ? $this->display_error('db_invalid_query') : FALSE;
		}
		elseif ( ! is_bool($Vsvxhmw4dq2i))
		{
			$Vsvxhmw4dq2i = ! $this->is_write_type($Vcusg10hsxxg);
		}

		
		if ($this->dbprefix !== '' && $this->swap_pre !== '' && $this->dbprefix !== $this->swap_pre)
		{
			$Vcusg10hsxxg = preg_replace('/(\W)'.$this->swap_pre.'(\S+?)/', '\\1'.$this->dbprefix.'\\2', $Vcusg10hsxxg);
		}

		
		if ($Vbtcvzv314lb !== FALSE)
		{
			$Vcusg10hsxxg = $this->compile_binds($Vcusg10hsxxg, $Vbtcvzv314lb);
		}

		
		
		
		if ($this->cache_on === TRUE && $Vsvxhmw4dq2i === TRUE && $this->_cache_init())
		{
			$this->load_rdriver();
			if (FALSE !== ($V3s3udll3yyb = $this->CACHE->read($Vcusg10hsxxg)))
			{
				return $V3s3udll3yyb;
			}
		}

		
		if ($this->save_queries === TRUE)
		{
			$this->queries[] = $Vcusg10hsxxg;
		}

		
		$Vuperm1li2lu = microtime(TRUE);

		
		if (FALSE === ($this->result_id = $this->simple_query($Vcusg10hsxxg)))
		{
			if ($this->save_queries === TRUE)
			{
				$this->query_times[] = 0;
			}

			
			if ($this->_trans_depth !== 0)
			{
				$this->_trans_status = FALSE;
			}

			
			$Veqekzxyjyqy = $this->error();

			
			log_message('error', 'Query error: '.$Veqekzxyjyqy['message'].' - Invalid query: '.$Vcusg10hsxxg);

			if ($this->db_debug)
			{
				
				
				
				
				while ($this->_trans_depth !== 0)
				{
					$Vpzajp2nuzk2 = $this->_trans_depth;
					$this->trans_complete();
					if ($Vpzajp2nuzk2 === $this->_trans_depth)
					{
						log_message('error', 'Database: Failure during an automated transaction commit/rollback!');
						break;
					}
				}

				
				return $this->display_error(array('Error Number: '.$Veqekzxyjyqy['code'], $Veqekzxyjyqy['message'], $Vcusg10hsxxg));
			}

			return FALSE;
		}

		
		$Ve2oo0hirgkk = microtime(TRUE);
		$this->benchmark += $Ve2oo0hirgkk - $Vuperm1li2lu;

		if ($this->save_queries === TRUE)
		{
			$this->query_times[] = $Ve2oo0hirgkk - $Vuperm1li2lu;
		}

		
		$this->query_count++;

		
		if ($Vsvxhmw4dq2i !== TRUE)
		{
			
			if ($this->cache_on === TRUE && $this->cache_autodel === TRUE && $this->_cache_init())
			{
				$this->CACHE->delete();
			}

			return TRUE;
		}

		
		$Vxanpyuscvfx		= $this->load_rdriver();
		$Vintl5vxspqw		= new $Vxanpyuscvfx($this);

		
		
		if ($this->cache_on === TRUE && $this->_cache_init())
		{
			
			
			
			
			
			
			$Vtbq5jlzyijy = new CI_DB_result($this);
			$Vtbq5jlzyijy->result_object	= $Vintl5vxspqw->result_object();
			$Vtbq5jlzyijy->result_array	= $Vintl5vxspqw->result_array();
			$Vtbq5jlzyijy->num_rows		= $Vintl5vxspqw->num_rows();

			
			$Vtbq5jlzyijy->conn_id		= NULL;
			$Vtbq5jlzyijy->result_id		= NULL;

			$this->CACHE->write($Vcusg10hsxxg, $Vtbq5jlzyijy);
		}

		return $Vintl5vxspqw;
	}

	

	
	public function load_rdriver()
	{
		$Vxanpyuscvfx = 'CI_DB_'.$this->dbdriver.'_result';

		if ( ! class_exists($Vxanpyuscvfx, FALSE))
		{
			require_once(BASEPATH.'database/DB_result.php');
			require_once(BASEPATH.'database/drivers/'.$this->dbdriver.'/'.$this->dbdriver.'_result.php');
		}

		return $Vxanpyuscvfx;
	}

	

	
	public function simple_query($Vcusg10hsxxg)
	{
		if ( ! $this->conn_id)
		{
			if ( ! $this->initialize())
			{
				return FALSE;
			}
		}

		return $this->_execute($Vcusg10hsxxg);
	}

	

	
	public function trans_off()
	{
		$this->trans_enabled = FALSE;
	}

	

	
	public function trans_strict($V4wgu3onvlab = TRUE)
	{
		$this->trans_strict = is_bool($V4wgu3onvlab) ? $V4wgu3onvlab : TRUE;
	}

	

	
	public function trans_start($Vsqizfiijvz1 = FALSE)
	{
		if ( ! $this->trans_enabled)
		{
			return FALSE;
		}

		return $this->trans_begin($Vsqizfiijvz1);
	}

	

	
	public function trans_complete()
	{
		if ( ! $this->trans_enabled)
		{
			return FALSE;
		}

		
		if ($this->_trans_status === FALSE OR $this->_trans_failure === TRUE)
		{
			$this->trans_rollback();

			
			
			
			if ($this->trans_strict === FALSE)
			{
				$this->_trans_status = TRUE;
			}

			log_message('debug', 'DB Transaction Failure');
			return FALSE;
		}

		return $this->trans_commit();
	}

	

	
	public function trans_status()
	{
		return $this->_trans_status;
	}

	

	
	public function trans_begin($Vsqizfiijvz1 = FALSE)
	{
		if ( ! $this->trans_enabled)
		{
			return FALSE;
		}
		
		elseif ($this->_trans_depth > 0)
		{
			$this->_trans_depth++;
			return TRUE;
		}

		
		
		
		$this->_trans_failure = ($Vsqizfiijvz1 === TRUE);

		if ($this->_trans_begin())
		{
			$this->_trans_depth++;
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function trans_commit()
	{
		if ( ! $this->trans_enabled OR $this->_trans_depth === 0)
		{
			return FALSE;
		}
		
		elseif ($this->_trans_depth > 1 OR $this->_trans_commit())
		{
			$this->_trans_depth--;
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function trans_rollback()
	{
		if ( ! $this->trans_enabled OR $this->_trans_depth === 0)
		{
			return FALSE;
		}
		
		elseif ($this->_trans_depth > 1 OR $this->_trans_rollback())
		{
			$this->_trans_depth--;
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function compile_binds($Vcusg10hsxxg, $Vbtcvzv314lb)
	{
		if (empty($Vbtcvzv314lb) OR empty($this->bind_marker) OR strpos($Vcusg10hsxxg, $this->bind_marker) === FALSE)
		{
			return $Vcusg10hsxxg;
		}
		elseif ( ! is_array($Vbtcvzv314lb))
		{
			$Vbtcvzv314lb = array($Vbtcvzv314lb);
			$Vxstr4emubdr = 1;
		}
		else
		{
			
			$Vbtcvzv314lb = array_values($Vbtcvzv314lb);
			$Vxstr4emubdr = count($Vbtcvzv314lb);
		}

		
		$Vrmhmwo10luw = strlen($this->bind_marker);

		
		if ($Vn2ycfau434s = preg_match_all("/'[^']*'/i", $Vcusg10hsxxg, $Vmbknpbfqa1s))
		{
			$Vn2ycfau434s = preg_match_all('/'.preg_quote($this->bind_marker, '/').'/i',
				str_replace($Vmbknpbfqa1s[0],
					str_replace($this->bind_marker, str_repeat(' ', $Vrmhmwo10luw), $Vmbknpbfqa1s[0]),
					$Vcusg10hsxxg, $Vn2ycfau434s),
				$Vmbknpbfqa1s, PREG_OFFSET_CAPTURE);

			
			if ($Vxstr4emubdr !== $Vn2ycfau434s)
			{
				return $Vcusg10hsxxg;
			}
		}
		elseif (($Vn2ycfau434s = preg_match_all('/'.preg_quote($this->bind_marker, '/').'/i', $Vcusg10hsxxg, $Vmbknpbfqa1s, PREG_OFFSET_CAPTURE)) !== $Vxstr4emubdr)
		{
			return $Vcusg10hsxxg;
		}

		do
		{
			$Vn2ycfau434s--;
			$Vssyu1xyiqqd = $this->escape($Vbtcvzv314lb[$Vn2ycfau434s]);
			if (is_array($Vssyu1xyiqqd))
			{
				$Vssyu1xyiqqd = '('.implode(',', $Vssyu1xyiqqd).')';
			}
			$Vcusg10hsxxg = substr_replace($Vcusg10hsxxg, $Vssyu1xyiqqd, $Vmbknpbfqa1s[0][$Vn2ycfau434s][1], $Vrmhmwo10luw);
		}
		while ($Vn2ycfau434s !== 0);

		return $Vcusg10hsxxg;
	}

	

	
	public function is_write_type($Vcusg10hsxxg)
	{
		return (bool) preg_match('/^\s*"?(SET|INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|TRUNCATE|LOAD|COPY|ALTER|RENAME|GRANT|REVOKE|LOCK|UNLOCK|REINDEX)\s/i', $Vcusg10hsxxg);
	}

	

	
	public function elapsed_time($Vzigvlwjgbxk = 6)
	{
		return number_format($this->benchmark, $Vzigvlwjgbxk);
	}

	

	
	public function total_queries()
	{
		return $this->query_count;
	}

	

	
	public function last_query()
	{
		return end($this->queries);
	}

	

	
	public function escape($Vssdjb5oqaky)
	{
		if (is_array($Vssdjb5oqaky))
		{
			$Vssdjb5oqaky = array_map(array(&$this, 'escape'), $Vssdjb5oqaky);
			return $Vssdjb5oqaky;
		}
		elseif (is_string($Vssdjb5oqaky) OR (is_object($Vssdjb5oqaky) && method_exists($Vssdjb5oqaky, '__toString')))
		{
			return "'".$this->escape_str($Vssdjb5oqaky)."'";
		}
		elseif (is_bool($Vssdjb5oqaky))
		{
			return ($Vssdjb5oqaky === FALSE) ? 0 : 1;
		}
		elseif ($Vssdjb5oqaky === NULL)
		{
			return 'NULL';
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function escape_str($Vssdjb5oqaky, $Vjkxzsn4n4li = FALSE)
	{
		if (is_array($Vssdjb5oqaky))
		{
			foreach ($Vssdjb5oqaky as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vssdjb5oqaky[$V2xim30qek4u] = $this->escape_str($Va4zo0rltynr, $Vjkxzsn4n4li);
			}

			return $Vssdjb5oqaky;
		}

		$Vssdjb5oqaky = $this->_escape_str($Vssdjb5oqaky);

		
		if ($Vjkxzsn4n4li === TRUE)
		{
			return str_replace(
				array($this->_like_escape_chr, '%', '_'),
				array($this->_like_escape_chr.$this->_like_escape_chr, $this->_like_escape_chr.'%', $this->_like_escape_chr.'_'),
				$Vssdjb5oqaky
			);
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function escape_like_str($Vssdjb5oqaky)
	{
		return $this->escape_str($Vssdjb5oqaky, TRUE);
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return str_replace("'", "''", remove_invisible_characters($Vssdjb5oqaky));
	}

	

	
	public function primary($Vhyg2tjvah5t)
	{
		$Vmxl5tv5ktcc = $this->list_fields($Vhyg2tjvah5t);
		return is_array($Vmxl5tv5ktcc) ? current($Vmxl5tv5ktcc) : FALSE;
	}

	

	
	public function count_all($Vhyg2tjvah5t = '')
	{
		if ($Vhyg2tjvah5t === '')
		{
			return 0;
		}

		$Vfvggg0pmnws = $this->query($this->_count_string.$this->escape_identifiers('numrows').' FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE));
		if ($Vfvggg0pmnws->num_rows() === 0)
		{
			return 0;
		}

		$Vfvggg0pmnws = $Vfvggg0pmnws->row();
		$this->_reset_select();
		return (int) $Vfvggg0pmnws->numrows;
	}

	

	
	public function list_tables($Vn2ycfau434sonstrain_by_prefix = FALSE)
	{
		
		if (isset($this->data_cache['table_names']))
		{
			return $this->data_cache['table_names'];
		}

		if (FALSE === ($Vcusg10hsxxg = $this->_list_tables($Vn2ycfau434sonstrain_by_prefix)))
		{
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		$this->data_cache['table_names'] = array();
		$Vfvggg0pmnws = $this->query($Vcusg10hsxxg);

		foreach ($Vfvggg0pmnws->result_array() as $Vf3jo4nkd2sr)
		{
			
			if ( ! isset($V2xim30qek4u))
			{
				if (isset($Vf3jo4nkd2sr['table_name']))
				{
					$V2xim30qek4u = 'table_name';
				}
				elseif (isset($Vf3jo4nkd2sr['TABLE_NAME']))
				{
					$V2xim30qek4u = 'TABLE_NAME';
				}
				else
				{
					
					$V2xim30qek4u = array_keys($Vf3jo4nkd2sr);
					$V2xim30qek4u = array_shift($V2xim30qek4u);
				}
			}

			$this->data_cache['table_names'][] = $Vf3jo4nkd2sr[$V2xim30qek4u];
		}

		return $this->data_cache['table_names'];
	}

	

	
	public function table_exists($Vhyg2tjvah5t_name)
	{
		return in_array($this->protect_identifiers($Vhyg2tjvah5t_name, TRUE, FALSE, FALSE), $this->list_tables());
	}

	

	
	public function list_fields($Vhyg2tjvah5t)
	{
		
		if (isset($this->data_cache['field_names'][$Vhyg2tjvah5t]))
		{
			return $this->data_cache['field_names'][$Vhyg2tjvah5t];
		}

		if (FALSE === ($Vcusg10hsxxg = $this->_list_columns($Vhyg2tjvah5t)))
		{
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		$Vfvggg0pmnws = $this->query($Vcusg10hsxxg);
		$this->data_cache['field_names'][$Vhyg2tjvah5t] = array();

		foreach ($Vfvggg0pmnws->result_array() as $Vf3jo4nkd2sr)
		{
			
			if ( ! isset($V2xim30qek4u))
			{
				if (isset($Vf3jo4nkd2sr['column_name']))
				{
					$V2xim30qek4u = 'column_name';
				}
				elseif (isset($Vf3jo4nkd2sr['COLUMN_NAME']))
				{
					$V2xim30qek4u = 'COLUMN_NAME';
				}
				else
				{
					
					$V2xim30qek4u = key($Vf3jo4nkd2sr);
				}
			}

			$this->data_cache['field_names'][$Vhyg2tjvah5t][] = $Vf3jo4nkd2sr[$V2xim30qek4u];
		}

		return $this->data_cache['field_names'][$Vhyg2tjvah5t];
	}

	

	
	public function field_exists($Vws5kyblaaxj, $Vhyg2tjvah5t_name)
	{
		return in_array($Vws5kyblaaxj, $this->list_fields($Vhyg2tjvah5t_name));
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		$Vfvggg0pmnws = $this->query($this->_field_data($this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE)));
		return ($Vfvggg0pmnws) ? $Vfvggg0pmnws->field_data() : FALSE;
	}

	

	
	public function escape_identifiers($Vutaiebycwbq)
	{
		if ($this->_escape_char === '' OR empty($Vutaiebycwbq) OR in_array($Vutaiebycwbq, $this->_reserved_identifiers))
		{
			return $Vutaiebycwbq;
		}
		elseif (is_array($Vutaiebycwbq))
		{
			foreach ($Vutaiebycwbq as $V2xim30qek4u => $Va4zo0rltynrue)
			{
				$Vutaiebycwbq[$V2xim30qek4u] = $this->escape_identifiers($Va4zo0rltynrue);
			}

			return $Vutaiebycwbq;
		}
		
		elseif (ctype_digit($Vutaiebycwbq) OR $Vutaiebycwbq[0] === "'" OR ($this->_escape_char !== '"' && $Vutaiebycwbq[0] === '"') OR strpos($Vutaiebycwbq, '(') !== FALSE)
		{
			return $Vutaiebycwbq;
		}

		static $Vjunqqu5hbfy = array();

		if (empty($Vjunqqu5hbfy))
		{
			if (is_array($this->_escape_char))
			{
				$Vjunqqu5hbfy = array(
					preg_quote($this->_escape_char[0], '/'),
					preg_quote($this->_escape_char[1], '/'),
					$this->_escape_char[0],
					$this->_escape_char[1]
				);
			}
			else
			{
				$Vjunqqu5hbfy[0] = $Vjunqqu5hbfy[1] = preg_quote($this->_escape_char, '/');
				$Vjunqqu5hbfy[2] = $Vjunqqu5hbfy[3] = $this->_escape_char;
			}
		}

		foreach ($this->_reserved_identifiers as $Vdrzyozqxvbr)
		{
			if (strpos($Vutaiebycwbq, '.'.$Vdrzyozqxvbr) !== FALSE)
			{
				return preg_replace('/'.$Vjunqqu5hbfy[0].'?([^'.$Vjunqqu5hbfy[1].'\.]+)'.$Vjunqqu5hbfy[1].'?\./i', $Vjunqqu5hbfy[2].'$1'.$Vjunqqu5hbfy[3].'.', $Vutaiebycwbq);
			}
		}

		return preg_replace('/'.$Vjunqqu5hbfy[0].'?([^'.$Vjunqqu5hbfy[1].'\.]+)'.$Vjunqqu5hbfy[1].'?(\.)?/i', $Vjunqqu5hbfy[2].'$1'.$Vjunqqu5hbfy[3].'$2', $Vutaiebycwbq);
	}

	

	
	public function insert_string($Vhyg2tjvah5t, $Vfeinw1hsfej)
	{
		$Vmxl5tv5ktcc = $Va4zo0rltynrues = array();

		foreach ($Vfeinw1hsfej as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vmxl5tv5ktcc[] = $this->escape_identifiers($V2xim30qek4u);
			$Va4zo0rltynrues[] = $this->escape($Va4zo0rltynr);
		}

		return $this->_insert($this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE), $Vmxl5tv5ktcc, $Va4zo0rltynrues);
	}

	

	
	protected function _insert($Vhyg2tjvah5t, $V2xim30qek4us, $Va4zo0rltynrues)
	{
		return 'INSERT INTO '.$Vhyg2tjvah5t.' ('.implode(', ', $V2xim30qek4us).') VALUES ('.implode(', ', $Va4zo0rltynrues).')';
	}

	

	
	public function update_string($Vhyg2tjvah5t, $Vfeinw1hsfej, $Vutq5hwyqsvw)
	{
		if (empty($Vutq5hwyqsvw))
		{
			return FALSE;
		}

		$this->where($Vutq5hwyqsvw);

		$Vmxl5tv5ktcc = array();
		foreach ($Vfeinw1hsfej as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vmxl5tv5ktcc[$this->protect_identifiers($V2xim30qek4u)] = $this->escape($Va4zo0rltynr);
		}

		$Vcusg10hsxxg = $this->_update($this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE), $Vmxl5tv5ktcc);
		$this->_reset_write();
		return $Vcusg10hsxxg;
	}

	

	
	protected function _update($Vhyg2tjvah5t, $Va4zo0rltynrues)
	{
		foreach ($Va4zo0rltynrues as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Va4zo0rltynrstr[] = $V2xim30qek4u.' = '.$Va4zo0rltynr;
		}

		return 'UPDATE '.$Vhyg2tjvah5t.' SET '.implode(', ', $Va4zo0rltynrstr)
			.$this->_compile_wh('qb_where')
			.$this->_compile_order_by()
			.($this->qb_limit ? ' LIMIT '.$this->qb_limit : '');
	}

	

	
	protected function _has_operator($Vssdjb5oqaky)
	{
		return (bool) preg_match('/(<|>|!|=|\sIS NULL|\sIS NOT NULL|\sEXISTS|\sBETWEEN|\sLIKE|\sIN\s*\(|\s)/i', trim($Vssdjb5oqaky));
	}

	

	
	protected function _get_operator($Vssdjb5oqaky)
	{
		static $V0tndmhtromr;

		if (empty($V0tndmhtromr))
		{
			$Vskdqn3l2ois = ($this->_like_escape_str !== '')
				? '\s+'.preg_quote(trim(sprintf($this->_like_escape_str, $this->_like_escape_chr)), '/')
				: '';
			$V0tndmhtromr = array(
				'\s*(?:<|>|!)?=\s*',             
				'\s*<>?\s*',                     
				'\s*>\s*',                       
				'\s+IS NULL',                    
				'\s+IS NOT NULL',                
				'\s+EXISTS\s*\(.*\)',        
				'\s+NOT EXISTS\s*\(.*\)',    
				'\s+BETWEEN\s+',                 
				'\s+IN\s*\(.*\)',            
				'\s+NOT IN\s*\(.*\)',        
				'\s+LIKE\s+\S.*('.$Vskdqn3l2ois.')?',    
				'\s+NOT LIKE\s+\S.*('.$Vskdqn3l2ois.')?' 
			);

		}

		return preg_match('/'.implode('|', $V0tndmhtromr).'/i', $Vssdjb5oqaky, $V4uvjtwtgjvp)
			? $V4uvjtwtgjvp[0] : FALSE;
	}

	

	
	public function call_function($V5mhcgfyfeif)
	{
		$Vxanpyuscvfx = ($this->dbdriver === 'postgre') ? 'pg_' : $this->dbdriver.'_';

		if (FALSE === strpos($Vxanpyuscvfx, $V5mhcgfyfeif))
		{
			$V5mhcgfyfeif = $Vxanpyuscvfx.$V5mhcgfyfeif;
		}

		if ( ! function_exists($V5mhcgfyfeif))
		{
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		return (func_num_args() > 1)
			? call_user_func_array($V5mhcgfyfeif, array_slice(func_get_args(), 1))
			: call_user_func($V5mhcgfyfeif);
	}

	

	
	public function cache_set_path($Vcmaitbcbmmk = '')
	{
		$this->cachedir = $Vcmaitbcbmmk;
	}

	

	
	public function cache_on()
	{
		return $this->cache_on = TRUE;
	}

	

	
	public function cache_off()
	{
		return $this->cache_on = FALSE;
	}

	

	
	public function cache_delete($Vit55keurckf = '', $Vx2lmbkdlusv = '')
	{
		return $this->_cache_init()
			? $this->CACHE->delete($Vit55keurckf, $Vx2lmbkdlusv)
			: FALSE;
	}

	

	
	public function cache_delete_all()
	{
		return $this->_cache_init()
			? $this->CACHE->delete_all()
			: FALSE;
	}

	

	
	protected function _cache_init()
	{
		if ( ! class_exists('CI_DB_Cache', FALSE))
		{
			require_once(BASEPATH.'database/DB_cache.php');
		}
		elseif (is_object($this->CACHE))
		{
			return TRUE;
		}

		$this->CACHE = new CI_DB_Cache($this); 
		return TRUE;
	}

	

	
	public function close()
	{
		if ($this->conn_id)
		{
			$this->_close();
			$this->conn_id = FALSE;
		}
	}

	

	
	protected function _close()
	{
		$this->conn_id = FALSE;
	}

	

	
	public function display_error($Veqekzxyjyqy = '', $V2helsztjdu2 = '', $Vfb3mdmnk5xr = FALSE)
	{
		$Vxzdry3giwvl =& load_class('Lang', 'core');
		$Vxzdry3giwvl->load('db');

		$Vcuptk31tst0 = $Vxzdry3giwvl->line('db_error_heading');

		if ($Vfb3mdmnk5xr === TRUE)
		{
			$V15xvmvzbb0h = (array) $Veqekzxyjyqy;
		}
		else
		{
			$V15xvmvzbb0h = is_array($Veqekzxyjyqy) ? $Veqekzxyjyqy : array(str_replace('%s', $V2helsztjdu2, $Vxzdry3giwvl->line($Veqekzxyjyqy)));
		}

		
		
		
		$V2a1m5rlmdq1 = debug_backtrace();
		foreach ($V2a1m5rlmdq1 as $Vn2ycfau434sall)
		{
			if (isset($Vn2ycfau434sall['file'], $Vn2ycfau434sall['class']))
			{
				
				if (DIRECTORY_SEPARATOR !== '/')
				{
					$Vn2ycfau434sall['file'] = str_replace('\\', '/', $Vn2ycfau434sall['file']);
				}

				if (strpos($Vn2ycfau434sall['file'], BASEPATH.'database') === FALSE && strpos($Vn2ycfau434sall['class'], 'Loader') === FALSE)
				{
					
					$V15xvmvzbb0h[] = 'Filename: '.str_replace(array(APPPATH, BASEPATH), '', $Vn2ycfau434sall['file']);
					$V15xvmvzbb0h[] = 'Line Number: '.$Vn2ycfau434sall['line'];
					break;
				}
			}
		}

		$Veqekzxyjyqy =& load_class('Exceptions', 'core');
		echo $Veqekzxyjyqy->show_error($Vcuptk31tst0, $V15xvmvzbb0h, 'error_db');
		exit(8); 
	}

	

	
	public function protect_identifiers($Vutaiebycwbq, $Vztlqtan3pkd = FALSE, $Vay0icunx2zc = NULL, $Vbpiejellsfz = TRUE)
	{
		if ( ! is_bool($Vay0icunx2zc))
		{
			$Vay0icunx2zc = $this->_protect_identifiers;
		}

		if (is_array($Vutaiebycwbq))
		{
			$Vvbs20r5bcfv = array();
			foreach ($Vutaiebycwbq as $Vwyse0flpyxh => $Vxxtccqydhzn)
			{
				$Vvbs20r5bcfv[$this->protect_identifiers($Vwyse0flpyxh)] = $this->protect_identifiers($Vxxtccqydhzn, $Vztlqtan3pkd, $Vay0icunx2zc, $Vbpiejellsfz);
			}

			return $Vvbs20r5bcfv;
		}

		
		
		
		
		
		
		
		if (strcspn($Vutaiebycwbq, "()'") !== strlen($Vutaiebycwbq))
		{
			return $Vutaiebycwbq;
		}

		
		$Vutaiebycwbq = preg_replace('/\s+/', ' ', trim($Vutaiebycwbq));

		
		
		if ($Vzawlyjaf5xg = strripos($Vutaiebycwbq, ' AS '))
		{
			$V4skvbrggqat = ($Vay0icunx2zc)
				? substr($Vutaiebycwbq, $Vzawlyjaf5xg, 4).$this->escape_identifiers(substr($Vutaiebycwbq, $Vzawlyjaf5xg + 4))
				: substr($Vutaiebycwbq, $Vzawlyjaf5xg);
			$Vutaiebycwbq = substr($Vutaiebycwbq, 0, $Vzawlyjaf5xg);
		}
		elseif ($Vzawlyjaf5xg = strrpos($Vutaiebycwbq, ' '))
		{
			$V4skvbrggqat = ($Vay0icunx2zc)
				? ' '.$this->escape_identifiers(substr($Vutaiebycwbq, $Vzawlyjaf5xg + 1))
				: substr($Vutaiebycwbq, $Vzawlyjaf5xg);
			$Vutaiebycwbq = substr($Vutaiebycwbq, 0, $Vzawlyjaf5xg);
		}
		else
		{
			$V4skvbrggqat = '';
		}

		
		
		
		if (strpos($Vutaiebycwbq, '.') !== FALSE)
		{
			$Vxfb02ptgyna = explode('.', $Vutaiebycwbq);

			
			
			
			
			
			
			if ( ! empty($this->qb_aliased_tables) && in_array($Vxfb02ptgyna[0], $this->qb_aliased_tables))
			{
				if ($Vay0icunx2zc === TRUE)
				{
					foreach ($Vxfb02ptgyna as $V2xim30qek4u => $Va4zo0rltynr)
					{
						if ( ! in_array($Va4zo0rltynr, $this->_reserved_identifiers))
						{
							$Vxfb02ptgyna[$V2xim30qek4u] = $this->escape_identifiers($Va4zo0rltynr);
						}
					}

					$Vutaiebycwbq = implode('.', $Vxfb02ptgyna);
				}

				return $Vutaiebycwbq.$V4skvbrggqat;
			}

			
			if ($this->dbprefix !== '')
			{
				
				
				
				if (isset($Vxfb02ptgyna[3]))
				{
					$Vep0df0xosaw = 2;
				}
				
				
				elseif (isset($Vxfb02ptgyna[2]))
				{
					$Vep0df0xosaw = 1;
				}
				
				
				else
				{
					$Vep0df0xosaw = 0;
				}

				
				
				if ($Vbpiejellsfz === FALSE)
				{
					$Vep0df0xosaw++;
				}

				
				if ($this->swap_pre !== '' && strpos($Vxfb02ptgyna[$Vep0df0xosaw], $this->swap_pre) === 0)
				{
					$Vxfb02ptgyna[$Vep0df0xosaw] = preg_replace('/^'.$this->swap_pre.'(\S+?)/', $this->dbprefix.'\\1', $Vxfb02ptgyna[$Vep0df0xosaw]);
				}
				
				elseif (strpos($Vxfb02ptgyna[$Vep0df0xosaw], $this->dbprefix) !== 0)
				{
					$Vxfb02ptgyna[$Vep0df0xosaw] = $this->dbprefix.$Vxfb02ptgyna[$Vep0df0xosaw];
				}

				
				$Vutaiebycwbq = implode('.', $Vxfb02ptgyna);
			}

			if ($Vay0icunx2zc === TRUE)
			{
				$Vutaiebycwbq = $this->escape_identifiers($Vutaiebycwbq);
			}

			return $Vutaiebycwbq.$V4skvbrggqat;
		}

		
		if ($this->dbprefix !== '')
		{
			
			if ($this->swap_pre !== '' && strpos($Vutaiebycwbq, $this->swap_pre) === 0)
			{
				$Vutaiebycwbq = preg_replace('/^'.$this->swap_pre.'(\S+?)/', $this->dbprefix.'\\1', $Vutaiebycwbq);
			}
			
			elseif ($Vztlqtan3pkd === TRUE && strpos($Vutaiebycwbq, $this->dbprefix) !== 0)
			{
				$Vutaiebycwbq = $this->dbprefix.$Vutaiebycwbq;
			}
		}

		if ($Vay0icunx2zc === TRUE && ! in_array($Vutaiebycwbq, $this->_reserved_identifiers))
		{
			$Vutaiebycwbq = $this->escape_identifiers($Vutaiebycwbq);
		}

		return $Vutaiebycwbq.$V4skvbrggqat;
	}

	

	
	protected function _reset_select()
	{
	}

}
