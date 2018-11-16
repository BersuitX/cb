<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_mysqli_driver extends CI_DB {

	
	public $V4toindljvfg = 'mysqli';

	
	public $V3h0ce0jcbph = FALSE;

	
	public $V44qci1exq5s = TRUE;

	
	public $Vcdj14fjn3m1;

	

	
	protected $Vnm3z344krng = '`';

	

	
	protected $Vjnecq21cx0q;

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		
		if ($this->hostname[0] === '/')
		{
			$Vetnqbj4ssyj = NULL;
			$Vi23rpcbpupy = NULL;
			$V1ltlyofl2hs = $this->hostname;
		}
		else
		{
			
			$Vetnqbj4ssyj = ($Vzrtmbotfake === TRUE && is_php('5.3'))
				? 'p:'.$this->hostname : $this->hostname;
			$Vi23rpcbpupy = empty($this->port) ? NULL : $this->port;
			$V1ltlyofl2hs = NULL;
		}

		$V4v1252qjla2 = ($this->compress === TRUE) ? MYSQLI_CLIENT_COMPRESS : 0;
		$this->_mysqli = mysqli_init();

		$this->_mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);

		if (isset($this->stricton))
		{
			if ($this->stricton)
			{
				$this->_mysqli->options(MYSQLI_INIT_COMMAND, 'SET SESSION sql_mode = CONCAT(@@sql_mode, ",", "STRICT_ALL_TABLES")');
			}
			else
			{
				$this->_mysqli->options(MYSQLI_INIT_COMMAND,
					'SET SESSION sql_mode =
					REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
					@@sql_mode,
					"STRICT_ALL_TABLES,", ""),
					",STRICT_ALL_TABLES", ""),
					"STRICT_ALL_TABLES", ""),
					"STRICT_TRANS_TABLES,", ""),
					",STRICT_TRANS_TABLES", ""),
					"STRICT_TRANS_TABLES", "")'
				);
			}
		}

		if (is_array($this->encrypt))
		{
			$Vqig043bz0um = array();
			empty($this->encrypt['ssl_key'])    OR $Vqig043bz0um['key']    = $this->encrypt['ssl_key'];
			empty($this->encrypt['ssl_cert'])   OR $Vqig043bz0um['cert']   = $this->encrypt['ssl_cert'];
			empty($this->encrypt['ssl_ca'])     OR $Vqig043bz0um['ca']     = $this->encrypt['ssl_ca'];
			empty($this->encrypt['ssl_capath']) OR $Vqig043bz0um['capath'] = $this->encrypt['ssl_capath'];
			empty($this->encrypt['ssl_cipher']) OR $Vqig043bz0um['cipher'] = $this->encrypt['ssl_cipher'];

			if ( ! empty($Vqig043bz0um))
			{
				if (isset($this->encrypt['ssl_verify']))
				{
					if ($this->encrypt['ssl_verify'])
					{
						defined('MYSQLI_OPT_SSL_VERIFY_SERVER_CERT') && $this->_mysqli->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, TRUE);
					}
					
					
					
					
					
					
					elseif (defined('MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT'))
					{
						$this->_mysqli->options(MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT, TRUE);
					}
				}

				$V4v1252qjla2 |= MYSQLI_CLIENT_SSL;
				$this->_mysqli->ssl_set(
					isset($Vqig043bz0um['key'])    ? $Vqig043bz0um['key']    : NULL,
					isset($Vqig043bz0um['cert'])   ? $Vqig043bz0um['cert']   : NULL,
					isset($Vqig043bz0um['ca'])     ? $Vqig043bz0um['ca']     : NULL,
					isset($Vqig043bz0um['capath']) ? $Vqig043bz0um['capath'] : NULL,
					isset($Vqig043bz0um['cipher']) ? $Vqig043bz0um['cipher'] : NULL
				);
			}
		}

		if ($this->_mysqli->real_connect($Vetnqbj4ssyj, $this->username, $this->password, $this->database, $Vi23rpcbpupy, $V1ltlyofl2hs, $V4v1252qjla2))
		{
			
			if (
				($V4v1252qjla2 & MYSQLI_CLIENT_SSL)
				&& version_compare($this->_mysqli->client_info, '5.7.3', '<=')
				&& empty($this->_mysqli->query("SHOW STATUS LIKE 'ssl_cipher'")->fetch_object()->Value)
			)
			{
				$this->_mysqli->close();
				$V15xvmvzbb0h = 'MySQLi was configured for an SSL connection, but got an unencrypted connection instead!';
				log_message('error', $V15xvmvzbb0h);
				return ($this->db->db_debug) ? $this->db->display_error($V15xvmvzbb0h, '', TRUE) : FALSE;
			}

			return $this->_mysqli;
		}

		return FALSE;
	}

	

	
	public function reconnect()
	{
		if ($this->conn_id !== FALSE && $this->conn_id->ping() === FALSE)
		{
			$this->conn_id = FALSE;
		}
	}

	

	
	public function db_select($Vvfjs0vadwyn = '')
	{
		if ($Vvfjs0vadwyn === '')
		{
			$Vvfjs0vadwyn = $this->database;
		}

		if ($this->conn_id->select_db($Vvfjs0vadwyn))
		{
			$this->database = $Vvfjs0vadwyn;
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _db_set_charset($Vwxuqfbo3r2c)
	{
		return $this->conn_id->set_charset($Vwxuqfbo3r2c);
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		return $this->data_cache['version'] = $this->conn_id->server_info;
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return $this->conn_id->query($this->_prep_query($Vcusg10hsxxg));
	}

	

	
	protected function _prep_query($Vcusg10hsxxg)
	{
		
		
		if ($this->delete_hack === TRUE && preg_match('/^\s*DELETE\s+FROM\s+(\S+)\s*$/i', $Vcusg10hsxxg))
		{
			return trim($Vcusg10hsxxg).' WHERE 1=1';
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _trans_begin()
	{
		$this->conn_id->autocommit(FALSE);
		return is_php('5.5')
			? $this->conn_id->begin_transaction()
			: $this->simple_query('START TRANSACTION'); 
	}

	

	
	protected function _trans_commit()
	{
		if ($this->conn_id->commit())
		{
			$this->conn_id->autocommit(TRUE);
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _trans_rollback()
	{
		if ($this->conn_id->rollback())
		{
			$this->conn_id->autocommit(TRUE);
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		return $this->conn_id->real_escape_string($Vssdjb5oqaky);
	}

	

	
	public function affected_rows()
	{
		return $this->conn_id->affected_rows;
	}

	

	
	public function insert_id()
	{
		return $this->conn_id->insert_id;
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SHOW TABLES FROM '.$this->escape_identifiers($this->database);

		if ($Voyorvgwidbq !== FALSE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg." LIKE '".$this->escape_like_str($this->dbprefix)."%'";
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (($Vfvggg0pmnws = $this->query('SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE))) === FALSE)
		{
			return FALSE;
		}
		$Vfvggg0pmnws = $Vfvggg0pmnws->result_object();

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]->Field;

			sscanf($Vfvggg0pmnws[$Vep0df0xosaw]->Type, '%[a-z](%d)',
				$V1qi3fii2jjy[$Vep0df0xosaw]->type,
				$V1qi3fii2jjy[$Vep0df0xosaw]->max_length
			);

			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->Default;
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) ($Vfvggg0pmnws[$Vep0df0xosaw]->Key === 'PRI');
		}

		return $V1qi3fii2jjy;
	}

	

	
	public function error()
	{
		if ( ! empty($this->_mysqli->connect_errno))
		{
			return array(
				'code' => $this->_mysqli->connect_errno,
				'message' => is_php('5.2.9') ? $this->_mysqli->connect_error : mysqli_connect_error()
			);
		}

		return array('code' => $this->conn_id->errno, 'message' => $this->conn_id->error);
	}

	

	
	protected function _from_tables()
	{
		if ( ! empty($this->qb_join) && count($this->qb_from) > 1)
		{
			return '('.implode(', ', $this->qb_from).')';
		}

		return implode(', ', $this->qb_from);
	}

	

	
	protected function _close()
	{
		$this->conn_id->close();
	}

}
